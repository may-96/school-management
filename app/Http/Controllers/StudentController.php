<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\DataTables\StudentDataTable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\ClassModel;
use App\Models\ClassSection;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function create()
    {
        $classes = ClassModel::with('sections')->get();
        return view('pages.students.create', compact('classes'));
    }

    public function store(Request $request)
    {

        // dd($request->class_section_id, DB::table('class_sections')->find('id'));

        $request->validate([
            'first_name' => 'required|string|max:25',
            'last_name' => 'required|string|max:25',
            'parents_name' => 'required|string|max:25',
            'parents_mobile' => 'required|string|max:25',
            'dob' => 'required|date',
            'registration_date' => 'required|date',
            'gender' => 'required|string',
            'admission_no' => 'required|unique:students|string|max:25',
            'roll_no' => 'nullable|string|max:15',
            'class_section_id' => 'nullable|exists:class_section,id',
            'status' => 'nullable|string',
            'secondary_mobile' => 'nullable|string|max:25',
            'profile_photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'address' => 'nullable|string|max:100',
        ]);

        $fileName = null;
        if ($request->hasFile('profile_photo')) {
            $fileName = $this->uploadProfilePhoto($request->file('profile_photo'));
        }

        $data = $request->except('profile_photo');

        if (empty($data['status'])) {
            unset($data['status']);
        }

        if ($request->filled('class_id') && !$request->filled('class_section_id')) {
            return back()->withInput()->withErrors([
                'class_section_id' => 'Please select a section when a class is chosen.',
            ]);
        }

        $data['profile_image'] = $fileName;
        $data['user_id'] = Auth::id();

        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        $selectedClassId = optional(ClassSection::find($student->class_section_id))->class_id;

        $classes = ClassModel::all();

        return view('pages.students.edit', compact('student', 'classes', 'selectedClassId'));
    }


    public function update(Request $request, $id)
    {

        // dd($request->class_section_id, DB::table('class_section')->pluck('id'));

        $request->validate([
            'first_name' => 'required|string|max:25',
            'last_name' => 'required|string|max:25',
            'parents_name' => 'required|string|max:25',
            'parents_mobile' => 'required|string|max:25',
            'dob' => 'required|date',
            'registration_date' => 'required|date',
            'gender' => 'required|string',
            'admission_no' => 'required|string|max:25|unique:students,admission_no,' . $id,
            'roll_no' => 'nullable|string|max:15',
            'class_section_id' => 'nullable|exists:class_section,id',
            'status' => 'nullable|string',
            'secondary_mobile' => 'nullable|string|max:25',
            'profile_photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'address' => 'nullable|string|max:100',
        ]);

        $student = Student::findOrFail($id);

        if ($request->hasFile('profile_photo')) {
            if ($student->profile_image && Storage::exists('public/students/' . $student->profile_image)) {
                Storage::delete('public/students/' . $student->profile_image);
            }

            $imagePath = $this->uploadProfilePhoto($request->file('profile_photo'));
        } else {
            $imagePath = $student->profile_image;
        }

        $student->update([
            'first_name'        => $request->input('first_name'),
            'last_name'         => $request->input('last_name'),
            'parents_name'      => $request->input('parents_name'),
            'parents_mobile'    => $request->input('parents_mobile'),
            'dob'               => $request->input('dob'),
            'registration_date' => $request->input('registration_date'),
            'gender'            => $request->input('gender'),
            'admission_no'      => $request->input('admission_no'),
            'roll_no'           => $request->input('roll_no'),
            'status'            => $request->input('status'),
            'secondary_mobile'  => $request->input('secondary_mobile'),
            'profile_image'     => $imagePath,
            'address'           => $request->input('address'),
            'class_section_id'  => $request->input('class_section_id'),
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }


    public function index(StudentDataTable $dataTable)
    {
        return $dataTable->render('pages.students.index');
    }

    public function show(StudentDataTable $dataTable, $id)
    {
        if (!is_numeric($id)) {
            abort(404);
        }

        $student = Student::findOrFail($id);

        return $dataTable->render('pages.students.show', compact('student'));
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        if ($student->vouchers()->count() > 0) {
            return redirect()->back()->with('warning', 'Please delete the vouchers associated with this student before deleting the student.');
        }

        if ($student->profile_image && file_exists(storage_path('app/public/students/' . $student->profile_image))) {
            unlink(storage_path('app/public/students/' . $student->profile_image));
        }

        $student->delete();

        return redirect()->back()->with('success', 'Student deleted successfully!');
    }

    private function uploadProfilePhoto($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(storage_path('app/public/students'), $fileName);
        return $fileName;
    }

    public function checkMultipleStatuses(Request $request)
    {
        $ids = $request->input('student_ids', []);

        $inactiveStudents = Student::whereIn('id', $ids)
            ->where('status', '!=', 'active')
            ->get(['id', 'first_name', 'last_name'])
            ->map(function ($student) {
                return [
                    'id' => $student->id,
                    'name' => $student->first_name . ' ' . $student->last_name,
                ];
            });

        return response()->json([
            'inactive' => $inactiveStudents,
        ]);
    }

    // yajra datatable student voucher list for each student
    public function paymentData($id)
    {
        $student = Student::with('vouchers')->findOrFail($id);
        $payments = $student->vouchers()->with(['student', 'user']);

        $dataTable = DataTables::of($payments)
            ->addColumn('student_info', function ($payment) use ($student) {
                $imgUrl = $student->profile_image ? asset('storage/students/' . $student->profile_image) : asset('assets/images/user/avatar-2.jpg');

                return '
            <div class="row align-items-center">
                <div class="col-auto pe-0">
                    <img src="' .
                    $imgUrl .
                    '" class="img-fluid rounded-circle" style="height:40px; width:40px;" />
                </div>
                <div class="col">
                    <h6 class="mb-0">' .
                    $student->first_name .
                    ' ' .
                    $student->last_name .
                    '</h6>
                    <p class="f-12 mb-0"><a href="#!" class="text-muted">
                        <span class="text-truncate w-100">' .
                    $student->parents_mobile .
                    '</span></a></p>
                </div>
            </div>';
            })
            ->addColumn('invoice_id', function ($voucher) {
                $monthYear = $voucher->month_year
                    ? str(Carbon::createFromFormat('Y-m', $voucher->month_year)->format('F Y'))
                    : '';

                return '
        <a href="' . route('voucher.show', $voucher) . '" class="text-body text-decoration-none">
            ' . e($voucher->invoice_id) . '
        </a>
        <br>
        <small class="text-muted">' . $monthYear . '</small>
    ';
            })
            ->editColumn('payment_date', fn($payment) => \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y'))
            ->editColumn('amount', function ($payment) {
                $paidAmount = $payment->payments()->sum('amount');
                $remaining = $payment->amount - $paidAmount;

                return '
        <div>' .
                    number_format($remaining) .
                    ' PKR</div>
        <div class="text-muted small">Paid: ' .
                    number_format($paidAmount) .
                    ' PKR</div>
    ';
            })

            ->addColumn('status', function ($payment) {
                return match (strtolower($payment->status)) {
                    'paid' => '<span class="badge bg-light-success">Paid</span>',
                    'unpaid' => '<span class="badge bg-light-danger">Unpaid</span>',
                    'partial paid' => '<span class="badge bg-light-warning">Partial Paid</span>',
                    default => '<span class="badge bg-light-secondary">Unknown</span>',
                };
            });

        if (Auth::check() && Auth::user()->role === 'admin') {
            $dataTable->addColumn('added_by', function ($payment) {
                return $payment->user ? trim($payment->user->first_name . ' ' . $payment->user->last_name) : 'Unknown';
            });
        }

        $dataTable->addColumn('actions', function ($payment) use ($student) {
            $status = strtolower($payment->status);

            $addButton = '';
            $editButton = '';
            $deleteButton = '';

            if (in_array($status, ['unpaid', 'partial paid'])) {
                $addButton =
                    '
        <li class="list-inline-item">
            <a href="#"
                class="avtar avtar-xs btn-link-secondary open-payment-modal" data-bs-hover="tooltip" data-bs-placement="top" title="Add Payment"
                data-bs-toggle="modal"
                data-bs-target="#student-add-payment_modal"
                data-invoice-id="' .
                    e($payment->invoice_id) .
                    '"
                data-reference-number="' .
                    e($payment->reference_no) .
                    '"
                data-voucher-id="' .
                    e($payment->id) .
                    '"
                data-voucher-amount="' .
                    e($payment->amount - $payment->payments()->sum('amount')) .
                    '">
                <i class="ti ti-plus f-20" ></i>
            </a>
        </li>';

                $editButton =
                    '
        <li class="list-inline-item">
              <a href="' . route('voucher.edit', $payment->id) . '?redirect_to=show&student_id=' . $student->id . '" 
           class="avtar avtar-xs btn-link-secondary" 
           data-bs-hover="tooltip" 
           title="Edit">
            <i class="ti ti-edit f-20"></i>
        </a>
        </li>';
            }

            if ($status === 'unpaid') {
                $deleteButton =
                    '
        <li class="list-inline-item">
          <form id="delete-form-' . $payment->id . '" 
      action="' . route('voucher.destroy', $payment->id) . '" 
      method="POST" style="display: none;">
    ' . csrf_field() . method_field('DELETE') . '
    <input type="hidden" name="redirect_to" value="show">
    <input type="hidden" name="student_id" value="' . $student->id . '">
</form>

            <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para" data-bs-hover="tooltip" title="Delete" data-id="' .
                    $payment->id .
                    '">
                <i class="ti ti-trash f-20"></i>
            </a>
        </li>';
            }

            return '
    <ul class="list-inline mb-0 text-end">' .
                $addButton .
                '
        <li class="list-inline-item">
            <a href="#"
               class="avtar avtar-xs btn-link-secondary view-payment-slip" data-bs-hover="tooltip" title="View Payment Slip"
               data-bs-toggle="modal"
               data-bs-target="#student-payment-slip_model"
               data-voucher-id="' .
                e($payment->id) .
                '"
               data-student-id="' .
                e($payment->student_id) .
                '">
               <i class="ti ti-eye f-20"></i>
            </a>
        </li>' .
                $editButton .
                $deleteButton .
                '
    </ul>';
        });

        $rawColumns = ['invoice_id', 'student_info', 'status', 'actions', 'amount'];

        if (Auth::check() && Auth::user()->role === 'admin') {
            $rawColumns[] = 'added_by';
        }

        return $dataTable->rawColumns($rawColumns)->make(true);
    }
}

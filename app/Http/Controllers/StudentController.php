<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\DataTables\StudentDataTable;
use App\DataTables\StudentVoucherPaymentDataTable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;

class StudentController extends Controller

{
    public function create()
    {
        return view('pages.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'registration_date' => 'required|date',
            'admission_no' => 'nullable|string|max:255',
            'roll_no' => 'nullable|string|max:255',
            'class' => 'nullable|string',
            'section' => 'nullable|string',
            'gender' => 'nullable|string',
            'status' => 'nullable|string',
            'parents_name' => 'nullable|string',
            'parents_mobile' => 'nullable|numeric',
            'secondary_mobile' => 'nullable|numeric',
            'profile_photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'address' => 'nullable|string',
        ]);

        $fileName = null;
        if ($request->hasFile('profile_photo')) {
            $fileName = $this->uploadProfilePhoto($request->file('profile_photo'));
        }

        $data = $request->except('profile_photo');
        $data['profile_image'] = $fileName;

        Student::create($data);

        return redirect()->route('student.index')->with('success', 'Student added successfully!');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('pages.students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'registration_date' => 'required|date',
            'admission_no' => 'nullable|string|max:255',
            'roll_no' => 'nullable|string|max:255',
            'class' => 'nullable|string',
            'section' => 'nullable|string',
            'gender' => 'nullable|string',
            'status' => 'nullable|string',
            'parents_name' => 'nullable|string',
            'parents_mobile' => 'nullable|numeric',
            'secondary_mobile' => 'nullable|numeric',
            'profile_photo' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'address' => 'nullable|string',
        ]);

        $student = Student::findOrFail($id);

        if ($request->hasFile('profile_photo')) {
            if ($student->profile_image && file_exists(storage_path('app/public/students/' . $student->profile_image))) {
                unlink(storage_path('app/public/students/' . $student->profile_image));
            }

            $imagePath = $this->uploadProfilePhoto($request->file('profile_photo'));
        } else {
            $imagePath = $student->profile_image;
        }

        $student->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'dob' => $request->input('dob'),
            'registration_date' => $request->input('registration_date'),
            'admission_no' => $request->input('admission_no'),
            'roll_no' => $request->input('roll_no'),
            'class' => $request->input('class'),
            'section' => $request->input('section'),
            'gender' => $request->input('gender'),
            'status' => $request->input('status'),
            'parents_name' => $request->input('parents_name'),
            'parents_mobile' => $request->input('parents_mobile'),
            'secondary_mobile' => $request->input('secondary_mobile'),
            'profile_image' => $imagePath,
            'address' => $request->input('address'),
        ]);

        return redirect()->route('student.index')->with('success', 'Student updated successfully!');
    }

    public function index(StudentDataTable $dataTable)
    {
        return $dataTable->render('pages.students.index');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        if ($student->profile_image && file_exists(storage_path('app/public/students/' . $student->profile_image))) {
            unlink(storage_path('app/public/students/' . $student->profile_image));
        }

        $student->delete();

        return redirect()->back()->with('success', 'Student deleted successfully!');
    }

    public function show(StudentVoucherPaymentDataTable $dataTable, $id)
    {
        $student = Student::findOrFail($id);
        return $dataTable->setStudentId($id)->render('pages.students.show', compact('student'));
    }

    private function uploadProfilePhoto($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(storage_path('app/public/students'), $fileName);
        return $fileName;
    }


    // yajra datatable voucher list for each student

    public function paymentData($id)
    {
        $student = Student::with('payments')->findOrFail($id);
        $payments = $student->payments()->with('student');

        return DataTables::of($payments)
            ->addColumn('student_info', function ($payment) use ($student) {
                $imgUrl = $student->profile_image
                    ? asset('storage/students/' . $student->profile_image)
                    : asset('assets/images/user/avatar-1.jpg');

                return '
                <div class="row align-items-center">
                    <div class="col-auto pe-0">
                        <img src="' . $imgUrl . '" class="img-fluid rounded-circle" style="height:40px; width:40px;" />
                    </div>
                    <div class="col">
                        <h6 class="mb-0">' . $student->first_name . ' ' . $student->last_name . '</h6>
                        <p class="f-12 mb-0"><a href="#!" class="text-muted">
                            <span class="text-truncate w-100">' . $student->parents_mobile . '</span></a></p>
                    </div>
                </div>';
            })
            ->editColumn('payment_date', function ($payment) {
                return \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y');
            })
            ->editColumn('amount', function ($payment) {
                return $payment->amount . ' Pkr';
            })
            ->addColumn('status', function ($payment) {
                $status = strtolower($payment->status);
                return match ($status) {
                    'paid' => '<span class="badge bg-light-success">Paid</span>',
                    'unpaid' => '<span class="badge bg-light-danger">Unpaid</span>',
                    'partial paid' => '<span class="badge bg-light-warning">Partial Paid</span>',
                    default => '<span class="badge bg-light-secondary">Unknown</span>',
                };
            })
            ->addColumn('actions', function ($payment) {
                $status = strtolower($payment->status);

                $addButton = '';
                $editButton = '';
                $deleteButton = '';

                if (in_array($status, ['unpaid', 'partial paid'])) {
                    $addButton = '
            <li class="list-inline-item">
                <a href="#"
                    class="avtar avtar-xs btn-link-secondary open-payment-modal"
                    data-bs-toggle="modal"
                    data-bs-target="#student-add-payment_modal"
                    data-invoice-id="' . e($payment->invoice_id) . '"
                    data-reference-number="' . e($payment->reference_no) . '"
                    data-voucher-id="' . e($payment->id) . '"
                    data-voucher-amount="' . e($payment->amount - $payment->payments()->sum('amount')) . '">
                    <i class="ti ti-plus f-20"></i>
                </a>
            </li>';

                    $editButton = '
            <li class="list-inline-item">
                <a href="' . route('voucher.edit', $payment->id) . '" class="avtar avtar-xs btn-link-secondary">
                    <i class="ti ti-edit f-20"></i>
                </a>
            </li>';
                }

                if ($status === 'unpaid') {
                    $deleteButton = '
            <li class="list-inline-item">
                <form id="delete-form-' . $payment->id . '" action="' . route('voucher.destroy', $payment->id) . '" method="POST" style="display: none;">
                    ' . csrf_field() . method_field('DELETE') . '
                </form>
                <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para" data-id="' . $payment->id . '">
                    <i class="ti ti-trash f-20"></i>
                </a>
            </li>';
                }

                return '
        <ul class="list-inline mb-0 text-end">'
                    . $addButton . '
            <li class="list-inline-item">
                <a href="#"
                   class="avtar avtar-xs btn-link-secondary view-payment-slip"
                   data-bs-toggle="modal"
                   data-bs-target="#student-payment-slip_model"
                   data-voucher-id="' . e($payment->id) . '"
                   data-student-id="' . e($payment->student_id) . '">
                   <i class="ti ti-eye f-20"></i>
                </a>
            </li>'
                    . $editButton .
                    $deleteButton .
                    '</ul>';
            })



            ->rawColumns(['student_info', 'status', 'actions'])
            ->make(true);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\FeeType;
use App\Models\Section;
use App\Models\Subject;
use App\Models\PayType;

class AttributeController extends Controller
{
    public function index()
    {
        $classes = ClassModel::with('sections')->get();
        $sections = Section::with('classes')->get();
        $subjects = Subject::all();
        $feeTypes = FeeType::all();
        $payTypes = PayType::all();

        $activeTab = session('active_tab', 'profile-1'); 

        return view('pages.attributes.index', compact(
            'classes',
            'sections',
            'subjects',
            'feeTypes',
            'payTypes',
            'activeTab'
        ));
    }
}

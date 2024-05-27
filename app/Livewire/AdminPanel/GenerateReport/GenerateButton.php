<?php

namespace App\Livewire\AdminPanel\GenerateReport;

use App\Models\ActivityCategory;
use App\Models\ClassStudent;
use App\Models\FinalActivityCategory;
use App\Models\FinalTermActivity;
use App\Models\MidTermActivity;
use App\Models\MyClass;
use App\Models\StudentFinalTermActivityRecord;
use App\Models\StudentMidTermActivityRecord;
use App\Models\Subject;
use App\Models\User;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Auth;

class GenerateButton extends Component
{
    public function render()
    {
        return view('livewire.admin-panel.generate-report.generate-button');
    }

    public function GenerateReport()
    {
        $pdfContent = PDF::loadView('livewire.admin-panel.generate-report.generate-pdf', [
            'TotalNumberOfSubject'  =>  Subject::all(),
            'TotalNumberOfStudent'  =>  User::where('rule_id',3)->get(),
            'ClassData'  =>  MyClass::all(),
            'SubjectNameData'  =>  Subject::all(),
            'ClassStudentData'  =>  ClassStudent::all(),

            // 'ClassStudentData' =>   ClassStudent::join('users', 'class_students.student_id', '=', 'users.id')->orderBy('users.name', 'asc')->get(),
            'ActivityCategoryData' =>   ActivityCategory::all(),
            'MidTermActivityData' =>   MidTermActivity::all(),
            'StudentMidTermActivityRecordData' =>   StudentMidTermActivityRecord::all(),

            'FinalActivityCategoryData' =>   FinalActivityCategory::all(),
            'FinalTermActivityData' =>   FinalTermActivity::all(),
            'StudentFinalTermActivityRecordData' =>   StudentFinalTermActivityRecord::all(),

        ])->setPaper('Legal', 'Portrait')->output();
        return response()->streamDownload(fn () => print($pdfContent), "Academic Performance Report.pdf");

    }
}

<?php

namespace App\Livewire\StudentPanel\PrintGrade;

use App\Models\ActivityCategory;
use App\Models\ClassStudent;
use App\Models\FinalActivityCategory;
use App\Models\FinalTermActivity;
use App\Models\MidTermActivity;
use App\Models\Semester;
use App\Models\StudentFinalTermActivityRecord;
use App\Models\StudentMidTermActivityRecord;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Auth;

class PrintGradeButton extends Component
{
    public function render()
    {
        return view('livewire.student-panel.print-grade.print-grade-button');
    }

    public function PrintGrade()
    {
        $ClassStudentData = ClassStudent::where('student_id', Auth::user()->id)->get();

        // START for count SY
        $count_sy = [];
        foreach ($ClassStudentData as $index => $data) {
            $count_sy['sy'][$index] = $data->getMyClass->school_year;
            $count_sy['sem'][$index] = $data->getMyClass->semester_id;
        }

        $sy = $count_sy['sy'];
        $sem = $count_sy['sem'];
        array_multisort($sy, SORT_ASC, $sem, SORT_ASC);

        $sortedData = [
            "sy" => $sy,
            "sem" => $sem
        ];

        $uniqueData = [];
        $uniqueCombinations = [];
        foreach ($sortedData['sy'] as $index => $sy) {
            $sem = $sortedData['sem'][$index];
            $combination = $sy . '-' . $sem;
            if (!in_array($combination, $uniqueCombinations)) {
                $uniqueCombinations[] = $combination;
                $uniqueData[] = [
                    "sy" => $sy,
                    "sem" => $sem
                ];
            }
        }
        // END for count SY
        $this->dispatch('refresh_student_dashboard');
        $pdfContent = PDF::loadView('livewire.student-panel.print-grade.print-grade-pdf', [
            'Student_Name' => Auth::user()->name,
            'Student_Number' => Auth::user()->id_number,
            'uniqueData' => $uniqueData,
            'ClassStudentData2'=>ClassStudent::where('student_id', Auth::user()->id)->get(),
            'SemesterData' => Semester::all(),
            'Course' => Auth::user()->getCourse->abbreviation,


            
            'ClassStudentData' =>   ClassStudent::join('users', 'class_students.student_id', '=', 'users.id')->where('student_id',Auth::user()->id)->orderBy('users.name', 'asc')->get(),
            'ActivityCategoryData' =>   ActivityCategory::all(),
            'MidTermActivityData' =>   MidTermActivity::all(),
            'StudentMidTermActivityRecordData' =>   StudentMidTermActivityRecord::all(),

            'FinalActivityCategoryData' =>   FinalActivityCategory::all(),
            'FinalTermActivityData' =>   FinalTermActivity::all(),
            'StudentFinalTermActivityRecordData' =>   StudentFinalTermActivityRecord::all(),
        ])->setPaper('Legal', 'Portrait')->output();
        return response()->streamDownload(fn () => print($pdfContent), Auth::user()->id_number.".pdf");
    }
}

<?php

namespace App\Livewire\StudentPanel\PrintGrade;

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
        
        $this->dispatch('refresh_student_dashboard');
        $pdfContent = PDF::loadView('livewire.student-panel.print-grade.print-grade-pdf',[
            'Student_Name'=>Auth::user()->name,
            'Student_Number'=>Auth::user()->id_number,
        ])->setPaper('Legal', 'Portrait')->output();
        return response()->streamDownload(fn () => print($pdfContent),"sample".".pdf");
    }
}

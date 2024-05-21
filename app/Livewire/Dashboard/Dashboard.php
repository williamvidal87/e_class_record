<?php

namespace App\Livewire\Dashboard;

use App\Models\ActivityCategory;
use App\Models\ClassStudent;
use App\Models\Course;
use App\Models\FinalActivityCategory;
use App\Models\FinalTermActivity;
use App\Models\MidTermActivity;
use App\Models\StudentFinalTermActivityRecord;
use App\Models\StudentMidTermActivityRecord;
use App\Models\Subject;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $failed_Data=[];
    public $passed_Data=[];
    public $numElementsofFailed;
    public $numElementsofPassed;
    public function render()
    {
        $ClassStudentData =   ClassStudent::join('users', 'class_students.student_id', '=', 'users.id')->orderBy('users.name', 'asc')->get();
        
        $MidTermActivityData =   MidTermActivity::all();
        $StudentMidTermActivityRecordData =   StudentMidTermActivityRecord::all();
        
        $FinalTermActivityData =   FinalTermActivity::all();
        $StudentFinalTermActivityRecordData =   StudentFinalTermActivityRecord::all();
        $All_Subject =  Subject::all();
        $failed_subject = [];
        $passed_subject = [];
        foreach ($All_Subject as $index_subject => $all_subject) {
            $failed_subject[$index_subject]['subject_name']=$all_subject->subject;
            $failed_subject[$index_subject]['total_failed']=0;
            $passed_subject[$index_subject]['subject_name']=$all_subject->subject;
            $passed_subject[$index_subject]['total_passed']=0;
            foreach ($ClassStudentData as $index => $Data) {
                if($Data->getMyClass->subject_id==$all_subject->id){
                    $semesteralGrade = 0;
                    $totalGrade = 0;
                    $not_coplied_midterm = 0;
                    $count_midterm_activity = 0;
                    $count_midterm_missed = 0;
                    $ActivityCategoryData =   ActivityCategory::where('my_class_id',$Data->my_class_id)->get();
                    foreach ($ActivityCategoryData as $data) {
                        $totalActivity = 0;
                        $totalMaximum = 0;
                        foreach ($MidTermActivityData as $data2) {
                            if ($data->id == $data2->activity_category_id) {
                                foreach ($StudentMidTermActivityRecordData as $data3) {
                                    if ($data2->id == $data3->mid_term_activity_id && $Data->student_id == $data3->student_id) {
                                        $totalActivity += $data3->score;
                                        if ($data2->maximum_score != 1) {
                                            $count_midterm_activity++;
                                        }
                                        if ($data3->score == "") {
                                            if ($data2->maximum_score == 1) {
                                                //
                                            } else {
                                                $not_coplied_midterm = 1;
                                                $count_midterm_missed++;
                                            }
                                        }
                                    }
                                }
                                $totalMaximum += $data2->maximum_score;
                            }
                        }
                        if ($totalMaximum == 0) {
                            $totalMaximum = 1;
                        }
                        $totalGrade += ((($totalActivity / $totalMaximum) * $data->multiply) + $data->addition) * ($data->percentage / 100);

                        $count2 = 0;
                        foreach ($MidTermActivityData as $data2) {
                            if ($data->id == $data2->activity_category_id) {
                                $count2++;
                            }
                        }
                        if ($count2 == 0) {
                        }
                    }
                    $semesteralGrade += $totalGrade;
                    $totalGrade = 0;
                    $not_coplied_finalterm = 0;
                    $count_finalterm_activity = 0;
                    $count_finalterm_missed = 0;
                    $FinalActivityCategoryData =   FinalActivityCategory::where('my_class_id',$Data->my_class_id)->get();
                    foreach ($FinalActivityCategoryData as $data) {
                        $totalActivity = 0;
                        $totalMaximum = 0;
                        foreach ($FinalTermActivityData as $data2) {
                            if ($data->id == $data2->activity_category_id) {
                                foreach ($StudentFinalTermActivityRecordData as $data3) {
                                    if ($data2->id == $data3->final_activity_id && $Data->student_id == $data3->student_id) {
                                        $totalActivity += $data3->score;
                                        if ($data2->maximum_score != 1) {
                                            $count_finalterm_activity++;
                                        }
                                        if ($data3->score == "") {
                                            if ($data2->maximum_score == 1) {
                                            } else {
                                                $not_coplied_finalterm = 1;
                                                $count_finalterm_missed++;
                                            }
                                        }
                                    }
                                }
                                $totalMaximum += $data2->maximum_score;
                            }
                        }
                        if ($totalMaximum == 0) {
                            $totalMaximum = 1;
                        }
                        $totalGrade += ((($totalActivity / $totalMaximum) * $data->multiply) + $data->addition) * ($data->percentage / 100);


                        $count2 = 0;
                        foreach ($FinalTermActivityData as $data2) {
                            if ($data->id == $data2->activity_category_id) {
                                $count2++;
                            }
                        }
                        if ($count2 == 0) {
                        }
                    }
                    $semesteralGrade += $totalGrade;
                    $SumGrade = $semesteralGrade / 2;
                    if ($SumGrade >= 75) {
                        // echo "Passed".number_format($SumGrade, 2, '.', '');
                        $passed_subject[$index_subject]['total_passed']++;
                    } else {
                        if ($not_coplied_midterm == 1 || $not_coplied_finalterm == 1) {
                            if ($count_midterm_activity == $count_midterm_missed && $count_finalterm_activity == $count_finalterm_missed) {
                                // echo "Failed".number_format($SumGrade, 2, '.', '');
                                $failed_subject[$index_subject]['total_failed']++;
                            } else {
                                // echo "INC".number_format($SumGrade, 2, '.', '');
                            }
                        } else {
                            // echo "Failed".number_format($SumGrade, 2, '.', '');
                            $failed_subject[$index_subject]['total_failed']++;
                        }
                    }
                }
            }
        }
        //start for failed
        $failedSubjects = array_filter($failed_subject, function($subject) {
            return $subject['total_failed'] > 0;
        });
        usort($failedSubjects, function($a, $b) {
            return $b['total_failed'] <=> $a['total_failed'];
        });
        $topFailedSubjects = array_slice($failedSubjects, 0, 10);
        $this->failed_Data=$topFailedSubjects;
        $this->numElementsofFailed = count($topFailedSubjects);
        //end for failed

        //start for passed
        $passedSubjects = array_filter($passed_subject, function($subject) {
            return $subject['total_passed'] > 0;
        });
        usort($passedSubjects, function($a, $b) {
            return $b['total_passed'] <=> $a['total_passed'];
        });
        $topPassedSubjects = array_slice($passedSubjects, 0, 10);
        $this->passed_Data=$topPassedSubjects;
        $this->numElementsofPassed = count($topPassedSubjects);
        //end for passed




        return view('livewire.dashboard.dashboard', [
            'InstructorData' =>   User::all()->where('rule_id', 2),
            'StudentData' =>   User::all()->where('rule_id', 3),
            'CourseData' =>   Course::all(),
        ]);
    }
}

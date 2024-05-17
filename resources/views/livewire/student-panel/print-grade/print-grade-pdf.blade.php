<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10pt;
        }

        table,
        th,
        td {
            border: 1.5px solid black;
            border-collapse: collapse;
        }

        @page {
            margin-top: 0.25in;
            margin-left: 0.50in;
            margin-right: 0.50in;
            margin-bottom: 0.50in;
            size: 8.5in 13in;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .table-container {
            width: 48%;
            display: inline-block;
            vertical-align: top;
            margin-right: 2%;
            margin-bottom: 10px;
        }

        .table-container:nth-child(2n) {
            margin-right: 0;
        }

        .vertical-text {
            display: inline-block;
            transform: rotate(-90deg);
            transform-origin: left bottom;
            white-space: nowrap;
            text-align: center;
            width: 20px; /* Adjust the width based on the length of your text */
        }

        /* Set page-break-inside to avoid for the header container */
        .header-container {
            page-break-inside: avoid;
        }
    </style>
</head>

<body>
    {{--start header --}}
    <div class="clearfix header-container">
        <div style="width: 13.5%; float: left;">
            <p style="font-size: 8pt;">Form 137-T</p>
        </div>
        <div style="width: 13.5%; float: left;">
            <img src="image/logo.png" height="100" width="100">
        </div>
        <div style="width: 46%; float: left;">
            <p style="line-height: 1.6; text-align: center; font-size: 9pt;">
                Republic of the Philippines
                <br><span style="font-family: serif; font-size: 12pt; font-weight: bold;">NEGROS ORIENTAL STATE
                    UNIVERSITY</span>
                <br>Guihulngan Campus
            </p>
        </div>
        <div style="width: 27%; text-align: right; float: left;">
            <p style="font-size: 8pt;">SN: {{$Student_Number}}</p>
        </div>
    </div>
    {{-- end header --}}
    <div style="text-align: center;">
        <span style="font-family: serif; font-size: 11pt; text-decoration: underline;">STUDENT'S PERMANENT RECORD
            CARD</span>
    </div>
    <div>
        <span style="font-size: 8pt;">Name <u>{{$Student_Name}}</u></span>
    </div>
    <br>
    <div class="clearfix">
        @foreach ($uniqueData as $uniquedata)
            <div class="table-container" style="margin-bottom: 4rem">
                <table width="100%">
                    <tr>
                        <th colspan="4"><spann style="text-decoration: underline;">
                            @foreach ($SemesterData as $semesterdata)
                                @if ($uniquedata['sem']==$semesterdata->id)
                                    {{$semesterdata->description}}
                                @endif
                            @endforeach
                            SY {{$uniquedata['sy']}} Course: {{$Course}}</spann></th>
                    </tr>
                    <tr>
                        <th>SUBJECTS</th>
                        <td width="20px"><span class="vertical-text" style="position: fixed;margin-left:15px;margin-top:30px;text-align: left;font-size: 7pt;">Grade</span></td>
                        <td width="20px" height="50px"><span class="vertical-text" style="position: fixed;margin-left:15px;margin-top:30px;text-align: left;font-size: 7pt;">Re-exam</span></td>
                        <td width="20px"><span class="vertical-text" style="position: fixed;margin-left:15px;margin-top:30px;text-align: left;font-size: 7pt;">Units</span></td>
                    </tr>
                    <?php
                        $total_units=0;
                        $total_gpa=0;
                        $count_subject=0;
                    ?>
                    @foreach ($ClassStudentData2 as $classStudentdata2)
                        @if ($classStudentdata2->getMyClass->school_year==$uniquedata['sy']&&$classStudentdata2->getMyClass->semester_id==$uniquedata['sem'])
                            <tr>
                                <td height="17px" style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><span style="font-size: 7.7pt;">{{$classStudentdata2->getMyClass->getSubject->subject}} {{$classStudentdata2->getMyClass->section}} - {{$classStudentdata2->getMyClass->getSubject->description}}</span></td>
                                <td style="text-align: center;"><span style="font-size: 8pt;text-align: center;">













                                    <?php
                                    foreach($ClassStudentData as $Data){
                                        if ($Data->my_class_id==$classStudentdata2->getMyClass->id) {
                                            
                                                $semesteralGrade=0;
                                            
                                            // Start Mid Term Computation 
                                            
                                                $totalGrade=0;
                                                $not_coplied_midterm=0;
                                                $count_midterm_activity=0;
                                                $count_midterm_missed=0;
                                                foreach ($ActivityCategoryData as $data){
                                                    if ($data->my_class_id==$classStudentdata2->getMyClass->id) {
                                                        $totalActivity=0;
                                                        $totalMaximum=0;
                                                        foreach ($MidTermActivityData as $data2){
                                                            if ($data->id==$data2->activity_category_id){
                                                                foreach($StudentMidTermActivityRecordData as $data3){
                                                                    if($data2->id==$data3->mid_term_activity_id && $Data->student_id == $data3->student_id){
                                                                        $totalActivity+=$data3->score;
                                                                        if ($data2->maximum_score!=1) {
                                                                            $count_midterm_activity++;
                                                                        }
                                                                        if($data3->score==""){
                                                                            if($data2->maximum_score==1){
                                                                                //
                                                                            } else {
                                                                            $not_coplied_midterm=1;
                                                                            $count_midterm_missed++;
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                $totalMaximum+=$data2->maximum_score;
                                                            }
                                                        }
                                                            if($totalMaximum==0){
                                                                $totalMaximum=1;
                                                            }
                                                            $totalGrade+=((($totalActivity/$totalMaximum)*$data->multiply)+$data->addition)*($data->percentage/100);
                
                                                        $count2=0;
                                                        foreach ($MidTermActivityData as $data2){
                                                            if ($data->id==$data2->activity_category_id){
                                                                $count2++;
                                                            }
                                                        }
                                                        if($count2==0){
                                                        }
                                                    }
                                                }
                                                $semesteralGrade+=$totalGrade;
                                            
                                            // End Mid Term Computation 
            
                                            // Start Final Term Computation 
                                            
                                                $totalGrade=0;
                                                $not_coplied_finalterm=0;
                                                $count_finalterm_activity=0;
                                                $count_finalterm_missed=0;
                                                foreach ($FinalActivityCategoryData as $data){

                                                    if ($data->my_class_id==$classStudentdata2->getMyClass->id) {
                                                        $totalActivity=0;
                                                        $totalMaximum=0;
                                                        foreach ($FinalTermActivityData as $data2){
                                                            if ($data->id==$data2->activity_category_id){
                                                                foreach($StudentFinalTermActivityRecordData as $data3){
                                                                    if($data2->id==$data3->final_activity_id && $Data->student_id == $data3->student_id){
                                                                        $totalActivity+=$data3->score;
                                                                        if ($data2->maximum_score!=1) {
                                                                            $count_finalterm_activity++;
                                                                        }
                                                                        if($data3->score==""){
                                                                            if($data2->maximum_score==1){
                                                                                //
                                                                            } else {
                                                                            $not_coplied_finalterm=1;
                                                                            $count_finalterm_missed++;
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                                $totalMaximum+=$data2->maximum_score;
                                                            }
                                                        }
                                                            if($totalMaximum==0){
                                                                $totalMaximum=1;
                                                            }
                                                            $totalGrade+=((($totalActivity/$totalMaximum)*$data->multiply)+$data->addition)*($data->percentage/100);
                                                        
                
                                                        $count2=0;
                                                        foreach ($FinalTermActivityData as $data2){
                                                            if ($data->id==$data2->activity_category_id){
                                                                $count2++;
                                                            }
                                                        }
                                                        if($count2==0){
                                                        }
                                                    }
                                                }
                                                $semesteralGrade+=$totalGrade;
                                            
                                            // End Final Term Computation 
                                            
                                                $SumGrade=$semesteralGrade/2;
                                                $gradeConversion = [
                                                    95 => 1.00, 94 => 1.10, 93 => 1.20, 92 => 1.30, 91 => 1.40, 90 => 1.50,
                                                    89 => 1.60, 88 => 1.70, 87 => 1.80, 86 => 1.90, 85 => 2.00, 84 => 2.10,
                                                    83 => 2.20, 82 => 2.30, 81 => 2.40, 80 => 2.50, 79 => 2.60, 78 => 2.70,
                                                    77 => 2.80, 76 => 2.90, 75 => 3.00
                                                ];

                                                if ($SumGrade >= 95) {
                                                    $gradeEquivalent = 1.00;
                                                } elseif ($SumGrade < 75) {
                                                    $gradeEquivalent = 5.00;
                                                } else {
                                                    $lowerBound = floor($SumGrade);
                                                    $upperBound = ceil($SumGrade);
                                                    if ($SumGrade - $lowerBound < 0.5) {
                                                        $gradeEquivalent = $gradeConversion[$lowerBound];
                                                    } else {
                                                        $gradeEquivalent = $gradeConversion[$upperBound];
                                                    }
                                                }
                                                echo $gradeEquivalent;
                                                $total_gpa+=$gradeEquivalent;
                                                $count_subject++;
                                            }
                                            }
                                        ?>










                                </span></td>
                                <td><span style="font-size: 8pt;"> </span></td>
                                <td style="text-align: center;"><span style="font-size: 8pt;text-align: center;">{{$classStudentdata2->getMyClass->getSubject->unit}}<?php $total_units+=$classStudentdata2->getMyClass->getSubject->unit ?></span></td>
                            </tr>
                        @endif
                    @endforeach
                    
                    <tr>
                        <td height="17px" colspan="3" style="text-align: right;"><span style="font-size: 8pt;text-align: right;">Total Units</span></td>
                        <td style="text-align: center;"><span style="font-size: 8pt;text-align: center;">{{$total_units}}</span></td>
                    </tr>
                    
                    <tr>
                        <td height="17px" style="text-align: center;"><span style="font-size: 8pt;text-align: center;">GPA: {{$total_gpa/$count_subject}}</span></td>
                        <td style="text-align: center;"></td>
                        <td style="text-align: center;"></td>
                        <td style="text-align: center;"></td>
                    </tr>
                    
                    @for ($start=0;$start<=10-$count_subject;$start++)
                        <tr>
                            <td height="17px" style="text-align: center;"><span style="color: white">hide</span></td>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;"></td>
                        </tr>
                    @endfor
                </table>
            </div>
        @endforeach
    </div>
    <div style="position: fixed;margin-top:50px" class="clearfix">
        <i style="font-size: 7pt;margin-left:20px">This is to certify that this is a true record of {{$Student_Name}} who had been enrolled in 	this Educational Institution in the semester as indicated above.</i>
        <span style="font-size: 7pt;">Posted By:___________________________________________________________</span>
        <span style="font-size: 7pt;">Approved By:_________________________________________________________</span>
        <span style="font-size: 7pt;">Verified By:___________________________________________________________</span>
        <span style="font-size: 7pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            University Registrar
        </span>
    </div>
</body>

</html>

<div>
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10pt;
        }
        table, th, td {
            border: 1.5px solid black;
            border-collapse: collapse;
        }
        @page { 
            margin-top: 0.25in;
            margin-left: 0.25in;
            margin-right: 0.25in;
            margin-bottom: 0.25in;
            size: 8.5in 13in;
        }
    
    </style>
    
    
    <div>
        <div style="text-align: center;">
            <img src="image/header_logo.png" style="width:8in;">
        </div>
        <br>
        <div style="text-align: center;">
            <strong><u><span>COLLEGE OF INDUSTRIAL TECHNOLOGY</span></u></strong>
        </div>
        <div style="text-align: center;margin-top:0.05in">
            <strong><span>GRADE SHEET</span></strong>
        </div>
        <div style="text-align: center;">
            <table style="width: 8in">
                    <tr>
                        <th rowspan="2" style="text-align: center;">No.</th>
                        <th rowspan="2" style="text-align: center">NAMES OF STUDENTS</th>
                        <th style="text-align: center;">MIDTERM</th>
                        <th style="text-align: center;">FINAL</th>
                        <th colspan="2" style="text-align: center;">SEMESTRAL GRADE</th>
                        <th rowspan="2" style="text-align: center">REMARKS</th>
                    </tr>
                    <tr>
                        

                        <th style="text-align: center;">GRADE</th>
                        <th style="text-align: center;">GRADE</th>
                        <th style="text-align: center;">Grade</th>
                        <th style="text-align: center">Equiv</th>
                    </tr>
                    @foreach($ClassStudentData as $index => $Data)
                        <tr>
                            <td> {{$index+1}} </td>
                            <td> {{$Data->getStudent->name}} </td>
                                <?php
                                    $semesteralGrade=0;
                                ?>
                                {{-- Start Mid Term Computation --}}
                                <?php
                                    $totalGrade=0;
                                    $not_coplied_midterm=0;
                                    $count_midterm_activity=0;
                                    $count_midterm_missed=0;
                                    foreach ($ActivityCategoryData as $data){
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
                                            //echo "<th></th>";
                                        }
                                    }
                                    echo "<td style='text-align: center'>".number_format($totalGrade, 2, '.', '')."</td>";
                                    $semesteralGrade+=$totalGrade;
                                ?>
                                {{-- End Mid Term Computation --}}

                                {{-- Start Final Term Computation --}}
                                <?php
                                    $totalGrade=0;
                                    $not_coplied_finalterm=0;
                                    $count_finalterm_activity=0;
                                    $count_finalterm_missed=0;
                                    foreach ($FinalActivityCategoryData as $data){
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
                                            //echo "<th></th>";
                                        }
                                    }
                                    echo "<td style='text-align: center'>".number_format($totalGrade, 2, '.', '')."</td>";
                                    $semesteralGrade+=$totalGrade;
                                ?>
                                {{-- End Final Term Computation --}}
                                <?php
                                    $SumGrade=$semesteralGrade/2;
                                    echo "<td style='text-align: center;background-color:#c6efcd;color:#026105'>".number_format($SumGrade, 2, '.', '')."</td>";
                                ?>
                                <td></td>
                                    @if ($SumGrade>=75)
                                        <th style="color:green;text-align: center">Passed</th>
                                    @else
                                        @if ($not_coplied_midterm==1 || $not_coplied_finalterm==1)
                                            @if ($count_midterm_activity==$count_midterm_missed && $count_finalterm_activity==$count_finalterm_missed)
                                                <th style="color:red;text-align: center">Failed</th>
                                            @else 
                                                <th style="color:red;text-align: center">INC</th>
                                            @endif
                                        @else 
                                            <th style="color:red;text-align: center">Failed</th>
                                        @endif
                                    @endif

                        </tr>
                    @endforeach
                    <tr>
                        <td style="background-color:#bfbfbf;border: 2.5px solid black;color:#bfbfbf;" colspan="7">none</td>
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="12" style="vertical-align:top;height:180px;">
                            <div style="vertical-align:top;height:180px;text-align: center;">
                                <div style="font-size: 9pt;text-align: center;">{{$SemesterDescription}} of School Year {{$school_year}}</d>
                                <div style="font-size: 9pt;text-align: left;padding-top:5px">Instructor: <span style="font-weight: 200;">{{$InstructorName}}</span></div>
                                <div style="font-size: 9pt;text-align: left;padding-top:5px">Units: <span style="font-weight: 200;">{{$Units}}</span> Day: <span style="font-weight: 200;">{{$schedule}}</span> Time: <span style="font-weight: 200;">{{$time}}</span></div>
                                <div style="font-size: 9pt;text-align: left;padding-top:5px">Subject: <span style="font-weight: 200;">{{$Subject_Code}} - {{$section}}</span></div>
                                <div style="font-size: 9pt;text-align: left;padding-top:5px">Descriptive Title: <span style="font-weight: 200;">{{$Subject_Description}}</span></div>
                                <div style="font-size: 9pt;text-align: center;padding-top:20px"><span style="font-weight: 200;">
                                    {{-- DR. MICHAEL P. BALDADO --}}
                                </span></div>
                                <div style="font-size: 9pt;text-align: center;padding-top:5px">Dean of the College</div>
                                <div style="font-size: 9pt;text-align: left;padding-top:5px">Received by:</div>
                                <div style="font-size: 9pt;text-align: center;padding-top:5px"><span style="font-weight: 200;">ENGR. PETMAR M. SAING, MSIT-CS</span></div>
                                <div style="font-size: 9pt;text-align: center;padding-top:5px">Campus Registrar</div>
                                <div style="font-size: 9pt;text-align: left;margin-top:5px">Date Received:________________________________________</div>
                            </div>
                        </td>
                        <th style="text-align: center;color:#03ae55">Grade</th>
                        <th style="text-align: center;color:#03ae55">Equiv</th>
                        <th style="text-align: center;color:#03ae55">Grade</th>
                        <th style="text-align: center;color:#03ae55">Equiv</th>
                    </tr>
                    <tr>
                        <td style="text-align: center;color:#0071c0">1.00</td>
                        <td style="text-align: center;color:#0071c0">95 <i>above</i></td>
                        <td style="text-align: center;color:#0071c0">2.10</td>
                        <td style="text-align: center;color:#0071c0">84</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;color:#0071c0">1.10</td>
                        <td style="text-align: center;color:#0071c0">94</td>
                        <td style="text-align: center;color:#0071c0">2.20</td>
                        <td style="text-align: center;color:#0071c0">83</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;color:#0071c0">1.20</td>
                        <td style="text-align: center;color:#0071c0">93</td>
                        <td style="text-align: center;color:#0071c0">2.30</td>
                        <td style="text-align: center;color:#0071c0">82</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;color:#0071c0">1.30</td>
                        <td style="text-align: center;color:#0071c0">92</td>
                        <td style="text-align: center;color:#0071c0">2.40</td>
                        <td style="text-align: center;color:#0071c0">81</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;color:#0071c0">1.40</td>
                        <td style="text-align: center;color:#0071c0">91</td>
                        <td style="text-align: center;color:#0071c0">2.50</td>
                        <td style="text-align: center;color:#0071c0">80</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;color:#0071c0">1.50</td>
                        <td style="text-align: center;color:#0071c0">90</td>
                        <td style="text-align: center;color:#0071c0">2.60</td>
                        <td style="text-align: center;color:#0071c0">79</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;color:#0071c0">1.60</td>
                        <td style="text-align: center;color:#0071c0">89</td>
                        <td style="text-align: center;color:#0071c0">2.70</td>
                        <td style="text-align: center;color:#0071c0">78</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;color:#0071c0">1.70</td>
                        <td style="text-align: center;color:#0071c0">88</td>
                        <td style="text-align: center;color:#0071c0">2.80</td>
                        <td style="text-align: center;color:#0071c0">77</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;color:#0071c0">1.80</td>
                        <td style="text-align: center;color:#0071c0">87</td>
                        <td style="text-align: center;color:#0071c0">2.90</td>
                        <td style="text-align: center;color:#0071c0">76</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;color:#0071c0">1.90</td>
                        <td style="text-align: center;color:#0071c0">86</td>
                        <td style="text-align: center;color:#0071c0">3.00</td>
                        <td style="text-align: center;color:#0071c0">75</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;color:#0071c0">2.00</td>
                        <td style="text-align: center;color:#0071c0">85</td>
                        <td style="text-align: center;color:#0071c0">5.00 </td>
                        <td style="text-align: center;color:#0071c0"><i>below</i> 75</td>
                    </tr>
                    
            </table>
        </div>
    </div>


</div>
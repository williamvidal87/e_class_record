<div>
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
            <strong><u><span>ACADEMIC PERFORMANCE REPORT</span></u></strong>
        </div>
        <div style="text-align: left;margin-top:0.10in">
            <strong><span>Summary</span></strong>
        </div>
        <div style="text-align: center;margin-top:0.05in">
            <table style="width: 8in">
                <tr>
                    <th style="text-align: left;">Metric</th>
                    <th style="text-align: left;">Value</th>
                </tr>
                <tr>
                    <td style="text-align: left;">Total Number of Subjects</td>
                    <td style="text-align: left;">{{count($TotalNumberOfSubject)}}</td>
                </tr>
                <tr>
                    <td style="text-align: left;">Total Number of Students</td>
                    <td style="text-align: left;">{{count($TotalNumberOfStudent)}}</td>
                </tr>

            </table>
        </div>

        <div style="text-align: left;margin-top:0.05in">
            <strong><span>Detailed Report</span></strong>
        </div>
        <div style="text-align: center;margin-top:0.5in">
            <table style="width: 8in">
                <tr>
                    <th style="text-align: left;">Subject Name</th>
                    <th style="text-align: left;">Total Students</th>
                    <th style="text-align: left;">Students Passed</th>
                    <th style="text-align: left;">Percentage Passed</th>
                    <th style="text-align: left;">Students Failed</th>
                    <th style="text-align: left;">Percentage Failed</th>
                </tr>
                @foreach ($SubjectNameData as $SubjectNamedata)
                <tr>
                    <td style="text-align: left;">{{$SubjectNamedata->subject}}</td>
                    <td style="text-align: left;">
                        <?php
                                    $count_total_student_each_subject=0;
                                        foreach ($ClassStudentData as $ClassStudentdata) {
                                            if ($ClassStudentdata->getMyClass->subject_id==$SubjectNamedata->id) {
                                                $count_total_student_each_subject++;
                                            }
                                        }
                                    echo $count_total_student_each_subject;
                                ?>

                    </td>

                        <?php
                            $count_total_student_passed=0;
                            $count_total_student_failed=0;
                                foreach ($ClassStudentData as $ClassStudentdata) {
                                    if ($ClassStudentdata->getMyClass->subject_id==$SubjectNamedata->id) {
                                        



                                        $semesteralGrade=0;
                                        $totalGrade=0;
                                        $not_coplied_midterm=0;
                                        $count_midterm_activity=0;
                                        $count_midterm_missed=0;
                                        foreach ($ActivityCategoryData as $data){
                                            if ($data->my_class_id==$data->my_class_id) {
                                                $totalActivity=0;
                                                $totalMaximum=0;
                                                foreach ($MidTermActivityData as $data2){
                                                    if ($data->id==$data2->activity_category_id){
                                                        foreach($StudentMidTermActivityRecordData as $data3){
                                                            if($data2->id==$data3->mid_term_activity_id && $ClassStudentdata->student_id == $data3->student_id){
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
                                        }
                                    
                                        $semesteralGrade+=$totalGrade;
                                        $totalGrade=0;
                                        $not_coplied_finalterm=0;
                                        $count_finalterm_activity=0;
                                        $count_finalterm_missed=0;
                                        foreach ($FinalActivityCategoryData as $data){
                                            
                                            if ($data->my_class_id==$data->my_class_id) {
                                                $totalActivity=0;
                                                $totalMaximum=0;
                                                foreach ($FinalTermActivityData as $data2){
                                                    if ($data->id==$data2->activity_category_id){
                                                        foreach($StudentFinalTermActivityRecordData as $data3){
                                                            if($data2->id==$data3->final_activity_id && $ClassStudentdata->student_id == $data3->student_id){
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
                                        }
                                    
                                        $semesteralGrade+=$totalGrade;
                                        $SumGrade=$semesteralGrade/2;
                                        
                                        if ($SumGrade>=75){
                                            echo "Passed";
                                            $count_total_student_passed++;
                                        }else {
                                            if ($not_coplied_midterm==1 || $not_coplied_finalterm==1){
                                                if ($count_midterm_activity==$count_midterm_missed && $count_finalterm_activity==$count_finalterm_missed){
                                                    // echo "Failed";
                                                    $count_total_student_failed++;
                                                }else { 
                                                    // echo "INC";
                                                }
                                            }else {
                                                // echo "Failed";
                                                    $count_total_student_failed++;
                                            }
                                        }




                                    }
                                }
                        ?>

                    <td style="text-align: left;">
                        <?php echo $count_total_student_passed ?>
                    </td>
                    <td style="text-align: left;">
                        <?php 
                            if ($count_total_student_each_subject!=0&&$count_total_student_passed!=0) {
                                echo number_format(($count_total_student_passed/$count_total_student_each_subject)*100, 2, '.', ',').'%'; 
                            }
                        ?>
                    </td>
                    <td style="text-align: left;">
                        <?php echo $count_total_student_failed ?>
                    </td>
                    <td style="text-align: left;">
                        <?php 
                            if ($count_total_student_each_subject!=0&&$count_total_student_failed!=0) {
                                echo number_format(($count_total_student_failed/$count_total_student_each_subject)*100, 2, '.', ',').'%'; 
                            }
                        ?>
                    </td>
                </tr>
                @endforeach

            </table>
        </div>

    </div>


</div>
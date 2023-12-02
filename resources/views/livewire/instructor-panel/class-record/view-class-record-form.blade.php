<div>
    <div class="modal-content border-secondary">
        <div class="modal-header border-bottom-secondary">
            <h4 class="modal-title" id="myModalLabel15"> {{ $this->SubjectTitle }} </h4>
            <button wire:click="CloseViewClassRecordForm" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Mid Term</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Final Term</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="false">Sem Grade</a>
                </li>
            </ul>

            <div class="tab-content px-1 pt-1">
                <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                    
                    <div class="table-responsive">
                        <table style="font-size: 8pt" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2"></th>
                                    @foreach ($ActivityCategoryData as $data)
                                        <th style="text-align: center" colspan="<?php
                                        $count=0;
                                        foreach ($MidTermActivityData as $data2){
                                            if ($data->id==$data2->activity_category_id){
                                                $count++;
                                            }
                                        }
                                        if($count==0){
                                            echo 1;
                                        } else {
                                            echo $count;
                                        }
                                        ?>"> {{$data->activity_category}} </th>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th colspan="2"></th>
                                    @foreach ($ActivityCategoryData as $data)
                                        @foreach ($MidTermActivityData as $data2)
                                            @if ($data->id==$data2->activity_category_id)
                                                <th> {{$data2->activity_name}} </th>
                                            @endif
                                        @endforeach
                                        <?php
                                            $count2=0;
                                            foreach ($MidTermActivityData as $data2){
                                                if ($data->id==$data2->activity_category_id){
                                                    $count2++;
                                                }
                                            }
                                            if($count2==0){
                                                echo "<th></th>";
                                            } 
                                        ?>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align: right;color:red">Date:</th>
                                    @foreach ($ActivityCategoryData as $data)
                                        @foreach ($MidTermActivityData as $data2)
                                            @if ($data->id==$data2->activity_category_id)
                                                <th> 
                                                    @if ($data2->date)
                                                        {{ date('d/m/Y',strtotime($data2->date))}} 
                                                    @endif
                                                </th>
                                            @endif
                                        @endforeach
                                        <?php
                                            $count2=0;
                                            foreach ($MidTermActivityData as $data2){
                                                if ($data->id==$data2->activity_category_id){
                                                    $count2++;
                                                }
                                            }
                                            if($count2==0){
                                                echo "<th></th>";
                                            } 
                                        ?>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align: right;color:red">Maximum Score:</th>
                                    @foreach ($ActivityCategoryData as $data)
                                        @foreach ($MidTermActivityData as $data2)
                                            @if ($data->id==$data2->activity_category_id)
                                                <th style="color:green"> {{$data2->maximum_score}} </th>
                                            @endif
                                        @endforeach
                                        <?php
                                            $count2=0;
                                            foreach ($MidTermActivityData as $data2){
                                                if ($data->id==$data2->activity_category_id){
                                                    $count2++;
                                                }
                                            }
                                            if($count2==0){
                                                echo "<th></th>";
                                            } 
                                        ?>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Student No</th>
                                    <th>Student Name</th>
                                    @foreach ($ActivityCategoryData as $data)
                                        @foreach ($MidTermActivityData as $data2)
                                            @if ($data->id==$data2->activity_category_id)
                                                <th></th>
                                            @endif
                                        @endforeach
                                        <?php
                                            $count2=0;
                                            foreach ($MidTermActivityData as $data2){
                                                if ($data->id==$data2->activity_category_id){
                                                    $count2++;
                                                }
                                            }
                                            if($count2==0){
                                                echo "<th></th>";
                                            } 
                                        ?>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ClassStudentData as $Data)
                                    <tr>
                                        <td> {{$Data->getStudent->id_number}} </td>
                                        <td> {{$Data->getStudent->name}} </td>

                                            <?php
                                                foreach ($ActivityCategoryData as $data){
                                                    foreach ($MidTermActivityData as $data2){
                                                        if ($data->id==$data2->activity_category_id){
                                                            echo "<td>"; 
                                                            foreach($StudentMidTermActivityRecordData as $data3){
                                                                if($data2->id==$data3->mid_term_activity_id && $Data->student_id == $data3->student_id){
                                                                    echo $data3->score;
                                                                }
                                                            }
                                                            echo "</td>";
                                                        }
                                                    }

                                                    $count2=0;
                                                    foreach ($MidTermActivityData as $data2){
                                                        if ($data->id==$data2->activity_category_id){
                                                            $count2++;
                                                        }
                                                    }
                                                    if($count2==0){
                                                        echo "<th></th>";
                                                    }
                                                }
                                            ?>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                    
                    <div class="table-responsive">
                        <table style="font-size: 8pt" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2"></th>
                                    @foreach ($FinalActivityCategoryData as $data)
                                        <th style="text-align: center" colspan="<?php
                                        $count=0;
                                        foreach ($FinalTermActivityData as $data2){
                                            if ($data->id==$data2->activity_category_id){
                                                $count++;
                                            }
                                        }
                                        if($count==0){
                                            echo 1;
                                        } else {
                                            echo $count;
                                        }
                                        ?>"> {{$data->activity_category}} </th>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th colspan="2"></th>
                                    @foreach ($FinalActivityCategoryData as $data)
                                        @foreach ($FinalTermActivityData as $data2)
                                            @if ($data->id==$data2->activity_category_id)
                                                <th> {{$data2->activity_name}} </th>
                                            @endif
                                        @endforeach
                                        <?php
                                            $count2=0;
                                            foreach ($FinalTermActivityData as $data2){
                                                if ($data->id==$data2->activity_category_id){
                                                    $count2++;
                                                }
                                            }
                                            if($count2==0){
                                                echo "<th></th>";
                                            } 
                                        ?>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align: right;color:red">Date:</th>
                                    @foreach ($FinalActivityCategoryData as $data)
                                        @foreach ($FinalTermActivityData as $data2)
                                            @if ($data->id==$data2->activity_category_id)
                                                <th> 
                                                    @if ($data2->date)
                                                        {{ date('d/m/Y',strtotime($data2->date))}} 
                                                    @endif
                                                </th>
                                            @endif
                                        @endforeach
                                        <?php
                                            $count2=0;
                                            foreach ($FinalTermActivityData as $data2){
                                                if ($data->id==$data2->activity_category_id){
                                                    $count2++;
                                                }
                                            }
                                            if($count2==0){
                                                echo "<th></th>";
                                            } 
                                        ?>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align: right;color:red">Maximum Score:</th>
                                    @foreach ($FinalActivityCategoryData as $data)
                                        @foreach ($FinalTermActivityData as $data2)
                                            @if ($data->id==$data2->activity_category_id)
                                                <th style="color:green"> {{$data2->maximum_score}} </th>
                                            @endif
                                        @endforeach
                                        <?php
                                            $count2=0;
                                            foreach ($FinalTermActivityData as $data2){
                                                if ($data->id==$data2->activity_category_id){
                                                    $count2++;
                                                }
                                            }
                                            if($count2==0){
                                                echo "<th></th>";
                                            } 
                                        ?>
                                    @endforeach
                                </tr>
                                <tr>
                                    <th>Student No</th>
                                    <th>Student Name</th>
                                    @foreach ($FinalActivityCategoryData as $data)
                                        @foreach ($FinalTermActivityData as $data2)
                                            @if ($data->id==$data2->activity_category_id)
                                                <th></th>
                                            @endif
                                        @endforeach
                                        <?php
                                            $count2=0;
                                            foreach ($FinalTermActivityData as $data2){
                                                if ($data->id==$data2->activity_category_id){
                                                    $count2++;
                                                }
                                            }
                                            if($count2==0){
                                                echo "<th></th>";
                                            } 
                                        ?>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ClassStudentData as $Data)
                                    <tr>
                                        <td> {{$Data->getStudent->id_number}} </td>
                                        <td> {{$Data->getStudent->name}} </td>

                                            <?php
                                                foreach ($FinalActivityCategoryData as $data){
                                                    foreach ($FinalTermActivityData as $data2){
                                                        if ($data->id==$data2->activity_category_id){
                                                            echo "<td>"; 
                                                            foreach($StudentFinalTermActivityRecordData as $data3){
                                                                if($data2->id==$data3->final_activity_id && $Data->student_id == $data3->student_id){
                                                                    echo $data3->score;
                                                                }
                                                            }
                                                            echo "</td>";
                                                        }
                                                    }
                                                        $count2=0;
                                                        foreach ($FinalTermActivityData as $data2){
                                                            if ($data->id==$data2->activity_category_id){
                                                                $count2++;
                                                            }
                                                        }
                                                        if($count2==0){
                                                            echo "<th></th>";
                                                        }
                                                }
                                            ?>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="tab-pane" id="tab3" aria-labelledby="base-tab3">
                    
                    <div class="table-responsive">
                        <table style="font-size: 8pt" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th colspan="2"></th>
                                    <th>Mid Term</th>
                                    <th>Final Term</th>
                                    <th>Semesteral Grade</th>
                                    <th>Remark</th>
                                </tr>
                                <tr>
                                    <th colspan="2" style="text-align: right;color:red">Maximum Grade:</th>
                                    <th style="color:green">100</th>
                                    <th style="color:green">100</th>
                                    <th style="color:green">100</th>
                                    <th style="color:green">Passed</th>
                                </tr>
                                <tr>
                                    <th>Student No</th>
                                    <th>Student Name</th>
                                    <th> </th>
                                    <th> </th>
                                    <th> </th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ClassStudentData as $Data)
                                    <tr>
                                        <td> {{$Data->getStudent->id_number}} </td>
                                        <td> {{$Data->getStudent->name}} </td>
                                            <?php
                                                $semesteralGrade=0;
                                            ?>
                                            {{-- Start Mid Term Computation --}}
                                            <?php
                                                $totalGrade=0;
                                                foreach ($ActivityCategoryData as $data){
                                                    $totalActivity=0;
                                                    $totalMaximum=0;
                                                    foreach ($MidTermActivityData as $data2){
                                                        if ($data->id==$data2->activity_category_id){
                                                            foreach($StudentMidTermActivityRecordData as $data3){
                                                                if($data2->id==$data3->mid_term_activity_id && $Data->student_id == $data3->student_id){
                                                                    $totalActivity+=$data3->score;
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
                                                        {{-- echo "<th></th>"; --}}
                                                    }
                                                }
                                                echo "<td>".$totalGrade."</td>";
                                                $semesteralGrade+=$totalGrade;
                                            ?>
                                            {{-- End Mid Term Computation --}}

                                            {{-- Start Final Term Computation --}}
                                            <?php
                                                $totalGrade=0;
                                                foreach ($FinalActivityCategoryData as $data){
                                                    $totalActivity=0;
                                                    $totalMaximum=0;
                                                    foreach ($FinalTermActivityData as $data2){
                                                        if ($data->id==$data2->activity_category_id){
                                                            foreach($StudentFinalTermActivityRecordData as $data3){
                                                                if($data2->id==$data3->final_activity_id && $Data->student_id == $data3->student_id){
                                                                    $totalActivity+=$data3->score;
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
                                                        {{-- echo "<th></th>"; --}}
                                                    }
                                                }
                                                echo "<td>".$totalGrade."</td>";
                                                $semesteralGrade+=$totalGrade;
                                            ?>
                                            {{-- End Final Term Computation --}}
                                            <?php
                                                $SumGrade=$semesteralGrade/2;
                                                echo "<th>".$SumGrade."</th>";
                                            ?>
                                            @if ($SumGrade>=75)
                                                <th style="color:green">Passed</th>
                                            @else
                                                <th style="color:red">Failed</th>
                                            @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
        <div class="modal-footer justify-content-between">
            <button wire:click="CloseViewClassRecordForm" type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-bg-gradient-x-orange-yellow"><i class="ft-printer"></i> Export</button>
        </div>
    </div>
</div>

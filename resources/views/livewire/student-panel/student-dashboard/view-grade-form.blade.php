<div>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel17">{{$this->ClassDescription}}</h4>
            <button wire:click="CloseViewGradesForm" type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form class="form">
                    <div class="form-body">
                        <div class="col-lg-12 col-xl-12">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                    <a wire:ignore.self class="nav-link active" id="baseIcon-tab1" data-toggle="tab" aria-controls="tabIcon1" href="#tabIcon1" aria-expanded="true">Mid Term</a>
                                    </li>
                                    <li class="nav-item">
                                    <a wire:ignore.self class="nav-link" id="baseIcon-tab2" data-toggle="tab" aria-controls="tabIcon2" href="#tabIcon2" aria-expanded="false">Final Term</a>
                                    </li>
                                    <li class="nav-item">
                                    <a wire:ignore.self class="nav-link" id="baseIcon-tab3" data-toggle="tab" aria-controls="tabIcon3" href="#tabIcon3" aria-expanded="false">Sem Grade</a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1 pt-1">
                                    <div wire:ignore.self role="tabpanel" class="tab-pane active" id="tabIcon1" aria-expanded="true" aria-labelledby="baseIcon-tab1">
                                        
                                        <div id="accordion1" class="card-accordion">
                                            <div class="card">
                                                <div class="table-responsive">
                                                    <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Category</th>
                                                                <th>Score</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $midterm_grade=0;$not_coplied_midterm=false;$count_midterm_activity=0;$count_midterm_missed=0; ?>
                                                            @foreach ($ActivityCategoryData as $activitycategoryData)
                                                                <tr>
                                                                    <td style="padding:0%">
                                                                        <a style="color:blue;text-decoration: underline;" class="btn btn-link collapsed" data-toggle="collapse" data-target="#accordion{{$activitycategoryData->id}}" aria-expanded="false" aria-controls="accordion{{$activitycategoryData->id}}" wire:click="RefreshButton">
                                                                            
                                                                        <b>{{$activitycategoryData->activity_category}}</b>
                                                                        <b>(<?php
                                                                            $count_activity = 0;
                                                                            foreach ($MidTermActivityData as $midtermactivityData){
                                                                                if ($midtermactivityData->activity_category_id==$activitycategoryData->id){
                                                                                    foreach ($StudentMidTermActivityRecordData as $studentmidtermactivityRecordData){
                                                                                        if ($studentmidtermactivityRecordData->mid_term_activity_id==$midtermactivityData->id){
                                                                                        $count_activity++;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                            echo $count_activity;
                                                                            ?>)</b>
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <b><?php
                                                                            $count_score = 0;
                                                                            foreach ($MidTermActivityData as $midtermactivityData){
                                                                                if ($midtermactivityData->activity_category_id==$activitycategoryData->id){
                                                                                    foreach ($StudentMidTermActivityRecordData as $studentmidtermactivityRecordData){
                                                                                        if ($studentmidtermactivityRecordData->mid_term_activity_id==$midtermactivityData->id){
                                                                                        $count_score+=$studentmidtermactivityRecordData->score;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                            echo $count_score;
                                                                            ?><span style="color: green">/<?php
                                                                            $count_max_score = 0;
                                                                            foreach ($MidTermActivityData as $midtermactivityData){
                                                                                if ($midtermactivityData->activity_category_id==$activitycategoryData->id){
                                                                                    foreach ($StudentMidTermActivityRecordData as $studentmidtermactivityRecordData){
                                                                                        if ($studentmidtermactivityRecordData->mid_term_activity_id==$midtermactivityData->id){
                                                                                            $count_max_score+=$midtermactivityData->maximum_score;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }

                                                                            if ($count_max_score!=0) {
                                                                            $midterm_grade+=((($count_score/$count_max_score)*$activitycategoryData->multiply)+$activitycategoryData->addition)*($activitycategoryData->percentage/100);
                                                                            } else {
                                                                                $midterm_grade+=(($count_score*$activitycategoryData->multiply)+$activitycategoryData->addition)*($activitycategoryData->percentage/100);
                                                                            }
                                                                            echo $count_max_score;
                                                                            ?><span></b>
                                                                    </td>
                                                                </tr>
                                                                @foreach ($MidTermActivityData as $midtermactivityData)
                                                                    @if ($midtermactivityData->activity_category_id==$activitycategoryData->id)
                                                                        @foreach ($StudentMidTermActivityRecordData as $studentmidtermactivityRecordData)
                                                                            @if ($studentmidtermactivityRecordData->mid_term_activity_id==$midtermactivityData->id)
                                                                                <tr style="color: <?php 
                                                                                if ($midtermactivityData->maximum_score!=1) {
                                                                                    $count_midterm_activity++;
                                                                                }
                                                                                if ($studentmidtermactivityRecordData->score=="") {
                                                                                    echo "red";
                                                                                    if ($midtermactivityData->maximum_score!=1) {
                                                                                        $not_coplied_midterm=true;
                                                                                        $count_midterm_missed++;
                                                                                    }
                                                                                } ?>" wire:ignore.self id="accordion{{$activitycategoryData->id}}" class="collapse" aria-labelledby="headingEOne" data-parent="#accordion{{$activitycategoryData->id}}">
                                                                                    <td>
                                                                                        {{ $midtermactivityData->activity_name }}
                                                                                    </td>
                                                                                    <td style="padding-left:0%">{{$studentmidtermactivityRecordData->score ?? "0"}}<span style="color: green">/{{ $midtermactivityData->maximum_score }}</span></td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div wire:ignore.self class="tab-pane" id="tabIcon2" aria-labelledby="baseIcon-tab2">
                                        
                                        <div id="accordion" class="card-accordion">
                                            <div class="card">
                                                <div class="table-responsive">
                                                    <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Category</th>
                                                                <th>Score</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $finalterm_grade=0;$not_coplied_finalterm=false;$count_finalterm_activity=0;$count_finalterm_missed=0; ?>
                                                            @foreach ($FinalActivityCategoryData as $finalactivitycategoryData)
                                                                <tr>
                                                                    <td style="padding:0%">
                                                                        <a style="color:blue;text-decoration: underline;" class="btn btn-link collapsed" data-toggle="collapse" data-target="#accordionB{{$finalactivitycategoryData->id}}" aria-expanded="false" aria-controls="accordionB{{$finalactivitycategoryData->id}}" wire:click="RefreshButton">
                                                                            
                                                                        <b>{{$finalactivitycategoryData->activity_category}}</b>
                                                                        <b>(<?php
                                                                            $count_activity = 0;
                                                                            foreach ($FinalTermActivityData as $finaltermactivityData){
                                                                                if ($finaltermactivityData->activity_category_id==$finalactivitycategoryData->id){
                                                                                    foreach ($StudentFinalTermActivityRecordData as $studentfinaltermactivityRecordData){
                                                                                        if ($studentfinaltermactivityRecordData->final_activity_id==$finaltermactivityData->id){
                                                                                        $count_activity++;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                            echo $count_activity;
                                                                            ?>)</b>
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <b><?php
                                                                            $count_score = 0;
                                                                            foreach ($FinalTermActivityData as $finaltermactivityData){
                                                                                if ($finaltermactivityData->activity_category_id==$finalactivitycategoryData->id){
                                                                                    foreach ($StudentFinalTermActivityRecordData as $studentfinaltermactivityRecordData){
                                                                                        if ($studentfinaltermactivityRecordData->final_activity_id==$finaltermactivityData->id){
                                                                                        $count_score+=$studentfinaltermactivityRecordData->score;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                            echo $count_score;
                                                                            ?><span style="color: green">/<?php
                                                                            $count_max_score = 0;
                                                                            foreach ($FinalTermActivityData as $finaltermactivityData){
                                                                                if ($finaltermactivityData->activity_category_id==$finalactivitycategoryData->id){
                                                                                    foreach ($StudentFinalTermActivityRecordData as $studentfinaltermactivityRecordData){
                                                                                        if ($studentfinaltermactivityRecordData->final_activity_id==$finaltermactivityData->id){
                                                                                            $count_max_score+=$finaltermactivityData->maximum_score;
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }

                                                                            if ($count_max_score!=0) {
                                                                            $finalterm_grade+=((($count_score/$count_max_score)*$finalactivitycategoryData->multiply)+$finalactivitycategoryData->addition)*($finalactivitycategoryData->percentage/100);
                                                                            } else {
                                                                                $finalterm_grade+=(($count_score*$finalactivitycategoryData->multiply)+$finalactivitycategoryData->addition)*($finalactivitycategoryData->percentage/100);
                                                                            }
                                                                            
                                                                            echo $count_max_score;
                                                                            ?><span></b>
                                                                    </td>
                                                                </tr>
                                                                @foreach ($FinalTermActivityData as $finaltermactivityData)
                                                                    @if ($finaltermactivityData->activity_category_id==$finalactivitycategoryData->id)
                                                                        @foreach ($StudentFinalTermActivityRecordData as $studentfinaltermactivityRecordData)
                                                                            @if ($studentfinaltermactivityRecordData->final_activity_id==$finaltermactivityData->id)
                                                                                <tr style="color: <?php 
                                                                                if ($finaltermactivityData->maximum_score!=1) {
                                                                                    $count_finalterm_activity++;
                                                                                }
                                                                                if ($studentfinaltermactivityRecordData->score=="") {
                                                                                    echo "red";
                                                                                    if ($finaltermactivityData->maximum_score!=1) {
                                                                                        $not_coplied_finalterm=true;
                                                                                        $count_finalterm_missed++;
                                                                                    }
                                                                                } ?>" wire:ignore.self id="accordionB{{$finalactivitycategoryData->id}}" class="collapse" aria-labelledby="headingEOne" data-parent="#accordionB{{$finalactivitycategoryData->id}}">
                                                                                    <td>
                                                                                        {{ $finaltermactivityData->activity_name }}
                                                                                    </td>
                                                                                    <td style="padding-left:0%">{{$studentfinaltermactivityRecordData->score ?? "0"}}<span style="color: green">/{{ $finaltermactivityData->maximum_score }}</span></td>
                                                                                </tr>
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div wire:ignore.self class="tab-pane" id="tabIcon3" aria-labelledby="baseIcon-tab3">
                                        
                                        <div id="accordion" class="card-accordion">
                                            <div class="card">
                                                <div class="table-responsive">
                                                    <table class="table mb-0">
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
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding:0%"></td>
                                                                <td>
                                                                    <span class="media-heading text-bold-700">Your Grade:</span>
                                                                </td>
                                                                <td><?php echo number_format($midterm_grade, 2, '.', ''); ?></td>
                                                                <td><?php echo number_format($finalterm_grade, 2, '.', ''); ?></td>
                                                                <th><?php echo number_format(($midterm_grade+$finalterm_grade)/2, 2, '.', ''); ?></th>
                                                                    @if ((($midterm_grade+$finalterm_grade)/2)>=75)
                                                                        <td style="color:green">Passed</td>
                                                                    @else
                                                                        @if ($not_coplied_midterm==true || $not_coplied_finalterm==true)
                                                                            @if ($count_midterm_activity==$count_midterm_missed && $count_finalterm_activity==$count_finalterm_missed)
                                                                                <td style="color:red">Failed</td>
                                                                            @else
                                                                                <td style="color:red">INC</td>
                                                                            @endif
                                                                        @else
                                                                            <td style="color:red">Failed</td>
                                                                        @endif
                                                                    @endif
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button wire:click="CloseViewGradesForm" type="button" class="btn grey btn-secondary"><i class="ft-x"></i>Close</button>
        </div>
    </div>
</div>
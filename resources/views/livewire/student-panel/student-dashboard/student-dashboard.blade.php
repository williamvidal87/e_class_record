
<div>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Home   </h3>
                </div>
            </div>
            <div class="content-body"><!-- Revenue, Hit Rate & Deals -->
                <div class="row">
                        @foreach ($MyClassData as $data)
                            <div class="col-lg-6 col-md-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card pull-up bg-gradient-directional-<?php
                                                $random_keys=array_rand($this->CardColor,2);
                                                echo $CardColor[$random_keys[0]];
                                            ?>">
                                                <div class="card-header bg-hexagons-{{$CardColor[$random_keys[0]]}}">
                                                    <h3 class="card-title white" style="font-size:14px">SY {{$data->school_year}} ({{$data->getSemester->description}})</h3>
                                                    <a class="heading-elements-toggle"><i
                                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <li>
                                                                <button wire:click="ViewGrades({{$data->id}})" type="button" class="btn btn-sm btn-white {{$CardColor[$random_keys[0]]}} box-shadow-1 round btn-min-width pull-right">View Grades<i class="ft-eye pl-1"></i></button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-content collapse show bg-hexagons-{{$CardColor[$random_keys[0]]}}">
                                                    <div class="card-body">
                                                        <div class="media d-flex">
                                                            <div class="align-self-center width-100">
                                                                <div id="Analytics-donut-chart" class="height-100 donutShadow">
                                                                    <span class="avatar avatar-online" style="width:100%">
                                                                        <img src="/storage/{{ $data->getUser->profile_photo_path ?? 'default-profile/admin-profile.png' }}" alt="Instructor">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="media-body text-center mt-1">
                                                                <h4 class="white" style="font-size:16px">{{$data->getSubject->subject}} {{$data->getSubject->description}} - {{$data->section}} ({{$data->schedule}})</h4>
                                                                <h6 class="mt-1"><span class="text-muted white">{{$data->getUser->name}}</span></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        @endforeach
                </div>
                <!--/ Revenue, Hit Rate & Deals -->
            </div>
        </div>
    </div>

    <!-- ViewGrade Modal -->
    <div class="modal fade text-left" id="ViewGradeModal" tabindex="-1" role="dialog" aria-labelledby="ViewGradeModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <livewire:student-panel.student-dashboard.view-grade-form />
        </div>
    </div>

</div>

@section('custom_script')
    @include('layouts.scripts.student-dashboard-table-scripts'); 
@endsection


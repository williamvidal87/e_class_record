<div>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Admin Dashboard </h3>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <div class="card pull-up border-top-warning border-top-3 rounded-0">
                            <div class="card-header">
                                <h4 class="card-title">Total Number of Instructors</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body p-1">
                                    <h4 class="font-large-1 text-bold-400">{{ count($InstructorData) }}<i
                                            class="ft-user-check float-right"></i>
                                    </h4>
                                </div>
                                <div class="card-footer p-1">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 col-lg-4">
                        <div class="card pull-up border-top-primary border-top-3 rounded-0">
                            <div class="card-header">
                                <h4 class="card-title">Total Number of Students</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body p-1">
                                    <h4 class="font-large-1 text-bold-400">{{ count($StudentData) }}<i
                                            class="ft-users float-right"></i>
                                    </h4>
                                </div>
                                <div class="card-footer p-1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="card pull-up border-top-success border-top-3 rounded-0">
                            <div class="card-header">
                                <h4 class="card-title">Total Number of Courses</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body p-1">
                                    <h4 class="font-large-1 text-bold-400">{{ count($CourseData) }}<i
                                            class="icon-docs float-right"></i>
                                    </h4>
                                </div>
                                <div class="card-footer p-1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                </div>
                <div class="row">
                </div>


                <div class="row">

                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Top {{$this->numElementsofFailed}} Subjects with Most Failures</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        {{-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="height-400">
                                        <canvas id="bar-chart-failed"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Top {{$this->numElementsofPassed}} Subjects with Most Passes</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        {{-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="height-400">
                                        <canvas id="bar-chart-passed"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@section('custom_script')
    @include('layouts.scripts.admin-dashboard-scripts'); 
@endsection
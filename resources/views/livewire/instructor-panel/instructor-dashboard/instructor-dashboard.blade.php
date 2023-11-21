<div>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Instructor Dashboard   </h3>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card pull-up border-top-warning border-top-3 rounded-0">
                            <div class="card-header">
                                <h4 class="card-title">Total Number of My Classes</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body p-1">
                                    <h4 class="font-large-1 text-bold-400">{{ count($MyClassData) }}<i class="ft-user-check float-right"></i>
                                    </h4>
                                </div>
                                <div class="card-footer p-1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card pull-up border-top-primary border-top-3 rounded-0">
                            <div class="card-header">
                                <h4 class="card-title">Total Number of Students</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body p-1">
                                    <h4 class="font-large-1 text-bold-400">{{ count($StudentData) }}<i class="ft-users float-right"></i>
                                    </h4>
                                </div>
                                <div class="card-footer p-1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="card pull-up border-top-success border-top-3 rounded-0">
                            <div class="card-header">
                                <h4 class="card-title">Total Number of Subjects</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body p-1">
                                    <h4 class="font-large-1 text-bold-400">{{ count($SubejectData) }}<i class="icon-docs float-right"></i>
                                    </h4>
                                </div>
                                <div class="card-footer p-1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="modal-content">
        <div class="modal-header bg-success white">
            <h4 class="modal-title white" id="myModalLabel11">{{ $this->SubjectTitle }}</h4>
            <button wire:click="CloseMyClassForm" type="button" class="btn close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">

                <form class="form">
                    <div class="form-body">
                        <section id="horizontal">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                    
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div wire:ignore class="card-header">
                                                    <ul class="nav nav-tabs">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="baseIcon-tab1" data-toggle="tab" aria-controls="tabIcon1" href="#tabIcon1" aria-expanded="true"><i class="ft-users"></i> Your Students</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="baseIcon-tab2" data-toggle="tab" aria-controls="tabIcon2" href="#tabIcon2" aria-expanded="false"><i class="ft-file-minus"></i> Mid Term</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="baseIcon-tab3" data-toggle="tab" aria-controls="tabIcon3" href="#tabIcon3" aria-expanded="false"><i class="ft-file-text"></i> Final Term</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-content px-1 pt-1">
                                                
                                                    <div wire:ignore.self role="tabpanel" class="tab-pane active" id="tabIcon1" aria-expanded="true" aria-labelledby="baseIcon-tab1">
                                                        <div class="card-header d-flex justify-content-between" style="padding:0.3rem">
                                                            <div  style="padding-left:15px;">
                                                            <a href="javascript:void(0)" style="text-decoration:none;display:block;" onclick="myFunction()">
                                                                <span class="badge badge-pill badge-info float-right m-0"><i class="ft-copy"></i> Copy Class Code</span>
                                                            </a>
                                                            </div>
                                                        </div>
                                                        <div class="card-header d-flex justify-content-between">
                                                            <div>
                                                                <h3 class="content-header-title">Your Students</h3>
                                                            </div>
                                                            <button wire:click="OpenAddStudentForm" type="button" class="btn btn-bg-gradient-x-orange-yellow"><i class="ft-plus-circle"></i> Add Student</button>
                                                        </div>
                                                        <div class="card-content collapse show">
                                                            <div class="card-body card-dashboard">
                                                                <div class="table-responsive">
                                                                    <table style="font-size: 8pt" id="multi-ordering2" class="table table-striped table-bordered multi-ordering2 dataTable no-footer">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>ID Number</th>
                                                                                <th>Name</th>
                                                                                <th>Action</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($ClassStudentData as $data)
                                                                            <tr>
                                                                                <td>{{ $data->getStudent->id_number }}
                                                                                </td>
                                                                                <td>{{ $data->getStudent->name }}</td>
                                                                                <td style="min-width:97px;">
                                                                                    <button wire:click="Remove({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-red-pink btn-sm"><i class="ft-user-x"></i> Remove</button>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                    
                                                    <div wire:ignore.self class="tab-pane" id="tabIcon2" aria-labelledby="baseIcon-tab2">
                                                        
                                                        <div class="card-header d-flex justify-content-between">
                                                            <div>
                                                                <h3 class="content-header-title">Mid Term</h3>
                                                            </div>
                                                            <button wire:click="OpenAddActivityCategoryForm" type="button" class="btn btn-bg-gradient-x-orange-yellow"><i class="ft-plus-circle"></i> Add Activity</button>
                                                        </div>
                                                        <div class="card-content collapse show">
                                                            <div class="card-body card-dashboard">
                                                                <div class="table-responsive">
                                                                    <table style="font-size: 8pt" id="multi-ordering3" class="table table-bordered table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Activity Name</th>
                                                                                <th>Percentage</th>
                                                                                <th>Computation</th>
                                                                                <th>Action</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($ActivityCategoryData as $data)
                                                                            <tr>
                                                                                <td>{{ $data->activity_category }}</td>
                                                                                <td>{{ $data->percentage }}%</td>
                                                                                <td>
                                                                                    @if($data->addition!=0)
                                                                                        {{ "x".$data->multiply." +".$data->addition }}
                                                                                    @else
                                                                                        {{ "Zero Based" }}
                                                                                    @endif
                                                                                </td>
                                                                                <td style="min-width:349px;">
                                                                                    <button wire:click="OpenClassWorkMidTermForm({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-blue-green btn-sm"><i class="ft-sliders"></i> Manage</button>
                                                                                    <button wire:click="EditAddActivityCategoryForm({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-purple-blue btn-sm"><i class="ft-edit"></i> Edit</button>
                                                                                    <button wire:click="RemoveActivityCategory({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-red-pink btn-sm"><i class="ft-x-square"></i> Remove</button>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th class="d-flex justify-content-end"><span>TOTAL:</span></th>
                                                                                <th colspan="3">{{ $Percentage }}%</th>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                    
                                                    <div wire:ignore.self class="tab-pane" id="tabIcon3" aria-labelledby="baseIcon-tab3">
                                                        
                                                        <div class="card-header d-flex justify-content-between">
                                                            <div>
                                                                <h3 class="content-header-title">Final Term</h3>
                                                            </div>
                                                            <button wire:click="OpenAddFinalActivityCategoryForm" type="button" class="btn btn-bg-gradient-x-orange-yellow"><i class="ft-plus-circle"></i> Add Activity</button>
                                                        </div>
                                                        <div class="card-content collapse show">
                                                            <div class="card-body card-dashboard">
                                                                <div class="table-responsive">
                                                                    <table style="font-size: 8pt" id="multi-ordering3" class="table table-bordered table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Activity Name</th>
                                                                                <th>Percentage</th>
                                                                                <th>Computation</th>
                                                                                <th>Action</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($FinalActivityCategoryData as $data)
                                                                            <tr>
                                                                                <td>{{ $data->activity_category }}</td>
                                                                                <td>{{ $data->percentage }}%</td>
                                                                                <td>x{{ $data->multiply }} + {{ $data->addition }}</td>
                                                                                <td style="min-width:349px;">
                                                                                    <button wire:click="OpenClassWorkFinalTermForm({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-blue-green btn-sm"><i class="ft-sliders"></i> Manage</button>
                                                                                    <button wire:click="EditAddFinalActivityCategoryForm({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-purple-blue btn-sm"><i class="ft-edit"></i> Edit</button>
                                                                                    <button wire:click="RemoveFinalActivityCategory({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-red-pink btn-sm"><i class="ft-x-square"></i> Remove</button>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th class="d-flex justify-content-end"><span>TOTAL:</span></th>
                                                                                <th colspan="3">{{ $FinalPercentage }}%</th>
                                                                        </tfoot>
                                                                    </table>
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
                        </section>
                    </div>
                </form>

            </div>
        </div>
        <div class="modal-footer justify-content-start">
            <button wire:click="CloseMyClassForm" type="button" class="btn grey btn-secondary"><i class="ft-x"></i>
                Close</button>
        </div>
    </div>
</div>
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
                                                <div class="card-header">
                                                    <ul class="nav nav-tabs">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="baseIcon-tab1" data-toggle="tab" aria-controls="tabIcon1" href="#tabIcon1" aria-expanded="true"><i class="ft-users"></i> Your Students</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="baseIcon-tab2" data-toggle="tab" aria-controls="tabIcon2" href="#tabIcon2" aria-expanded="false"><i class="ft-bell"></i> Tab 2</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="baseIcon-tab3" data-toggle="tab" aria-controls="tabIcon3" href="#tabIcon3" aria-expanded="false"><i class="ft-compass"></i> Tab 3</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-content px-1 pt-1">
                                                
                                                    <div role="tabpanel" class="tab-pane active" id="tabIcon1" aria-expanded="true" aria-labelledby="baseIcon-tab1">
                                                        <div class="card-header">
                                                            <button wire:click="OpenAddStudentForm" type="button"
                                                                class="btn btn-bg-gradient-x-blue-cyan"><i
                                                                    class="ft-plus-circle"></i> Add Student</button>
                                                        </div>
                                                        <div class="card-content collapse show">
                                                            <div class="card-body card-dashboard">
                                                                <div class="table-responsive">
                                                                    <table style="font-size: 8pt" id="multi-ordering2"
                                                                        class="table table-striped table-bordered multi-ordering2 dataTable no-footer">
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
                                                                                <td style="min-width:72px;">
                                                                                    <button
                                                                                        wire:click="Kick({{$data->id}})"
                                                                                        type="button"
                                                                                        class="btn btn-glow btn-bg-gradient-x-red-pink btn-sm"><i
                                                                                            class="ft-user-x"></i>
                                                                                        Kick</button>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                    
                                                    <div class="tab-pane" id="tabIcon2" aria-labelledby="baseIcon-tab2">
                                                        <p>Sugar plum tootsie roll biscuit caramels. Liquorice brownie
                                                            pastry cotton candy oat cake fruitcake jelly chupa chups.
                                                            Pudding caramels pastry powder cake soufflé wafer caramels.
                                                            Jelly-o pie cupcake.</p>
                                                    </div>
                                                    
                                                    <div class="tab-pane" id="tabIcon3" aria-labelledby="baseIcon-tab3">
                                                        <p>Biscuit ice cream halvah candy canes bear claw ice cream cake
                                                            chocolate bar donut. Toffee cotton candy liquorice. Oat cake
                                                            lemon drops gingerbread dessert caramels. Sweet dessert
                                                            jujubes powder sweet sesame snaps.</p>
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
        <div class="modal-footer justify-content-between">
            <button wire:click="CloseMyClassForm" type="button" class="btn grey btn-secondary"><i class="ft-x"></i>
                Close</button>
            <button wire:click="Store" type="button" class="btn btn-primary"><i class="la la-check-square-o"></i>
                Save</button>
        </div>
    </div>
</div>
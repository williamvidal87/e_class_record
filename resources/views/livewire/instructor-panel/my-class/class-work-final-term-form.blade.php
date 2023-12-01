<div>
    <div class="modal-content">
        <div class="modal-header bg-primary white">
            <h4 class="modal-title white" id="myModalLabel11">Final Term {{ $this->activity_category }}</h4>
            <button wire:click="CloseClassWorkFinalTermForm" type="button" class="btn close" aria-label="Close">
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
                                        <div class="card-header">
                                            <button wire:click="OpenFinaltermActivityForm" type="button" class="btn btn-bg-gradient-x-blue-cyan"><i class="ft-plus-circle"></i> Add {{$this->activity_category}} </button>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body card-dashboard">
                                                <div class="table-responsive">
                                                    <table style="font-size: 8pt" id="multi-ordering3" class="table table-striped table-bordered multi-ordering3 dataTable no-footer">
                                                        <thead>
                                                            <tr>
                                                                <th>Activity Name</th>
                                                                <th>Date</th>
                                                                <th>Maximum Score</th>
                                                                <th>Action</th>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($FinalActivityData as $data)
                                                                <tr>
                                                                    <td>{{ $data->activity_name }}</td>
                                                                    <td>{{ $data->date }}</td>
                                                                    <td>{{ $data->maximum_score }}</td>
                                                                    <td style="min-width:298px;">
                                                                        <button wire:click="OpenViewRecordFinaltermActivityRecord({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-blue-green btn-sm"><i class="ft-eye"></i> View Records</button>
                                                                        <button wire:click="EditFinaltermActivityForm({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-purple-blue btn-sm"><i class="ft-edit"></i> Edit</button>
                                                                        <button wire:click="DeleteFinaltermActivity({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-red-pink btn-sm"><i class="ft-trash-2"></i> Delete</button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
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
            <button wire:click="CloseClassWorkFinalTermForm" type="button" class="btn grey btn-secondary"><i class="ft-x"></i> Close</button>
        </div>
    </div>
</div>
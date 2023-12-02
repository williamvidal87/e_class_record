<div>
    <div class="modal-content border-pink">
        <div class="modal-header bg-warning white">
            <h4 class="modal-title white" id="myModalLabel11"> {{$this->activity_name}}</h4>
            <button wire:click="CloseViewMidtermActivityRecordForm" type="button" class="btn close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form class="form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{$this->activity_name}}</h4>
                                        <h4 class="card-title">Date : {{$this->date}}</h4>
                                        <h4 class="card-title">Maximum Score : {{$this->maximum_score}}</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        
                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Student Name</th>
                                                        <th>Scores</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($Scores as $index => $Scores)
                                                        <tr>
                                                            <td> {{$Scores['student_name']}} </td>
                                                            <td style="width:190px" >
                                                                <div class="row">
                                                                    <div class="col-sm-7">
                                                                        <input type="number" wire:model="Scores.{{$index}}.score" class="form-control input-sm" style="width:90px;" onkeypress='return event.charCode >= 46 && event.charCode <= 57'>
                                                                    </div>
                                                                    <div class="col-sm-5">
                                                                        <span style="color: green">/{{$this->maximum_score}}</span>
                                                                    </div>
                                                                </div>
                                                                    @error('Scores'.'.'.$index.'.'.'score') <span style="color: red">must be less than or equal to {{$this->maximum_score}}.</span> @enderror
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
                </form>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button wire:click="CloseViewMidtermActivityRecordForm" type="button" class="btn grey btn-secondary"><i class="ft-x"></i> Close</button>
            <button wire:click="Store" type="button" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
        </div>
    </div>
</div>
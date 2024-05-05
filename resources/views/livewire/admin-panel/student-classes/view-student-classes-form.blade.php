<div>
    <div class="modal-content">
        <div class="modal-header bg-info white">
            <h4 class="modal-title white" id="myModalLabel11">{{$this->StudentName ?? ''}}</h4>
            <button wire:click="CloseViewStudentClassesForm" type="button" class="btn close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <div class="table-responsive">
                    <table style="font-size: 8pt" id="multi-ordering" class="table table-striped table-bordered multi-ordering2 dataTable no-footer">
                        <thead>
                            <tr>
                                <th>Class No</th>
                                <th>Semester</th>
                                <th>School Year</th>
                                <th>Subject</th>
                                <th>Section</th>
                                <th>Day</th>
                                <th>Time</th>
                                <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($ClassStudentData as $data)
                                <tr>
                                    <td>CLS{{ 120231+$data->id }}</td>
                                    <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:70px;">{{ $data->getSemester->description?? '' }}</td>
                                    <td>{{ $data->school_year }}</td>
                                    <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:55px;">{{ $data->getSubject->subject?? '' }} - {{ $data->getSubject->description?? '' }}</td>
                                    <td>{{ $data->section }}</td>
                                    <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:55px;">{{ $data->schedule?? '' }}</td>
                                    <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:55px;">{{ $data->time?? '' }}</td>
                                    <td>
                                        <button wire:click="ViewClassRecord({{$data->id}})" type="button" class="btn btn-glow btn-secondary btn-sm"><i class="ft-eye"></i> View</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button wire:click="CloseViewStudentClassesForm" type="button" class="btn grey btn-secondary"><i class="ft-x"></i> Close</button>
        </div>
    </div>
</div>
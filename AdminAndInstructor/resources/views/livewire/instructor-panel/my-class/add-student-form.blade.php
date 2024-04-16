<div>
    <div class="modal-content">
        <div class="modal-header bg-warning white">
            <h4 class="modal-title white" id="myModalLabel11">Student</h4>
            <button wire:click="CloseAddStudentForm" type="button" class="btn close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form class="form">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="student_id">Student</label>
                            <div wire:ignore>
                                <select class="form-control" id="student_id" wire:model="student_id" style="width: 100%">
                                        <option value=0>Select Student</option>
                                        @foreach($StudentData as $data)
                                            <option value={{ $data->id }}>{{ $data->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="font-small-2 danger">@error('student_id') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button wire:click="CloseAddStudentForm" type="button" class="btn grey btn-secondary"><i class="ft-x"></i> Close</button>
            <button wire:click="Store" type="button" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
        </div>
    </div>
</div>
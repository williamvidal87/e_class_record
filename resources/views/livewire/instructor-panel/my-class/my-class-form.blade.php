<div>
    <div class="modal-content">
        <div class="modal-header bg-info white">
            <h4 class="modal-title white" id="myModalLabel11">Class</h4>
            <button wire:click="CloseMyClassForm" type="button" class="btn close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form class="form">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="semester_id">Semester</label>
                            <div wire:ignore>
                                <select class="form-control" id="semester_id" wire:model="semester_id" style="width: 100%">
                                        <option value=0>Select Semester</option>
                                        @foreach($SemesterData as $data)
                                            <option value={{ $data->id }}>{{ $data->description }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="font-small-2 danger">@error('semester_id') {{ $message }} @enderror</div>
                        </div>
                        <div class="form-group">
                            <label for="school_year">School Year</label>
                            <input type="text" wire:model="school_year" id="school_year" class="form-control" placeholder="2019-2020">
                            <div class=" font-small-2 danger">@error('school_year') {{ $message }} @enderror</div>
                        </div>
                        <div class="form-group">
                            <label for="subject_id">Subject</label>
                            <div wire:ignore>
                                <select class="form-control" id="subject_id" wire:model="subject_id" style="width: 100%">
                                        <option value=0>Select Subject</option>
                                        @foreach($SubjectData as $data)
                                            <option value={{ $data->id }}>{{ $data->subject }} - {{ $data->description }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="font-small-2 danger">@error('subject_id') {{ $message }} @enderror</div>
                        </div>
                        <div class="form-group">
                            <label for="section">Section</label>
                            <input type="text" wire:model="section" id="section" class="form-control" placeholder="Section">
                            <div class=" font-small-2 danger">@error('section') {{ $message }} @enderror</div>
                        </div>
                        <div class="form-group">
                            <label for="schedule">Day</label>
                            <input type="text" wire:model="schedule" id="schedule" class="form-control" placeholder="M-W-F">
                            <div class=" font-small-2 danger">@error('schedule') {{ $message }} @enderror</div>
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="text" wire:model="time" id="time" class="form-control" placeholder="1:00-2:00 PM">
                            <div class=" font-small-2 danger">@error('time') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button wire:click="CloseMyClassForm" type="button" class="btn grey btn-secondary"><i class="ft-x"></i> Close</button>
            <button wire:click="Store" type="button" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
        </div>
    </div>
</div>
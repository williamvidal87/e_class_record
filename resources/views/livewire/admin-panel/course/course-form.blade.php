<div>
    <div class="modal-content">
        <div class="modal-header bg-info white">
            <h4 class="modal-title white" id="myModalLabel11">Course</h4>
            <button wire:click="CloseCourseForm" type="button" class="btn close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form class="form">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="abbreviation">Abbreviation</label>
                            <input type="text" wire:model="abbreviation" id="abbreviation" class="form-control" placeholder="Abbreviation">
                            <div class="font-small-2 danger">@error('abbreviation') {{ $message }} @enderror</div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" wire:model="description" id="description" class="form-control" placeholder="Description">
                            <div class=" font-small-2 danger">@error('description') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button wire:click="CloseCourseForm" type="button" class="btn grey btn-secondary"><i class="ft-x"></i> Close</button>
            <button wire:click="Store" type="button" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
        </div>
    </div>
</div>
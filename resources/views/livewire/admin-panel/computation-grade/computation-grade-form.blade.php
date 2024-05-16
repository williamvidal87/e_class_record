<div>
    <div class="modal-content">
        <div class="modal-header bg-info white">
            <h4 class="modal-title white" id="myModalLabel11">Computation of Grade</h4>
            <button wire:click="CloseComputationGradeForm" type="button" class="btn close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form class="form">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="computation_name">Computation Name</label>
                            <input type="text" wire:model="computation_name" id="computation_name" class="form-control" placeholder="Computation Name">
                            <div class="font-small-2 danger">@error('computation_name') {{ $message }} @enderror</div>
                        </div>
                        <div class="form-group">
                            <label for="multiply">Multiply by:</label>
                            <input type="number" wire:model="multiply" id="multiply" class="form-control" placeholder="Multiply by">
                            <div class=" font-small-2 danger">@error('multiply') {{ $message }} @enderror</div>
                        </div>
                        <div class="form-group">
                            <label for="addition">Add:</label>
                            <input type="number" wire:model="addition" id="addition" class="form-control" placeholder="Add">
                            <div class=" font-small-2 danger">@error('addition') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button wire:click="CloseComputationGradeForm" type="button" class="btn grey btn-secondary"><i class="ft-x"></i> Close</button>
            <button wire:click="Store" type="button" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
        </div>
    </div>
</div>
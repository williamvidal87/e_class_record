<div>
    <div class="modal-content">
        <div class="modal-header bg-warning white">
            <h4 class="modal-title white" id="myModalLabel11">Activities Category</h4>
            <button wire:click="CloseAddActivityCategoryForm" type="button" class="btn close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form class="form">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="activity_category">Activity Category</label>
                            <input type="text" wire:model="activity_category" id="activity_category" class="form-control" placeholder="Activity Category">
                            <div class=" font-small-2 danger">@error('activity_category') {{ $message }} @enderror</div>
                        </div>
                        <div class="form-group">
                            <label for="percentage">Percentage</label>
                            <div class="form-row">
                                <div class="col-md-4 mb-2">
                                    <input type="number" wire:model="percentage" id="percentage" class="form-control" placeholder="Percentage" style="width: 10rem;" onkeypress='return event.charCode >= 46 && event.charCode <= 57'>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <strong>%</strong>
                                </div>
                            </div>
                            <div class=" font-small-2 danger">@error('percentage') {{ $message }} @enderror</div>
                        </div>
                        <div class="form-group">
                            <label for="multiply">Computation</label>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <input type="number" wire:model="multiply" id="multiply" class="form-control" placeholder="multiply" onkeypress='return event.charCode >= 46 && event.charCode <= 57'>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input type="number" wire:model="addition" id="addition" class="form-control" placeholder="add" onkeypress='return event.charCode >= 46 && event.charCode <= 57'>
                                </div>
                            </div>
                            <div class=" font-small-2 danger">@error('multiply') {{ $message }} @enderror</div>
                            <div class=" font-small-2 danger">@error('addition') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button wire:click="CloseAddActivityCategoryForm" type="button" class="btn grey btn-secondary"><i class="ft-x"></i> Close</button>
            <button wire:click="Store" type="button" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
        </div>
    </div>
</div>
<div>
    <div class="modal-content">
        <div class="modal-header bg-info white">
            <h4 class="modal-title white" id="myModalLabel11"> {{$this->activity_category_name}} </h4>
            <button wire:click="CloseMidtermActivityForm" type="button" class="btn close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form class="form">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="activity_name"> {{$this->activity_category_name}} Name </label>
                            <input type="text" wire:model="activity_name" id="activity_name" class="form-control" placeholder="{{$this->activity_category_name}} Name">
                            <div class=" font-small-2 danger">@error('activity_name') {{ $message }} @enderror</div>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" wire:model="date" id="date" class="form-control" placeholder="Date">
                            <div class=" font-small-2 danger">@error('date') {{ $message }} @enderror</div>
                        </div>
                        <div class="form-group">
                            <label for="maximum_score">Maximum Score</label>
                            <input type="number" wire:model="maximum_score" id="maximum_score" class="form-control" placeholder="Maximum Score" onkeypress='return event.charCode >= 46 && event.charCode <= 57'>
                            <div class=" font-small-2 danger">@error('maximum_score') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button wire:click="CloseMidtermActivityForm" type="button" class="btn grey btn-secondary"><i class="ft-x"></i> Close</button>
            <button wire:click="Store" type="button" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
        </div>
    </div>
</div>
<div>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel17">Join class</h4>
            <button wire:click="CloseJoinClassCodeForm" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form class="form">
                    <div class="form-body">
                        <div class="card-body">
                            <h4>Class code</h4>
                            <p>Ask your teacher for the class code, then enter it here.</p>
                            <fieldset class="form-group">
                                <input wire:model="ClassCode" type="text" class="form-control" placeholder="Class code">
                                @if ($this->classcodeMessage)
                                    <div class="font-small-2 danger">{{ $this->classcodeMessage }}</div>
                                @endif
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button wire:click="CloseJoinClassCodeForm" type="button" class="btn grey btn-light"><i class="ft-x"></i> Close</button>
            <button wire:click="Store" type="button" class="btn btn-info"><i class="ft-log-in"></i> Join</button>
        </div>
    </div>
</div>
<div>
    <div class="modal-content">
        <div class="modal-header bg-info white">
            <h4 class="modal-title white" id="myModalLabel11">Student</h4>
            <button wire:click="CloseStudentForm" type="button" class="btn close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form class="form">
                    <div class="form-body">
                        <div class="form-group">
                            <label for="id_number">ID Number</label>
                            <input type="text" wire:model="id_number" id="id_number" class="form-control" placeholder="ID Number">
                            <div class="font-small-2 danger">@error('id_number') {{ $message }} @enderror</div>
                        </div>
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" wire:model="name" id="name" class="form-control" placeholder="Full Name">
                            <div class=" font-small-2 danger">@error('name') {{ $message }} @enderror</div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" wire:model="email" id="email" class="form-control" placeholder="Email Address">
                            <div class="font-small-2 danger">@error('email') {{ $message }} @enderror</div>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="phone_number" wire:model="phone_number" id="phone_number" class="form-control" placeholder="Phone Number">
                            <div class="font-small-2 danger">@error('phone_number') {{ $message }} @enderror</div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" wire:model="password" id="password" class="form-control" placeholder="Password">
                            <div class="font-small-2 danger">@error('password') {{ $message }} @enderror</div>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" wire:model="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                            <div class="font-small-2 danger">@error('confirm_password') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button wire:click="CloseStudentForm" type="button" class="btn grey btn-secondary"><i class="ft-x"></i> Close</button>
            <button wire:click="Store" type="button" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
        </div>
    </div>
</div>
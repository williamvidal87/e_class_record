<div>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Manage Password</h3>
                </div>
            </div>
            <div class="content-body modal-footer justify-content-center">
                <!-- Zero configuration table -->
                    <!-- Predefined Views -->
                        <div class="card col-xl-8 col-lg-6 col-md-12">
                            <div class="card-body border-top-blue-grey border-top-lighten-5">
                                <!-- contacts view -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <input type="password" wire:model="state.current_password" id="current_password" class="form-control" placeholder="Current Password">
                                        <div class="font-small-2 danger">@error('current_password') {{ $message }} @enderror</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input type="password" wire:model="state.password" id="password" class="form-control" placeholder="New Password">
                                        <div class="font-small-2 danger">@error('password') {{ $message }} @enderror</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" wire:model="state.password_confirmation" id="confirm_password" class="form-control" placeholder="Confirm Password">
                                        <div class="font-small-2 danger">@error('confirm_password') {{ $message }} @enderror</div>
                                    </div>
                                <div class="modal-footer justify-content-between">
                                    <button wire:click="updatePassword" type="button" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    <!--/ Predefined Views -->
            </div>
        </div>
    </div>
</div>

@section('custom_script')
    @include('layouts.scripts.edit-profile-scripts'); 
@endsection

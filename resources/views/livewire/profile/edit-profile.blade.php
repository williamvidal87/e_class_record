<div>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Manage Profile</h3>
                </div>
            </div>
            <div class="content-body modal-footer justify-content-center">
                <!-- Zero configuration table -->
                    <!-- Predefined Views -->
                    
                    <div class="card col-xl-8 col-lg-6 col-md-12">
                        <div class="card-head">
                            <div class="align-self-center halfway-fab text-center p-1">
                                @if($this->photo)
                                    <span style=" width: 130px;height: 130px;" class="avatar avatar-lg avatar-online rounded-circle"><img style="min-width: 100%; height: 100%; object-fit: cover;" src="{{ $this->photo->temporaryUrl() }}" alt="{{ Auth::user()->name }}"></span>
                                @else
                                    <span style=" width: 130px;height: 130px;" class="avatar avatar-lg avatar-online rounded-circle"><img style="min-width: 100%; height: 100%; object-fit: cover;" src="/storage/{{ Auth::user()->profile_photo_path ?? 'default-profile/admin-profile.png' }}" alt="{{ Auth::user()->name }}"></span>
                                @endif
                            </div>
                            <div class="align-self-center halfway-fab p-1">
                                <div class="modal-footer justify-content-center">
                                    <fieldset class="form-group">
                                        <div class="custom-file">
                                            <input wire:model="photo" type="file" class="custom-file-input" id="inputGroupFile01" style="width: 14rem">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-top-blue-grey border-top-lighten-5">
                            <!-- contacts view -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_number">ID Number</label>
                                    <input disabled type="text" wire:model="id_number" id="id_number" class="form-control" placeholder="ID Number">
                                    <div class=" font-small-2 danger">@error('id_number') {{ $message }} @enderror</div>
                                </div>
                                @if(Auth::user()->rule_id==3)
                                    <div class="form-group">
                                        <label for="course_id">Course</label>
                                        <div wire:ignore>
                                            <select class="form-control" id="course_id" wire:model="course_id" style="width: 100%">
                                                    <option value=0>Select Course</option>
                                                    @foreach($CourseData as $data)
                                                        <option value={{ $data->id }}>{{ $data->description }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="font-small-2 danger">@error('course_id') {{ $message }} @enderror</div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" wire:model="name" id="name" class="form-control" placeholder="Full Name">
                                    <div class="font-small-2 danger">@error('name') {{ $message }} @enderror</div>
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="phone_number" wire:model="phone_number" id="phone_number" class="form-control" placeholder="Phone Number">
                                    <div class="font-small-2 danger">@error('phone_number') {{ $message }} @enderror</div>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" wire:model="email" id="email" class="form-control" placeholder="E-mail">
                                    <div class=" font-small-2 danger">@error('email') {{ $message }} @enderror</div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button wire:click="Store" type="button" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
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
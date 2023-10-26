<div>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Instructor</h3>
                </div>
            </div>
            <div class="content-body">
                <section id="horizontal">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <button wire:click="OpenInstructorForm" type="button" class="btn btn-bg-gradient-x-blue-cyan"><i class="ft-plus-circle"></i> Add Instructor</button>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        
                                        
                                        
                                        <div class="table-responsive">
                                            <table id="multi-ordering" class="table table-striped table-bordered multi-ordering dataTable no-footer">
                                                <thead>
                                                    <tr>
                                                        <th>ID Number</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    @foreach($InstructorData as $data)
                                                        <tr>
                                                            <td>{{ $data->id_number }}</td>
                                                            <td>{{ $data->name }}</td>
                                                            <td>{{ $data->email }}</td>
                                                            <td>
                                                                @if(Cache::has('user-online' . $data->id))
                                                                    <span class="badge badge-pill badge-success">Online</span>
                                                                @else
                                                                    <span class="badge badge-pill badge-secondary">Offline</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button wire:click="EditInstructor({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-purple-blue btn-sm"><i class="ft-edit"></i> Edit</button>
                                                                <button wire:click="DeleteInstructor({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-red-pink btn-sm"><i class="ft-trash-2"></i> Delete</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    
    
    <!-- Instructor Modal -->
    <div class="modal fade text-left" id="InstructorModal" tabindex="-1" role="dialog" aria-labelledby="InstructorModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <livewire:admin-panel.manage-user.instructor-form />
        </div>
    </div>
    
</div>

@section('custom_script')
    @include('layouts.scripts.instructor-table-scripts'); 
@endsection
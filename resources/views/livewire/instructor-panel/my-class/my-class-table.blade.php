<div>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">My Class</h3>
                </div>
            </div>
            <div class="content-body">
                <section id="horizontal">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <button wire:click="OpenMyClassForm" type="button" class="btn btn-bg-gradient-x-blue-cyan"><i class="ft-plus-circle"></i> Add Class</button>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table style="font-size: 8pt" id="multi-ordering" class="table table-striped table-bordered multi-ordering dataTable no-footer">
                                                <thead>
                                                    <tr>
                                                        <th>Class No</th>
                                                        <th>Semester</th>
                                                        <th>School Year</th>
                                                        <th>Subject</th>
                                                        <th>Section</th>
                                                        <th>Schedule</th>
                                                        <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    @foreach($MyClassData as $data)
                                                        <tr>
                                                            <td>CLS{{ 120231+$data->id }}</td>
                                                            <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:70px;">{{ $data->getSemester->description }}</td>
                                                            <td>{{ $data->school_year }}</td>
                                                            <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:55px;">{{ $data->getSubject->subject }} - {{ $data->getSubject->description }}</td>
                                                            <td>{{ $data->section }}</td>
                                                            <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:110px;">{{ $data->schedule }}</td>
                                                            <td style="min-width:260px;">
                                                                <button wire:click="ViewMyClass({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-blue-green btn-sm"><i class="ft-eye"></i> Manage</button>
                                                                <button wire:click="EditMyClass({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-purple-blue btn-sm"><i class="ft-edit"></i> Edit</button>
                                                                <button wire:click="DeleteMyClass({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-red-pink btn-sm"><i class="ft-trash-2"></i> Delete</button>
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
    
    
    <!-- MyClass Modal -->
    <div class="modal fade text-left" id="MyClassModal" tabindex="-1" role="dialog" aria-labelledby="MyClassModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <livewire:instructor-panel.my-class.my-class-form />
        </div>
    </div>
    
    
    <!-- ViewMyClass Modal -->
    <div style="overflow-y: auto;z-index: 100001 !important;" class="modal fade text-left" id="ViewMyClassModal" tabindex="-1" role="dialog" aria-labelledby="ViewMyClassModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl" role="document">
            <livewire:instructor-panel.my-class.view-my-class-form />
        </div>
    </div>
    
    
    <!-- AddClassStudent Modal -->
    <div style="overflow-y: auto;z-index: 100001 !important;" class="modal fade text-left" id="AddStudentModal" tabindex="-1" role="dialog" aria-labelledby="AddStudentModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document" style="box-shadow: 0 0 500px 500px rgb(22, 22, 22, 0.185)">
            <livewire:instructor-panel.my-class.add-student-form />
        </div>
    </div>
    
    
    <!-- AddActivityCategory Modal -->
    <div style="overflow-y: auto;z-index: 100001 !important;" class="modal fade text-left" id="AddActivityCategoryModal" tabindex="-1" role="dialog" aria-labelledby="AddActivityCategoryModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document" style="box-shadow: 0 0 500px 500px rgb(22, 22, 22, 0.185)">
            <livewire:instructor-panel.my-class.add-activity-category-form />
        </div>
    </div>
    
    
    <!-- ClassWorkMidTermModal Modal -->
    <div style="overflow-y: auto;z-index: 100001 !important;" class="modal fade text-left" id="ClassWorkMidTermModal" tabindex="-1" role="dialog" aria-labelledby="ClassWorkMidTermModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog  modal-xl" role="document" style="box-shadow: 0 0 500px 500px rgb(22, 22, 22, 0.185)">
            <livewire:instructor-panel.my-class.class-work-mid-term-form />
        </div>
    </div>
    
    
    <!-- MidTerm Activity Modal -->
    <div style="overflow-y: auto;z-index: 100001 !important;" class="modal fade text-left" id="MidTermActivityModal" tabindex="-1" role="dialog" aria-labelledby="MidTermActivityModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document" style="box-shadow: 0 0 500px 500px rgb(22, 22, 22, 0.185)">
            <livewire:instructor-panel.my-class.mid-term-activity-form />
        </div>
    </div>
    
    
    <!-- View Midterm Activity Modal -->
    <div style="overflow-y: auto;z-index: 100001 !important;" class="modal fade text-left" id="ViewMidtermActivityRecordModal" tabindex="-1" role="dialog" aria-labelledby="ViewMidtermActivityRecordModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document" style="box-shadow: 0 0 500px 500px rgb(22, 22, 22, 0.185)">
            <livewire:instructor-panel.my-class.view-mid-term-activity-record-form />
        </div>
    </div>
    
</div>

@section('custom_script')
    @include('layouts.scripts.instructor-my-class-table-scripts');
@endsection
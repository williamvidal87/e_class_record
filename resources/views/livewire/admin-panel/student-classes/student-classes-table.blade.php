<div>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Student Classes</h3>
                </div>
            </div>
            <div class="content-body">
                <section id="horizontal">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        
                                        
                                        
                                        <div class="table-responsive">
                                            <table id="multi-ordering2" class="table table-striped table-bordered multi-ordering dataTable no-footer">
                                                <thead>
                                                    <tr>
                                                        <th>ID Number</th>
                                                        <th>Student Name</th>
                                                        <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    @foreach($StudentClassesData as $data)
                                                        <tr>
                                                            <td>{{ $data->id_number }}</td>
                                                            <td>{{ $data->name }}</td>
                                                            <td style="min-width:165px;">
                                                                <button wire:click="ViewStudentClasses({{$data->id}}, '{{$data->name}}')" type="button" class="btn btn-glow btn-secondary btn-sm"><i class="ft-eye"></i> View Classes</button>
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
    
    
    <!-- StudentClasses Modal -->
    <div class="modal fade text-left" id="StudentClassesModal" tabindex="-1" role="dialog" aria-labelledby="StudentClassesModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl" role="document">
            <livewire:admin-panel.student-classes.view-student-classes-form />
        </div>
    </div>

    <!-- View Class Record  Modal -->
    <div style="overflow-y: auto;z-index: 100001 !important;" class="modal fade text-left" id="ViewClassRecordModal" tabindex="-1" role="dialog" aria-labelledby="ViewClassRecordModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl" role="document" style="box-shadow: 0 0 500px 500px rgb(22, 22, 22, 0.185)">
            <livewire:instructor-panel.class-record.view-class-record-form />
        </div>
    </div>
    
</div>

@section('custom_script')
    @include('layouts.scripts.student-classes-table-scripts'); 
@endsection
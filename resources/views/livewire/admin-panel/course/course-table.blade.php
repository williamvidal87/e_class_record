<div>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Course</h3>
                </div>
            </div>
            <div class="content-body">
                <section id="horizontal">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <button wire:click="OpenCourseForm" type="button" class="btn btn-bg-gradient-x-blue-cyan"><i class="ft-plus-circle"></i> Add Course</button>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        
                                        
                                        
                                        <div class="table-responsive">
                                            <table id="multi-ordering" class="table table-striped table-bordered multi-ordering dataTable no-footer">
                                                <thead>
                                                    <tr>
                                                        <th>Course No</th>
                                                        <th>Abbreviation</th>
                                                        <th>Description</th>
                                                        <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    @foreach($CourseData as $data)
                                                        <tr>
                                                            <td>{{ $data->id }}</td>
                                                            <td>{{ $data->abbreviation }}</td>
                                                            <td  style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:200px;">{{ $data->description }}</td>
                                                            <td style="min-width:165px;">
                                                                <button wire:click="EditCourse({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-purple-blue btn-sm"><i class="ft-edit"></i> Edit</button>
                                                                <button wire:click="DeleteCourse({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-red-pink btn-sm"><i class="ft-trash-2"></i> Delete</button>
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
    
    
    <!-- Course Modal -->
    <div class="modal fade text-left" id="CourseModal" tabindex="-1" role="dialog" aria-labelledby="CourseModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <livewire:admin-panel.course.course-form />
        </div>
    </div>
    
</div>

@section('custom_script')
    @include('layouts.scripts.course-table-scripts'); 
@endsection
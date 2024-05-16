<div>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">Computation of Grade</h3>
                </div>
            </div>
            <div class="content-body">
                <section id="horizontal">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <button wire:click="OpenComputationGradeForm" type="button" class="btn btn-bg-gradient-x-blue-cyan"><i class="ft-plus-circle"></i> Add Computation of Grade</button>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        
                                        
                                        
                                        <div class="table-responsive">
                                            <table id="multi-ordering" class="table table-striped table-bordered multi-ordering dataTable no-footer">
                                                <thead>
                                                    <tr>
                                                        <th>Computation Name</th>
                                                        <th>Multiply by</th>
                                                        <th>Add</th>
                                                        <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    @foreach($ComputationGradeData as $data)
                                                        <tr>
                                                            <td>{{ $data->computation_name }}</td>
                                                            <td>{{ $data->multiply }}</td>
                                                            <td>{{ $data->addition }}</td>
                                                            <td style="min-width:165px;">
                                                                <button wire:click="EditComputationGrade({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-purple-blue btn-sm"><i class="ft-edit"></i> Edit</button>
                                                                <button wire:click="DeleteComputationGrade({{$data->id}})" type="button" class="btn btn-glow btn-bg-gradient-x-red-pink btn-sm"><i class="ft-trash-2"></i> Delete</button>
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
    
    
    <!-- ComputationGrade Modal -->
    <div class="modal fade text-left" id="ComputationGradeModal" tabindex="-1" role="dialog" aria-labelledby="ComputationGradeModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <livewire:admin-panel.computation-grade.computation-grade-form />
        </div>
    </div>
    
</div>

@section('custom_script')
    @include('layouts.scripts.computation-grade-table-scripts'); 
@endsection
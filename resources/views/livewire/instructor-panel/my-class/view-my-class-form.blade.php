<div>
    <div class="modal-content">
        <div class="modal-header bg-success white">
            <h4 class="modal-title white" id="myModalLabel11">{{ $this->SubjectTitle }}</h4>
            <button wire:click="CloseMyClassForm" type="button" class="btn close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form class="form">
                    <div class="form-body">
                        <section id="horizontal">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <button wire:click="OpenAddStudentForm" type="button" class="btn btn-bg-gradient-x-blue-cyan"><i class="ft-plus-circle"></i> Add Student</button>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body card-dashboard">
                                                <div class="table-responsive">
                                                    <table style="font-size: 8pt" id="multi-ordering2" class="table table-striped table-bordered multi-ordering2 dataTable no-footer">
                                                        <thead>
                                                            <tr>
                                                                <th>ID Number</th>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($StudentData as $data)
                                                                <tr>
                                                                    <td>CLS{{ 120231+$data->id }}</td>
                                                                    <td>CLS{{ 120231+$data->id }}</td>
                                                                    <td>CLS{{ 120231+$data->id }}</td>
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
                </form>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button wire:click="CloseMyClassForm" type="button" class="btn grey btn-secondary"><i class="ft-x"></i> Close</button>
            <button wire:click="Store" type="button" class="btn btn-primary"><i class="la la-check-square-o"></i> Save</button>
        </div>
    </div>
</div>
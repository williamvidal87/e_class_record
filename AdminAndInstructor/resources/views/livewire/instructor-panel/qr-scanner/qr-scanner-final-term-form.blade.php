<div>
    <div class="modal-content">
        <div class="modal-header bg-info white">
            <h4 class="modal-title white" id="myModalLabel11">Scan Qr Code</h4>
            <button wire:click="CloseScannerFinalTerm" type="button" class="btn close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                    <div class="form-body">
                        <div class="content-detached content-right">
                            <div class="content-body">
                                <section class="row">
                                    <div class="col-12">
                                        <div style="box-shadow: 1px 0px 20px 20px rgba(62,57,107,.07);" class="card">
                                            <div class="card-head">
                                                <div class="card-header">
                                                    <h4 class="card-title">Students</h4>
                                                    <a class="heading-elements-toggle">
                                                        <i class="la la-ellipsis-h font-medium-3"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <!-- Task List table -->
                                                    <div class="table-responsive">
                                                        <div id="users-contacts_wrapper"
                                                            class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <table id="users-contacts"
                                                                        class="table table-white-space table-bordered table-striped row-grouping display no-wrap icheck table-Finaldle dataTable no-footer"
                                                                        role="grid"
                                                                        aria-describedby="users-contacts_info">
                                                                        <thead>
                                                                            <tr role="row">
                                                                                <th>Name</th>
                                                                                <th>Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($StudentFinalTermActivityRecordData as $data)
                                                                                <tr role="row" class="odd">
                                                                                    <td>
                                                                                        <div class="media">
                                                                                            <div class="media-left pr-1">
                                                                                                <span style="width: 30px;height: 30px;" class="avatar avatar-sm rounded-circle">
                                                                                                    <img style="min-width: 100%; height: 100%; object-fit: cover;" src="/storage/{{ $data->getUser->profile_photo_path ?? 'default-profile/admin-profile.png' }}" alt="avatar">
                                                                                                    <i></i>
                                                                                                </span>

                                                                                            </div>
                                                                                            <div
                                                                                                class="media-body media-Finaldle">
                                                                                                <span class="media-heading text-bold-700">
                                                                                                    {{ $data->getUser->name ?? ''}}
                                                                                                </span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="text-left">
                                                                                        @if ($this->maximum_score==$data->score)
                                                                                            <span class="badge badge-pill badge-success">Present</span>
                                                                                        @else
                                                                                            <span class="badge badge-pill badge-light">Absent</span>
                                                                                        @endif
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
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <div class="sidebar-detached sidebar-left">
                            <div class="sidebar">
                                <div class="bug-list-sidebar-content">
                                    <!-- Predefined Views -->
                                    <div style="box-shadow: 1px 0px 20px 20px rgba(62,57,107,.07);" class="card">
                                        <div class="card-head">
                                            <?php
                                                foreach ($StudentFinalTermActivityRecordData as $data2) {
                                                    if($IdNumber==$data2->getUser->id_number){
                                                        $TempIdNumber=$IdNumber;
                                                        $TempPhoto=$data2->getUser->profile_photo_path;
                                                        $TempName=$data2->getUser->name;
                                                        $TempCourse=$data2->getUser->getCourse->description;
                                                        
                                                        $this->dispatch('UpdateFinalTermScore',$data2->id);

                                                        $this->IdNumber=null;
                                                    } else {
                                                        $this->IdNumber=null;
                                                    }
                                                }
                                            ?>
                                            @if ($TempIdNumber)
                                                <div class="align-self-center halfway-fab text-center p-1">
                                                    <span style="width: 144px;height: 144px;" class="avatar avatar-lg avatar-online rounded-circle">
                                                        <img style="min-width: 100%;background-size: 100% 100%; height: 100%; object-fit: cover; background-image: url('../storage/{{$TempPhoto ?? 'default-profile/admin-profile.png'}}');" src="/others/checkmark.gif" alt="avatar">
                                                    </span>
                                                </div>
                                                <div class="text-center">
                                                    <span class="font-medium-2 text-uppercase">{{$TempName}}</span>
                                                    <p class="blue-grey font-small-2">{{$TempCourse}}</p>
                                                </div>
                                            @else
                                                <div class="align-self-center halfway-fab text-center p-1">
                                                    <span style="border-radius:1px" class="avatar avatar-lg avatar-online rounded-circle"><img style="border-radius:1px" src="/storage/scan/scan.gif" alt="avatar"></span>
                                                </div>
                                                <div class="text-center">
                                                    <span class="font-medium-2 text-uppercase">No Result</span>
                                                    <p class="blue-grey font-small-2">No Result</p>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="card-body border-top-blue-grey border-top-lighten-5">
                                            <!-- contacts view -->
                                            <div class="card-body">
                                                <div class="list-group">
                                                    <form onsubmit="return false;">
                                                        <input wire:model.live="IdNumber" type="text" class="form-control" id="InputScannerFinalTerm">
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--/ Predefined Views -->

                                </div>
                            </div>
                        </div>


                    </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button wire:click="CloseScannerFinalTerm" type="button" class="btn grey btn-secondary"><i
                    class="ft-x"></i>Close</button>
        </div>
    </div>
</div>
<div>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">QR Code</h3>
                </div>
            </div>
            <div class="content-body">
                <section id="horizontal">
                    <div class="row">

                        <div class="col-xl-12 col-md-12">
                            <div class="card" style="">
                                <div class="card-body" style="text-align:center">

                                    <div>{!! QrCode::size(200)->generate(Auth::user()->id_number) !!}</div>
                                </div>

                                <div class="card-body" style="text-align:center">
                                    <h1 class="badge badge-pill badge-info" style="font-size:36px">SCAN ME</h1>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </section>
            </div>
        </div>
    </div>


    <!-- Course Modal -->
    <div class="modal fade text-left" id="CourseModal" tabindex="-1" role="dialog" aria-labelledby="CourseModal"
        aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <livewire:admin-panel.course.course-form />
        </div>
    </div>

</div>

@section('custom_script')
@include('layouts.scripts.course-table-scripts');
@endsection
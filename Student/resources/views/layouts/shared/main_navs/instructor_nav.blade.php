
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class=" nav-item">
        <a href="instructor-dashboard">
            <i class="ft-home">
            </i>
            <span class="menu-title" data-i18n="">Dashboard</span>
        </a>
    </li>
    <li class=" nav-item">
        <a href="instructor-my-class-table">
            <i class="ft-server">
            </i>
            <span class="menu-title" data-i18n="">My Class</span>
        </a>
    </li>
    <li class=" nav-item">
        <a href="instructor-student-table">
            <i class="ft-users">
            </i>
            <span class="menu-title" data-i18n="">Students</span>
        </a>
    </li>
    <li class=" nav-item">
        <a href="instructor-subject-table">
            <i class="ft-book">
            </i>
            <span class="menu-title" data-i18n="">Subject</span>
        </a>
    </li>
</ul>





@section('custom_script')
    <!-- BEGIN: Page Vendor JS-->
    {{-- <script src="{{ asset('app-assets/vendors/js/charts/chartist.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js') }}" type="text/javascript"></script> --}}
    <!-- END: Page Vendor JS-->
    
    
    
    <!-- BEGIN: Page JS-->
    {{-- <script src="{{ asset('app-assets/js/scripts/pages/dashboard-analytics.min.js') }}" type="text/javascript"></script> --}}
    <!-- END: Page JS-->
        
        
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/animation/jquery.appear.js') }}" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->
        
        
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/tables/datatables/datatable-basic.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/animation/animation.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/extensions/sweet-alerts.min.js') }}" type="text/javascript"></script>
    <!-- END: Page JS-->

@endsection
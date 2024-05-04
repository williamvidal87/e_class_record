
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class=" nav-item">
        <a href="dashboard">
            <i class="ft-home">
            </i>
            <span class="menu-title" data-i18n="">Dashboard</span>
        </a>
    </li>
    <li class=" nav-item">
        <a href="dashboard">
            <i class="ft-users">
            </i>
            <span class="menu-title" data-i18n="">Manage Users</span>
        </a>
        <ul class="menu-content">
            {{-- <li>
                <a class="menu-item" href="admin-table">Admin</a>
            </li> --}}
            <li>
                <a class="menu-item" href="instructor-table">Instructor</a>
            </li>
            <li>
                <a class="menu-item" href="student-table">Students</a>
            </li>
        </ul>
    </li>
    <li class=" nav-item">
        <a href="instructor-classes-table">
            <i class="icon-notebook">
            </i>
            <span class="menu-title" data-i18n="">Instructor Classes</span>
        </a>
    </li>
    <li class=" nav-item">
        <a href="course-table">
            <i class="icon-folder-alt">
            </i>
            <span class="menu-title" data-i18n="">Student Classes</span>
        </a>
    </li>
    <li class=" nav-item">
        <a href="course-table">
            <i class="icon-docs">
            </i>
            <span class="menu-title" data-i18n="">Course</span>
        </a>
    </li>
    <li class=" nav-item">
        <a href="subject-table">
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
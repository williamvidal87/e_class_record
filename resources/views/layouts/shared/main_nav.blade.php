<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true"
    data-img="{{ asset('app-assets/images/backgrounds/02.jpg') }}">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="dashboard">
                    <img class="brand-logo" alt="Chameleon admin logo"
                        src="{{ asset('app-assets/images/logo/logo.png') }}" />
                    <h3 class="brand-text">E-CLASS RECORD</h3>
                </a>
            </li>
            <li class="nav-item d-md-none">
                <a class="nav-link close-navbar">
                    <i class="ft-x">
                    </i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navigation-background">
    </div>
    <div class="main-menu-content">
    <!-- for admin nav -->
    @if(Auth::user()->rule_id==1)
        @include('layouts.shared.main_navs.admin_nav')
    @endif
    
    <!-- for instructor nav -->
    @if(Auth::user()->rule_id==2)
        @include('layouts.shared.main_navs.instructor_nav')
    @endif
    
    <!-- for student nav -->
    @if(Auth::user()->rule_id==3)
        @include('layouts.shared.main_navs.student_nav')
    @endif
    </div>
</div>
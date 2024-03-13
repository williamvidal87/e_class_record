<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="collapse navbar-collapse show" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item mobile-menu d-md-none mr-auto">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                            <i class="ft-menu font-large-1">
                            </i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                            <i class="ft-menu">
                            </i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a class="nav-link nav-link-expand" href="#">
                            <i class="ficon ft-maximize">
                            </i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    {{-- <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                            <i class="ficon ft-mail"> </i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <div class="arrow_box_right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0">
                                        <span class="grey darken-2">Messages</span>
                                    </h6>
                                </li>
                                <li class="scrollable-container media-list w-100">
                                    <a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left">
                                                <span class="avatar avatar-sm rounded-circle">
                                                    <img src="{{ asset('app-assets/images/portrait/small/avatar-s-6.png') }}"
                                                        alt="avatar">
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading text-bold-700">Sarah Montery<i
                                                        class="ft-circle font-small-2 success float-right">
                                                    </i>
                                                </h6>
                                                <p class="notification-text font-small-3 text-muted text-bold-600">
                                                    Everything looks good. I will provide...</p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">3:55 PM</time>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left">
                                                <span class="avatar avatar-sm rounded-circle">
                                                    <span
                                                        class="media-object rounded-circle text-circle bg-warning">E</span>
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading text-bold-700">Eliza Elliot<i
                                                        class="ft-circle font-small-2 danger float-right">
                                                    </i>
                                                </h6>
                                                <p class="notification-text font-small-3 text-muted text-bold-600">
                                                    Okay. here is some more details...</p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">2:10 AM</time>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left">
                                                <span class="avatar avatar-sm rounded-circle">
                                                    <img src="{{ asset('app-assets/images/portrait/small/avatar-s-3.png') }}"
                                                        alt="avatar">
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading text-bold-700">Kelly Reyes<i
                                                        class="ft-circle font-small-2 warning float-right">
                                                    </i>
                                                </h6>
                                                <p class="notification-text font-small-3 text-muted text-bold-600">
                                                    Check once and let me know if you...</p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">Yesterday</time>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <div class="media">
                                            <div class="media-left">
                                                <span class="avatar avatar-sm rounded-circle">
                                                    <img src="{{ asset('app-assets/images/portrait/small/avatar-s-19.png') }}"
                                                        alt="avatar">
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="media-heading text-bold-700">Tonny Deep<i
                                                        class="ft-circle font-small-2 danger float-right">
                                                    </i>
                                                </h6>
                                                <p class="notification-text font-small-3 text-muted text-bold-600">
                                                    We will start new project development...</p>
                                                <small>
                                                    <time class="media-meta text-muted"
                                                        datetime="2015-06-11T18:29:20+08:00">Friday</time>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-menu-footer">
                                    <a class="dropdown-item text-right info pr-1" href="javascript:void(0)">Read all</a>
                                </li>
                            </div>
                        </ul>
                    </li> --}}
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="" data-toggle="dropdown">
                            <span style=" width: 40px;height: 40px;" class="avatar avatar-online">
                                <img style="min-width: 100%; min-height: 100%;" src="/storage/{{ Auth::user()->profile_photo_path ?? 'default-profile/admin-profile.png' }}"
                                    alt="{{ Auth::user()->name }}">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="arrow_box_right">
                                <a class="dropdown-item" href="dashboard">
                                    <span style=" width: 30px;height: 30px;" class="avatar avatar-online">
                                        <img style="min-width: 100%; min-height: 100%;" src="/storage/{{ Auth::user()->profile_photo_path ?? 'default-profile/admin-profile.png' }}"
                                            alt="{{ Auth::user()->name }}">
                                        <span class="user-name text-bold-700 ml-1"><?php $arr = explode(',', trim(Auth::user()->name)); echo $arr[0]; ?></span>
                                    </span>
                                </a>
                                <div class="dropdown-divider">
                                </div>
                                <a class="dropdown-item" href="edit-profile">
                                    <i class="ft-user">
                                    </i>
                                    Manage Profile
                                </a>
                                <a class="dropdown-item" href="edit-password">
                                    <i class="ft-mail">
                                    </i>
                                    Manage Password
                                </a>
                                <div class="dropdown-divider">
                                </div>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                        <i class="ft-power">
                                        </i> Logout
                                    </a>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
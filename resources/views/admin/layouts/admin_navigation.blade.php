<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{route('admin.dashboard')}}" class="waves-effect">
                        <i class="ti-home"></i><span class="badge badge-pill badge-primary float-right">2</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                 <li>
                    <a href="{{route('admin.users.index')}}" class=" waves-effect">
                        <i class="ti-user"></i>
                        <span>Users Details</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.banners.index')}}" class=" waves-effect">
                        <i class="ti-face-smile"></i>
                        <span>Banner Images</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.advertisements.index')}}" class=" waves-effect">
                        <i class="ti-face-smile"></i>
                        <span>Advertisement</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.languages.index')}}" class=" waves-effect">
                        <i class='fas fa-language'></i>
                        <span>Language Details</span>
                    </a>
                </li>

                <li class="menu-title">Movies Section</li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-package"></i>
                        <span>Talent Hunt</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li>
                            <a href="{{route('admin.talents.subscriptions')}}" class=" waves-effect">
                                {{-- <i class="ti-face-smile"></i> --}}
                                <span>Talent Users</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('admin.talents.index')}}" class=" waves-effect">
                                {{-- <i class="ti-face-smile"></i> --}}
                                <span>Telent Videos</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-package"></i>
                        <span>Movies Details</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.genres.index')}}" class=" waves-effect">
                            {{-- <i class="fa fa-video"></i> --}}
                            <span>Movies Genre</span>
                        </a></li>
                        <li><a href="{{route('admin.movies.index')}}" class=" waves-effect">
                            {{-- <i class="fa fa-video"></i> --}}
                            <span>Movies Details</span>
                        </a></li>
                    
                    </ul>
                </li>

                <li class="menu-title">Movies Transaction</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-package"></i>
                        <span>Subscriptions Details</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.subscriptions.index')}}" class=" waves-effect">
                            <i class="ti-calendar"></i><span>User Subscriptions</span>
                            </a>
                        </li>
                        <li><a href="{{route('admin.plans.index')}}" class=" waves-effect">
                            <i class="fa fa-video"></i>
                            <span>Subscriptions Plans</span>
                        </a></li>
                    
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

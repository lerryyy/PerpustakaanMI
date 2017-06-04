<!-- start: header -->
<header class="header">
                <div class="logo-container">
                    <div class="logo">
                        <img src="{{asset('assets/admin/images/logo.jpg')}}" height="45" width="260" />
                    </div>
                    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <span class="separator"></span>
            
                <!-- start: search & user box -->
                <div class="header-right">
            
                    <form action="pages-search-results.html" class="search nav-form">
                        <div class="input-group input-search">
                            <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
            
                    <span class="separator"></span>
            
                    <div id="userbox" class="userbox">
                        <a href="#" data-toggle="dropdown">
                            <figure class="profile-picture">
                                <img src="{{asset('assets/admin/images/!logged-user.jpg')}}" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                            </figure>
                            <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                                <span class="name">{{isset(Auth::user()->name)?Auth::user()->name:''}}</span>
                                <span class="role"></span>
                            </div>
            
                            <i class="fa custom-caret"></i>
                        </a>
            
                        <div class="dropdown-menu">
                            <ul class="list-unstyled">
                                <li class="divider"></li>
                                <li>
                                     <a role="menuitem" tabindex="-1" href="{{url('/profil/biodata')}}"><i class="fa fa-user"></i> Profil </a>
                                </li>
                                <li>
                                   <a role="menuitem" tabindex="-1" href="{{url('/password/change')}}"><i class="fa fa-key"></i> Ganti Password </a>
                                </li>
                                <li>
                                   <a role="menuitem" tabindex="-1" href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> Logout</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end: search & user box -->
            </header>
<!-- end: header -->
 
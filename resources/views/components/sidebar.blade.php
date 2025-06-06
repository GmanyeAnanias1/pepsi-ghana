<aside class="app-navbar" style="position: fixed; z-index: 9999;width: 15rem;margin-top: -3rem;">
                    <!-- begin sidebar-nav -->
                    <div class="sidebar-nav bg-gradient scrollbar scroll_light" >
                        <ul class="metismenu " id="sidebarNav">
                            <li class="nav-static-title">Menu</li>
                            <li><a href="{{ route('applicant.dashboard') }}" aria-expanded="false"><i class="fa fa-dashboard"></i><span class="nav-title">Dashboard</span></a> </li>
                            <li><a href="{{ route('applicant.jobs.index') }}" aria-expanded="false"><i class="fa fa-music"></i><span class="nav-title">Browse Jobs</span></a> </li>
                            <li><a href="{{ route('applicant.applications.index') }}" aria-expanded="false"><i class="fa fa-map-marker"></i><span class="nav-title">   My Applications</span></a> </li>

                            {{-- <li><a href= "{{route('/')  }}" aria-expanded="false"><i class="fa fa-lock"></i><span class="nav-title">Logout</span></a> </li> --}}
                        </ul>
                    </div>
                    <!-- end sidebar-nav -->
                </aside>

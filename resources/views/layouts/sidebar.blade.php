<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Light Logo-->
        <a href="/" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('images/logo.jpg') }}" class="rounded-circle" alt="" width="22" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('images/logo.jpg') }}" class="rounded-circle" alt="" width="50" height="50">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link @yield('calendar')" href="#sidebarCalendar" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarPages">
                        <i class="mdi mdi-sticker-text-outline"></i> <span data-key="t-pages">ပြက္ခဒိန်</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarCalendar">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('calendar.index') }}" class="nav-link" data-key="t-starter">ပြက္ခဒိန် စာရင်း
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('calendar.create') }}" class="nav-link" data-key="t-starter">ပြက္ခဒိန်ထဲ ဂဏန်း ထည့်မည်
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ $data->type == 'numbers' ? 'active' : ''}}" href="/show/numbers"  role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="bx bxs-grid"></i> <span>ထိုးကွက်
                        </span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ $data->type == 'one_number' ? 'active' : ''}}" href="/show/one_number" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="bx bx-webcam"></i> <span>တကွက်ကောင်း
                        </span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ $data->type == 'one_change' ? 'active' : ''}}" href="/show/one_change" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="bx bx-vector"></i> <span>ဝမ်းချိန်း
                        </span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ $data->type == 'lone_paing' ? 'active' : ''}}" href="/show/lone_paing" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="bx bxs-bomb"></i> <span>လုံးပိုင်
                        </span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ $data->type == 'own_number' ? 'active' : ''}}" href="/show/own_number" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="bx bxs-baby-carriage"></i> <span>မွေးကွက်
                        </span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <!-- <li class="nav-item">
                    <a class="nav-link menu-link" href="/show/ch_key" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="bx bx-plus"></i> <span>Ch + Key
                        </span>
                    </a>
                </li> end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link {{ $data->type == 'about_2d' ? 'active' : ''}}" href="/show/about_2d" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="bx bxs-baby-carriage"></i> <span>2D အကြောင်း
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ $data->type == 'about_app' ? 'active' : ''}}" href="/show/about_app" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="bx bxs-baby-carriage"></i> <span>APP အကြောင်း
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link @yield('posts')" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarPages">
                        <i class="mdi mdi-sticker-text-outline"></i> <span data-key="t-pages">ပို့စ်များ</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('posts.index') }}" class="nav-link" data-key="t-starter">ပို့စ် စာရင်း
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('posts.create') }}" class="nav-link" data-key="t-starter">ပို့စ် ဖန်တီးမည်
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

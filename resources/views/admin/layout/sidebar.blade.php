<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
    style="background-color: #0B60B0 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
            target="_blank">
            {{-- <img src="./assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo"> --}}
            <span class="ms-1 font-weight-bold text-white"> Dashboard</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ $title === 'Dashboard' ? 'active collor-button' : '' }} " href="/">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $title === 'jadwal' ? 'active collor-button' : '' }} " href="/jadwal">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">List Jadwal</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $title === 'Instruktur' ? 'active collor-button' : '' }} " href="/instruktur">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Daftar Instruktur</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $title === 'Sekolah' ? 'active collor-button' : '' }} " href="/sekolah">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Daftar Sekolah</span>
                </a>
            </li>
            <li class="nav-item">
                <div class="dropdown-center">
                    <a class="nav-link {{ Request::is('/presensi*') ? 'active' : '' }}" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">checklist_rtl</i>
                        </div>
                        Presensi Peserta
                    </a>
                    <ul class="dropdown-menu" style="background-color: #0B60B0">
                        @foreach ($sekolahs as $sekolah)
                            <li><a class="dropdown-item text-white"
                                    href="/presensi/{{ $sekolah->slug }}">{{ $sekolah->nama }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <div class="dropdown-center">
                    <a class="nav-link {{ Request::is('/laporan-absensi*') ? 'active' : '' }}" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">summarize</i>
                        </div>
                        Laporan Absensi
                    </a>
                    <ul class="dropdown-menu" style="background-color: #0B60B0">
                        @foreach ($sekolahs as $sekolah)
                            <li><a class="dropdown-item text-white"
                                    href="/laporan-presensi/{{ $sekolah->slug }}">{{ $sekolah->nama }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link {{ $title === 'billing' ? 'active collor-button' : '' }} " href="billing">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Billing</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  " href="/notifikasi">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notifications</i>
                    </div>
                    <span class="nav-link-text ms-1">Notifications</span>
                </a>
            </li> --}}
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="/profile">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <form class="nav-link text-white" action="/logout" method="POST">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        @csrf
                        <button class="border-0 bg-transparent text-white" onclick="return confirm('Are you sure?')"> <i
                                class="bi bi-box-arrow-in-left"> </i>Logout</button>
                    </div>
                </form>
            </li>
        </ul>
    </div>

</aside>

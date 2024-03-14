@extends('admin.layout.default')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                href="javascript:;">{{ $title }}</a></li>
                        <li class="breadcrumb-item text-sm text-dark active"></li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Tables</h6>
                </nav>

            </div>
        </nav>
        <!-- End Navbar -->
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 rounded-circle">
            <div class="card my-4 ">
                <div class="card-tools">
                    <a href="/jadwal/create" class="btn collor-button" style="color: white">tambah data <i
                            class="fas fa-plus-square"></i></a>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="collor-button shadow-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Jadwal Instruktur</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class=" align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama </th>
                                            <th
                                                class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                                Mata Pelajaran</th>
                                            <th
                                                class=" align-middle text-center text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Tempat Mengajar</th>
                                            <th
                                                class="align-middle text-center text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jam Mengajar</th>
                                            <th
                                                class="align-middle text-center text-secondary opacity-7 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Tanggal
                                            </th>
                                            <th
                                                class="align-middle text-center text-secondary opacity-7 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                asisten
                                            </th>
                                            <th
                                                class="align-middle text-center text-secondary opacity-7 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jadwals as $jadwal)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs text-secondary mb-0">
                                                        @foreach ($jadwal->user as $user)
                                                            {{ $user->name }}
                                                        @endforeach
                                                    </p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs text-secondary mb-0">{{ $jadwal->matapelajaran }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs text-secondary mb-0">
                                                        @foreach ($jadwal->sekolah as $sekolah)
                                                            {{ $sekolah->nama }}
                                                        @endforeach
                                                    </p>
                                                </td>

                                                <td class="align-middle text-center">
                                                    <p class="text-xs text-secondary mb-0">{{ $jadwal->jammengajar }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs text-secondary mb-0">{{ $jadwal->tanggal }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <p class="text-xs text-secondary mb-0 ">
                                                        @foreach ($jadwal->asisten as $asisten)
                                                            {{ $asisten->name }}
                                                        @endforeach
                                                    </p>
                                                </td>
                                                <td class="align-middle justify-content-center align-items-center d-flex">
                                                    <a href="/jadwal/{{ $jadwal->slug }}/edit"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="/jadwal/{{ $jadwal->slug }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="border-0 bg-transparent"
                                                            onclick="return confirm('Are you sure?')"> <i
                                                                class="bi bi-trash3"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">

                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.instagram.com/audya_11/" class="font-weight-bold"
                                    target="_blank">Audya</a>
                                for a better web.
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-icons py-2">settings</i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark"
                        onclick="sidebarType(this)">Dark</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent"
                        onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white"
                        onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3 d-flex">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                            onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                            onclick="darkMode(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
                <a class="btn btn-outline-dark w-100" href="">View documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

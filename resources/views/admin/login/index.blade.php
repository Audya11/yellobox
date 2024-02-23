@extends('admin.layout.auth')
@section('content')
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav>
                    </span>
                    </button>

                    </li>
                    </ul>
            </div>
        </div>
        </nav>
        <!-- End Navbar -->
    </div>
    </div>
    </div>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <img class="pt-4 mx-auto" src="/img/Yello.png" alt="" width="100">
                            <div class="card-body ">
                                <form class="text-start" action="/login" method="POST">
                                    @csrf
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label"></label>
                                        <input type="email" name="email" class="form-control" placeholder="email"
                                            autofocus>
                                    </div>

                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label"></label>
                                        <input type="password" name="password" class="form-control" placeholder="password"
                                            autofocus>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign
                                            in</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-12 col-md-6 my-auto">
                        </div>
                    </div>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Absensi</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="container">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/"><img src="images/logo.png" alt="" style="width: 60px" /></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/tentang">Tentang</a>
                                </li>
                                @guest
                                <a class="" href="/login"><button class="btn btn-success ms-4">Login</button></a>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="/dashboard">Dashboard</a>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <main class="py-4">
                <div class="row banner-1">
                    <div class="col-md-6">
                        <h1 class="banner-h">Tentang</h1>
                        <p>Merupakan aplikasi absensi online untuk mendapatkan informasi kehadiran siswa disekolah <span
                                class="color-green">SMKS IBNU SINA</span></p>
                        <!-- <button class="btn btn-outline-success">Get Started</button> -->
                    </div>
                    <div class="col-md-6"><img src="images/Illustration.png" alt="" /></div>
                </div>
            </main>
        </div>
        <div class="container-fluid"></div>
    </div>
</body>

</html>

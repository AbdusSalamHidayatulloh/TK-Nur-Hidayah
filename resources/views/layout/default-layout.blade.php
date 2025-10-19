<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content="TK/KB Nur Hidayah — tempat belajar menyenangkan untuk anak usia dini. Kami membantu anak tumbuh dengan ceria, kreatif, dan percaya diri.">
    <meta name="keywords" content="TK, taman kanak-kanak, pendidikan anak, KB, sekolah anak, TK Nur Hidayah">
    <meta name="author" content="TK/KB Nur Hidayah">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Nunito:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet">
    <link rel="stylesheet" href="/style.css">
    <title>@yield('title')</title>
</head>

<body class="d-flex flex-column overflow-hidden min-vh-100">
    <header
        class="w-100 fixed-top d-flex flex-row justify-content-between bg-green-gradient-header align-items-center p-3 z-2">
        <a href="/" class="text-decoration-none d-flex z-1 flex-row h-100 align-items-center">
            <img src="/image/logo.png" width="70" height="70" class="me-2" />
            <h4 class="text-white fw-bold mb-0 mt-0">TK/KB Nur Hidayah</h4>
        </a>
        <div class="d-md-flex py-2 gap-4 align-items-center d-none z-2 justify-content-end ms-auto">
            <a href="/" class="text-decoration-none text-white fw-semibold" style="font-size: 18px">Beranda</a>
            <a href="/programs" class="text-decoration-none text-white fw-semibold" style="font-size: 18px">Program</a>
            <a href="/about-us" class="text-decoration-none text-white fw-semibold" style="font-size: 18px">Tentang
                Kami</a>
            <a href="/our-facility" class="text-decoration-none text-white fw-semibold"
                style="font-size: 18px">Fasilitas</a>
            <a href="/enlist" class="text-decoration-none text-white fw-semibold"
                style="font-size: 18px">Pendaftaran</a>
        </div>
        <div class="d-md-none position-relative">
            <span class="material-symbols-rounded text-white d-md-none" id="menuDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 36px; cursor:pointer;">
                menu
            </span>
    </header>
    <div id="mobile-menu"
        class="mobile-sidebar d-md-none position-fixed end-0 top-0 d-flex p-1 flex-column text-white gap-4 rounded rounded-start-5 shadow-sm gap-3 z-5">
        <div class="w-100 d-flex justify-content-center align-items-center">
            <img src="/image/logo.png" width="120" height="120" alt="TK/KB Nur Hidayah logo">
        </div>
        <div class="d-flex justify-content-center">
            <hr class="mt-0 mb-0 border border-1 border-black w-75">
        </div>
        <a href="/" class="text-decoration-none w-100 text-black fs-5 fw-bolder mx-4">Beranda</a>
        <a href="/programs" class="text-decoration-none w-100 text-black fs-5 fw-bolder mx-4">Program</a>
        <a href="/about-us" class="text-decoration-none w-100 text-black fs-5 fw-bolder mx-4">Tentang Kami</a>
        <a href="/our-facility" class="text-decoration-none w-100 text-black fs-5 fw-bolder mx-4">Fasilitas</a>
        <a href="/enlist" class="text-decoration-none w-100 text-black fs-5 fw-bolder mx-4">Pendaftaran</a>
    </div>
    <div id="overlay" class="overlay position-fixed top-0 start-0 w-100 h-100 d-md-none z-3"></div>
    <!-- For the navbar under the header -->
    <main class="z-0" style="padding-top: 70px; padding-bottom: 50px;">
        @yield('mainContent')
    </main>
    <footer class="bg-green-gradient-footer py-5 mt-auto">
        <div class="container">
            <div class="d-flex flex-md-row flex-column justify-content-evenly align-items-center gap-4">
                <img width="170" height="170" src="/image/logo.png">
                <div class="d-flex flex-column gap-2">
                    <a href="/" class="text-decoration-none text-white fw-semibold linksFooter mb-0 mt-0"
                        style="font-size: 20px;">
                        <span class="material-symbols-rounded"
                            style="vertical-align: middle; font-size: 24px;">home</span> Beranda
                    </a>
                    <a href="/programs" class="text-decoration-none text-white fw-semibold linksFooter mb-0 mt-0"
                        style="font-size: 20px;">
                        <span class="material-symbols-rounded"
                            style="vertical-align: middle; font-size: 24px;">school</span> Programs
                    </a>
                    <a href="/about-us" class="text-decoration-none text-white fw-semibold linksFooter mb-0 mt-0"
                        style="font-size: 20px;">
                        <span class="material-symbols-rounded"
                            style="vertical-align: middle; font-size: 24px;">emoji_people</span> Tentang Kami
                    </a>
                    <a href="/our-facility" class="text-decoration-none text-white fw-semibold linksFooter mb-0 mt-0"
                        style="font-size: 20px;">
                        <span class="material-symbols-rounded"
                            style="vertical-align: middle; font-size: 24px;">apartment</span> Fasilitas
                    </a>
                    <a href="/enlist" class="text-decoration-none text-white fw-semibold linksFooter mb-0 mt-0"
                        style="font-size: 20px;">
                        <span class="material-symbols-rounded"
                            style="vertical-align: middle; font-size: 24px;">assignment</span> Pendaftaran
                    </a>
                </div>
                <!-- Somded -->
                <div class="d-flex flex-column align-items-center">
                    <p class="text-white">Kontak Kami</p>
                    <div class="d-flex flex-row gap-3">
                        <a href="https://www.instagram.com/kbtknurhidayah_malang">
                            <img src="image/instagram.png" width="50" height="50"
                                class="rounded border border-2 border-white" alt="Instagram Logo" />
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=6285706339931&text=Halo%20saya%20ingin%20bertanya%20tentang%20TK%20KB%20Nur%20Hidayah"
                            target="_blank" rel="noopener noreferrer">
                            <img src="image/whatsapp.png" width="50" height="50"
                                class="rounded border border-2 border-white" alt="Whatsapp Logo" />
                        </a>
                        <a href="mailto:tknurhidayah57a@gmail.com">
                            <img src="image/gmail.png" width="50" height="50"
                                class="rounded border border-2 border-white" alt="Gmail Logo" />
                        </a>
                    </div>
                    <p class="pt-4 text-white">©2025 Nur Hidayah</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="/utility.js"></script>
    <!-- For Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HoA13XY0ZyaFqPh2V6F4fy1R6n+YtFTo8ML1v+CTe3YHjpyMfdqUbn7Q3Z3DoaTo" crossorigin="anonymous">
        </script>
</body>

</html>
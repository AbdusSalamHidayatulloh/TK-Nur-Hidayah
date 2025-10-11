<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Nunito:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>@yield("title")</title>
</head>
<body class="d-flex flex-column min-vh-100 overflow-hidden">
    <header class="w-100 fixed-top d-flex flex-row justify-content-between bg-green-gradient-header justify-content-md-center  align-items-center bg-success p-3">
        <a href="/" class="text-decoration-none d-flex flex-row h-100 align-items-center">
            <img src="#" width="60" height="60" class="me-2"/>
            <h4 class="text-white fw-bold mb-0 mt-0">TK Nur Hidayah</h4>
        </a>
        <span class="material-symbols-rounded text-white d-md-none" style="font-size: 36px; cursor:pointer;">
            menu
        </span>
    </header>
    <!-- For the navbar under the header -->
    <nav class="bg-green-gradient-navbar d-flex justify-content-center py-2 gap-3 w-100">
        <a href="/" class="text-decoration-none text-white fw-semibold">Beranda</a>
        <a href="/programs" class="text-decoration-none text-white fw-semibold">Program</a>
        <a href="/about-us" class="text-decoration-none text-white fw-semibold">Tentang Kami</a>
        <a href="/enlist" class="text-decoration-none text-white fw-semibold">Pendaftaran</a>
    </nav>
    <main class="flex-fill">
        @yield('mainContent')
    </main>
    <footer class="bg-green-gradient-footer">
        <div class="d-flex flex-md-row flex-column py-5 justify-content-evenly align-items-center mt-auto">
            <img width="130" height="130" src="#">
            <div class="d-flex flex-column">
                <a href="/" class="text-decoration-none text-white fw-semibold linksFooter" style="font-size: 18px;">
                    <span class="material-symbols-rounded" style="vertical-align: middle; font-size: 20px;">home</span> Beranda
                </a>
                <hr class="mb-3 mt-3" style="border: 1px solid white; opacity: 1;">
                <a href="/programs" class="text-decoration-none text-white fw-semibold linksFooter" style="font-size: 18px;">
                    <span class="material-symbols-rounded" style="vertical-align: middle; font-size: 20px;">school</span> Programs
                </a>
                <hr class="mb-3 mt-3" style="border: 1px solid white; opacity: 1;">
                <a href="/about-us" class="text-decoration-none text-white fw-semibold linksFooter" style="font-size: 18px;">
                    <span class="material-symbols-rounded" style="vertical-align: middle; font-size: 20px;">emoji_people</span> Tentang Kami
                </a>
                <hr class="mb-3 mt-3" style="border: 1px solid white; opacity: 1;">
                <a href="/enlist" class="text-decoration-none text-white fw-semibold linksFooter" style="font-size: 18px;">
                    <span class="material-symbols-rounded" style="vertical-align: middle; font-size: 20px;">assignment</span> Pendaftaran
                </a>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-HoA13XY0ZyaFqPh2V6F4fy1R6n+YtFTo8ML1v+CTe3YHjpyMfdqUbn7Q3Z3DoaTo" crossorigin="anonymous">
</script>
</body>
</html>
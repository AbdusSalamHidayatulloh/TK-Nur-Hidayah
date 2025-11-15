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
    @include('components.navbar')

    @include('components.mobile-menu')

    <!-- For the navbar under the header -->
    <main class="z-0" style="padding-top: 70px; padding-bottom: 50px;">
        @yield('mainContent')
    </main>
    @include('components.footer')
    <script src="/utility.js"></script>
    <!-- For Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HoA13XY0ZyaFqPh2V6F4fy1R6n+YtFTo8ML1v+CTe3YHjpyMfdqUbn7Q3Z3DoaTo" crossorigin="anonymous">
        </script>
</body>

</html>
<div id="mobile-menu"
    class="mobile-sidebar d-md-none position-fixed end-0 top-0 d-flex p-1 flex-column text-white gap-4 rounded rounded-start-5 shadow-sm gap-3 z-5">
    @auth
        <div class="w-100 d-flex justify-content-center align-items-center">
            <img src="/image/logo/logo.png" width="120" height="120" alt="TK/KB Nur Hidayah logo">
        </div>
        <div class="d-flex justify-content-center">
            <hr class="mt-0 mb-0 border border-1 border-black w-75">
        </div>
        <a href="/student-list" class="text-decoration-none w-100 text-black fs-5 fw-bolder mx-4">List Murid</a>
        @if (auth()->user()->role === 'admin')
            <a href="/teacher-list" class="text-decoration-none w-100 text-black fs-5 fw-bolder mx-4">List Guru</a>
        @elseif(auth()->user()->role === 'teacher')
            <a href="/sccount-edit" class="text-decoration-none w-100 text-black fs-5 fw-bolder mx-4">Edit Akun</a>
        @endif
        <a href="/event-list" class="text-decoration-none w-100 text-black fs-5 fw-bolder mx-4">Event</a>
        <a href="/" class="text-decoration-none w-100 text-black fs-5 fw-bolder mx-4">Logout</a>
    @endauth

    @guest
        <p class="text-decoration-none w-100 text-black fs-5 fw-bolder mx-4">Unauthorized User!</p>
    @endguest
</div>
<div id="overlay" class="overlay position-fixed top-0 start-0 w-100 h-100 d-md-none z-3"></div>

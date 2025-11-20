<footer class="bg-green-gradient-footer py-5 mt-auto">
    <div class="container">
        <div class="d-flex flex-md-row flex-column justify-content-evenly align-items-center gap-4">
            <img width="170" height="170" src="/image/logo/logo.png">
            @auth
                <div class="d-flex flex-column gap-2">
                    <a href="/student-list" class="text-decoration-none text-white fw-semibold linksFooter mb-0 mt-0"
                        style="font-size: 20px;">
                        <span class="material-symbols-rounded"
                            style="vertical-align: middle; font-size: 24px;">school</span> List Murid
                    </a>
                    @if (auth()->user()->role === 'admin')
                        <a href="/teacher-list" class="text-decoration-none text-white fw-semibold linksFooter mb-0 mt-0"
                            style="font-size: 20px;">
                            <span class="material-symbols-rounded"
                                style="vertical-align: middle; font-size: 24px;">emoji_people</span> List Guru
                        </a>
                    @elseif(auth()->user()->role === 'teacher')
                        <a href="/account-edit/" class="text-decoration-none text-white fw-semibold linksFooter mb-0 mt-0"
                            style="font-size: 20px;">
                            <span class="material-symbols-rounded"
                                style="vertical-align: middle; font-size: 24px;">emoji_people</span> List Guru
                        </a>
                    @endif
                    <a href="/event-list" class="text-decoration-none text-white fw-semibold linksFooter mb-0 mt-0"
                        style="font-size: 20px;">
                        <span class="material-symbols-rounded"
                            style="vertical-align: middle; font-size: 24px;">assignment</span> Event
                    </a>
                </div>
                <!-- Somded -->
                <div class="d-flex flex-column align-items-center">
                    <p class="text-white">Jika ada masalah, hubungi operator</p>
                    <div class="d-flex flex-row gap-3">
                        <a href="https://api.whatsapp.com/send?phone=6285706339931&" target="_blank"
                            rel="noopener noreferrer">
                            <img src="/image/logo/whatsapp.png" width="50" height="50"
                                class="rounded border border-2 border-white" alt="Whatsapp Logo" />
                        </a>
                    </div>
                    <p class="pt-4 text-white">©2025 Nur Hidayah</p>
                </div>
            @endauth
        </div>
    </div>
</footer>

<style>
    .guru-sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background: #FFFFFF;
        padding: 25px 18px;
        border-right: 1px solid #E5E7EB;
        overflow-y: auto;
        z-index: 100;
        transition: transform 0.3s ease;
    }

    .guru-sidebar .brand {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #315BFF;
    font-size: 22px;
    font-weight: bold;
    margin-bottom: 35px;
}

    .guru-sidebar .brand img {
        width: 36px;
        height: 36px;
        object-fit: contain;
    }

    .guru-sidebar .menu-title {
    font-size: 12px;
    color: #9CA3AF;
    margin: 20px 10px 12px;
    font-weight: bold;
}

    .guru-sidebar nav a {
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        color: #5C6578;
        padding: 13px 12px;
        margin-bottom: 7px;
        border-radius: 9px;
        font-size: 14px;
        transition: 0.2s;
    }

    .guru-sidebar nav a:hover {
        background: #EEF3FF;
        color: #315BFF;
    }

    .guru-sidebar nav a.active {
        background: linear-gradient(135deg, #315BFF, #8B5CF6);
        color: #FFFFFF;
    }

    .guru-sidebar .logout {
        margin-top: 25px;
    }

    .guru-sidebar .logout button {
        width: 100%;
        padding: 12px;
        border: 0;
        border-radius: 9px;
        background: #FFF0F0;
        color: #D63C3C;
        cursor: pointer;
        font-size: 14px;
        text-align: left;
    }

    @media (max-width: 700px) {
        .guru-sidebar {
            width: 260px;
            transform: translateX(-100%);
        }

        body.sidebar-open .guru-sidebar {
            transform: translateX(0);
        }
    }
</style>

<aside class="guru-sidebar" id="sidebar">
    <div class="brand">
        <img src="{{ asset('images/logo-bk.png') }}" alt="Logo BKConnect">
        <span>BKConnect</span>
    </div>

    <div class="menu-title">MENU UTAMA</div>

    <nav>
        <a href="{{ route('dashboard.guru_bk') }}"
           class="{{ request()->routeIs('dashboard.guru_bk') ? 'active' : '' }}">
            🏠 Dashboard
        </a>

        <a href="{{ route('counseling-requests.index') }}"
           class="{{ request()->routeIs('counseling-requests.*') ? 'active' : '' }}">
            💬 Pengajuan Konseling
        </a>

        <a href="{{ route('schedules.index') }}"
           class="{{ request()->routeIs('schedules.*') ? 'active' : '' }}">
            📅 Jadwal Konseling
        </a>

        <a href="{{ url('/riwayat-konseling') }}"
           class="{{ request()->is('riwayat-konseling*') ? 'active' : '' }}">
            📋 Riwayat Konseling
        </a>

        <a href="{{ route('guru-bk.perkembangan-wali') }}"
           class="{{ request()->routeIs('guru-bk.perkembangan-wali') ? 'active' : '' }}">
            📨 Perkembangan Wali Kelas
        </a>
    </nav>

    <div class="logout">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">🚪 Keluar</button>
        </form>
    </div>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuToggle = document.getElementById('menuToggle');

        if (!menuToggle) {
            return;
        }

        if (window.innerWidth <= 700) {
            menuToggle.setAttribute('aria-expanded', 'false');
        }

        document.addEventListener('click', function (event) {
            if (window.innerWidth <= 700 && event.target.closest('#menuToggle')) {
                document.body.classList.toggle('sidebar-open');
                menuToggle.setAttribute('aria-expanded', String(document.body.classList.contains('sidebar-open')));
                event.stopImmediatePropagation();
            }
        }, true);
    });
</script>

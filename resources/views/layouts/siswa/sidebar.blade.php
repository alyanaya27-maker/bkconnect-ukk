<style>
    .siswa-sidebar {
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

    .siswa-sidebar .brand {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #315BFF;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 15px;
}

    .siswa-sidebar .brand img {
    width: 48px;
    height: 48px;
    object-fit: contain;
    flex-shrink: 0;
}

    .siswa-sidebar .menu-title {
    font-size: 11px;
    font-weight: 600;
    color: #9CA3AF;
    padding: 0 12px;
    margin-bottom: 10px;
    text-transform: uppercase;
}

    .siswa-sidebar nav a {
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

    .siswa-sidebar nav a:hover {
        background: #EEF3FF;
        color: #315BFF;
    }

    .siswa-sidebar nav a.active {
        background: linear-gradient(135deg, #315BFF, #8B5CF6);
        color: #FFFFFF;
    }

    .siswa-sidebar .logout {
        margin-top: 25px;
    }

    .siswa-sidebar .logout button {
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
        .siswa-sidebar {
            width: 260px;
            transform: translateX(-100%);
        }

        body.sidebar-open .siswa-sidebar {
            transform: translateX(0);
        }
    }
</style>

<aside class="siswa-sidebar" id="sidebar">
    <div class="brand">
        <img src="{{ asset('images/logo-bk.png') }}" alt="Logo BKConnect">
        <span>BKConnect</span>
    </div>

    <div class="menu-title">MENU UTAMA</div>

    <nav>
        <a href="{{ route('dashboard.siswa') }}"
           class="{{ request()->routeIs('dashboard.siswa') ? 'active' : '' }}">
            🏠 Dashboard
        </a>

        <a href="{{ url('/pengajuan-konseling/create') }}"
           class="{{ request()->is('pengajuan-konseling*') ? 'active' : '' }}">
            💬 Pengajuan Konseling
        </a>

        <a href="{{ url('/jadwal-konseling') }}"
           class="{{ request()->is('jadwal-konseling*') ? 'active' : '' }}">
            📅 Jadwal Konseling
        </a>

        <a href="{{ url('/riwayat-konseling') }}"
           class="{{ request()->is('riwayat-konseling*') ? 'active' : '' }}">
            📋 Riwayat Konseling
        </a>

        <a href="{{ route('profile.index') }}"
           class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">
            👤 Profil
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

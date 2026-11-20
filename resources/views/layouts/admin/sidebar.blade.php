<style>
    .admin-sidebar {
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

    .admin-sidebar .brand {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 5px 10px 30px;
    }

    .admin-sidebar .brand img {
        width: 48px;
        height: 48px;
        object-fit: contain;
    }

    .admin-sidebar .brand-text {
        font-size: 20px;
        font-weight: 700;
        color: #315BFF;
    }

    .admin-sidebar .menu-title {
        font-size: 11px;
        font-weight: 600;
        color: #9CA3AF;
        padding: 0 12px;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .admin-sidebar .menu a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 13px 12px;
        margin-bottom: 7px;
        border-radius: 9px;
        text-decoration: none;
        color: #5C6578;
        font-size: 14px;
        transition: 0.2s;
    }

    .admin-sidebar .menu a:hover {
        background: #EEF3FF;
        color: #315BFF;
    }

    .admin-sidebar .menu a.active {
        background: linear-gradient(135deg, #315BFF, #8B5CF6);
        color: #FFFFFF;
    }

    .admin-sidebar .menu-icon {
        width: 22px;
        text-align: center;
        font-size: 17px;
    }

    .admin-sidebar .logout-form {
        margin-top: 25px;
    }

    .admin-sidebar .logout-form button {
        display: flex;
        align-items: center;
        gap: 10px;
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 9px;
        background: #FFF0F0;
        color: #D63C3C;
        cursor: pointer;
        font-size: 14px;
        text-align: left;
    }

    @media (max-width: 700px) {
        .admin-sidebar {
            width: 260px;
            transform: translateX(-100%);
        }

        body.sidebar-open .admin-sidebar {
            transform: translateX(0);
        }
    }
</style>

<aside class="admin-sidebar" id="sidebar">

    <div class="brand">
        <img src="{{ asset('images/logo-bk.png') }}" alt="Logo BKConnect">
        <span class="brand-text">BKConnect</span>
    </div>

    <div class="menu-title">MENU UTAMA</div>

    <nav class="menu">

        <a href="{{ route('dashboard.admin') }}"
           class="{{ request()->routeIs('dashboard.admin') ? 'active' : '' }}">
            <span class="menu-icon">🏠</span>
            <span>Dashboard</span>
        </a>

        <a href="/guru-bk"
           class="{{ request()->is('guru-bk*') ? 'active' : '' }}">
            <span class="menu-icon">👨‍🏫</span>
            <span>Data Guru BK</span>
        </a>

        <a href="/wali-kelas"
           class="{{ request()->is('wali-kelas*') ? 'active' : '' }}">
            <span class="menu-icon">📚</span>
            <span>Data Wali Kelas</span>
        </a>

        <a href="{{ route('admin.users.index') }}"
           class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <span class="menu-icon">👥</span>
            <span>Pengelolaan Akun</span>
        </a>

        <a href="{{ route('admin.settings') }}"
   class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}">
    <span class="menu-icon">⚙️</span>
    <span>Pengaturan</span>
</a>

        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit">
                <span class="menu-icon">🚪</span>
                <span>Keluar</span>
            </button>
        </form>

    </nav>
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

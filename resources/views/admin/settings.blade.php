<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - BKConnect</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #F1F5FF;
            color: #25304A;
        }

        .main {
            margin-left: 250px;
            padding: 28px;
            min-width: 0;
            transition: margin-left 0.3s ease;
        }

        body.sidebar-closed .admin-sidebar {
            transform: translateX(-100%);
        }

        body.sidebar-closed .main {
            margin-left: 0;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .menu-toggle {
            width: 42px;
            height: 42px;
            border: 1px solid #E5E7EB;
            border-radius: 10px;
            background: #FFFFFF;
            color: #315BFF;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }

        .page-heading h3 {
            font-size: 20px;
            color: #24345B;
        }

        .page-heading p {
            font-size: 13px;
            color: #778198;
            margin-top: 5px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .notification {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 10px;
            font-size: 18px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #FFFFFF;
            padding: 8px 14px;
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .profile-info {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .profile-name {
            font-size: 13px;
            font-weight: bold;
        }

        .profile-info small {
            font-size: 11px;
            color: #778198;
        }

        .content-card {
            background: #FFFFFF;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.04);
        }

        .section-title {
            font-size: 18px;
            color: #24345B;
            margin-bottom: 8px;
        }

        .section-description {
            color: #778198;
            font-size: 14px;
        }

        @media (max-width: 600px) {
            .main {
                padding: 18px;
            }

            .topbar {
                align-items: flex-start;
            }

            .topbar-right {
                gap: 6px;
            }
        }

.setting-section {
    margin-top: 25px;
}

.setting-section h3 {
    margin-bottom: 18px;
    color: #315BFF;
    font-size: 17px;
}

.setting-item {
    margin-bottom: 18px;
}

.setting-item label {
    display: block;
    margin-bottom: 8px;
    font-size: 14px;
    font-weight: 600;
    color: #455A64;
}

.setting-item input,
.setting-item textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #E5E7EB;
    border-radius: 8px;
    background: #F8FAFC;
    font-size: 14px;
    color: #455A64;
}

.setting-item textarea {
    min-height: 85px;
    resize: none;
}

    </style>
</head>

<body>

@include('layouts.admin.sidebar')

<main class="main">

    <header class="topbar">
        <div class="topbar-left">
            <button
                type="button"
                class="menu-toggle"
                id="menuToggle"
                aria-label="Buka atau tutup menu"
                aria-expanded="true"
                aria-controls="sidebar"
            >☰</button>

            <div class="page-heading">
                <h3>Pengaturan</h3>
                <p>Pengaturan sistem BKConnect</p>
            </div>
        </div>

        <div class="topbar-right">
            <div class="notification">🔔</div>

            <div class="profile">
                <span>👤</span>
                <div class="profile-info">
                    <span class="profile-name">{{ auth()->user()->name }}</span>
                    <small>Admin</small>
                </div>
            </div>
        </div>
    </header>

    <div class="content-card">
    <h2>Pengaturan Sistem</h2>
    <p>Kelola informasi dan pengaturan aplikasi BKConnect.</p>

    <div class="setting-section">
        <h3>Identitas Aplikasi</h3>

        <div class="setting-item">
            <label>Nama Aplikasi</label>
            <input type="text" value="BKConnect" readonly>
        </div>

        <div class="setting-item">
            <label>Deskripsi Aplikasi</label>
            <textarea readonly>Sistem Informasi Bimbingan Konseling dan Konseling Sekolah.</textarea>
        </div>
    </div>
</div>
<div class="setting-section">
    <h3>Informasi Sistem</h3>

    <div class="setting-item">
        <label>Nama Sistem</label>
        <input type="text" value="BKConnect - Sistem BK & Konseling" readonly>
    </div>

    <div class="setting-item">
        <label>Versi Aplikasi</label>
        <input type="text" value="1.0.0" readonly>
    </div>

    <div class="setting-item">
        <label>Jenis Sistem</label>
        <input type="text" value="Sistem Informasi Bimbingan dan Konseling Sekolah" readonly>
    </div>

    <div class="setting-section">
    <h3>Pengaturan Tampilan</h3>

    <div class="setting-item">
        <label>Warna Utama</label>
        <input type="text" value="#315BFF - Biru" readonly>
    </div>

    <div class="setting-item">
        <label>Warna Sekunder</label>
        <input type="text" value="#8B5CF6 - Ungu" readonly>
    </div>

    <div class="setting-item">
        <label>Tema Aplikasi</label>
        <input type="text" value="Terang (Light Mode)" readonly>
    </div>
</div>
</div>
</main>

<script>
    const menuToggle = document.getElementById('menuToggle');

    menuToggle.addEventListener('click', function () {
        document.body.classList.toggle('sidebar-closed');

        const isExpanded =
            !document.body.classList.contains('sidebar-closed');

        menuToggle.setAttribute('aria-expanded', isExpanded);
    });
</script>

</body>
</html>

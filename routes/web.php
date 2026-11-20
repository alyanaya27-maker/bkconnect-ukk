<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GuruBkController;
use App\Http\Controllers\WaliKelasController;
use App\Http\Controllers\CounselingRequestController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\StudentDevelopmentReportController;


Route::get('/', function () {
    return view('landing');
})->name('landing');

// Register
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

// Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);


// Lupa Password
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', [App\Http\Controllers\PasswordResetController::class, 'sendResetLink'])
    ->name('password.email');



// Halaman Reset Password
Route::get('/reset-password/{token}', function (\Illuminate\Http\Request $request, string $token) {
    return view('auth.reset-password', [
        'token' => $token,
        'email' => $request->query('email'),
    ]);
})->name('password.reset');

// Proses Reset Password
Route::post('/reset-password', [App\Http\Controllers\PasswordResetController::class, 'resetPassword'])
    ->name('password.update');

Route::get('/dashboard/siswa', function () {

    return view('dashboard.siswa', [
        'user' => Auth::user()
    ]);

})->middleware(['auth', 'role:siswa'])->name('dashboard.siswa');


// Khusus Admin: mengelola Data Siswa
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/students/create', [StudentController::class, 'create'])
        ->name('students.create');

    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])
        ->name('students.edit');

    Route::post('/students', [StudentController::class, 'store'])
        ->name('students.store');

    Route::put('/students/{student}', [StudentController::class, 'update'])
        ->name('students.update');

    Route::delete('/students/{student}', [StudentController::class, 'destroy'])
        ->name('students.destroy');

    Route::get('/students', [StudentController::class, 'index'])
        ->name('students.index');

});

Route::get('/riwayat-konseling', function () {
    $user = auth()->user();

    $query = \App\Models\CounselingRequest::with(['student', 'schedule'])->latest();

    if ($user->role === 'siswa') {
        $student = \App\Models\Student::where('user_id', $user->id)->first();

        if ($student) {
            $query->where('student_id', $student->id);
        } else {
            $query->whereRaw('1 = 0');
        }
    } elseif ($user->role !== 'guru_bk') {
        abort(403, 'Kamu tidak memiliki akses ke halaman ini.');
    }

    $requests = $query->get();

    return view('riwayat-konseling', compact('requests'));
})->middleware(['auth', 'role:siswa,guru_bk'])->name('riwayat-konseling');


Route::middleware(['auth', 'role:guru_bk'])->group(function () {
    Route::get('/counseling-requests/{counselingRequest}/logbook',
        [CounselingRequestController::class, 'logbook'])
        ->name('counseling-requests.logbook');

    Route::post('/counseling-requests/{counselingRequest}/logbook',
        [CounselingRequestController::class, 'simpanLogbook'])
        ->name('counseling-requests.logbook.store');
});

Route::get('/riwayat-konseling/cetak', function (\Illuminate\Http\Request $request) {
    $query = \App\Models\CounselingRequest::with(['student', 'schedule'])->latest();

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('bulan')) { // format: 2026-11
        $query->whereHas('schedule', fn ($q) =>
            $q->whereRaw("DATE_FORMAT(tanggal, '%Y-%m') = ?", [$request->bulan])
        );
    }

    return view('cetak-riwayat', ['requests' => $query->get()]);
})->middleware(['auth', 'role:guru_bk'])->name('riwayat-konseling.cetak');


Route::middleware(['auth', 'role:admin'])->group(function () {


    Route::get('/guru-bk', [GuruBkController::class, 'index'])
        ->name('guru-bk.index');

    Route::get('/guru-bk/create', [GuruBkController::class, 'create'])
        ->name('guru-bk.create');

    Route::post('/guru-bk', [GuruBkController::class, 'store'])
        ->name('guru-bk.store');

    Route::get('/guru-bk/{guruBk}/edit', [GuruBkController::class, 'edit'])
        ->name('guru-bk.edit');

    Route::put('/guru-bk/{guruBk}', [GuruBkController::class, 'update'])
        ->name('guru-bk.update');

    Route::delete('/guru-bk/{guruBk}', [GuruBkController::class, 'destroy'])
        ->name('guru-bk.destroy');

});


// Pengelolaan Data Wali Kelas khusus Admin
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/wali-kelas', [WaliKelasController::class, 'index'])
        ->name('wali-kelas.index');

    Route::get('/wali-kelas/create', [WaliKelasController::class, 'create'])
        ->name('wali-kelas.create');

    Route::post('/wali-kelas', [WaliKelasController::class, 'store'])
        ->name('wali-kelas.store');

});

// Fitur Wali Kelas untuk melihat data siswa
Route::middleware(['auth', 'role:wali_kelas'])->group(function () {

    Route::get('/wali-kelas/data-siswa', [WaliKelasController::class, 'dataSiswa'])
        ->name('wali-kelas.data-siswa');

    Route::get('/wali-kelas/data-siswa/{student}', [WaliKelasController::class, 'detailSiswa'])
        ->name('wali-kelas.detail-siswa');

    Route::get('/wali-kelas/perkembangan-siswa', [StudentDevelopmentReportController::class, 'waliIndex'])
        ->name('wali-kelas.perkembangan');

    Route::post('/wali-kelas/perkembangan-siswa', [StudentDevelopmentReportController::class, 'store'])
        ->name('wali-kelas.perkembangan.store');

});

Route::middleware(['auth', 'role:guru_bk'])->group(function () {
    Route::get('/pengajuan-konseling', [CounselingRequestController::class, 'index'])
        ->name('counseling-requests.index');
    Route::patch('/pengajuan-konseling/{id}/status', [CounselingRequestController::class, 'updateStatus'])
        ->name('counseling-requests.updateStatus');
});

Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/pengajuan-konseling/create', [CounselingRequestController::class, 'create'])
        ->name('counseling-requests.create');

    Route::post('/pengajuan-konseling', [CounselingRequestController::class, 'store'])
        ->name('counseling-requests.store');
});

// Profil Siswa, Guru BK, dan Wali Kelas
    Route::middleware(['auth', 'role:siswa,guru_bk,wali_kelas'])->group(function () {

    Route::get('/profil', [ProfileController::class, 'index'])
        ->name('profile.index');

    Route::put('/profil', [ProfileController::class, 'update'])
        ->name('profile.update');

});


Route::middleware(['auth', 'role:guru_bk'])->group(function () {
    Route::get('/jadwal-konseling/create', [ScheduleController::class, 'create'])
        ->name('schedules.create');

    Route::post('/jadwal-konseling', [ScheduleController::class, 'store'])
        ->name('schedules.store');
});

Route::middleware(['auth', 'role:guru_bk,siswa'])->group(function () {
    Route::get('/jadwal-konseling', [ScheduleController::class, 'index'])
        ->name('schedules.index');
});


Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/dashboard/admin', function () {
    return view('dashboard.admin');
})->middleware(['auth', 'role:admin'])
  ->name('dashboard.admin');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/pengelolaan-akun', [AdminUserController::class, 'index'])
        ->name('admin.users.index');

    Route::get('/admin/pengelolaan-akun/tambah', [AdminUserController::class, 'create'])
        ->name('admin.users.create');

    Route::get('/admin/pengelolaan-akun/{user}/edit', [AdminUserController::class, 'edit'])
        ->name('admin.users.edit');

    Route::post('/admin/pengelolaan-akun', [AdminUserController::class, 'store'])
        ->name('admin.users.store');

    Route::put('/admin/pengelolaan-akun/{user}', [AdminUserController::class, 'update'])
        ->name('admin.users.update');

    Route::delete('/admin/pengelolaan-akun/{user}', [AdminUserController::class, 'destroy'])
        ->name('admin.users.destroy');

    Route::get('/admin/pengaturan', function () {
    return view('admin.settings');
})->name('admin.settings');
});

Route::get('/dashboard/guru-bk', function () {
    return view('dashboard.guru_bk');
})->middleware(['auth', 'role:guru_bk'])
  ->name('dashboard.guru_bk');

Route::get('/guru-bk/perkembangan-wali-kelas', [StudentDevelopmentReportController::class, 'guruIndex'])
    ->middleware(['auth', 'role:guru_bk'])
    ->name('guru-bk.perkembangan-wali');

Route::get('/dashboard/wali-kelas', function () {
    $user = Auth::user();

    $waliKelas = \App\Models\WaliKelas::where(
        'user_id',
        $user->id
    )->firstOrFail();

    $jumlahSiswa = \App\Models\Student::where('kelas', $waliKelas->kelas)
        ->where('wali_kelas', $waliKelas->nama)
        ->count();

    return view('dashboard.wali-kelas', compact(
        'user',
        'waliKelas',
        'jumlahSiswa'
    ));
})->middleware(['auth', 'role:wali_kelas'])->name('dashboard.wali_kelas');

Route::get('/admin/pengajuan-konseling', function () {
    $requests = \App\Models\CounselingRequest::query()
        ->select('id', 'student_id', 'status', 'created_at')
        ->with('student:id,nama')
        ->latest()
        ->get();

    return view('admin.pengajuan-konseling', compact('requests'));
})->middleware(['auth', 'role:admin'])
  ->name('admin.pengajuan-konseling');

<?php

return [
    'required' => ':attribute wajib diisi.',
    'unique' => ':attribute sudah terdaftar.',
    'email' => ':attribute harus berupa alamat email yang valid.',
    'min' => [
        'string' => ':attribute minimal harus :min karakter.',
    ],
    'max' => [
        'string' => ':attribute maksimal :max karakter.',
    ],
    'confirmed' => 'Konfirmasi :attribute tidak cocok.',
    'date' => ':attribute harus berupa tanggal yang valid.',
    'after' => ':attribute harus setelah tanggal atau waktu yang ditentukan.',
    'after_or_equal' => ':attribute harus setelah atau sama dengan tanggal yang ditentukan.',
    'exists' => ':attribute yang dipilih tidak valid.',
    'numeric' => ':attribute harus berupa angka.',
    'string' => ':attribute harus berupa teks.',

    'attributes' => [
        'nis' => 'NIS',
        'nama' => 'Nama',
        'email' => 'Email',
        'password' => 'Password',
        'kelas' => 'Kelas',
        'jurusan' => 'Jurusan',
        'tanggal' => 'Tanggal',
        'jam_mulai' => 'Jam mulai',
        'jam_selesai' => 'Jam selesai',
    ],
];

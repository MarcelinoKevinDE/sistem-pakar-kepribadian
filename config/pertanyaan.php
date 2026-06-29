<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Daftar Pertanyaan
    |--------------------------------------------------------------------------
    | Setiap pertanyaan memiliki 5 pilihan jawaban dengan bobot 1-5.
    | Atribut 'reverse' = true berarti bobot jawaban akan dibalik saat
    | dihitung (6 - bobot), digunakan untuk pernyataan yang mengindikasikan
    | kecenderungan introvert agar tetap konsisten pada skala extrovert.
    |--------------------------------------------------------------------------
    */
    'pertanyaan' => [
        [
            'id'      => 1,
            'teks'    => 'Saya merasa lebih berenergi ketika berada di tengah banyak orang dibandingkan ketika sendirian.',
            'reverse' => false,
        ],
        [
            'id'      => 2,
            'teks'    => 'Saya lebih nyaman menghabiskan waktu sendirian untuk merenung dan mengisi ulang energi.',
            'reverse' => true,
        ],
        [
            'id'      => 3,
            'teks'    => 'Saya mudah memulai percakapan dengan orang yang baru saya kenal.',
            'reverse' => false,
        ],
        [
            'id'      => 4,
            'teks'    => 'Saya membutuhkan waktu menyendiri setelah mengikuti aktivitas sosial yang panjang.',
            'reverse' => true,
        ],
        [
            'id'      => 5,
            'teks'    => 'Saya merasa nyaman menjadi pusat perhatian dalam suatu acara atau pertemuan.',
            'reverse' => false,
        ],
        [
            'id'      => 6,
            'teks'    => 'Saya lebih cenderung mendengarkan dibandingkan banyak berbicara dalam diskusi kelompok.',
            'reverse' => true,
        ],
        [
            'id'      => 7,
            'teks'    => 'Saya cenderung mengambil keputusan dengan cepat melalui diskusi terbuka bersama orang lain.',
            'reverse' => false,
        ],
        [
            'id'      => 8,
            'teks'    => 'Saya lebih suka memikirkan suatu masalah secara mendalam sebelum membicarakannya dengan orang lain.',
            'reverse' => true,
        ],
        [
            'id'      => 9,
            'teks'    => 'Saya senang menghadiri acara sosial meskipun belum mengenal banyak orang di sana.',
            'reverse' => false,
        ],
        [
            'id'      => 10,
            'teks'    => 'Saya merasa lebih produktif saat bekerja dalam suasana yang tenang dan minim interaksi sosial.',
            'reverse' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Pilihan Jawaban (Skala Likert)
    |--------------------------------------------------------------------------
    */
    'pilihan' => [
        ['bobot' => 1, 'teks' => 'Sangat Tidak Setuju'],
        ['bobot' => 2, 'teks' => 'Tidak Setuju'],
        ['bobot' => 3, 'teks' => 'Netral'],
        ['bobot' => 4, 'teks' => 'Setuju'],
        ['bobot' => 5, 'teks' => 'Sangat Setuju'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Aturan Klasifikasi (Rule Base)
    |--------------------------------------------------------------------------
    | Rentang skor minimal 10 (10 x 1) dan maksimal 50 (10 x 5).
    |--------------------------------------------------------------------------
    */
    'klasifikasi' => [
        [
            'nama'        => 'Introvert Dominan',
            'batas_bawah' => 10,
            'batas_atas'  => 23,
            'deskripsi'   => 'Individu dengan kecenderungan ini umumnya memperoleh energi dari waktu menyendiri, lebih menyukai interaksi yang mendalam dalam kelompok kecil, dan cenderung memproses informasi secara internal sebelum menyampaikannya.',
        ],
        [
            'nama'        => 'Ambivert (Seimbang)',
            'batas_bawah' => 24,
            'batas_atas'  => 36,
            'deskripsi'   => 'Individu dengan kecenderungan ini menunjukkan keseimbangan antara kebutuhan interaksi sosial dan waktu pribadi, serta mampu menyesuaikan gaya komunikasi sesuai dengan situasi yang dihadapi.',
        ],
        [
            'nama'        => 'Extrovert Dominan',
            'batas_bawah' => 37,
            'batas_atas'  => 50,
            'deskripsi'   => 'Individu dengan kecenderungan ini umumnya memperoleh energi dari interaksi sosial, merasa nyaman berada di tengah perhatian, dan cenderung memproses pemikiran melalui percakapan dengan orang lain.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Catatan / Disclaimer
    |--------------------------------------------------------------------------
    */
    'disclaimer' => 'Hasil tes ini bersifat indikatif dan berfungsi sebagai alat bantu observasi awal kecenderungan kepribadian. Untuk interpretasi klinis yang akurat, hasil ini perlu dikombinasikan dengan wawancara dan penilaian profesional oleh psikolog yang berwenang.',

];
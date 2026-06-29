<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesKepribadianController extends Controller
{
    /**
     * Menampilkan halaman tes kepribadian.
     */
    public function index()
    {
        $pertanyaan = config('pertanyaan.pertanyaan');
        $pilihan    = config('pertanyaan.pilihan');

        return view('tes', compact('pertanyaan', 'pilihan'));
    }

    /**
     * Memproses jawaban, menghitung skor, dan menentukan klasifikasi.
     */
    public function proses(Request $request)
    {
        $pertanyaan  = config('pertanyaan.pertanyaan');
        $klasifikasi = config('pertanyaan.klasifikasi');
        $disclaimer  = config('pertanyaan.disclaimer');

        // Validasi: setiap pertanyaan wajib dijawab dengan bobot 1-5.
        $aturanValidasi = [];
        foreach ($pertanyaan as $item) {
            $aturanValidasi["jawaban.{$item['id']}"] = 'required|integer|min:1|max:5';
        }
        $request->validate($aturanValidasi, [], [
            'jawaban.*' => 'pertanyaan',
        ]);

        // Hitung total skor dengan memperhitungkan bobot reverse.
        $totalSkor = 0;

        foreach ($pertanyaan as $item) {
            $bobotTerpilih = (int) $request->input("jawaban.{$item['id']}");
            $bobotEfektif  = $item['reverse'] ? (6 - $bobotTerpilih) : $bobotTerpilih;
            $totalSkor    += $bobotEfektif;
        }

        // Tentukan klasifikasi berdasarkan rentang skor (rule-based).
        $hasilKlasifikasi = collect($klasifikasi)->first(function ($kelas) use ($totalSkor) {
            return $totalSkor >= $kelas['batas_bawah'] && $totalSkor <= $kelas['batas_atas'];
        });

        $skorMaksimal = count($pertanyaan) * 5;
        $skorMinimal  = count($pertanyaan) * 1;
        $persentase   = round((($totalSkor - $skorMinimal) / ($skorMaksimal - $skorMinimal)) * 100);

        return view('hasil', [
            'totalSkor'    => $totalSkor,
            'skorMaksimal' => $skorMaksimal,
            'persentase'   => $persentase,
            'klasifikasi'  => $hasilKlasifikasi,
            'disclaimer'   => $disclaimer,
        ]);
    }
}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Klasifikasi Kepribadian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased">

    <div class="max-w-2xl mx-auto py-12 px-6">

        <header class="mb-8 text-center">
            <p class="text-sm font-semibold tracking-widest text-indigo-700 uppercase">Hasil Analisis</p>
            <h1 class="text-3xl font-bold text-slate-900 mt-2">Laporan Klasifikasi Kepribadian</h1>
        </header>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8">

            <div class="mb-6">
                <p class="text-sm text-slate-500 mb-1">Kecenderungan Dominan</p>
                <h2 class="text-2xl font-bold text-indigo-700">{{ $klasifikasi['nama'] }}</h2>
            </div>

            <div class="mb-6">
                <div class="flex justify-between text-sm text-slate-500 mb-1">
                    <span>Skor Total</span>
                    <span>{{ $totalSkor }} / {{ $skorMaksimal }}</span>
                </div>
                <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                    <div class="h-2 bg-indigo-600 rounded-full" style="width: {{ $persentase }}%;"></div>
                </div>
            </div>

            <div class="mb-6">
                <p class="text-sm font-semibold text-slate-700 mb-2">Interpretasi</p>
                <p class="text-sm text-slate-600 leading-relaxed">
                    {{ $klasifikasi['deskripsi'] }}
                </p>
            </div>

            <div class="rounded-lg bg-slate-50 border border-slate-200 px-4 py-3">
                <p class="text-xs text-slate-500 leading-relaxed">
                    {{ $disclaimer }}
                </p>
            </div>

        </div>

        <div class="mt-8 text-center">
            
                href="{{ route('tes.index') }}"
                class="inline-block text-sm font-medium text-indigo-700 hover:text-indigo-900"
            >
                Ulangi Tes
            </a>
        </div>

    </div>

</body>
</html>
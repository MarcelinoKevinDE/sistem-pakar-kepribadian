<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Klasifikasi Kepribadian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased">

    <div class="max-w-3xl mx-auto py-12 px-6">

        <header class="mb-10 text-center">
            <p class="text-sm font-semibold tracking-widest text-indigo-700 uppercase">Sistem Pakar Psikologi</p>
            <h1 class="text-3xl font-bold text-slate-900 mt-2">Tes Klasifikasi Kepribadian</h1>
            <p class="text-slate-500 mt-3 max-w-xl mx-auto">
                Jawablah setiap pernyataan berikut sesuai dengan kondisi diri Anda yang sebenarnya.
                Tidak ada jawaban benar atau salah.
            </p>
        </header>

        @if ($errors->any())
            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                Mohon lengkapi seluruh pertanyaan sebelum melanjutkan.
            </div>
        @endif

        <form action="{{ route('tes.proses') }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-slate-200 p-8 space-y-8">
            @csrf

            @foreach ($pertanyaan as $index => $item)
                <fieldset class="pb-8 {{ !$loop->last ? 'border-b border-slate-100' : '' }}">
                    <legend class="text-base font-medium text-slate-800 mb-4">
                        <span class="text-indigo-700 font-semibold mr-2">{{ $index + 1 }}.</span>
                        {{ $item['teks'] }}
                    </legend>

                    <div class="grid grid-cols-5 gap-2">
                        @foreach ($pilihan as $opsi)
                            <label class="flex flex-col items-center gap-2 cursor-pointer group">
                                <input
                                    type="radio"
                                    name="jawaban[{{ $item['id'] }}]"
                                    value="{{ $opsi['bobot'] }}"
                                    required
                                    class="h-4 w-4 text-indigo-600 border-slate-300 focus:ring-indigo-500"
                                >
                                <span class="text-xs text-slate-500 text-center leading-tight group-hover:text-slate-800">
                                    {{ $opsi['teks'] }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </fieldset>
            @endforeach

            <div class="pt-2">
                <button
                    type="submit"
                    class="w-full bg-indigo-700 hover:bg-indigo-800 text-white font-semibold py-3 rounded-lg transition-colors duration-150"
                >
                    Lihat Hasil Klasifikasi
                </button>
            </div>
        </form>

        <p class="text-center text-xs text-slate-400 mt-8">
            Seluruh jawaban diproses secara lokal dan tidak disimpan dalam basis data.
        </p>
    </div>

</body>
</html>
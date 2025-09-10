@extends('layouts.app')

@section('title', 'Edit Nilai')

@section('content')
<div class="max-w-xl mx-auto mt-10 px-4">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-indigo-600 mb-6">
            ✏️ Edit Nilai
        </h1>

        <form action="{{ route('homeroom.grades.update', $grade->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Pilih Siswa -->
            <div>
                <label for="student_id" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Siswa
                </label>
                <select name="student_id" id="student_id"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" 
                            {{ $student->id == $grade->student_id ? 'selected' : '' }}>
                            {{ $student->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Pilih Mapel -->
            <div>
                <label for="subject_id" class="block text-sm font-medium text-gray-700 mb-1">
                    Mata Pelajaran
                </label>
                <select name="subject_id" id="subject_id"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" 
                            {{ $subject->id == $grade->subject_id ? 'selected' : '' }}>
                            {{ $subject->subject_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Nilai Tugas -->
            <div>
                <label for="tugas" class="block text-sm font-medium text-gray-700 mb-1">
                    Nilai Tugas
                </label>
                <input type="number" name="tugas" id="tugas"
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       value="{{ $grade->tugas }}" min="0" max="100" required oninput="hitungNilaiAkhir()">
            </div>

            <!-- Nilai UTS -->
            <div>
                <label for="uts" class="block text-sm font-medium text-gray-700 mb-1">
                    Nilai UTS
                </label>
                <input type="number" name="uts" id="uts"
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       value="{{ $grade->uts }}" min="0" max="100" required oninput="hitungNilaiAkhir()">
            </div>

            <!-- Nilai UAS -->
            <div>
                <label for="uas" class="block text-sm font-medium text-gray-700 mb-1">
                    Nilai UAS
                </label>
                <input type="number" name="uas" id="uas"
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       value="{{ $grade->uas }}" min="0" max="100" required oninput="hitungNilaiAkhir()">
            </div>

            <!-- Nilai Akhir -->
            <div>
                <label for="nilai_akhir" class="block text-sm font-medium text-gray-700 mb-1">
                    Nilai Akhir
                </label>
                <input type="number" name="nilai_akhir" id="nilai_akhir"
                       class="w-full px-3 py-2 border rounded-lg bg-gray-100 focus:outline-none"
                       value="{{ $grade->nilai_akhir }}" readonly>
            </div>

            <!-- Tombol -->
            <div class="flex justify-between items-center">
                <a href="{{ route('homeroom.grades.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                    ⬅ Kembali
                </a>
                <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Script Hitung Nilai Akhir -->
<script>
function hitungNilaiAkhir() {
    let tugas = parseFloat(document.getElementById('tugas').value) || 0;
    let uts   = parseFloat(document.getElementById('uts').value) || 0;
    let uas   = parseFloat(document.getElementById('uas').value) || 0;

    let nilaiAkhir = ((tugas + uts + uas) / 3).toFixed(2);
    document.getElementById('nilai_akhir').value = nilaiAkhir;
}
</script>
@endsection

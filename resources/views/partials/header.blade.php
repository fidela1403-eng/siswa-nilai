<header class="bg-indigo-600 text-white shadow-md">
    <div class="container mx-auto flex justify-between items-center px-6 py-4">
        <a href="{{ url('/') }}" class="text-xl font-bold">📘 Sistem Nilai</a>
        <nav class="space-x-6">
            @if(auth()->user()->role == 'admin')
                <a href="{{ route('admin.student.index') }}" class="hover:text-gray-200">Siswa</a>
                <a href="{{ route('admin.subjects.index') }}" class="hover:text-gray-200">Mapel</a>
                <a href="{{ route('admin.classrooms.index') }}" class="hover:text-gray-200">Kelas</a>
                <a href="{{ route('admin.homeroom.index') }}" class="hover:text-gray-200">Wali Kelas</a>
            @elseif(auth()->user()->role == 'homeroom')
                <a href="{{ route('homeroom.dashboard') }}" class="hover:text-gray-200">Dashboard</a>
                <a href="{{ route('homeroom.students.index') }}" class="hover:text-gray-200">Siswa Kelas Saya</a>
                <a href="{{ route('homeroom.grades.index') }}" class="hover:text-gray-200">Nilai Siswa</a>
            @endif
        </nav>

        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                Logout
            </button>
        </form>
    </div>
</header>

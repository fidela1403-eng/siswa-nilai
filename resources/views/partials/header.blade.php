<header class="bg-indigo-600 text-white shadow-md">
    <div class="container mx-auto flex justify-between items-center px-6 py-4">
        <a href="{{ url('/') }}" class="text-xl font-bold">📘 Sistem Nilai</a>
        <nav class="space-x-6">
            <a href="{{ route('homeroom.student.index') }}" class="hover:text-gray-200">Siswa</a>
            <a href="{{ route('homeroom.subjects.index') }}" class="hover:text-gray-200">Mapel</a>
            <a href="{{ route('homeroom.grades.index') }}" class="hover:text-gray-200">Nilai</a>
            <a href="{{ route('homeroom.classrooms.index') }}" class="hover:text-gray-200">Kelas</a>
           
        </nav>
        <form action="{{ route('logout') }}" method="POST" class="inline">
    @csrf
    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
        Logout
    </button>
</form>

    </div>
</header>

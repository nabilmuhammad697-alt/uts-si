<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Departemen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">

                <!-- Tombol Tambah Departemen -->
                <div class="mb-4">
                    <a href="{{ route('departments.create') }}" style="background-color: #2563eb; color: #ffffff; padding: 10px 16px; border-radius: 6px; font-weight: bold; text-decoration: none; display: inline-block;">
                        + Tambah Departemen
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">{{ session('error') }}</div>
                @endif

                <table class="w-full border-collapse border border-gray-300 mt-4 text-gray-900">
                    <thead>
                        <tr class="bg-gray-100 text-gray-900">
                            <th class="border border-gray-300 p-2 text-center" style="width: 10%;">No</th>
                            <th class="border border-gray-300 p-2 text-left" style="width: 60%;">Nama Departemen</th>
                            <th class="border border-gray-300 p-2 text-center" style="width: 30%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departments as $index => $dept)
                        <tr class="text-gray-900">
                            <td class="border border-gray-300 p-2 text-center">{{ $index + 1 }}</td>
                            <td class="border border-gray-300 p-2">{{ $dept->name }}</td>
                            <td class="border border-gray-300 p-2 text-center">
                                <!-- Tombol Edit -->
                                <a href="{{ route('departments.edit', $dept->id) }}" style="background-color: #ca8a04; color: #ffffff; padding: 6px 12px; border-radius: 4px; font-weight: bold; text-decoration: none; display: inline-block; margin-right: 4px;">
                                    Edit
                                </a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('departments.destroy', $dept->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background-color: #dc2626; color: #ffffff; padding: 6px 12px; border-radius: 4px; font-weight: bold; border: none; cursor: pointer;">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

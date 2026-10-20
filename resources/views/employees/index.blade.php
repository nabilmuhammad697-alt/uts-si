<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">

                <!-- Tombol Tambah Pegawai -->
                <div class="mb-4">
                    <a href="{{ route('employees.create') }}" style="background-color: #2563eb; color: #ffffff; padding: 10px 16px; border-radius: 6px; font-weight: bold; text-decoration: none; display: inline-block;">
                        + Tambah Pegawai
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
                @endif

                <table class="w-full border-collapse border border-gray-300 mt-4 text-gray-900">
                    <thead>
                        <tr class="bg-gray-100 text-gray-900">
                            <th class="border border-gray-300 p-2 text-center">No</th>
                            <th class="border border-gray-300 p-2 text-left">Nama Pegawai</th>
                            <th class="border border-gray-300 p-2 text-left">Departemen</th>
                            <th class="border border-gray-300 p-2 text-left">Jabatan</th>
                            <th class="border border-gray-300 p-2 text-left">Gaji</th>
                            <th class="border border-gray-300 p-2 text-center">Tanggal Bergabung</th>
                            <th class="border border-gray-300 p-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $index => $emp)
                        <tr class="text-gray-900">
                            <td class="border border-gray-300 p-2 text-center">{{ $index + 1 }}</td>
                            <td class="border border-gray-300 p-2">{{ $emp->name }}</td>
                            <td class="border border-gray-300 p-2">{{ $emp->department->name ?? '-' }}</td>
                            <td class="border border-gray-300 p-2">{{ $emp->position }}</td>
                            <td class="border border-gray-300 p-2">Rp {{ number_format($emp->salary, 0, ',', '.') }}</td>
                            <td class="border border-gray-300 p-2 text-center">{{ $emp->joined_at }}</td>
                            <td class="border border-gray-300 p-2 text-center">
                                <!-- Tombol Edit -->
                                <a href="{{ route('employees.edit', $emp->id) }}" style="background-color: #ca8a04; color: #ffffff; padding: 6px 12px; border-radius: 4px; font-weight: bold; text-decoration: none; display: inline-block; margin-right: 4px;">
                                    Edit
                                </a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
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

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Tambah Pegawai') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Nama Pegawai</label>
                        <input type="text" name="name" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full text-gray-900" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Departemen</label>
                        <select name="department_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full text-gray-900" required>
                            <option value="">-- Pilih Departemen --</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Jabatan</label>
                        <input type="text" name="position" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full text-gray-900" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Gaji</label>
                        <input type="number" name="salary" min="1" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full text-gray-900" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700">Tanggal Bergabung</label>
                        <input type="date" name="joined_at" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full text-gray-900" required>
                    </div>
                    <button type="submit" style="background-color: #2563eb; color: #ffffff; padding: 10px 20px; border-radius: 6px; font-weight: bold; border: none; cursor: pointer;">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

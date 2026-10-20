<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class KepegawaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat atau memperbarui akun user agar tidak duplikat
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin HRD',
                'password' => Hash::make('password123')
            ]
        );

        // Membuat data departemen
        $it = Department::firstOrCreate(['name' => 'Teknologi Informasi']);
        $hr = Department::firstOrCreate(['name' => 'Sumber Daya Manusia']);
        $fin = Department::firstOrCreate(['name' => 'Keuangan']);

        // Membuat data pegawai
        Employee::create([
            'department_id' => $it->id,
            'name' => 'Andi Saputra',
            'position' => 'Backend Developer',
            'salary' => 8000000,
            'joined_at' => '2022-03-01'
        ]);

        Employee::create([
            'department_id' => $it->id,
            'name' => 'Budi Santoso',
            'position' => 'Frontend Developer',
            'salary' => 7500000,
            'joined_at' => '2023-01-15'
        ]);

        Employee::create([
            'department_id' => $hr->id,
            'name' => 'Citra Lestari',
            'position' => 'HR Specialist',
            'salary' => 6500000,
            'joined_at' => '2021-07-10'
        ]);

        Employee::create([
            'department_id' => $fin->id,
            'name' => 'Dian Permata',
            'position' => 'Akuntan',
            'salary' => 7000000,
            'joined_at' => '2020-11-20'
        ]);

        Employee::create([
            'department_id' => $hr->id,
            'name' => 'Eko Prasetyo',
            'position' => 'Recruiter',
            'salary' => 6000000,
            'joined_at' => '2024-02-05'
        ]);
    }
}

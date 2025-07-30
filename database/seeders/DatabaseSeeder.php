<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\Workspace::factory()->create([
            'nama' => 'Kantor Utama',
        ]);

        \App\Models\Workspace::factory()->create([
            'nama' => 'Ruang Produksi',
        ]);

        \App\Models\Workspace::factory()->create([
            'nama' => 'Ruang Distribusi',
        ]);

        \App\Models\Jabatan::factory()->create([
            'jabatan' => 'Direktur Utama',
            'divisi' => 'Office',
            'workspace_id' => 1,
        ]);

        \App\Models\Jabatan::factory()->create([
            'jabatan' => 'Manajer Humas',
            'divisi' => 'Office',
            'workspace_id' => 1,
        ]);

        \App\Models\Jabatan::factory()->create([
            'jabatan' => 'Manajer PPIC',
            'divisi' => 'Office',
            'workspace_id' => 1,
        ]);

        \App\Models\Jabatan::factory()->create([
            'jabatan' => 'Manajer Admin',
            'divisi' => 'Office',
            'workspace_id' => 1,
        ]);

        \App\Models\Jabatan::factory()->create([
            'jabatan' => 'Manajer Personalia',
            'divisi' => 'Office',
            'workspace_id' => 1,
        ]);

        \App\Models\Jabatan::factory()->create([
            'jabatan' => 'Manajer Distribusi',
            'divisi' => 'Distribution',
            'workspace_id' => 3,
        ]);

        \App\Models\Jabatan::factory()->create([
            'jabatan' => 'Manajer Produksi',
            'divisi' => 'Production',
            'workspace_id' => 2,
        ]);

        \App\Models\Jabatan::factory()->create([
            'jabatan' => 'Staff Produksi',
            'divisi' => 'Production',
            'workspace_id' => 2,
        ]);

        \App\Models\Jabatan::factory()->create([
            'jabatan' => 'Staff Distribusi',
            'divisi' => 'Distribution',
            'workspace_id' => 3,
        ]);

        \App\Models\Jabatan::factory()->create([
            'jabatan' => 'Staff Humas',
            'divisi' => 'Office',
            'workspace_id' => 1,
        ]);

        \App\Models\Jabatan::factory()->create([
            'jabatan' => 'Staff PPIC',
            'divisi' => 'Office',
            'workspace_id' => 1,
        ]);

        \App\Models\Jabatan::factory()->create([
            'jabatan' => 'Staff Admin',
            'divisi' => 'Office',
            'workspace_id' => 1,
        ]);

        \App\Models\Jabatan::factory()->create([
            'jabatan' => 'Staff Personalia',
            'divisi' => 'Office',
            'workspace_id' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Budi Pratama',
            'email' => 'budipratama@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status' => 'admin',
            'jabatan_id' => 1,
            'foto' => 'avatar5.png',
        ]);

        \App\Models\User::factory(324)->create([
            'jabatan_id' => 8,
        ]);

        \App\Models\User::factory(125)->create([
            'jabatan_id' => 9,
        ]);

        \App\Models\User::factory(10)->create([
            'jabatan_id' => 9,
        ]);

        \App\Models\User::factory(10)->create([
            'jabatan_id' => 10,
        ]);

        \App\Models\User::factory(10)->create([
            'jabatan_id' => 11,
        ]);

        \App\Models\User::factory(10)->create([
            'jabatan_id' => 12,
        ]);

        \App\Models\User::factory(10)->create([
            'jabatan_id' => 13,
        ]);
    }
}

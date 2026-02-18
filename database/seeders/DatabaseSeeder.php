<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // 1. Buat Permissions (Opsional untuk kontrol detail)
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'publish posts']);
        Permission::create(['name' => 'write posts']);

        // 2. Buat Roles
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleRedaktur = Role::create(['name' => 'redaktur']);
        $rolePenulis = Role::create(['name' => 'penulis']);

        // 3. Assign Permission ke Role
        $roleAdmin->givePermissionTo(Permission::all());
        $roleRedaktur->givePermissionTo(['publish posts', 'write posts']);
        $rolePenulis->givePermissionTo(['write posts']);

        // 4. Buat User: Administrator
        $admin = User::create([
            'name' => 'Super Admin',
            'username' => 'admin_utama',
            'email' => 'admin@wartawarga.com',
            'password' => Hash::make('password'),
            'is_verified' => true,
            'is_active' => true,
        ]);
        $admin->assignRole($roleAdmin);

        // 5. Buat User: Redaktur
        $redaktur = User::create([
            'name' => 'Redaktur Senior',
            'username' => 'redaktur_kece',
            'email' => 'redaktur@wartawarga.com',
            'password' => Hash::make('password'),
            'is_verified' => true,
            'is_active' => true,
        ]);
        $redaktur->assignRole($roleRedaktur);

        // 6. Buat User: Penulis (Sudah Verifikasi)
        $penulis = User::create([
            'name' => 'Budi Penulis',
            'username' => 'budi_cerita',
            'email' => 'penulis@wartawarga.com',
            'password' => Hash::make('password'),
            'is_verified' => true,
            'is_active' => true,
        ]);
        $penulis->assignRole($rolePenulis);

        // 7. Buat User: Penulis Baru (Belum Verifikasi)
        $calonPenulis = User::create([
            'name' => 'Ani Newbie',
            'username' => 'ani_nulis',
            'email' => 'ani@wartawarga.com',
            'password' => Hash::make('password'),
            'is_verified' => false, // Masih nunggu approve admin
            'is_active' => true,
        ]);
        $calonPenulis->assignRole($rolePenulis);
        
        $this->command->info('Seeders berhasil dijalankan! Gunakan password: "password"');
    }
}

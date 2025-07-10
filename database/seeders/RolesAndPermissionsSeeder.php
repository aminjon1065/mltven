<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Очистка кэша ролей и прав
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. Создание прав (Permissions)
        $permissions = [
            'manage-products',
            'manage-blog',
            'manage-categories',
            'manage-orders',
            'manage-users',
            'access-admin-panel'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // 3. Создание ролей
        $customerRole = Role::create(['name' => 'customer']);

        $sellerRole = Role::create(['name' => 'seller']);
        $sellerRole->givePermissionTo([
            'access-admin-panel',
            'manage-products',
            'manage-blog'
        ]);

        $adminRole = Role::create(['name' => 'admin']);
        // Назначаем все существующие права роли admin
        $adminRole->givePermissionTo(Permission::all());

        // 4. Создание пользователей и назначение им ролей

        // Администратор
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'password'
        ])->assignRole($adminRole);

        // Продавец
        User::factory()->create([
            'name' => 'Seller User',
            'email' => 'seller@example.com',
            'password' => 'password'
        ])->assignRole($sellerRole);

        // Клиент
        User::factory()->create([
            'name' => 'Test Customer',
            'email' => 'customer@example.com',
            'password' => 'password'
        ])->assignRole($customerRole);
    }
}

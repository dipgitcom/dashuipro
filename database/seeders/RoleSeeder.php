<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create role if it doesn't exist
        $role = Role::firstOrCreate(['name' => 'Admin']);

        // Assign role to a specific user
        $user = User::where('email', 'dhardipraj001@gmail.com')->first();
        if($user) {
            $user->assignRole($role);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123')
        ]);

        $user->assignRole('admin');

        $user1 = User::create([
            'nama' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('admin123')
        ]);

        $user1->assignRole('super-admin');

        $user2 = User::create([
            'nama' => 'Kasubbag',
            'username' => 'kasubbag',
            'email' => 'kasubbag@gmail.com',
            'password' => bcrypt('admin123')
        ]);

        $user2->assignRole('kasubbag');

        $user3 = User::create([
            'nama' => 'Sekretaris',
            'username' => 'sekretaris',
            'email' => 'sekretaris@gmail.com',
            'password' => bcrypt('admin123')
        ]);

        $user3->assignRole('sekretaris');

        $user4 = User::create([
            'nama' => 'Kaban',
            'username' => 'kaban',
            'email' => 'kaban@gmail.com',
            'password' => bcrypt('admin123')
        ]);

        $user4->assignRole('kepala-badan');
    }
}

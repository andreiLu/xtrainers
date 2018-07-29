<?php

use Illuminate\Database\Seeder;
use Xtrainers\User;
use Xtrainers\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where( 'name', 'administrator' )->first();
        $adminUser = new User();

        $adminUser->name = env('XTR_ADMIN_USER_NAME');
        $adminUser->email = env('XTR_ADMIN_EMAIL');
        $adminUser->password = bcrypt(env('XTR_ADMIN_PASSWORD'));
        $adminUser->save();
        $adminUser->roles()->attach($adminRole->role_id);
    }
}

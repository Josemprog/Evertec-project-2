<?php

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = 'JoseM';
        $admin->email = 'josemprog@gmail.com';
        $admin->email_verified_at = now();
        $admin->password = bcrypt('erosennin620');
        $admin->remember_token = Str::random(10);
        $admin->save();

        factory(App\User::class, 100)->create();
    }
}

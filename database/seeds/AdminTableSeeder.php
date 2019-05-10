<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \App\Admin[] $admins */
        $admins = factory(App\Admin::class, 25)->make();
        DB::table('users')->insert($admins->map(function (\App\Admin $admin) {
            return ['id' => $admin->id];
        })->toArray());
        DB::table('login')->insert($admins->map(function (\App\Admin $admin) {
            return [
                'username' => $admin->username,
                'user_id' => $admin->id,
                'password' => $admin->password,
                'type' => $admin->type,
            ];
        })->toArray());
    }
}

<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name'              => 'Bandea-tech',
                    'email'             => 'alassaneba9559@gmail.com',
                    'email_verified_at' => now(),
                    'password'          => Hash::make('Test1357912'),
                    'role'              => 'Superadmin',
                    'remember_token'    => Str::random(10),
                ],
            ]
        );
    }
}

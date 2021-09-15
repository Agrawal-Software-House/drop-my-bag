<?php

namespace Database\Seeders;

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\VarDumper\VarDumper;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Deleting Existing Records
        DB::table('admins')->delete();

        # Insert users
        foreach ($this->_users() as $key => $user){
            $user = Admin::create($user);
        }

        VarDumper::dump(sprintf(config('messages.SEEDER_SUCCESS_MESSAGE'), 'admins'));
    }

    private function _users()
    {
        $users =  [
            [
                'name'              => 'Ravi Agrawal',
                'email'             => 'agrawalravi.1110@gmail.com',
                'password'          => bcrypt('12345678'),
                'remember_token'    => Str::random(60),
            ],
            [
                'name'              => 'Aashutosh Tiwari',
                'email'             => 'at769773@gmail.com',
                'password'          => bcrypt('12345678'),
                'remember_token'    => Str::random(60),
            ],
            [
                'name'              => 'Aashish Tiwari',
                'email'             => 'Mashish063@gmail.com',
                'password'          => bcrypt('12345678'),
                'remember_token'    => Str::random(60),
            ],
        ];
        return $users;
    }
}

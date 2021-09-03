<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Account;

class UserTableSeeder extends Seeder
{
    private $users = array(
        ['first_name' => 'Elias', 'middle_name' => 'Kibet', 'last_name' => 'Korir', 'email' => 'ekorir@kcaa.or.ke', 'password' => '123456789'],
    );
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < count($this->users); $i++){
            $user = User::firstOrCreate(
                array('email' => $this->users[$i]['email']),
                array('name' => $this->users[$i]['first_name'] . ' ' . $this->users[$i]['middle_name'] . ' ' . $this->users[$i]['last_name'],
                    'email' => $this->users[$i]['email'],
                    'password' => Hash::make($this->users[$i]['password']),
                ),
            );

            $account = Account::create(
                array('first_name' => $this->users[$i]['first_name'], 
                'middle_name' => $this->users[$i]['middle_name'], 
                'last_name' => $this->users[$i]['last_name']
                )
            );

            $user->account()->attach($account->id);
        }
    }
}

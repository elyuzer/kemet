<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    public $roles = array(
        ['name' => 'Super Admin'],
    );

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < count($this->roles); $i++){
            Role::firstOrCreate(
                array('name' => $this->roles[$i]['name']), 
                array('name' => $this->roles[$i]['name'], 'guard_name' => 'web')
            );
        }        
    }
}

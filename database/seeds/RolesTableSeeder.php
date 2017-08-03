<?php

use Illuminate\Database\Seeder;

use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function(){
            Role::create([
                'name' => 'manage-settings',
                'description' => 'manage campaign and agents',
            ]);
            
            Role::create([
                'name' => 'compose-questionnaires',
                'description' => 'manage categories, and questions',
            ]);
            
            Role::create([
                'name' => 'submit-reports',
                'description' => 'create, and update reports',
            ]);
        });
    }
}

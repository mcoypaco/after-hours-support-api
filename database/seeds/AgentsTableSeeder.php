<?php

use Illuminate\Database\Seeder;

use App\Agent;

class AgentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function(){
            Agent::create([
                'employee_number' => '10071234',
                'name' => 'John Doe'
            ]);
            
            Agent::create([
                'employee_number' => '10074321',
                'name' => 'Jane Doe'
            ]);
        });
    }
}

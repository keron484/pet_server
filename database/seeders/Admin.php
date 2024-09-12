<?php

namespace Database\Seeders;

use App\Models\Admin as ModelsAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ModelsAdmin::factory()->create([
          'username' => 'Chongong',
          "email" => 'chongong@gmail.com',
          'password' => 'Keron484$'
        ]);
    }
}

<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\SystemModule;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['slug' => 'authorization'],
            ['slug' => 'payment'],
        ];
foreach ($data as $row) {
    SystemModule::updateOrCreate($row);
}
    }
}

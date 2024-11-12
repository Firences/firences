<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('mobils')->insert([
            [
                'merek' => 'Toyota',
                'model' => 'Agya',
                'plat' => 'D 0001 AA',
                'tarif' => 250000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'merek' => 'Toyota',
                'model' => 'Avanza',
                'plat' => 'D 0002 AA',
                'tarif' => 300000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'merek' => 'Toyota',
                'model' => 'Innova',
                'plat' => 'D 0003 AA',
                'tarif' => 350000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
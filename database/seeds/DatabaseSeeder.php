<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RefTableSeeder::class);
    }
}

class RefTableSeeder extends Seeder {

    public function run()
    {
        DB::table('ref')->truncate();

        DB::table('ref')->insert([
          ['refid' => '1','refno' => '1','reftext' => 'Laki-laki'],
          ['refid' => '1','refno' => '2','reftext' => 'Perempuan'],
          ['refid' => '2','refno' => '1','reftext' => 'Islam'],
          ['refid' => '2','refno' => '2','reftext' => 'Katolik'],
          ['refid' => '2','refno' => '3','reftext' => 'Protestan'],
          ['refid' => '2','refno' => '4','reftext' => 'Hindu'],
          ['refid' => '2','refno' => '5','reftext' => 'Budha'],
          ['refid' => '2','refno' => '6','reftext' => 'Konghucu'],
          ['refid' => '2','refno' => '7','reftext' => 'Lainnya'],
        ]);
    }

}

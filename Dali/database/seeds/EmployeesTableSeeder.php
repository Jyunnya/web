<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    \DB::table('posts')->insert([
  'id' => '1',
  'name' => 'グレッグル'
  ]);
    }
}

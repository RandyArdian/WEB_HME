<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Postingan;
use App\Models\member;
use App\Models\position;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory(1)->create();
        Kategori::create([
          'name'=>'Mata Kuliah',
          'slug'=>'wdjdias'
        ]);
        Kategori::create([
          'name'=>'Tugas',
          'slug'=>'hxghus'
        ]);
        Kategori::create([
          'name'=>'Praktikum',
          'slug'=>'vchbcadad'
        ]);
        Postingan::factory(20)->create();
          position::create([
            'position_name'=>'Ketua Himpunan',
            'slug'=>'wdhbdhwbd'
        ]);
        position::create([
            'position_name'=>'Wakil',
            'slug'=>'dwdbwbf'
        ]);
         member::create([
          'name'=>'Ergi',
          'Jenis_kelamin'=>'Laki-laki',
          'position_id'=>2,
          'slug'=>'kdbhwbdj'
         ]);
         member::create([
            'name'=>'Weny',
            'Jenis_kelamin'=>'Perempuan',
            'position_id'=>1,
            'slug'=>'daadhjdhw',
           ]);
       
    }
}

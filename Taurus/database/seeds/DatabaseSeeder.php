<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Reports;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        for($i=0; $i<100; $i++)
            Reports::create([
                'ime_i_prezime_vlasnika' => Str::random(10),
                'adresa_vlasnika' => Str::random(10),
                'telefon_vlasnika' => Str::random(10),
                'vrsta_pacijenta' => Str::random(10),
                'rasa_pacijenta' => Str::random(10),
                'pol_pacijenta' => Str::random(10),
                'ime_pacijenta' => Str::random(10),
                'datum_rodjenja_pacijenta' => Str::random(10),
                'id_pacijenta' =>  rand(10000, 99999),
                'prethodna_istorija' => Str::random(100),
                'anamneza' => Str::random(100),
                'klinicki_nalaz' => Str::random(100),
                'dijagnoza' => Str::random(100),
                'terapija' => Str::random(100),
                'placeno' => false,
                'user_id' => 1
            ]);
        // $this->call(UsersTableSeeder::class);
    }
}

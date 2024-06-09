<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $init = [
            0 => [ 'nome' => 'Usuario Teste', 'cpf' => '11111111111', 'password' => bcrypt('123456')],
            1 => [ 'nome' => 'Usuario Teste 2', 'cpf' => '22222222222', 'password' => bcrypt('123456')],
            2 => [ 'nome' => 'Usuario Teste 3', 'cpf' => '33333333333', 'password' => bcrypt('123456')],
        ];
        DB::table('users')->insert($init);
    }
}

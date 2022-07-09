<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $clientes = [ ["nome"     => "Thiago Cantero",
                  "telefone" => "11929292",
                  "email"    => "thiagocantero@gmail.com"],
                  ["nome"     => "Yoshi",
                  "telefone" => "2222222",
                  "email"    => "yoshi@mariobros.com"],
                  ["nome"     => "Elephant",
                  "telefone" => "0000222",
                  "email"    => "elephant@phpelephant.com"],
                  ["nome"     => "Sonic",
                  "telefone" => "2323232",
                  "email"    => "sonic@megadrive.com"],
    ];
            foreach ($clientes as $key => $value){
                Cliente::create($value);
            }
    }
}

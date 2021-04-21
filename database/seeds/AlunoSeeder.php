<?php
require_once 'vendor/autoload.php';

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class AlunoSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for ($i = 0; $i < 100; $i++) {
            DB::table('alunos')->insert([
                'nome' => $faker->name,
                'codigo' => $faker->numberBetween($min = 5000, $max = 6000),
                'situacao' => $faker->boolean($chanceOfGettingTrue = 50),
        
                'cep' => $faker->randomNumber,
                'cidade' => $faker->city,
                'estado' => $faker->state,
                'bairro' => $faker->city,
                'logradouro' => $faker->streetName,
                'numero' => $faker->buildingNumber,
                'complemento' => $faker->buildingNumber,
        
                'curso' => $faker->randomElement($array = array ('Administração','Engenharia de Produção','Sistemas de Informação')),
                'turma' => $faker->randomElement($array = array ('A1','A2','A3')),
                'data_matricula' => $faker->date($format = 'Y-m-d', $max = 'now')
                   ]);

        }
    }
}

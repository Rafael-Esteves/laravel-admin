<?php
require_once 'vendor/autoload.php';
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for ($i = 0; $i < 50; $i++) {
            DB::table('cursos')->insert([
                'nome' => $faker->name,
                'codigo' => $faker->numberBetween($min = 1, $max = 6),
                   ]);

        }
    }
}

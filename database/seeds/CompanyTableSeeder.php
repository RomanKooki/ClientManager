<?php

    use App\Company;
    use Illuminate\Database\Seeder;

    use Faker\Factory as Faker;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 100) as $index) {

            $model = new Company();
            $model->name = $faker->company. '-company';
            $model->save();

        }
    }
}

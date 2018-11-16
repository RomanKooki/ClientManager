<?php

    use Faker\Factory as Faker;
    use Illuminate\Database\Seeder;

    class AdminsTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $faker = Faker::create();

            $model           = new \App\Admin();
            $model->name     = $faker->firstName;
            $model->email    = 'wayne@test.co.za';
            $model->password = Hash::make('qwe123');
            $model->save();
        }
    }

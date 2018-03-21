<?php
    /**
     * ClientManager.
     *
     * @project ClientManager
     * @description
     * @author Wayne Brummer
     */

    use Illuminate\Database\Seeder;
    use Faker\Factory as Faker;

    class UsersTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $faker = Faker::create();
            foreach (range(1, 25) as $index) {

                $model = new \App\User();
                $model->name = $faker->firstName;
                $model->email = $faker->email;
                $model->email = Hash::make('123456');
                $model->save();

            }
        }
    }

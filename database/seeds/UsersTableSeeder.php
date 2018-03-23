<?php
/**
 * ClientManager
 *
 * @file UsersTableSeeder.php
 * @project ClientManager
 * @author Wayne Brummer
 */

/**
 * ClientManager
 *
 * @file UsersTableSeeder.php
 * @project ClientManager
 * @author Wayne Brummer
 */

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
            foreach (range(1, 25) as $userID => $index) {

                $model = new \App\User();
                $model->name = $faker->firstName;
                $model->email = $faker->email;
                $model->password = Hash::make('123456');
                $model->address = $faker->address;
                $model->age = $faker->numberBetween(18, 55);
                $model->id_number = 1234567 + $userID;
                $model->contact = $faker->phoneNumber;
                $model->image_url = $faker->imageUrl(100, 100);
                $model->save();

            }
        }
    }

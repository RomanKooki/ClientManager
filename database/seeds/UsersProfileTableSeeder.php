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

    class UsersProfileTableSeeder extends Seeder
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

                $model = new \App\UserProfile();
                $model->user_id = $userID;
                $model->address = $faker->address;
                $model->id_number = 1234567 + $userID;
                $model->contact = $faker->phoneNumber;
                $model->image_url = $faker->imageUrl(200, 200);
                $model->save();

            }
        }
    }

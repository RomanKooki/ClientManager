<?php
/**
 * ClientManager.
 *
 * @file CompanyTableSeeder.php
 * @project ClientManager
 *
 * @author Wayne Brummer
 */

    /**
     * ClientManager.
     *
     * @file CompanyTableSeeder.php
     * @project ClientManager
     *
     * @author Wayne Brummer
     */

    /**
     * ClientManager.
     *
     * @project ClientManager
     * @description
     *
     * @author Wayne Brummer
     */
    use App\Company;
    use Faker\Factory as Faker;
    use Illuminate\Database\Seeder;

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
            foreach (\range(1, 15) as $index) {
                $model                = new Company();
                $model->name          = $faker->company . '-company';
                $model->address       = $faker->address;
                $model->contact       = $faker->phoneNumber;
                $model->website       = 'random.com';
                $model->email_address = $faker->companyEmail;
                $model->image_url     = $faker->imageUrl(100, 100);
                $model->save();
            }
        }
    }

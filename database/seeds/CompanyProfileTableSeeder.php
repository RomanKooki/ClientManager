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

class CompanyProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        foreach (range(1, 100) as $companyID => $index) {

            $model = new \App\CompanyProfile();
            $model->company_id = $companyID;
            $model->address = $faker->address;
            $model->contact = $faker->phoneNumber;
            $model->email_address = $faker->companyEmail;
            $model->image_url = $faker->imageUrl(200,200);
            $model->save();

        }
    }
}

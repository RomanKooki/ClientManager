<?php
/**
 * ClientManager
 *
 * @file CompanyTableSeeder.php
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
            $model->address = $faker->address;
            $model->contact = $faker->phoneNumber;
            $model->email_address = $faker->companyEmail;
            $model->image_url = $faker->imageUrl(100,100);
            $model->save();

        }
    }
}

<?php
/**
 * ClientManager.
 *
 * @file DatabaseSeeder.php
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
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
    }
}

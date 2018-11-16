<?php
/**
 * ClientManager.
 *
 * @file 2014_10_12_000000_create_users_table.php
 * @project ClientManager
 *
 * @author Wayne Brummer
 */

/**
 * ClientManager.
 *
 * @file 2014_10_12_000000_create_users_table.php
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
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address');
            $table->integer('age');
            $table->string('contact');
            $table->string('id_number');
            $table->string('image_url')->nullable();
            $table->integer('is_active')->default(1);
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

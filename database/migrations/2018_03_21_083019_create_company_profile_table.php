<?php
    /**
     * ClientManager.
     *
     * @project ClientManager
     * @description
     * @author Wayne Brummer
     */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('address');
            $table->string('contact');
            $table->string('email_address');
            $table->string('image_url');
            $table->integer('is_active');
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
        Schema::dropIfExists('companies_profile');
    }
}

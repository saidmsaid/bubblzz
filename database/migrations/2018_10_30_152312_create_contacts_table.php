<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('phone');
            $table->integer('number');
            $table->integer('fax');
            $table->integer('hotLine');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('address');
            $table->string('mail');
            $table->string('website');
            $table->string('google');
            $table->string('linkedin');
            $table->string('youtube');
            $table->timestamps();
        });

        DB::table('contacts')->insert(
            array(
                'phone' => 0,
                'number' => 0,
                'fax' => 0,
                'hotLine' => 0,
                'longitude' => 0,
                'latitude' => 0,
                'facebook' => '',
                'twitter' => '',
                'instagram' => '',
                'address' => '',
                'mail' => '',
                'website' => '',
                'linkedin' => '',
                'youtube' => '',
                'google' => '',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,

            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}

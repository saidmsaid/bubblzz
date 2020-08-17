<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('title_ar');
            $table->text('about');
            $table->text('about_ar');
            $table->string('image');
            $table->timestamps();
        });
        DB::table('abouts')->insert(
            array(
                'title' => 'Test About',
                'title_ar' => 'العنوان',
                'about' => 'About Test',
                'about_ar' => 'عنا',
                'image' => 'noImage.png',
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
        Schema::dropIfExists('abouts');
    }
}

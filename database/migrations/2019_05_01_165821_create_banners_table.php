<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('banner_position')->nullable();
            $table->string('banner_path')->nullable();
            $table->string('banner_link')->nullable();
            $table->timestamps();
        });
        $data =['top','right','bottom','left'];
        for ($i=0; $i < count($data) ; $i++) { 
            DB::table('banners')->insert([
               'banner_position' => $data[$i],
               'banner_path'    =>null,
               'banner_link'    =>null,
               
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('description');
            $table->timestamps();
        });
        DB::table('infos')->insert(
            [
                [
                    'title' => 'Openingstijden',
                    'description' => 'Zaterdag en zondag: 14u00 - 00u00',

                ],
                [
                    'title' => 'Camping',
                    'description' => 'Zaterdag gaat de camping open om 9u00.',
                ],
                [
                    'title' => 'Contact',
                    'description' => 'Je kan ons contacteren via contact@festival.be',
                ],
                [
                    'title' => 'Grondplan',
                    'description' => 'Bekijk hier het grondplan.',
                ],


            ]
        );

    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infos');
    }
}

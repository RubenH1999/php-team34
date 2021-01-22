<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFestivalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festivals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('map')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        $date = new DateTime('2020-06-15');
        $date1 = new DateTime('2020-06-18');


        DB::table('festivals')->insert(
            [
                [
                    'name' => 'Festival 2020',
                    'start_date' => $date,
                    'end_date' => $date1,
                    'map' => '',
                    'description' => 'Het beste festival van Belgie!',
                    'created_at' => now(),
                ],
                [
                    'name' => 'Festival 2019',
                    'start_date' => null,
                    'end_date' => null,
                    'map' => '',
                    'description' => 'Het beste festival van Belgie!',
                    'created_at' => now(),
                ],
                [
                    'name' => 'Festival 2018',
                    'start_date' => null,
                    'end_date' => null,
                    'map' => '',
                    'description' => 'Het beste festival van Belgie!',
                    'created_at' => now(),
                ],
                [
                    'name' => 'Festival 2017',
                    'start_date' => null,
                    'end_date' => null,
                    'map' => '',
                    'description' => 'Het beste festival van Belgie!',
                    'created_at' => now(),
                ],
                [
                    'name' => 'Festival 2016',
                    'start_date' => null,
                    'end_date' => null,
                    'map' => '',
                    'description' => 'Het beste festival van Belgie!',
                    'created_at' => now(),
                ]
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
        Schema::dropIfExists('festivals');
    }
}

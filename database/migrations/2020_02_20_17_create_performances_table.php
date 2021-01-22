<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('artist_id');
            $table->unsignedBigInteger('stage_id')->nullable();
            $table->unsignedBigInteger('festival_id');
            $table->date('date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->timestamps();

            $table->foreign('artist_id')->references('id')->on('artists')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('stage_id')->references('id')->on('stages')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('festival_id')->references('id')->on('festivals')->onDelete('cascade')->onUpdate('cascade');

        });

            DB::table('performances')->insert(
                [
                    [
                        'artist_id' => '1',
                        'stage_id' => '2',
                        'festival_id' => '1',
                        'date' => date("Y-m-d",mktime(0,0,0,07,03,2020)),
                        'start_time' => '14',
                        'end_time' => '15',

                    ],
                    [
                        'artist_id' => '3',
                        'stage_id' => '1',
                        'festival_id' => '1',
                        'date' => date("Y-m-d",mktime(0,0,0,07,03,2020)),
                        'start_time' => '10',
                        'end_time' => '11',
                    ],
                    [
                        'artist_id' => '2',
                        'stage_id' => '3',
                        'festival_id' => '1',
                        'date' => date("Y-m-d",mktime(0,0,0,07,03,2020)),
                        'start_time' => '17',
                        'end_time' => '18',
                    ],
                    [
                        'artist_id' => '6',
                        'stage_id' => '4',
                        'festival_id' => '1',
                        'date' => date("Y-m-d",mktime(0,0,0,07,03,2020)),
                        'start_time' => '14',
                        'end_time' => '15',

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
        Schema::dropIfExists('performances');
    }
}

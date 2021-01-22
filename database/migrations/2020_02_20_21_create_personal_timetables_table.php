<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_timetables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('performance_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('performance_id')->references('id')->on('performances')->onDelete('cascade')->onUpdate('cascade');




        });
         DB::table('personal_timetables')->insert(
                       [
                           [
                               'user_id' => '1',
                               'performance_id' => '2',
                           ],
                           [
                               'user_id' => '1',
                               'performance_id' => '1',
                           ],
                           [
                               'user_id' => '1',
                               'performance_id' => '3',
                           ],
                           [
                               'user_id' => '2',
                               'performance_id' => '2',
                           ],
                           [
                               'user_id' => '2',
                               'performance_id' => '1',
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
        Schema::dropIfExists('personal_timetables');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('task_id');
            $table->string('name')->nullable();
            $table->date('date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('location');
            $table->integer('number_of_employees')->nullable();
            $table->string('department')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();

            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('restrict')->onUpdate('cascade');
        });

        DB::table('shifts')->insert(

            [
                [
                    'task_id' => '1',
                    'name' => 'ochtend',
                    'date' => date("Y-m-d",mktime(0,0,0,07,06,2020)),
                    'start_time' => '14:00',
                    'end_time' => '16:00',
                    'location' => 'inkomhal',
                    'number_of_employees' => 2,
                    'department' => 'security branch',
                    'remark' => 'geen',
                ],
                [
                    'task_id' => '1',
                    'name' => 'ochtend',
                    'date' => date("Y-m-d",mktime(0,0,0,07,04,2020)),
                    'start_time' => '16:00',
                    'end_time' => '20:00',
                    'location' => 'inkomhal',
                    'number_of_employees' => 1,
                    'department' => 'security branch',
                    'remark' => 'geen',
                ],
                [
                    'task_id' => '1',
                    'name' => 'ochtend',
                    'date' => date("Y-m-d",mktime(0,0,0,07,03,2020)),
                    'start_time' => '20:00',
                    'end_time' => '24:00',
                    'location' => 'inkomhal',
                    'number_of_employees' => 1,
                    'department' => 'security branch',
                    'remark' => 'geen',
                ],
                [
                    'task_id' => '2',
                    'name' => 'middag',
                    'date' => date("Y-m-d",mktime(0,0,0,07,03,2020)),
                    'start_time' => '14:00',
                    'end_time' => '18:00',
                    'location' => 'WC\'s',
                    'number_of_employees' => 1,
                    'department' => 'schoonmaak dienst',
                    'remark' => '',
                ],
                [
                    'task_id' => '2',
                    'name' => 'middag',
                    'date' => date("Y-m-d",mktime(0,0,0,07,03,2020)),
                    'start_time' => '18:00',
                    'end_time' => '20:00',
                    'location' => 'WC\'s',
                    'number_of_employees' => 2,
                    'department' => 'schoonmaak dienst',
                    'remark' => '',
                ],
                [
                    'task_id' => '3',
                    'name' => 'ochtend',
                    'date' => date("Y-m-d",mktime(0,0,0,07,04,2020)),
                    'start_time' => '14:00',
                    'end_time' => '16:00',
                    'location' => 'drank stand 1',
                    'number_of_employees' => 1,
                    'department' => 'arbeiders',
                    'remark' => 'check de voorraad',
                ],
                [
                    'task_id' => '3',
                    'name' => 'ochtend',
                    'date' => date("Y-m-d",mktime(0,0,0,07,03,2020)),
                    'start_time' => '16:00',
                    'end_time' => '18:00',
                    'location' => 'drank stand 1',
                    'number_of_employees' => 1,
                    'department' => 'arbeiders',
                    'remark' => 'check de voorraad',
                ],
                [
                    'task_id' => '3',
                    'name' => 'ochtend',
                    'date' => date("Y-m-d",mktime(0,0,0,07,03,2020)),
                    'start_time' => '18:00',
                    'end_time' => '24:00',
                    'location' => 'drank stand 1',
                    'number_of_employees' => 1,
                    'department' => 'arbeiders',
                    'remark' => 'check de voorraad',
                ],
                [
                    'task_id' => '4',
                    'name' => 'middag',
                    'date' => date("Y-m-d",mktime(0,0,0,07,04,2020)),
                    'start_time' => '14:00',
                    'end_time' => '18:00',
                    'location' => 'eten stand 2',
                    'number_of_employees' => 1,
                    'department' => 'arbeiders',
                    'remark' => 'geen',
                ],
                [
                    'task_id' => '4',
                    'name' => 'middag',
                    'date' => date("Y-m-d",mktime(0,0,0,07,03,2020)),
                    'start_time' => '18:00',
                    'end_time' => '24:00',
                    'location' => 'eten stand 2',
                    'number_of_employees' => 1,
                    'department' => 'arbeiders',
                    'remark' => 'geen',
                ],
                [
                    'task_id' => '5',
                    'name' => 'ochtend',
                    'date' => date("Y-m-d",mktime(0,0,0,07,03,2020)),
                    'start_time' => '14:00',
                    'end_time' => '18:00',
                    'location' => 'main stage',
                    'number_of_employees' => 1,
                    'department' => 'backstage',
                    'remark' => 'nieuwe speakers opzetten',
                ],
                [
                    'task_id' => '5',
                    'name' => 'ochtend',
                    'date' => date("Y-m-d",mktime(0,0,0,07,04,2020)),
                    'start_time' => '18:00',
                    'end_time' => '24:00',
                    'location' => 'main stage',
                    'number_of_employees' => 1,
                    'department' => 'backstage',
                    'remark' => 'nieuwe speakers opzetten',
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
        Schema::dropIfExists('shifts');
    }
}

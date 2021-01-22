<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_shifts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('shift_id');
            $table->boolean('is_absent');
            $table->string('reason_absence')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('shift_id')->references('id')->on('shifts')->onDelete('cascade')->onUpdate('cascade');

        });
            DB::table('employee_shifts')->insert(
                [
                    [
                        'user_id' => '2',
                        'shift_id' => '1',
                        'is_absent' => false,
                        'reason_absence' => null,
                    ],

                    [
                        'user_id' => '3',
                        'shift_id' => '4',
                        'is_absent' => false,
                        'reason_absence' => null,
                    ],
                    [
                        'user_id' => '4',
                        'shift_id' => '6',
                        'is_absent' => false,
                        'reason_absence' => null,
                    ],
                    [
                        'user_id' => '6',
                        'shift_id' => '9',
                        'is_absent' => false,
                        'reason_absence' => null,
                    ],
                    [
                        'user_id' => '7',
                        'shift_id' => '11',
                        'is_absent' => false,
                        'reason_absence' => null,
                    ],
                    [
                        'user_id' => '3',
                        'shift_id' => '2',
                        'is_absent' => false,
                        'reason_absence' => null,
                    ],
                    [
                        'user_id' => '6',
                        'shift_id' => '7',
                        'is_absent' => false,
                        'reason_absence' => null,
                    ],
                    [
                        'user_id' => '2',
                        'shift_id' => '3',
                        'is_absent' => false,
                        'reason_absence' => null,
                    ],

                    [
                        'user_id' => '5',
                        'shift_id' => '5',
                        'is_absent' => false,
                        'reason_absence' => null,
                    ],

                    [
                        'user_id' => '4',
                        'shift_id' => '8',
                        'is_absent' => false,
                        'reason_absence' => null,
                    ],
                    [
                        'user_id' => '7',
                        'shift_id' => '10',
                        'is_absent' => false,
                        'reason_absence' => null,
                    ],
                    [
                        'user_id' => '8',
                        'shift_id' => '12',
                        'is_absent' => false,
                        'reason_absence' => null,
                    ],
                    [
                        'user_id' => '8',
                        'shift_id' => '1',
                        'is_absent' => false,
                        'reason_absence' => null,
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
        Schema::dropIfExists('employee_shifts');
    }
}

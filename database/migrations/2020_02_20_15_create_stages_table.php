<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('stages')->insert(
            [
                [
                    'name' => 'Main_stage',

                ],
                [
                    'name' => 'Side_stage_A',

                ],
                [
                    'name' => 'Side_stage_B',

                ],
                [
                    'name' => 'Side_stage_C',

                ],
                [
                    'name' => 'Side_stage_D',

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
        Schema::dropIfExists('stages');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('festival_id');
            $table->string('ticket_name');
            $table->double('price');
            $table->integer('max_available')->nullable();
            $table->timestamps();

            $table->foreign('festival_id')->references('id')->on('festivals')->onDelete('restrict')->onUpdate('cascade');
        });

        DB::table('tickets')->insert(
            [
                [
                    'festival_id' => '1',
                    'ticket_name' => 'vrijdag_ticket',
                    'price' => 60.5,
                    'max_available' => 500,
                ],
                [
                    'festival_id' => '1',
                    'ticket_name' => 'zaterdag_ticket',
                    'price' => 60.5,
                    'max_available' => 500,
                ],
                [
                    'festival_id' => '1',
                    'ticket_name' => 'zondag_ticket',
                    'price' => 60.5,
                    'max_available' => 500,
                ],
                [
                    'festival_id' => '1',
                    'ticket_name' => 'weekend_ticket',
                    'price' => 60.5,
                    'max_available' => 500,
                ],
                [
                    'festival_id' => '2',
                    'ticket_name' => 'weekend_ticket',
                    'price' => 60.5,
                    'max_available' => 500,
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
        Schema::dropIfExists('tickets');
    }
}

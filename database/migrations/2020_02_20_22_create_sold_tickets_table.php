<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });

            DB::table('sold_tickets')->insert(
                [
                    [
                        'ticket_id' => '1',
                        'user_id' => '2',
                    ],
                    [
                        'ticket_id' => '1',
                        'user_id' => '1',
                    ],
                    [
                        'ticket_id' => '1',
                        'user_id' => '3',
                    ],
                    [
                        'ticket_id' => '2',
                        'user_id' => '4',
                    ],
                    [
                        'ticket_id' => '1',
                        'user_id' => '5',
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
        Schema::dropIfExists('sold_tickets');
    }
}

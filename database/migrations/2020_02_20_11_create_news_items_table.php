<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('foto')->nullable();
            $table->string('description');
            $table->timestamps();
        });

        DB::table('news_items')->insert(
            [
                [
                    'title' => 'Uitsel festival',
                    'foto' => 'cancelled.jpg',
                    'description' => 'wegens het coronavirus is het festival voorlopig een week uitgesteld blablablabla',
                ],
                [
                'title' => 'Tickets bijna uitverkocht',
                'foto' => 'Ticket.jpg',
                'description' => 'reeds  80% van alle tickets zijn al besteld. Wees er snel bij!',
                ],
                [
                    'title' => 'Nieuwe artiest',
                    'foto' => 'post_malone (2).jpg',
                    'description' => 'artiest post malone komt optreden',
                ],
                [
                    'title' => 'Nieuwe tickets',
                    'foto' => 'New_ticket.jpg',
                    'description' => 'er zijn nieuwe tickets toegevoegd!',
                ],
                [
                    'title' => 'Het weer',
                    'foto' => 'Regen.jpg',
                    'description' => 'Het gaat regenen op de zaterdag van het festival.',
                ]
            ]);

    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_items');
    }
}

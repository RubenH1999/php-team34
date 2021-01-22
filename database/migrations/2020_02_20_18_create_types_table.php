<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });


        //insert soorten

        DB::table('types')->insert(
            [
                ['name' => 'bezoeker',      'created_at' => now()],
                ['name' => 'gebruiker',          'created_at' => now()],
                ['name' => 'Medewerker',    'created_at' => now()],
                ['name' => 'verantwoordelijke',      'created_at' => now()],
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
        Schema::dropIfExists('types');
    }
}

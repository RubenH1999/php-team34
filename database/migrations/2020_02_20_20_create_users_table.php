<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password')->default('welkom');
            $table->string('phonenumber')->nullable();
            $table->string('adress')->nullable();
            $table->string('city')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('types')->onDelete('restrict')->onUpdate('cascade');

        });

        DB::table('users')->insert(
            [
                [
                    'type_id' => '4',
                    'last_name' => 'van Dongen',
                    'first_name' => 'David',
                    'email' => 'r0761104@student.thomasmore.be',
                    'password' => \Illuminate\Support\Facades\Hash::make('wachtwoord1234'),
                    'phonenumber' => '12345678',
                    'adress' => 'teststraat 111',
                    'city' => 'teststad',
                    'created_at' => now(),
                ],
                [
                    'type_id' => '4',
                    'last_name' => 'Verantwoordelijke',
                    'first_name' => 'test',
                    'email' => 'verantwoordelijke@test.be',
                    'password' => \Illuminate\Support\Facades\Hash::make('wachtwoord1234'),
                    'phonenumber' => '12345678',
                    'adress' => 'teststraat 111',
                    'city' => 'teststad',
                    'created_at' => now(),
                ],
                [
                    'type_id' => '3',
                    'last_name' => 'Medewerker',
                    'first_name' => 'test',
                    'email' => 'Medewerker@test.be',
                    'password' => \Illuminate\Support\Facades\Hash::make('wachtwoord1234'),
                    'phonenumber' => '02345678',
                    'adress' => 'teststraat 1111',
                    'city' => 'teststad',
                    'created_at' => now(),
                ],
                [
                    'type_id' => '3',
                    'last_name' => 'De Medewerker',
                    'first_name' => 'Bert',
                    'email' => 'bertmedewerker@test.be',
                    'password' => \Illuminate\Support\Facades\Hash::make('wachtwoord1234'),
                    'phonenumber' => '02345658',
                    'adress' => 'nieuwstraat 12',
                    'city' => 'Antwerpen',
                    'created_at' => now(),
                ],
                [
                    'type_id' => '3',
                    'last_name' => 'Medewerker',
                    'first_name' => 'Mark',
                    'email' => 'markmedewerker@test.be',
                    'password' => \Illuminate\Support\Facades\Hash::make('wachtwoord1234'),
                    'phonenumber' => '02345678',
                    'adress' => 'teststraat 1111',
                    'city' => 'teststad',
                    'created_at' => now(),
                ],
                [
                    'type_id' => '3',
                    'last_name' => 'De Medewerker',
                    'first_name' => 'Jan',
                    'email' => 'janmedewerker@test.be',
                    'password' => \Illuminate\Support\Facades\Hash::make('wachtwoord1234'),
                    'phonenumber' => '02345658',
                    'adress' => 'nieuwstraat 12',
                    'city' => 'Antwerpen',
                    'created_at' => now(),
                ],
                [
                    'type_id' => '3',
                    'last_name' => 'Medewerker',
                    'first_name' => 'Chris',
                    'email' => 'chrismedewerker@test.be',
                    'password' => \Illuminate\Support\Facades\Hash::make('wachtwoord1234'),
                    'phonenumber' => '02345678',
                    'adress' => 'teststraat 1111',
                    'city' => 'teststad',
                    'created_at' => now(),
                ],
                [
                    'type_id' => '3',
                    'last_name' => 'De Medewerker',
                    'first_name' => 'Jimmy',
                    'email' => 'Jimmymedewerker@test.be',
                    'password' => \Illuminate\Support\Facades\Hash::make('wachtwoord1234'),
                    'phonenumber' => '02345658',
                    'adress' => 'nieuwstraat 12',
                    'city' => 'Antwerpen',
                    'created_at' => now(),
                ],
                [
                'type_id' => '3',
                'last_name' => 'De Medewerker',
                'first_name' => 'Alex',
                'email' => 'Alexmedewerker@test.be',
                'password' => \Illuminate\Support\Facades\Hash::make('wachtwoord1234'),
                'phonenumber' => '02345658',
                'adress' => 'nieuwstraat 12',
                'city' => 'Antwerpen',
                'created_at' => now(),
            ],
                [
                    'type_id' => '2',
                    'last_name' => 'Gebruiker',
                    'first_name' => 'Test',
                    'email' => 'gebruiker@test.be',
                    'password' => \Illuminate\Support\Facades\Hash::make('wachtwoord1234'),
                    'phonenumber' => '1234567',
                    'adress' => 'teststraat 1121',
                    'city' => 'teststad',
                    'created_at' => now(),
                ],
                [
                    'type_id' => '1',
                    'last_name' => 'Bezoeker',
                    'first_name' => 'Test',
                    'email' => 'Bezoeker@Test.be',
                    'password' => \Illuminate\Support\Facades\Hash::make('wachtwoord1234'),
                    'phonenumber' => '12345678',
                    'adress' => 'teststraat 1131',
                    'city' => 'teststad',
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
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('genre')->nullable();
            $table->string('description')->nullable();
            $table->string('name');
            $table->string('rider')->nullable();
            $table->string('spotify');
            $table->string('img');



            $table->timestamps();
        });

        DB::table('artists')->insert(
            [
                [
                    'genre' => 'hip-hop',
                    'description' => 'Coole rapper met veel talent',
                    'name' => 'Rapper Sjors',
                    'rider' => 'geen',
                    'spotify' => '03czvp8FmzpcUIjHprA3DN',
                    'img' => 'https://images.cdn.superguide.nl/DEmeK4xX0UrSxmP66ORVHwv8O5A=/0x0:1200x659/890x0/smart/superguide.nl/s3fs-public/main_media/rapper_sjors_bevestigt_ernstig_ziek_en_lijdt_aan_kanker.png?itok=1lTeeQwB',


                ],
                [
                    'genre' => 'edm',
                    'description' => 'DJ met veel talent',
                    'name' => 'Martin Garrix',
                    'rider' => 'geen',
                    'spotify' => '4RVtBlHFKj51Ipvpfv5ER4',
                    'img' => 'https://img.nrj.fr/vsu4ohtaMipGcqkDQPjnpY_DbVs=/800x450/smart/https%3A%2F%2Fimage-api.nrj.fr%2Fmedias%2F2019%2F07%2Fmartin-garrix-2019-4_5d230d1a23159.jpg',


                ],
                [
                    'genre' => 'hip-hop',
                    'description' => 'Bekende rapper Kendrick Lamar.',
                    'name' => 'Kendrick Lamar',
                    'rider' => 'geen',
                    'spotify' => '7KXjTSCq5nL1LoYtL7XAwS',
                    'img' => 'https://www.biography.com/.image/t_share/MTQ3NTI2NTg2OTE1MTA0MjM4/kenrick_lamar_photo_by_jason_merritt_getty_images_entertainment_getty_476933160.jpg',



                ],
                [
                    'genre' => 'hip-hop',
                    'description' => 'Bekende rapper Post malone.',
                    'name' => 'Post Malone',
                    'rider' => 'geen',
                    'spotify' => '0e7ipj03S05BNilyu5bRzt',
                    'img' => 'https://upload.wikimedia.org/wikipedia/commons/9/94/Post_Malone_2018.jpg',



                ],
                [
                    'genre' => 'hip-hop',
                    'description' => 'Bekende hip-hop groep BROCKHAMPTON.',
                    'name' => 'BROCKHAMPTON',
                    'rider' => 'geen',
                    'spotify' => '6U0FIYXCQ3TGrk4tFpLrEA',
                    'img' => 'https://images.sk-static.com/images/media/profile_images/artists/8561929/huge_avatar',


                ],
                [
                    'genre' => 'hip-hop',
                    'description' => 'Duits rap collectief uit Berlijn',
                    'name' => 'BHZ',
                    'rider' => 'geen',
                    'spotify' => '72EGc3ULtmj0oxT05PN6dw',
                    'img' => 'https://juice.de/wp-content/uploads/BHZ-1-1.jpg',


                ],
                [
                    'genre' => 'Tekno',
                    'description' => 'Franse Tekno DJ',
                    'name' => 'Vorteks',
                    'rider' => 'geen',
                    'spotify' => '4rNYJbXrnr0ZExJxtuweMs',
                    'img' => 'https://tracks.content.hardstyle.com/products/0/430/659/thumbs/500x500/vorteks-powerful.jpg',


                ],

                [
                    'genre' => 'Beatdown Hardcore',
                    'description' => 'Uk based beatdown hardcore band',
                    'name' => 'Desolated',
                    'rider' => 'geen',
                    'spotify' => '26BXRw8iYL9YXbF5IfRGwp',
                    'img' => 'https://lastfm.freetls.fastly.net/i/u/770x0/56d58cbc90824411ba0c24b80b5b293e.jpg',


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
        Schema::dropIfExists('artists');
    }
}

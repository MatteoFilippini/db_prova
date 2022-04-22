<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFlatIdToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->foreignId('flat_id')->after('id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign('messages_flat_id_foreign');
            $table->dropColumn('flat_id');
        });
    }
}

/* 
SELECT * 
FROM `messages` 
INNER JOIN `flats` 
ON flats.id = messages.flat_id
WHERE flat_id =1
*/

/*
SELECT * 
FROM `messages` 
INNER JOIN `flats` 
ON flats.id = messages.flat_id
INNER JOIN `users` 
ON users.id = flats.user_id
WHERE users.id=2
*/

/*
SELECT COUNT(flat_id) ,flats.title
FROM `messages` 
INNER JOIN `flats` 
ON flats.id = messages.flat_id
INNER JOIN `users` 
ON users.id = flats.user_id
WHERE users.id=4
GROUP BY flats.id
*/

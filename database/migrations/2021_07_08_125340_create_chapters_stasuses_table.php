<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaptersStasusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters_stasuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId("users_id")->constrained("users")
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId("chapter_id")->constrained("chapters")
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId("status_id")->constrained("statuses")
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->timestamps();

            // Constraints on users_id and on chapter_id:
            $table->unique("users_id", "chapter_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapters_stasuses');
    }
}

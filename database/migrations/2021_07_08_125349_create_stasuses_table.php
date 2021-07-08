<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStasusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stasuses', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("code", 10);
            $table->string("color")->default("6dbb63ff");
            $table->timestamps();
        });

        // Insert default stasuses
        $data = [
            ["code"=>"cmp", "name" => "Completed", "color" => "6dbb63ff"],
            ["code"=>"req", "name" => "Required", "color" => "ff6633ff"],
            ["code"=>"reqcmp", "name" => "Required and Completed", "color" => "6dceeeff"],
            ["code"=>"rdg", "name" => "Reading", "color" => "f5b651ff"],
            ["code"=>"unr", "name" => "Unread", "color" => "4a4e69ff"],
        ];
        DB::table('stasuses')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stasuses');
    }
}

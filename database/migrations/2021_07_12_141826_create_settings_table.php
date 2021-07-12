<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('type', 255);
            $table->string('slug', 255);
            $table->timestamps();
        });

        Schema::create('setting_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('setting_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title', 255);
            $table->json('value');

            $table->unique(['setting_id', 'locale']);
            $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_translations');
        Schema::dropIfExists('settings');
    }
}

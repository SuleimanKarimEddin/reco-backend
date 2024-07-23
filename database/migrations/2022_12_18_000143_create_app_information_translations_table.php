<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_information_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();

            $table->foreignId('app_information_id');
            $table->foreign('app_information_id')
                ->references('id')
                ->unique(['app_information_id', 'locale'])
                ->on('app_information')->onDelete('cascade');

            $table->string('title');
            $table->string('content');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_information_translations');
    }
};

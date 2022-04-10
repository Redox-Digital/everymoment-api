<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallerys', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('content_id')->unsigned();
            $table->foreign('content_id')
                ->references('id')
                ->on('contents')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('media_id')->unsigned();
            $table->foreign('media_id')
                ->references('id')
                ->on('medias')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (DB::getDriverName() !== 'sqlite') {
            Schema::table('gallerys', function(Blueprint $table) {
                $table->dropForeign('gallery_media_id_foreign');
                $table->dropForeign('gallery_content_id_foreign');
            });
        }
        Schema::dropIfExists('gallerys');
    }
};

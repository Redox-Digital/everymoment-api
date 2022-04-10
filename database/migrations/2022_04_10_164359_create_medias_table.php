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
        Schema::create('medias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->string('type'); // video, audio, image, link
            $table->text('description');

            $table->integer('content_id')->unsigned();
            $table->foreign('content_id')
                ->references('id')
                ->on('contents')
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
            Schema::table('medias', function(Blueprint $table) {
                $table->dropForeign('media_content_id_foreign');
            });
        }
        Schema::dropIfExists('medias');
    }
};

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
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text');

            $table->integer('section_id')->unsigned();
            $table->foreign('section_id')
                ->references('id')
                ->on('section')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('media_id')->unsigned();
            $table->foreign('media_id')
                ->references('id')
                ->on('media')
                ->onDelete('restrict')
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
            Schema::table('contents', function(Blueprint $table) {
                $table->dropForeign('content_media_id_foreign');
                $table->dropForeign('content_section_id_foreign');
            });
        }
        Schema::dropIfExists('contents');
    }
};

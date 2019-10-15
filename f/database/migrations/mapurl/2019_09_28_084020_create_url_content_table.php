<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('url_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('domain_id')->nullable(true);
            $table->string('code',7)->unique()->index();
            $table->string('url_long', 255);
            $table->string('keyword', 255);
            $table->string('image', 255);
            $table->string('name',255)->nullable(true);
            $table->longText('description')->nullable(true);
            $table->unsignedInteger('type')->default(0);
            $table->unsignedInteger('action')->default(0);
            $table->unsignedInteger('view_count')->default(0);
            $table->string('lang')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('url_contents');
    }
}

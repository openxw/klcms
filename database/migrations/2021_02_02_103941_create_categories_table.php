<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index()->comment('类别');
            $table->text('description')->nullable()->comment('描述');
            $table->integer('post_count')->default(0)->comment('文章数');
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}

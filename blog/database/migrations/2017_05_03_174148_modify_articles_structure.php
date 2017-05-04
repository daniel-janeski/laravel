<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyArticlesStructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->text('excerpt');
            $table->engine = "InnoDB";
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('excerpt');
            $table->dropForeign('articles_category_id_foreign');
            $table->dropForeign('articles_user_id_foreign');
        });
    }
}

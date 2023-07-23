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
        Schema::table('journal_contributors', function (Blueprint $table) {
            $table->dropForeign('journal_contributors_id_student_foreign');
            $table->dropColumn('id_student');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('journal_contributors', function (Blueprint $table) {
            //
        });
    }
};

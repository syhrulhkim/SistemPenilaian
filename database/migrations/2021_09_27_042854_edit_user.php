<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nostaff')->nullable();
            $table->string('position')->nullable();
            $table->string('department')->nullable();
            $table->string('unit')->nullable();
            $table->string('grade')->nullable();
            $table->string('role')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nostaff')->nullable();
            $table->dropColumn('position')->nullable();
            $table->dropColumn('department')->nullable();
            $table->dropColumn('unit')->nullable();
            $table->dropColumn('grade')->nullable();
            $table->dropColumn('role')->nullable();
        });
    }
}

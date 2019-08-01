<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVendorIdUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shop_users', function (Blueprint $table) {
            $table->integer('vendor_id');
            //
        });
        Schema::table('shop_vendor', function (Blueprint $table) {
            $table->integer('user_id');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shop_users', function (Blueprint $table) {
            $table->dropColumn('vendor_id');
            //
        });
        Schema::table('shop_vendor', function (Blueprint $table) {
            $table->dropColumn('user_id');
            //
        });
    }
}

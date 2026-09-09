<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('country')->nullable();
        $table->string('state')->nullable();
        $table->string('district')->nullable();
        $table->string('city')->nullable();
        $table->string('house_no')->nullable();
        $table->string('area')->nullable();
        $table->string('landmark')->nullable();
        $table->string('pincode')->nullable();
        $table->text('address')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down():void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'country',
                'state',
                'district',
                'city',
                'house_no',
                'area',
                'landmark',
                'pincode',
                'address',
            ]);
        });
    }
};

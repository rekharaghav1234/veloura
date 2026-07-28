<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('orders', function ($table) {
    
            $table->string('return_request_status')
                  ->nullable()
                  ->after('status');
    
            $table->string('return_approval_status')
                  ->nullable()
                  ->after('return_request_status');
    
            $table->string('return_process_status')
                  ->nullable()
                  ->after('return_approval_status');
    
        });
    }
    
    public function down()
    {
        Schema::table('orders', function ($table) {
    
            $table->dropColumn([
                'return_request_status',
                'return_approval_status',
                'return_process_status'
            ]);
    
        });
    }
};

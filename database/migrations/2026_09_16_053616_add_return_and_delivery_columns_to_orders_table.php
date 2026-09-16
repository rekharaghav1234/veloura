<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->timestamp('delivered_at')->nullable()->after('status');

            $table->string('return_request_status')->nullable()->after('delivered_at');

            $table->string('return_approval_status')->nullable()->after('return_request_status');

            $table->string('return_process_status')->nullable()->after('return_approval_status');

        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn([
                'delivered_at',
                'return_request_status',
                'return_approval_status',
                'return_process_status'
            ]);

        });
    }
};
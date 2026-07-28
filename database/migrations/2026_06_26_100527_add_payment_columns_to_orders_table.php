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
        Schema::table('orders', function (Blueprint $table) {

            // Customer Details
            $table->string('country')->default('India')->after('phone');
            $table->string('state')->nullable()->after('country');
            $table->string('district')->nullable()->after('state');
            $table->string('city')->nullable()->after('district');
            $table->string('pincode')->nullable()->after('city');
        
            $table->string('house_no')->nullable()->after('address');
            $table->string('area')->nullable()->after('house_no');
            $table->string('landmark')->nullable()->after('area');
        
            // Order Status
            $table->string('order_status')
                  ->default('placed')
                  ->after('payment_method');
        
            // Payment
            $table->string('payment_status')
                  ->default('pending')
                  ->after('order_status');
        
            $table->string('transaction_id')
                  ->nullable()
                  ->after('payment_status');
        
            $table->string('razorpay_order_id')
                  ->nullable()
                  ->after('transaction_id');
        
            $table->string('razorpay_payment_id')
                  ->nullable()
                  ->after('razorpay_order_id');
        
            $table->string('razorpay_signature')
                  ->nullable()
                  ->after('razorpay_payment_id');
        
            // Delivery
            $table->date('estimated_delivery')
                  ->nullable()
                  ->after('razorpay_signature');
        
            $table->timestamp('delivered_at')
                  ->nullable()
                  ->after('estimated_delivery');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};

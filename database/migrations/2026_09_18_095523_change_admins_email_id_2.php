<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('users')
            ->where('id', 2)
            ->update([
                'email' => 'rekharaghav7017@gmail.com',
            ]);
    }

    public function down(): void
    {
        DB::table('users')
            ->where('id', 2)
            ->update([
                'email' => 'rekharaghav70@gmail.com',
            ]);
    }
};
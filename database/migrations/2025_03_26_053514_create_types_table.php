<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('allow_delete')->default(true);
            $table->timestamps();
        });
        DB::unprepared("
            CREATE TRIGGER prevent_deletion BEFORE DELETE ON types
            FOR EACH ROW
            BEGIN
                IF OLD.allow_delete = 0 THEN
                    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Deletion of this record is not allowed';
                END IF;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS prevent_deletion");
        Schema::dropIfExists('types');
    }
};

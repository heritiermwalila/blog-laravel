<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        if (!Schema::hasTable('users')) {
            //
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('role_id')->index()->unsigned()->nullable();
                $table->integer('is_active')->default(0);
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        }

        
        if (!Schema::hasColumn('users', 'photo_id')) {
            //
            
            Schema::table('users', function($table) {
                //
                $table->integer('photo_id')->default(0);
            });
            
        }
        
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            
            $table->dropColumn('photo_id');
            
        });
        Schema::dropIfExists('users');
    }
}

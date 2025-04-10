<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //↓カラム構造を記載
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // 自動インクリメントの符号なし整数のプライマリキー
            $table->string('username', 255);
            $table->string('email', 255)->unique(); // 一意制約=重複不可
            $table->string('password', 255);
            $table->string('bio', 400)->nullable(); //null YES
            $table->string('icon_image', 255)->default('icon1.png');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('current_timestamp on update current_timestamp'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //「usersテーブルを削除する」(自動生成)
    {
        Schema::dropIfExists('users');
    }
}

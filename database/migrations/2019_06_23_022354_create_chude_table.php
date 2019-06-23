<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chude', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('cd_ma')
                ->autoIncrement()->comment('Mã chủ đề');
            $table->string('cd_ten', 50)
                  ->comment('Tên chủ đề # Tên chủ đề');
            $table->timestamp('cd_taoMoi')
                  ->default(DB::raw('CURRENT_TIMESTAMP'))
                  ->comment('Thời điểm tạo # Thời điểm đầu tiên tạo chủ đề');
            $table->timestamp('cd_capNhat')
                   ->default(DB::raw('CURRENT_TIMESTAMP'))
                   ->comment('Thời điểm cập nhật # Thời điểm cập nhật chủ đề gần nhất');
            $table->tinyInteger('cd_trangThai')
                   ->default('2')
                   ->comment('Trạng thái # Trạng thái chủ đề: 1-khóa, 2-khả dụng');
            
            $table->unique(['cd_ten']);
        });
        DB::statement("ALTER TABLE `chude` comment 'Chủ đề # chủ đề'");
          
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chude');
    }
}

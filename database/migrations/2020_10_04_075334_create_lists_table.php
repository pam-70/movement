<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->id();
            $table->string('surname')->nullable();
            $table->string('name')->nullable();
            $table->string('partronic')->nullable();
            $table->date('born')->nullable();//дата рождения
            $table->string('gender')->nullable();
            $table->string('klass')->nullable();//класс
            $table->string('prefiks')->nullable();//префикс класса
            $table->string('case')->nullable();//номер дела
            $table->string('document')->nullable();//паспорт            
            $table->text('address')->nullable();
            $table->text('snils')->nullable();
            $table->string('movement')->nullable();//прибыл(1) убыл(-1) закончил школу(9)
            $table->date('arrival')->nullable();//прибытие date departure
            $table->string('order_pr')->nullable();//Номер приказа прибытия
            $table->date('departure')->nullable();//убытие дата
            $table->string('order_ub')->nullable();//Номер приказа убытия

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lists');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');                          // заголовок  
            $table->string('slug')->unique();                 // http://mysite/admin/article/slug
            $table->text('description_short')->nullable();    //краткое описание
            $table->text('description');                      //новое описание
            $table->string('meta_title')->nullable();         //meta загаловок 
            $table->string('meta_description')->nullable();   //meta описанеие
            $table->string('meta_keyword')->nullable();       //ключевые слова
            $table->boolean('published');                     //печатать или нет
            $table->integer('viewed')->nullable();            //кол во просмотров
            $table->integer('created_by')->nullable();        //кем создано
            $table->integer('modified_by')->nullable();       //кем изменено
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
        Schema::dropIfExists('articles');
    }
}

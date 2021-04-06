<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/*
 * Заявки
 */
class CreateBidsTable extends Migration
{
    public $tableName = 'bids';

//Статусы
//
//- новая заявка
//5 не обработана
//4 ошибка данных
//3 нет видео
//2 в работе
//1 допущена к оценке
//0 завершена

    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['amateur', 'professional'])->comment('профессиональный - любительский');
            $table->enum('cnt_people', ['solist', 'kollective'])->comment('солист - коллектив');

            $table->unsignedBigInteger('competition_id')->nullable()->comment('конкурс');
            $table->unsignedBigInteger('nomination_id')->nullable()->comment('номинация');
            $table->unsignedBigInteger('age_group_id')->nullable()->comment('возрастная группа');
            $table->unsignedBigInteger('tariff_id')->nullable()->comment('тариф');
//            $table->unsignedBigInteger('direction_id')->nullable()->comment('напраление');
//            $table->enum('type', ['festival', 'genre'])->nullable()->comment('фестивальный или жанровый');

            $table->string('musical_instrument')->nullable()->comment('музыкальный инструмент');
            $table->string('musical_number')->nullable()->comment('название номера');
            $table->string('koll_name')->nullable()->comment('Название коллектива');
            $table->string('educational_institution')->nullable()->comment('Название учебного заведения');

            $table->tinyInteger('quantity_kollective_diploma')->nullable()->comment('количество печатных коллективных дипломов');

            $table->enum('payment_state', ['0', '1'])->comment('статус оплаты');
            $table->enum('new_state', ['1', '0'])->comment('новая заявка');
            $table->enum('processe_state', ['5', '4', '3', '2', '1', '0'])->comment('Текущий статус');

//            $table->tinyInteger('cnt_person_diploma')->nullable()->comment('количество коллективных дипломов'); todo: в таблицу пользователя

            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('state')->nullable()->comment('область - край');
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->string('house')->nullable()->comment('номер дома');
            $table->string('apartment')->nullable()->comment('номер квартиры');
            $table->string('postcode')->nullable()->comment('индекс');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->string('resource')->nullable();
            $table->string('link_to_resource')->nullable();

            $table->string('appraisal')->nullable()->comment('оценка');

            $table->longText('comment')->nullable();



            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
/*
"type" => "professional"
"competition_id" => null
"nomination_id" => null
"cnt_people" => "false"
"musical_instrument" => null
"musical_number" => null
"age_group_id" => "0"
"koll_name" => null
"educational_institution" => null

"country" => null
"city" => null
"street" => null
"house" => null
"apartment" => null
"postcode" => null
"email" => null
"phone" => null
"state" => null

"resource" => "youtube"
"link_to_resource" => null



"participant_first_name" => array:1 [▼
0 => null
]
"participant_last_name" => array:1 [▼
0 => null
]
"cnt_diploma" => "1"
"teacher_diploma" => "on"
"general_diploma_print" => "on"

*/

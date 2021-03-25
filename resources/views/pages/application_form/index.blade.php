@extends('layouts.app')

@section('head_scripts')
<style>
    /*#step-1 > div:nth-child(1) > div:nth-child(3) > div > div > div > button:nth-child(1)*/
    /*#step-1 #cnt_people + div button.nativejs-select__option {
        padding: 0 0 0 10px !important;
    }
    #step-3 #nomination + div.nativejs-select{
        margin-top: 0;
    }
    #step-4 #tariff_menu .active {
        color: #fff;
        background-color: #db1e39;
    }

    #step-4 .tarif input[type="radio"]{
        height: auto;
    }*/

    #tariff_tabs .amateur,
    #tariff_tabs .professional{
        display: none;
    }
    #tariff_tabs .active{
        display: block;
    }
    #step-4 .tarif input[type="radio"]{
        height: auto;
    }

    .type-order label{
        padding: 10px;
        background-color: #DBDBDB;
        color: #000000;
    }
    .type-order label.active{
        background-color: #db1e39;
        color: white;
        font-weight: bold;
    }
    .type-order label input{
        height: 16px;
    }
    #resource + div.nativejs-select{
        margin-top: 0;
    }
    *[v-cloak] {
        display: none;
    }
</style>
@endsection

@section('content')
    <section id="app" class="quiz" v-cloak>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="head-quiz">
                        <div class="progress-bar">
                            <div class="circle-big">
                                <div class="text">@verbatim {{ num_step }} @endverbatim</div>
                                <svg>
                                    <circle class="bg" cx="44" cy="44" r="37"></circle>
                                    <circle class="progress" cx="44" cy="44" r="37" @verbatim :style="{strokeDashoffset: stroke_dashoffset}" @endverbatim></circle>
                                </svg>
                            </div>
                        </div>
                        <div class="title-head">
                            <div>
                                <div class="type">Бесплатные конкурсы</div>
                                <div class="order-num">Заявка №156</div>
                            </div>
                            <div class="price-item">
                                <h4>Общая стоимость(руб.):</h4>
                                <div id="show_price" class="price">@verbatim {{ current_price }} @endverbatim</div>
                            </div>
                        </div>

                        <div class="inform" v-show="active_step_1">
                            <p>Для вашего удобства мы сделали заполнение данных в несколько коротких этапов!</p>
                            <p class="red">Это займет всего несколько минут!</p>
                        </div>
                    </div>
                    <form id="application_form">
                    <!--Шаг 1-->
                    <div class="quiz-step" :class="{active: active_step_1}" id="step-1">
                        <div class="fields">
                            <div class="field">
                                <div @change="changeType($event.target)"  id="types" class="type-order" style="margin-top: 20px">
                                    <label :class="{active: !active_professional}">
                                        <input type="radio" name="type" value="amateur" class="btn-black" style="padding: 15px 28px"
                                               v-model="type"
                                        ><i class="demo-icon icon-user"></i> Любительский
                                    </label>
                                    <label :class="{active: active_professional}">
                                        <input type="radio" name="type" value="professional" class="btn-black" style="padding: 15px 28px"
                                               v-model="type"
                                        ><i class="demo-icon icon-users"></i> Профессиональный
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-33">
                                <?php
                                /*$competitions = [];

                                $obj1 = new stdClass();
                                $obj1->id = 1;
                                $obj1->name = 'Голос России 1';
                                $obj1->price = 100;

                                $obj2 = new stdClass();
                                $obj2->id = 1;
                                $obj2->name = 'Голос России 2';
                                $obj2->price = 200;

                                $obj3 = new stdClass();
                                $obj3->id = 1;
                                $obj3->name = 'Голос России 3';
                                $obj3->price = 300;

                                $competitions[] = $obj1;
                                $competitions[] = $obj2;
                                $competitions[] = $obj3;*/
                                ?>
                                <legend>Название конкурса </legend>
                                    @verbatim
                                <select name="competition_name" id="competition_name" @change="selectCompetition($event.target)" required>
                                    <option value=''>-------</option>
                                    <option :value='item.id' v-for="item in competitions" :key="item">{{ item.name }}</option>
                                </select>
                                    @endverbatim
                            </div>
                            <div class="field field-33">
                                <legend>Номинация</legend>
                                <select @change="instrument" name="nomination" id="nomination" required ref="nomination">
                                    <option value="0">-----</option>
                                    <option value="Instrumental">Инструментальный</option> <!-- {type:Instrumental, name:'Инструментальный', id:23} -->
                                    <option value="">Сольное исполнение</option>
                                    <option value="">Голос России 3</option>
                                </select>
                            </div>
                            <div class="field field-33">
                                <legend>Солист / Коллектив</legend>
                                <select @change="instrument" name="cnt_people" id="cnt_people" required ref="cnt_people">
                                    <option value="0">-----</option>
                                    <option value="1">Солист</option>
                                    <option value="2">Коллектив</option>
                                </select>
                            </div>
                        </div>
                        <div class="fields" v-show="show_instrumental">
                            <div class="field field-100">
                                <legend>Название музыкального инструмента</legend>
                                <input type="text" placeholder="Введите название музыкального инструмента">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-100">
                                <legend>Название номера </legend>
                                <input type="text" placeholder="Введите название номера" style="margin-top: 23px">
                            </div>
                        </div>
                        <div class="quiz-steps-btn">
                            <button @click.prevent="btn_next_step_2" id="btn_to_step2" class="btn btn-border-red next-step-2">Вперед</button>
                        </div>
                    </div>

                    <!--Шаг 2-->
                    <div class="quiz-step" id="step-2" :class="{active: active_step_2}">
                        <div class="fields fields-align-end" v-if="show_collective_name">
                            <div id="kollective_name" class="field field-100">
                                <legend>Название коллектива</legend>
                                <input type="text" name="koll_name" required>
                            </div>
                        </div>
                        <div class="fields field-100">
                            <div class="field field-50">
                                <legend>Страна</legend>
                                <input type="text">
                            </div>
                            <div class="field field-50">
                                <legend>Город</legend>
                                <input type="text">
                            </div>
                            <div class="field field-100" style="margin-top: 20px">
                                <legend>Учебное заведение</legend>
                                <input type="text">
                            </div>
                        </div>

                        <div class="participants">
                            <participant
                                v-for="(item, index) in participants"
                                :key="index"
                                :counter="item.counter"
                                :active_professional="active_professional"
                                :current_price="current_price"
                                :one_participant="one_participant"
                                @change_price="changePriceFromParticipant"
                            ></participant>
                        </div>

                        <div class="fields" style="margin-bottom: 80px" v-show="show_add_participant">
                            <div class="field field-100">
                                <button @click.prevent="addParticipant" id="add_participant" class="add"><i class="demo-icon icon-plus-circle"></i>Указать участника</button>
                            </div>
                        </div>

                        <div id="checks_teachers" class="fields">
                            <div class="field field-100">
                                <p>Если необходимо благодарственное письмо для педагога, введите личные данные препадователя</p>
                            </div>

                            <div class="teachers" style="margin-top: 30px">
                                <teacher
                                    :counter="teacher.counter"
                                    :active_professional="active_professional"
                                    @change_price="changePriceFromTeacher"
                                    v-for="(teacher, index) in teachers"
                                    :key="index"
                                ></teacher>
                            </div>

                            <div id="wrap_btn_add_teacher" class="field field-70">
                                <button @click.prevent="addTeacher" id="btn_add_teacher" class="add add-teacher"><i class="demo-icon icon-plus-circle"></i>Добавить педагога</button>
                            </div>
                        </div>
                        <div class="add-teacher-fields">
                            <!--<template id="template_add_teacher">
                                <div class="fields field-100 teacher-item">
                                    <div class="fields field-100">
                                        <div class="field field-33">
                                            <legend>Имя педагога</legend>
                                            <input type="text">
                                        </div>
                                        <div class="field field-33">
                                            <legend>Фамилия педагога</legend>
                                            <input type="text">
                                        </div>
                                        <div class="field field-33">
                                            <legend>Отчество педагога</legend>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="fields field-100 fields-align-center">
                                        <div class="field field-100">
                                            <legend>Должность педагога</legend>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="field field-33">
                                        <button @click.prevent="" class="btn btn-border-red" style="margin-top: 20px">Удалить педагога</button>
                                    </div>
                                    <hr style="display: block; width: 100%; margin-bottom: 20px;">
                                </div>
                            </template>-->

                            <div class="fields">
                                <div class="field field-100">
                                    <button class="add"><i class="demo-icon icon-plus-circle"></i>Добавить педагога</button>
                                </div>
                            </div>
                        </div>


                        <div class="quiz-steps-btn">
                            <button @click.prevent="prev_step_1" class="btn btn-border-gray prev-step-1">Назад</button>
                            <button @click.prevent="btn_next_step_3" class="btn btn-border-red next-step-3">Вперед</button>
                        </div>
                    </div>
                    <!--Шаг 3-->
                    <div class="quiz-step" id="step-3" :class="{active: active_step_3}">
                        <div class="fields">
                            <div class="field field-33">
                                <legend>Ресурс</legend>
                                <select name="" id="resource" required>
                                    <option value="">Youtube</option>
                                    <option value="">Вконтакте</option>
                                    <option value="">Однокласники</option>
                                </select>
                            </div>
                            <div class="field field-33">
                                <legend>Добавьте ссылку на видео</legend>
                                <input type="text" placeholder="Место для вашей ссылки">
                            </div>
                            <div class="field field-33">
                                <div class="links-question">
                                    <a href="" class="link-question">Как подготовить видео для участия</a>
                                    <a href="" class="link-question">Как загрузить видео на Youtube</a>
                                </div>
                            </div>
                        </div>
                        <div class="fields">

                            <div class="field field-100">
                                <p class="attention"><strong>ВНИМАНИЕ!</strong> Для участия в конкурсе обязательно предоставление видеозаписи. Если в данный момент у Вас отсутствует возможность загрузки видеозаписи, то после оплаты участия Вам придет письмо на электронную почту, где Вы сможете указать ссылку на видеозапись.</p>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-100">
                                <legend>Комментарий</legend>
                                <textarea name="" placeholder="Введите дополнительную информацию по заявке..."></textarea>
                            </div>

                        </div>

                        <div class="quiz-steps-btn">
                            <button @click.prevent="btn_prev_step_2" class="btn btn-border-gray prev-step-2">Назад</button>
                            <button @click.prevent="btn_next_step_4" class="btn btn-border-red next-step-4">Вперед</button>
                        </div>
                    </div>
                    <!--Шаг 4-->
                    <div class="quiz-step" id="step-4" :class="{active: active_step_4}">
                        <div class="fields">
                            <div class="field field-50">
                                <h3><a href="{{ asset('') }}" target="_blank">Пример вашего диплома</a></h3>
                            </div>
                            <div class="field field-100" style="margin-bottom: 50px">
                                <div id="tariff_tabs" style="margin-top: 50px">
                                    <div class="tab amateur" :class="{active: !active_professional}">
                                        <div class="tarifs">
                                            <h3>Выберите тариф</h3>
                                            <div class="wrapper">
                                                @verbatim
                                                <label v-for="(tariff, index) in tariffs">
                                                <div class="tarif">
                                                    <input @change="addTariffToPrice($event.target)" type="radio" name="tariff_radio" :value="tariff.price" :checked="index == 0">
                                                    <div class="title">{{ tariff.name }}</div>
                                                    <div class="term">срок <span>до {{ tariff.duration }} дней</span></div>
                                                    <div class="info">Результат будет известен до <span class="date">{{ tariff.date }}</span> </div>
                                                    <div class="price" v-if="tariff.price == 0">Бесплатно</div>
                                                    <div class="price" v-else>+ {{ tariff.price }} ₽</div>
                                                </div>
                                                </label>
                                            @endverbatim
                                                <!--<label> 15.02.2021
                                                <div class="tarif">
                                                    <input type="radio" name="tariff_radio" value="">
                                                    <div class="title">Оптимальный</div>
                                                    <div class="term">срок <span>до 15 дней</span></div>
                                                    <div class="info">Результат будет известен до 30.01.2021</div>
                                                    <div class="price">+ 400 ₽</div>
                                                </div>
                                                </label>
                                                <label>
                                                <div class="tarif">
                                                    <input type="radio" name="tariff_radio" value="">
                                                    <div class="title">Срочный</div>
                                                    <div class="term">срок <span>до 3-х дней</span></div>
                                                    <div class="info">Результат будет известен до 15.02.2021</div>
                                                    <div class="price">+ 600 ₽</div>
                                                </div>
                                                </label>
                                                <label>
                                                <div class="tarif">
                                                    <input type="radio" name="tariff_radio" value="">
                                                    <div class="title">Супер-срочный</div>
                                                    <div class="term red">срок <span>1 день</span></div>
                                                    <div class="info">Результат будет известен до 15.02.2021</div>
                                                    <div class="price">+ 1000 ₽</div>
                                                </div>
                                                </label>-->
                                            </div>
                                        </div>

                                        <!--<div class="field field-100">
                                            <legend>Получить благодарственное письмо для педагога</legend>
                                            <div class="checks" style="margin-bottom: 20px">
                                                <input type="checkbox" class="checkbox" id="checkbox_1" />
                                                <label for="checkbox_1">Электронный</label>
                                            </div>
                                            <legend>Индивидуальный диплом для каждого участника (от 2 и более ч-к)</legend>
                                            <div class="checks" style="margin-bottom: 20px">
                                                <input type="checkbox" class="checkbox" id="checkbox_2" />
                                                <label for="checkbox_2">Электронный</label>
                                            </div>
                                        </div>-->

                                    </div>
                                    <div class="tab professional" :class="{active: active_professional}">
                                    <!-- professional -->
                                        <div class="field field-50" style="margin-bottom: 40px">
                                            <legend>Возрастная категория</legend>
                                            <select name="" id="age_group" required>
                                                <option value="0">Выберите категорию</option>
                                                <option value="">Дошкольники</option>
                                                <option value="">Младшие классы</option>
                                                <option value="">Старшие классы</option>
                                                <option value="">Взрослые</option>
                                            </select>
                                        </div>
                                        <div class="field field-100">
                                            <legend>Именной диплом (для 1)</legend>
                                            <div class="checks" style="margin-bottom: 20px">
                                                <input type="checkbox" class="checkbox" id="checkbox_3" checked>
                                                <label for="checkbox_3">Электронный</label>

                                                <input type="checkbox" class="checkbox" id="checkbox_4">
                                                <label for="checkbox_4">Оригинальный</label>
                                            </div>

                                            <legend>Благодарственное письмо наставнику</legend>
                                            <div class="checks" style="margin-bottom: 20px">
                                                <input type="checkbox" class="checkbox" id="checkbox_5">
                                                <label for="checkbox_5">Электронный</label>

                                                <input type="checkbox" class="checkbox" id="checkbox_6">
                                                <label for="checkbox_6">Оригинальный</label>
                                            </div>

                                            <legend>Диплом для каждого участника (если 2 и более)</legend>
                                            <div class="checks" style="margin-bottom: 20px">
                                                <input type="checkbox" class="checkbox" id="checkbox_7">
                                                <label for="checkbox_7">Электронный</label>

                                                <input type="checkbox" class="checkbox" id="checkbox_8">
                                                <label for="checkbox_8">Оригинальный</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field field-50">

                                <div class="item">
                                    <input type="checkbox" class="checkbox" id="checkbox2" />
                                    <label for="checkbox2">Подтверждаю правильность указанных данных</label>
                                </div>
                            </div>
                        </div>
                        <div class="quiz-steps-btn">
                            <button @click.prevent="btn_prev_step_3" class="btn btn-border-gray prev-step-3">Назад</button>
                            <button @click.prevent="btn_next_step_5" class="btn btn-border-red next-step-5">Перейти к оплате</button>
                        </div>
                    </div>
                    <!--Шаг 5-->
                    <div class="quiz-step" id="step-5" :class="{active: active_step_5}">
                        <div class="fields">
                            <div class="field field-50">
                                <legend>E-mail</legend>
                                <input type="text" placeholder="Введите адрес электронной почты">
                                <p>На указанную электронную почту будет отправлена ссылка для загрузки видео и после прохождения конкурса отправлен диплом. <b>Обязательно проверьте на правильность!</b></p>
                            </div>
                            <div class="field field-50">
                                <legend>Номер телефона</legend>
                                <input type="text" placeholder="Введите номер телефона">
                                <p>Желательно с WhatsApp для комфортного международного общения.</p>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-100">
                                <p>Укажите адрес, куда отправить оригиналы дипломов</p>
                            </div>
                        </div>
                        <div class="fields fields-align-end">
                            <div class="field field-50">
                                <legend>Страна участника</legend>
                                <select name="" id="country">
                                    <option value="">Россия</option>
                                    <option value="">Россия</option>
                                    <option value="">Россия</option>
                                </select>
                            </div>
                            <div class="field field-50">
                                <p class="red">Участники ближнего зарубежья оплачивают дополнительно 300 ₽ за международное почтовое отправление</p>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-70">
                                <legend>Район, область</legend>
                                <select name="" id="state">
                                    <option value="">Введите название области/края/района</option>
                                    <option value="">Россия</option>
                                    <option value="">Россия</option>
                                </select>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-70">
                                <legend>Населенный пункт</legend>
                                <select name="" id="city">
                                    <option value="">Введите населенный пункт участника</option>
                                    <option value="">Россия</option>
                                    <option value="">Россия</option>
                                </select>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-25">
                                <legend>Улица</legend>
                                <input type="text" placeholder="Введите название улицы">
                            </div>
                            <div class="field field-25">
                                <legend>Дом</legend>
                                <input type="text" placeholder="Введите номер">
                            </div>
                            <div class="field field-25">
                                <legend>Квартира</legend>
                                <input type="text" placeholder="Введите номер">
                            </div>
                            <div class="field field-25">
                                <legend>Индекс</legend>
                                <input type="text" placeholder="Введите индекс">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-50">
                                <p>По окончании прведения конкурса Вам на электронную почту будет<br /> отправлено письмо с трек-номером отправления.</p>
                            </div>
                        </div>



                        <div class="detailed-cost">
                            <h3>Подробная стоимость</h3>
                            <table>
                                <thead>
                                <tr>
                                    <th>Наименование</th>
                                    <th>Количество</th>
                                    <th>Стоимость, ₽</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Основной взнос</td>
                                    <td>1</td>
                                    <td>246</td>
                                </tr>
                                <tr>
                                    <td>Количество участников</td>
                                    <td>-</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Количество педагогов</td>
                                    <td>-</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Диплом в электронном виде для участника</td>
                                    <td>0</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Благодарственное письмо для педагогаТариф</td>
                                    <td>70</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Тариф</td>
                                    <td>Оптимальный</td>
                                    <td>400</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="2">Итого:</td>
                                    <td>716</td>
                                </tr>
                                </tfoot>
                            </table>
                            <p>Нажимая кнопку «Оплатить», вы соглашаетесь с <a href="">условиями положения конкурса</a> и<br /> даете свое <a href="">согласие на обработку персональных данных.</a></p>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-red btn-buy">Оплатить онлайн</button>
                        </div>
                        <div class="fields">
                            <div class="field field-50">
                                <p class="big">Подать заявку на участие в конкурсе, но <a href="">оплатить с помощью квитанции</a></p>
                                <p>На указанную эл.почту будет отправлена квитанция на оплату и ссылка для возможности оплаты онлайн. Подробнее <a href="">здесь</a>. <b>Без оплаты заявка не рассматривается.</b></p>
                            </div>
                            <div class="field field-50 text-right">
                                <button class="btn btn-border-red">Получить квитанцию</button>
                            </div>
                        </div>
                        <div class="quiz-steps-btn">
                            <button @click.prevent="btn_prev_step_4" class="btn btn-border-gray prev-step-4">Назад</button>
                        </div>
                    </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_scripts')

    <script src="{{ asset('assets/front/js/vue.3.0.7.js') }}"></script>
    <script>
        // отображение цены
        // let show_price = $('#show_price');
        // Тип конкурса бесплатный/профессиональный
        let tariff_type = null;
{{--    Цены    --}}

{{-- любительские конкурсы --}}
    // Конкурсы
    /*let competitions = [
        {
            id: 1,
            name: 'Голос России 1',
            price: 150
        },
        {
            id: 2,
            name: 'Голос России 2',
            price: 200
        },
        {
            id: 3,
            name: 'Голос России 3',
            price: 250
        },
    ];*/
    // Один участник (БАЗОВАЯ СТАВКА)
    let one_participant = 90;
    // индивидуальный диплом каждому участнику коллектива
    let individual_diploma = 70;
    // Коллектив если любительский
    let group = 100;
    // Благодарность педагогу
    let thanks_teacher = 90;
    // Тарифы
    let tariffs = [
        {
            id: 1,
            price: 0,
            name: 'Выгодный',
            duration: 30 // результат через дней
        },
        {
            id: 2,
            price: 0,
            name: 'Оптимальный',
            duration: 15 // результат через дней
        },
        {
            id: 3,
            price: 0,
            name: 'Срочный',
            duration: 3 // результат через дней
        },
        {
            id: 4,
            price: 0,
            name: 'Супер-срочный',
            duration: 1 // результат через дней
        },
    ];

{{-- Профессиональные конкурсы --}}
// Профессианолизм
// let professionalism = 100;
// если конкурс международный то с участников не из России
let international = 300;
// печатный диплом коллектива либо индивдуальный диплом участника
let printed_diploma = 200;
// Возрастные категории
let age_categories = [
    {
        id: 1,
        name: 'Дошкольники',
        price: 100
    },
    {
        id: 1,
        name: 'Младшие классы',
        price: 200
    },
    {
        id: 1,
        name: 'Старшие классы',
        price: 300
    },
    {
        id: 1,
        name: 'Взрослые',
        price: 400
    },
];

// отменяем действия всех кнопок в форме по умолчанию
/*$('#application_form').find('button').on('click', function (e){
    e.preventDefault();
});*/




        // amateur
        // professional
        const App = {
            data(){
                return {
                    counter: 0,
                    active_step_1: true,
                    active_step_2: false,
                    active_step_3: false,
                    active_step_4: false,
                    active_step_5: false,
                    active_professional: false,
                    // поле название инструмента
                    show_instrumental: false,
                    show_collective_name: false,
                    show_add_participant: true,
                    num_step: '1',
                    stroke_dashoffset: '284',
                    current_price: 0,
                    old_price: 0,
                    old_price_tariff: 0,
                    type: 'amateur',
                    // Один участник или один диплом (БАЗОВАЯ СТАВКА)
                    one_participant: 90,
                    // Благодарность педагогу
                    thanks_teacher: 90,

                    // Профессианолизм
                    professionalism: 100,
                    // Бесплатный всегда 0
                    amateur: 0,
                    //selectCompetition: '',
                    // конкурсы
                    competitions: [
                        {
                            id: 1,
                            name: 'Голос России 1',
                            price: 150
                        },
                        {
                            id: 2,
                            name: 'Голос России 2',
                            price: 200
                        },
                        {
                            id: 3,
                            name: 'Голос России 3',
                            price: 250
                        },
                    ],
                    // тарифы
                    tariffs: [
                        {
                            id: 1,
                            price: 0,
                            name: 'Выгодный',
                            duration: 30 // результат через дней
                        },
                        {
                            id: 2,
                            price: 400,
                            name: 'Оптимальный',
                            duration: 15 // результат через дней
                        },
                        {
                            id: 3,
                            price: 600,
                            name: 'Срочный',
                            duration: 3 // результат через дней
                        },
                        {
                            id: 4,
                            price: 1000,
                            name: 'Супер-срочный',
                            duration: 1 // результат через дней
                        },
                    ],
                    participants: [],
                    teachers: [],
                }
            },
            methods: {
                btn_next_step_2(){
                    this.active_step_1 = false
                    this.active_step_2 = true
                    this.stroke_dashoffset = '238'
                    this.num_step = '2'
                    if (this.$refs.cnt_people.value === '2'){
                        this.show_collective_name = true
                    }else {
                        this.show_collective_name = false
                    }
                },
                prev_step_1(){
                    this.active_step_1 = true
                    this.active_step_2 = false
                    this.stroke_dashoffset = '284'
                    this.num_step = '1'
                },
                changeType(target){
                    let num = null;
                    if (target.tagName === 'LABEL'){
                        num = target.children[0].value
                    }else if (target.tagName === 'INPUT'){
                        num = target.value
                    }
                    if (num === 'professional'){
                        this.current_price = parseInt(this.current_price) + parseInt(this.professionalism)
                        this.active_professional = true
                    }else if (num === 'amateur'){
                        this.current_price = parseInt(this.current_price) - parseInt(this.professionalism)
                        this.active_professional = false
                    }
                },
                selectCompetition(target){
                    old_item = this.competitions.filter(item => item.selected)[0]
                    item = this.competitions.filter(item => parseInt(item.id) === parseInt(target.value))[0]

                    if (old_item !== undefined){
                        this.current_price = parseInt(this.current_price) - parseInt(old_item.price) + parseInt(item.price)
                        old_item.selected = false
                    }else {
                        this.current_price = parseInt(item.price)
                    }
                    item.selected = true
                },
                instrument(){
                    if (this.$refs.nomination.value === 'Instrumental' && this.$refs.cnt_people.value === '1'){
                        this.show_instrumental = true
                    }else {
                        this.show_instrumental = false
                    }
                },
                // второй шаг
                // добавить участника
                addParticipant(){
                    this.counter++
                    this.participants.push({
                        counter: this.counter,
                    })
                    if (this.$refs.cnt_people.value === '1'){
                        this.show_add_participant = false
                    }else {
                        this.show_add_participant = true
                    }
                },
                // Добавить педагога
                addTeacher(){
                    ++this.counter
                    this.teachers.push({
                        counter: this.counter,
                    })
                },
                // третий шаг
                btn_next_step_3(){
                    this.active_step_2 = false
                    this.active_step_3 = true
                    this.stroke_dashoffset = '192'
                    this.num_step = '3'
                },
                btn_prev_step_2(){
                    this.active_step_2 = true
                    this.active_step_3 = false
                    this.stroke_dashoffset = '238'
                    this.num_step = '2'
                },
                changePriceFromParticipant(val){
                    if (val > 0){
                        this.current_price = parseInt(this.current_price) + parseInt(this.one_participant)
                    }else {
                        this.current_price = parseInt(this.current_price) - parseInt(this.one_participant)
                    }

                },
                changePriceFromTeacher(val){
                    // console.log(val)
                    if (val > 0){
                        this.current_price = parseInt(this.current_price) + parseInt(this.thanks_teacher)
                    }else {
                        this.current_price = parseInt(this.current_price) - parseInt(this.thanks_teacher)
                    }

                },
                // четвёртый шаг
                btn_next_step_4(){
                    this.active_step_3 = false
                    this.active_step_4 = true
                    this.stroke_dashoffset = '146'
                    this.num_step = '4'
                },
                btn_prev_step_3(){
                    this.active_step_3 = true
                    this.active_step_4 = false
                    this.stroke_dashoffset = '192'
                    this.num_step = '3'
                },
                // добавляем тариф к цене
                addTariffToPrice(target){
                    if (this.old_price_tariff === 0){
                        this.current_price = parseInt(this.current_price) + parseInt(target.value)
                    }else {
                        this.current_price = parseInt(this.current_price) + parseInt(target.value) - parseInt(this.old_price_tariff)
                    }
                    this.old_price_tariff = this.current_price;
                    console.log('changed:', target.value)
                },
                // шаг 5
                btn_next_step_5(){
                    this.active_step_4 = false
                    this.active_step_5 = true
                    this.stroke_dashoffset = '100'
                    this.num_step = '5'
                },
                btn_prev_step_4(){
                    this.active_step_4 = true
                    this.active_step_5 = false
                    this.stroke_dashoffset = '146'
                    this.num_step = '4'
                }
            },
            mounted(){
                this.competitions.forEach(function (item){
                    item.selected = false
                });

                this.tariffs.forEach(function (item, index, arr){
                    let date = new Date();
                    date.setDate(date.getDate() + parseInt(item.duration));
                    date.setMonth(date.getMonth() + 1)
                    item.date = date.getDate() + '.' + date.getMonth() + '.' + date.getFullYear()
                });
            }
        };

        const appl = Vue.createApp(App);

        appl.component('participant', {
            methods: {
                // удалить участника
                deleteParticipant(target){
                    if (target.parentElement.parentElement.querySelector('input[id *="electro"]').checked){
                        this.addDiplomaToPrice(false);
                    }
                    target.parentElement.parentElement.remove();

                },
                // возвращает состояние чекбокса
                addDiplomaToPrice(target){
                    // todo: здесь ещё можно сделать проверку Любительский-Профессиональный
                    let current_price = 0;
                    // чекбокс отмечен или нет
                    if (target.checked){
                        current_price = 1
                    }else {
                        current_price = 0
                    }
                    this.$emit('change_price', current_price);
                }
            },
            props: ['counter', 'active_professional', 'current_price', 'one_participant'],
            template: `<div class="fields participant">
                <div class="field field-100">
                    <hr style="margin-bottom: 20px">
                </div>
                <div class="field field-33">
                    <legend>Имя участника</legend>
                    <input type="text" name="participant_first_name[]" required>
                </div>
                <div class="field field-33">
                    <legend>Фамилия участника</legend>
                    <input type="text" name="participant_last_name[]" required>
                </div>
                <div class="field field-33">
                    <button @click.prevent="deleteParticipant($event.target)" class="btn btn-border-red" style="margin-top: 20px">Удалить участника</button>
                </div>
                                @verbatim
            <div class="field field-100">
                <legend style="margin-top: 30px">Персональный диплом</legend>
                <div class="checks">
                    <input @change="addDiplomaToPrice($event.target)" type="checkbox" class="checkbox" :id="'checkbox_person_diplom_electro-' + counter">
                    <label :for="'checkbox_person_diplom_electro-' + counter">Электронный</label>
                    <input type="checkbox" class="checkbox" :id="'checkbox_person_diplom_printed-' + counter" v-show="active_professional">
                    <label :for="'checkbox_person_diplom_printed-' + counter" v-show="active_professional">Печатный</label>
                </div>
            </div>
                                @endverbatim
            </div>`
        });

        appl.component('teacher', {
            methods: {
                // удалить педагога
                deleteTeacher(target){
                    if (target.parentElement.parentElement.querySelector('input[id *="electro"]').checked){
                        this.addDiplomaToPrice(false);
                    }
                    target.parentElement.parentElement.remove();
                },
                // возвращает состояние чекбокса
                addDiplomaToPrice(target){
                    // todo: здесь ещё можно сделать проверку Любительский-Профессиональный
                    let current_price = 0;
                    // чекбокс отмечен или нет
                    if (target.checked){
                        current_price = 1
                    }else {
                        current_price = 0
                    }
                    this.$emit('change_price', current_price);
                }
            },
            props: ['counter', 'active_professional'],
            template: `<div class="fields field-100 teacher-item">
                <div class="fields field-100">
                    <div class="field field-33">
                        <legend>Имя педагога</legend>
                        <input type="text">
                    </div>
                    <div class="field field-33">
                        <legend>Фамилия педагога</legend>
                        <input type="text">
                    </div>
                    <div class="field field-33">
                        <legend>Отчество педагога</legend>
                        <input type="text">
                    </div>
                </div>
                <div class="fields field-100 fields-align-center">
                    <div class="field field-100">
                        <legend>Должность педагога</legend>
                        <input type="text">
                    </div>
                </div>
                <div class="field field-33">
                    <button @click.prevent="deleteTeacher($event.target)" class="btn btn-border-red" style="margin-top: 20px">Удалить педагога</button>
                </div>
@verbatim
            <div class="field field-100">
                <legend style="margin-top: 30px">Персональный диплом</legend>
                <div class="checks">
                    <input @change="addDiplomaToPrice($event.target)" type="checkbox" class="checkbox" :id="'checkbox_teacher_person_diplom_electro-' + counter">
                    <label :for="'checkbox_teacher_person_diplom_electro-' + counter">Электронный</label>
                    <input type="checkbox" class="checkbox" :id="'checkbox_teacher_person_diplom_printed-' + counter" v-show="active_professional">
                    <label :for="'checkbox_teacher_person_diplom_printed-' + counter" v-show="active_professional">Печатный</label>
                </div>
            </div>
@endverbatim
                <hr style="display: block; width: 100%; margin-bottom: 20px;">
            </div>`
        });

        appl.mount('#app');


    </script>

@endsection

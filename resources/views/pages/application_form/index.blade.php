@extends('layouts.app')

@section('head_scripts')
<style>
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
    .checks input.number{
        max-width: 100px;
    }
    .checks label.number{
        margin-right: 20px;
    }
    #country_first + div.nativejs-select{
        margin-top: 0;
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
                                @verbatim
                                <div class="type">{{ competition_type }}</div>
                                <!--<div class="order-num">Заявка №156</div>-->
                                @endverbatim
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
                                <div id="types" class="type-order" style="margin-top: 20px">
                                    <label :class="{active: !active_professional}">
                                        <input type="radio" name="type" value="amateur" class="btn-black" style="padding: 15px 28px"
                                               :checked="!active_professional"
                                               @click="active_professional = false"
                                        ><i class="demo-icon icon-user"></i> Любительский
                                    </label>
                                    <label :class="{active: active_professional}">
                                        <input type="radio" name="type" value="professional" class="btn-black" style="padding: 15px 28px"
                                               :checked="active_professional"
                                               @click="active_professional = true"
                                        ><i class="demo-icon icon-users"></i> Профессиональный
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-33">
                                <legend>Название конкурса<span class="required">*</span></legend>
                                    @verbatim
                                <select name="competition_name" id="competition_name" required>
                                    <option value=''>-------</option>
                                    <option :value='item.id' v-for="item in competitions" :key="item">{{ item.name }}</option>
                                </select>
                                    @endverbatim
                            </div>
                            <div class="field field-33">
                                <legend>Номинация<span class="required">*</span></legend>
                                @verbatim
                                <select @change="instrument_show();" name="nomination" id="nomination" v-model="nomination_id">
                                    <option value="">-----</option>
                                    <option :value="nomination.id" v-for="nomination in nominations">{{ nomination.name }}</option>
                                </select>
                                @endverbatim
                            </div>
                            <div class="field field-33">
                                <legend>Солист / Коллектив<span class="required">*</span></legend>
                                <select @change="instrument_show(); change_price();" name="cnt_people" id="cnt_people" v-model="solo">
                                    <option :value="true">Солист</option>
                                    <option :value="false">Коллектив</option>
                                </select>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-100" v-show="show_instrumental">
                                <legend>Название музыкального инструмента</legend>
                                <input type="text" placeholder="Введите название музыкального инструмента">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-100">
                                <legend>Название номера </legend>
                                <input type="text" placeholder="Например, Руслан и Людмила" style="margin-top: 23px">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-100" style="margin-bottom: 40px">
                                <legend>Возрастная категория (сделать обязательным)<span class="required">*</span></legend>
                                @verbatim
                                <select
                                    name="age_group"
                                    id="age_group"
                                    required
                                    v-model.number="age_group_id"
                                >
                                    <option value="0">-----</option>
                                    <option :value="group.id" v-for="group in age_groups" :key="group.id">{{ group.name }}</option>
                                </select>
                                @endverbatim
                            </div>
                        </div>
                        <div class="quiz-steps-btn">
                            <button @click.prevent="btn_next_step_2();" id="btn_to_step2" class="btn btn-border-red next-step-2">Вперед</button>
                        </div>
                    </div>

                    <!--Шаг 2-->
                    <div class="quiz-step" id="step-2" :class="{active: active_step_2}">
                        <div class="fields fields-align-end">
                            <div id="kollective_name" class="field field-100">
                                <legend>Название коллектива</legend>
                                <input type="text" name="koll_name" placeholder='Например, музыкальный ансамбль "Мелодия"' required>
                            </div>
                        </div>
                        <div class="fields field-100">
                            <div class="field field-50">
                                <legend>Страна участника<span class="required">*</span></legend>
                                @verbatim
                                <select name="country" id="country_first" v-model="current_country_id">
                                    <option value="">-----</option>
                                    <option v-for="country in countries" :value="country.id" :key="country.id">{{ country.name }}</option>
                                </select>
                                @endverbatim
                            </div>
                            <div class="field field-50">
                                <legend>Город<span class="required">*</span></legend>
                                <input type="text" placeholder="Например, Москва">
                            </div>
                            <div class="field field-100" style="margin-top: 20px">
                                <legend>Учебное заведение</legend>
                                <input type="text" placeholder="Например, ДШИ имени С.В. Рахманинова">
                            </div>
                        </div>

                        <div class="participants">
                            <participant
                                :counter="participant.counter"
                                :active_professional="active_professional"
                                :solo="solo"
                                v-for="(participant, index) in participants"
                                :key="index"
                                @participant_electro_diploma="participant_electro_diploma"
                                @person_cnt_diplom_print="person_cnt_diplom_print"
                                @del_person_cnt_diplom_print="del_person_cnt_diplom_print"
                            ></participant>
                        </div>

                        <!--<div class="fields" style="margin-bottom: 80px" v-show="solo && participants.length > 0">-->
                        <div class="fields" style="margin-bottom: 80px" v-if="!(solo && participants.length > 0)">
                            <div class="field field-100">
                                <button @click.prevent="addParticipant" id="add_participant" class="add"><i class="demo-icon icon-plus-circle"></i>Указать участника</button>
                                <span class="required">*</span>
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
                                    v-for="(teacher, index) in teachers"
                                    :key="index"
                                    @del_teacher="del_teacher"
                                    @teacher_letter="teacher_letter"
                                ></teacher>
                            </div>

                            <div id="wrap_btn_add_teacher" class="field field-70">
                                <button @click.prevent="addTeacher" id="btn_add_teacher" class="add add-teacher"><i class="demo-icon icon-plus-circle"></i>Добавить педагога</button>
                            </div>

                            <div class="field field-100">
                                <legend style="margin-top: 30px" v-if="!solo">Так же нужен общий диплом</legend>
                                <div class="checks">
                                    <input @change="on_diploma_electro" name="diploma_electro_model" type="checkbox" class="checkbox" id="diploma_electro_model" v-if="!solo" v-model="price.diploma_electro_model">
                                    <label for="diploma_electro_model" v-if="!solo">Электронный</label>

                                    <input name="general_diploma_print" type="checkbox" class="checkbox" id="general_diploma_print" v-model="print_checkbox_print_diploma"  v-if="active_professional && !solo">
                                    <label for="general_diploma_print"  v-if="active_professional && !solo">Печатный</label>
                                </div>
                            </div>

                            <div class="field field-100" v-if="print_checkbox_print_diploma">
                                <div class="checks" style="margin-top: 20px; display: flex; align-items: center;">
                                    <label class="number" for="general_diploma_print_cnt">Количество общих печатных дипломов</label>
                                    <input @change="change_price()" name="cnt_diploma" type="number" min="0" class="number" id="general_diploma_print_cnt" v-model.number="price.general_diplom_print_quantity">
                                </div>
                            </div>

                        </div>

                        <div class="add-teacher-fields">
                            <div class="fields">
                                <div class="field field-100">
                                    <button @click.prevent="" class="add"><i class="demo-icon icon-plus-circle"></i>Добавить педагога</button>
                                </div>
                            </div>
                        </div>

                        <div class="quiz-steps-btn">
                            <button @click.prevent="prev_step_1();" class="btn btn-border-gray prev-step-1">Назад</button>
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
                                    <option value="">Файлообменник</option>
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
                                                <label v-for="(tariff, index) in tariffs_filter()">
                                                <div class="tarif">
                                                    <!--<input @change="change_tariff($event.target); change_price();" type="radio" name="tariff_radio" :value="tariff.price" v-model="price.tariff_price">-->
                                                    <!--<input @change="change_price();" type="radio" name="tariff_radio" :value="tariff.price" v-model="price.tariff_price"> todo: price change -->
                                                    <input @change="change_price();" type="radio" name="tariff_radio" :value="tariff" v-model="price.current_tariff">
                                                    <div class="title">{{ tariff.name }}</div>
                                                    <div class="term">срок <span>до {{ tariff.duration }} дней</span></div>
                                                    <div class="info">Результат будет известен до <span class="date">{{ tariff.date }}</span> </div>
                                                    <div class="price" v-if="tariff.price == 0">Бесплатно</div>
                                                    <div class="price" v-else>+ {{ tariff.price }} ₽</div>
                                                </div>
                                                </label>
                                            @endverbatim
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="field field-50">

                                <div class="item">
                                    <input type="checkbox" class="checkbox" id="checkbox2" />
                                    <label for="checkbox2">Подтверждаю правильность указанных данных<span class="required">*</span></label>
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
                                <legend>E-mail<span class="required">*</span></legend>
                                <input type="text" placeholder="Введите адрес электронной почты">
                                <p>На указанную электронную почту будет отправлена ссылка для загрузки видео и после прохождения конкурса отправлен диплом. <b>Обязательно проверьте на правильность!</b></p>
                            </div>
                            <div class="field field-50">
                                <legend>Номер телефона<span class="required">*</span></legend>
                                <input type="text" placeholder="Введите номер телефона">
                                <p>Желательно с WhatsApp для комфортного международного общения.</p>
                            </div>
                        </div>
                        <div class="fields" v-show="active_professional">
                            <div class="field field-100">
                                <p>Укажите адрес, куда отправить оригиналы дипломов</p>
                            </div>
                        </div>
                        <div class="fields fields-align-end" v-show="active_professional">
                            <!--<div class="field field-50">
                                <legend>Страна участника</legend>
                                <select name="" id="country_second">
                                    <option value="">-----</option>
                                    <option value="">Россия</option>
                                    <option value="">Россия</option>
                                    <option value="">Россия</option>
                                </select>
                            </div>-->
                            <div class="field field-50">
                                <p class="red">Участникам ближнего зарубежья автоматически начислится стоимость международного почтового отправление</p>
                            </div>
                        </div>
                        <div class="fields" v-show="active_professional">
                            <div class="field field-70">
                                <legend>Район, область</legend>
                                <input type="text">
                                <!--<select name="" id="state">
                                    <option value="">Введите название области/края/района</option>
                                    <option value="">Россия</option>
                                    <option value="">Россия</option>
                                </select>-->
                            </div>
                        </div>
                        <div class="fields" v-show="active_professional">
                            <div class="field field-70">
                                <legend>Населенный пункт</legend>
                                <input type="text">
                            <!--<select name="" id="city">
                                    <option value="">Введите населенный пункт участника</option>
                                    <option value="">Россия</option>
                                    <option value="">Россия</option>
                                </select>-->
                            </div>
                        </div>
                        <div class="fields" v-show="active_professional">
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
                        <div class="fields" v-show="active_professional">
                            <div class="field field-50">
                                <p>По окончании прведения конкурса Вам на электронную почту будет<br /> отправлено письмо с трек-номером отправления.</p>
                            </div>
                        </div>


                        @verbatim
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
                                <tr v-for="item in price.order" :key="item">
                                    <td>{{ item.name }}</td>
                                    <td>{{ item.quantity }}</td>
                                    <td>{{ item.price }}</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="2">Итого:</td>
                                    <td>{{ price.full_price }}</td>
                                </tr>
                                </tfoot>
                            </table>
                            <p>Нажимая кнопку «Оплатить», вы соглашаетесь с <a href="">условиями положения конкурса</a> и<br /> даете свое <a href="">согласие на обработку персональных данных.</a></p>
                        </div>
                    @endverbatim

                        <!--<div class="detailed-cost">
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
                        </div>-->
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

// amateur
// professional
const App = {
    data(){
        return {
            // Строковое представление типа конкурса
            competition_type: 'Бесплатные конкурсы',
            // используется для уникализации id элементов
            // в участниках уже есть 1, поэтому с 1
            counter: 1,
            active_step_1: true,
            active_step_2: false,
            active_step_3: false,
            active_step_4: false,
            active_step_5: false,
            print_checkbox_print_diploma: false,
            num_step: '1',
            stroke_dashoffset: '284',

            current_price: 0,

            active_professional: false,
            // поле название инструмента
            show_instrumental: false,
            // поле название коллектива
            show_collective_name: false,
            // солист / коллектив
            solo: true,
            solo_type: '',


            price: {
                // Благодарность педагогу
                thanks_teacher: 90,
                thanks_teacher_quantity: 0,

                // стоимость индивидуального диплома для участника в любительском (электронный)
                diploma: 70,
                diploma_quantity: 0,
                // коллективный диплом в любительском конкурсе
                diploma_kollective_electro: 200,
                diploma_electro_model: false,
                diploma_kollective_electro_for_order: 0,

                // цена на текущий тарифф
                // tariff_price: 0,
                current_tariff: {name:'', quantity: 0, price: 0},

                // цена на текущую возрастную группу
                age_group_price: 0,

                // стоимость печати сольного/индивидуального/индивидуальный в СОЛИСТЕ
                // диплома за штуку в профессиональном конкурсе (на бумаге)
                diploma_print_solist: 200,
                diploma_print_solist_quantity: 0, // минимум

                // стоимость печати сольного/индивидуального/индивидуальный в КОЛЛЕКТИВЕ
                // диплома за штуку в профессиональном конкурсе (на бумаге)
                diploma_print_kollective: 200,
                diploma_print_kollective_quantity: 0,

                // Цена общего диплома в профессиональном коллективе
                general_diplom_print: 200,
                // количество общих дипломов
                general_diplom_print_quantity: 0,

                // текущая цена доставки в эту страну
                country_postal_delivery: 0,

                // скидка на каждого последующего участника
                discount: 400,
                // скидка начиная с этого участника
                cnt_person: 2,
                // свыше этого количества участников бесплатно
                max_quantity_participants_price: 5,
                // количество участников. указанных пользователем
                //
                // number_participants: 0,

                // для расчёта. всего дипломов
                tmp_diploms: {},

                // формат - {name: 'наименование', quantity: 1, price: 350}
                order: [],
                full_price: 0
            },

            // конкурсы
            competitions: [
                {
                    id: 1,
                    name: 'Голос России 1',
                },
                {
                    id: 2,
                    name: 'Голос России 2',
                },
                {
                    id: 3,
                    name: 'Голос России 3',
                },
            ],
            // текущая возрастная группа
            age_group_id: 0,
            // возрастные группы
            age_groups: [
                {
                    id: 1,
                    name: 'Дошкольники - 750',
                    price: 750,
                    type: null
                },
                {
                    id: 2,
                    name: 'Младшие классы - 950',
                    price: 950,
                    type: null
                },
                {
                    id: 3,
                    name: 'Старшие классы - 1150',
                    price: 1150,
                    type: null
                },
                {
                    id: 4,
                    name: 'Смешанная - 1350',
                    price: 1350,
                    type: 'mixed_category'
                },
            ],
            // текущая номинация
            nomination_id: '',
            // номинации
            nominations: [
                {
                    id: 1,
                    name: 'Спой-ка!',
                    type: ''
                },
                {
                    id: 2,
                    name: 'Сыграй-ка! (Инструментальная)',
                    type: 'instrumental'
                },
                {
                    id: 3,
                    name: 'Потанцуй-ка!',
                    type: null
                },
                {
                    id: 4,
                    name: 'Нарисуй-ка!',
                    type: ''
                },
            ],
            // тарифы
            tariffs: [
                {
                    id: 1,
                    price: 90,
                    name: 'Выгодный',
                    duration: 30, // результат через дней
                    selected: 1,
                    type: 'solist'
                },
                {
                    id: 2,
                    price: 400,
                    name: 'Оптимальный',
                    duration: 15, // результат через дней
                    selected: 0,
                    type: 'solist'
                },
                {
                    id: 3,
                    price: 600,
                    name: 'Срочный',
                    duration: 3, // результат через дней
                    selected: 0,
                    type: 'solist'
                },
                {
                    id: 4,
                    price: 1000,
                    name: 'Супер-срочный',
                    duration: 1, // результат через дней
                    selected: 0,
                    type: 'solist'
                },
                {
                    id: 5,
                    price: 190,
                    name: 'Выгодный2',
                    duration: 30, // результат через дней
                    selected: 1,
                    type: 'kollective'
                },
                {
                    id: 6,
                    price: 1400,
                    name: 'Оптимальный2',
                    duration: 15, // результат через дней
                    selected: 0,
                    type: 'kollective'
                },
                {
                    id: 7,
                    price: 1600,
                    name: 'Срочный2',
                    duration: 3, // результат через дней
                    selected: 0,
                    type: 'kollective'
                },
                {
                    id: 8,
                    price: 11000,
                    name: 'Супер-срочный2',
                    duration: 1, // результат через дней
                    selected: 0,
                    type: 'kollective'
                },
            ],
            // текущая страна
            current_country_id: '',
            countries: [
                {
                    id: 1,
                    name: 'Россия - 0',
                    postage_price: 0
                },
                {
                    id: 2,
                    name: 'Казахстан - 300',
                    postage_price: 300
                },
                {
                    id: 3,
                    name: 'Зарумбия - 500',
                    postage_price: 500
                },
            ],
            //
            participants: [],
            teachers: [],
        }
    },
    methods: {
        change_price(){
            this.price.order = [];
            this.price.full_price = 0;

            // солист в любительском конкурсе
            if (this.solo && !this.active_professional){
                console.log('солист в любительском конкурсе')
                // this.current_price = this.price.tariff_price + (this.price.thanks_teacher * this.price.thanks_teacher_quantity);
                this.current_price = this.price.current_tariff.price + (this.price.thanks_teacher * this.price.thanks_teacher_quantity);

                this.price.order.push({
                    name: this.price.current_tariff.name,
                    quantity: 1,
                    price: this.price.current_tariff.price,
                });
                this.price.order.push({
                    name: 'Благодарственное письмо преподавателю',
                    quantity: this.price.thanks_teacher_quantity,
                    price: this.price.thanks_teacher * this.price.thanks_teacher_quantity,
                });

            }
            // солист в профессиональном конкурсе
            else if (this.solo && this.active_professional){
                console.log('солист в профессиональном конкурсе')
                this.current_price = this.price.age_group_price
                    + (this.price.diploma_print_solist * this.price.diploma_print_solist_quantity)
                    + this.price.country_postal_delivery;

                this.price.order.push({
                    name: 'Возрастная группа',
                    quantity: 1,
                    price: this.price.age_group_price,
                });
                this.price.order.push({
                    name: 'Печатный диплом',
                    quantity: this.price.diploma_print_solist_quantity,
                    price: this.price.diploma_print_solist * this.price.diploma_print_solist_quantity,
                });
                this.price.order.push({
                    name: 'Почтовая доставка',
                    quantity: 1,
                    price: this.price.country_postal_delivery,
                });
            }
            // коллектив в любительском конкурсе
            else if (!this.solo && !this.active_professional){
                console.log('коллектив в любительском конкурсе')
                this.current_price = this.price.current_tariff.price
                    + (this.price.thanks_teacher * this.price.thanks_teacher_quantity)
                    + (this.price.diploma * this.price.diploma_quantity)
                    + this.price.diploma_kollective_electro_for_order;

                this.price.order.push({
                    name: this.price.current_tariff.name,
                    quantity: 1,
                    price: this.price.current_tariff.price,
                });
                this.price.order.push({
                    name: 'Благодарственное письмо преподавателю',
                    quantity: this.price.thanks_teacher_quantity,
                    price: this.price.thanks_teacher * this.price.thanks_teacher_quantity,
                });
                this.price.order.push({
                    name: 'Индивидуальный диплом',
                    quantity: this.price.diploma_quantity,
                    price: this.price.diploma * this.price.diploma_quantity,
                });
                this.price.order.push({
                    name: 'Коллективный диплом',
                    quantity: (this.price.diploma_kollective_electro_for_order > 0) ? 1 : 0,
                    price: this.price.diploma_kollective_electro_for_order,
                });
            }

            // коллектив в профессиональном конкурсе
            else if (!this.solo && this.active_professional){
                console.log('коллектив в профессиональном конкурсе')

                // число участников со скидкой
                let people_cnt = this.price.max_quantity_participants_price - this.price.cnt_person + 1;
                if (people_cnt > this.price.max_quantity_participants_price){
                    people_cnt = this.price.max_quantity_participants_price;
                }

                console.log('people_cnt', people_cnt)

                // максимальное число платных участников
                if (this.price.number_participants > this.price.max_quantity_participants_price){
                    this.price.number_participants = this.price.max_quantity_participants_price;
                }

                let A = 0;
                // A = this.price.age_group_price * this.price.number_participants;
                A = this.price.age_group_price * this.participants.length;

                // цена скидки
                let B = 0;

                for (var i = this.price.cnt_person - 1; i <= people_cnt; i++){
                    if (i === this.participants.length){
                        break
                    }
                    B += this.price.discount;
                }
                if (A === 0){
                    B = 0
                }
                A = A - B;

                // возрастная группа выбрана, а количество участников пока нет (для визуализации)
                if (this.participants.length === 0){
                    A = this.price.age_group_price;
                }

                this.current_price = A // Возрастная группа со скидкой
                    + (this.price.diploma_print_kollective * this.price.diploma_print_kollective_quantity) // индивидуальный в коллективе диплом
                    + this.price.country_postal_delivery // доставка в страну
                    + (this.price.general_diplom_print * this.price.general_diplom_print_quantity); // колективный диплом

                this.price.order.push({
                    name: 'Возрастная группа со скидкой',
                    quantity: this.participants.length,
                    price: A,
                });
                this.price.order.push({
                    name: 'Коллективный диплом',
                    quantity: this.price.general_diplom_print_quantity,
                    price: this.price.general_diplom_print * this.price.general_diplom_print_quantity,
                });
                this.price.order.push({
                    name: 'Индивидуальный диплом',
                    quantity: this.price.diploma_print_kollective_quantity,
                    price: this.price.diploma_print_kollective * this.price.diploma_print_kollective_quantity,
                });
                this.price.order.push({
                    name: 'Почтовая доставка',
                    quantity: 1,
                    price: this.price.country_postal_delivery,
                });


                // console.clear()
                // console.log('A:', A)
                // console.log('this.price.number_participants:', this.price.number_participants)
            }

            for (let i = 0; i < this.price.order.length; i++){
                this.price.full_price += this.price.order[i].price
            }

            // console.clear()
            // console.log('A:', A)
            // console.log('Active_professional', this.active_professional)
            // console.log('Solo:', this.solo)
            // console.log('Age_group_price:', this.price.age_group_price)
            // console.log('Participants:', this.participants.length)
        },
        del_teacher(target){
            target.parentElement.parentElement.remove();
        },
        teacher_letter(val){
            if (val){
                this.price.thanks_teacher_quantity++
            }else {
                this.price.thanks_teacher_quantity--
            }
            this.change_price();
        },
        participant_electro_diploma(val){
            if (val){
                this.price.diploma_quantity++
            }else {
                this.price.diploma_quantity--
            }
            this.change_price();
        },
        person_cnt_diplom_print(cnt){
            // let diploms = {};
            let sp = cnt.split('_');

            if (this.solo){
                this.price.diploma_print_solist_quantity = sp[0];
            }else if (!this.solo && this.active_professional){

                this.price.tmp_diploms[sp[1]] = parseInt(sp[0])

                let sum = 0;
                for (var key in this.price.tmp_diploms){
                    sum += parseInt(this.price.tmp_diploms[key])
                }
                this.price.diploma_print_kollective_quantity = sum;
            }

            this.change_price();
        },
        del_person_cnt_diplom_print(key){
            delete this.price.tmp_diploms[String(key)];

            let sum = 0;
            for (var key in this.price.tmp_diploms){
                sum += parseInt(this.price.tmp_diploms[key])
            }
            this.price.diploma_print_kollective_quantity = sum;
            this.change_price();
        },
        instrument_show(){
            let nomin = this.nominations.filter(item => item.id === this.nomination_id)[0];

            if (nomin && nomin.type === 'instrumental' && this.solo){
                this.show_instrumental = true
            }else {
                this.show_instrumental = false
            }

        },
        tariffs_filter() {
            // todo: при итерации тарифов
            if (this.solo){
                this.solo_type = 'solist';
            }else {
                this.solo_type = 'kollective';
            }
            if (!this.active_professional) {
                return this.tariffs.filter(item => item.type === this.solo_type);
            }
        },
        on_diploma_electro(e){
            // console.log(e.target.checked)
            if (!this.active_professional && !this.solo){
                if (e.target.checked){
                    this.price.diploma_kollective_electro_for_order = this.price.diploma_kollective_electro;
                }else {
                    this.price.diploma_kollective_electro_for_order = 0;
                }
            }
            this.change_price();
        },
        // добавить участника
        addParticipant(){
            ++this.counter;
            this.participants.push({counter: this.counter});
            //this.price.number_participants++;
            this.change_price(); // todo: только для разработки
        },
        // Добавить педагога
        addTeacher(){
            ++this.counter
            this.teachers.push({counter: this.counter})
        },

        // Навигация по форме
        btn_next_step_2(){
            this.active_step_1 = false
            this.active_step_2 = true
            this.stroke_dashoffset = '238'
            this.num_step = '2'
        },
        prev_step_1(){
            this.active_step_1 = true
            this.active_step_2 = false
            this.stroke_dashoffset = '284'
            this.num_step = '1'
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
        },
        //=================================
    },
    mounted(){
        this.tariffs.forEach(function (item){
            let date = new Date();
            date.setDate(date.getDate() + parseInt(item.duration));
            date.setMonth(date.getMonth() + 1)
            item.date = date.getDate() + '.' + date.getMonth() + '.' + date.getFullYear()
        });
    },
    watch: {
        active_professional(){
            if (this.active_professional){
                this.competition_type = 'Профессиональные конкурсы';
                this.current_price = 0;

                this.price.thanks_teacher_quantity = 0;
                this.price.diploma_quantity = 0;
                this.price.diploma_print_solist_quantity = 0;

                this.participants = [];
                this.teachers = [];

            }else {
                this.competition_type = 'Бесплатные конкурсы';
            }
        },
        age_group_id(val){
            let group = this.age_groups.filter(item => item.id === val);
            if (group.length > 0){
                this.price.age_group_price = group[0].price;
            }else {
                this.price.age_group_price = 0;
            }

            this.change_price()
        },
        current_country_id(id){
            let country = this.countries.filter(item => item.id === id);
            // console.log(country)
            if (country.length > 0){
                this.price.country_postal_delivery = country[0].postage_price;
                this.change_price();
            }
        }
    }
};


const appl = Vue.createApp(App);


appl.component('participant', {
    data(){
        return {
            participant_electro_diploma: false,
            person_cnt_diplom_print: 0,
            case_print: false
        }
    },
    methods: {
        // удалить участника
        deleteParticipant(target){
            target.parentElement.parentElement.remove();
            if (this.participant_electro_diploma){
                this.$emit('participant_electro_diploma', false);
            }
            if (this.person_cnt_diplom_print > 0){
                this.$emit('del_person_cnt_diplom_print', this.counter);
            }
        }
    },
    watch: {
        participant_electro_diploma(){
            this.$emit('participant_electro_diploma', this.participant_electro_diploma)
        },
        person_cnt_diplom_print(){
            this.$emit('person_cnt_diplom_print', this.person_cnt_diplom_print + '_' + this.counter)
        }
    },
    emits: ['participant_electro_diploma', 'person_cnt_diplom_print', 'del_person_cnt_diplom_print'],
    props: ['counter', 'solo', 'active_professional'],
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
        <div class="field field-33" v-show="!solo">
            <button @click.prevent="deleteParticipant($event.target)" class="btn btn-border-red" style="margin-top: 20px">Удалить участника</button>
        </div>
                        @verbatim
    <div class="field field-100">
        <legend style="margin-top: 30px" v-if="!active_professional && !solo">Персональный диплом</legend>
        <legend style="margin-top: 30px" v-else-if="active_professional">Закажите диплом с ориг печатью и оставьте на память</legend>
        <div class="checks">
            <input name="participant_diploma" type="checkbox" class="checkbox" :id="'checkbox_person_diplom_electro-' + counter" v-model="participant_electro_diploma" v-if="!active_professional && !solo">
            <label :for="'checkbox_person_diplom_electro-' + counter" v-if="!active_professional && !solo">Электронный</label>

            <input type="checkbox" class="checkbox" :id="'checkbox_person_diplom_printed-' + counter" v-if="active_professional" v-model="case_print">
            <label :for="'checkbox_person_diplom_printed-' + counter" v-if="active_professional">Печатный</label>
        </div>
    </div>
    <div class="field field-100" v-if="active_professional && case_print">
        <div class="checks" style="margin-top: 20px; display: flex; align-items: center;">
            <label class="number" :for="'checkbox_person_cnt_diplom_print-' + counter">Количество персональных печатных дипломов этому участнику</label>
            <input name="cnt_diploma" type="number" min="0" class="number" :id="'checkbox_person_cnt_diplom_print-' + counter" v-model.number="person_cnt_diplom_print">
        </div>
    </div>
                        @endverbatim
    </div>`
});



appl.component('teacher', {
    data(){
        return {
            teacher_letter: false
        }
    },
    methods: {
        // удалить педагога
        deleteTeacher(target){
            this.$emit('del_teacher', target);
            if (this.teacher_letter){
                this.$emit('teacher_letter', false);
            }
        },
    },
    watch: {
        teacher_letter(){
            this.$emit('teacher_letter', this.teacher_letter);
        }
    },
    props: ['counter', 'active_professional'],
    emits: ['del_teacher', 'teacher_letter'],
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
        <div class="field field-100" style="text-align: right;">
            <button @click.prevent="deleteTeacher($event.target)" class="btn btn-border-red" style="margin-top: 20px">Удалить педагога</button>
        </div>
@verbatim
    <div class="field field-100">
        <div class="checks" style="margin-top: 30px">
            <input name="teacher_diploma" type="checkbox" class="checkbox" :id="'checkbox_teacher_person_diplom_electro-' + counter" v-model="teacher_letter">
            <label :for="'checkbox_teacher_person_diplom_electro-' + counter">Благодарственное письмо для педагога в электронном виде</label>
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

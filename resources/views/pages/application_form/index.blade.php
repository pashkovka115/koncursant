@extends('layouts.app')

@section('head_scripts')
<style>
    /*#step-1 > div:nth-child(1) > div:nth-child(3) > div > div > div > button:nth-child(1)*/
    #step-1 #cnt_people + div button.nativejs-select__option {
        padding: 0 0 0 10px !important;
    }
    #step-3 #nomination + div.nativejs-select{
        margin-top: 0;
    }
</style>
@endsection

@section('content')
    <section class="quiz">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="head-quiz">
                        <div class="progress-bar">
                            <div class="circle-big">
                                <div class="text">1</div>
                                <svg>
                                    <circle class="bg" cx="44" cy="44" r="37"></circle>
                                    <circle class="progress" cx="44" cy="44" r="37" style="stroke-dashoffset: 284"></circle>
                                </svg>
                            </div>
                        </div>
                        <div class="title-head">
                            <div>
                                <div class="type">Бесплатные конкурсы</div>
                                <div class="order-num">Заявка №156</div>
                            </div>
                            <div class="price-item">
                                <h4>Общая стоимость:</h4>
                                <div class="price">246 ₽</div>
                            </div>
                        </div>
                        <div class="inform">
                            <p>Для вашего удобства мы сделали заполнение данных в несколько коротких этапов!</p>
                            <p class="red">Это займет всего несколько минут!</p>
                        </div>
                    </div>
                    <!--Шаг 1-->
                    <div class="quiz-step active" id="step-1">
                        <div class="fields">
                            <div class="field field-33">
                                <legend>Название конкурса </legend>
                                <select name="" id="" required>
                                    <option value="">Голос России</option>
                                    <option value="">Голос России 2</option>
                                    <option value="">Голос России 3</option>
                                </select>
                            </div>
                            <div class="field field-33">
                                <legend>Номинация</legend>
                                <select name="" id="nomination" required>
                                    <option value="0">Введите название или выберите его из</option>
                                    <option value="Instrumental">Инструментальный</option>
                                    <option value="">Сольное исполнение</option>
                                    <option value="">Голос России 3</option>
                                </select>
                            </div>
                            <div class="field field-33">
                                <legend>Количество человек в номере</legend>
                                <select name="" id="cnt_people" required>
                                    <option value="0">Укажите количество</option>
                                    <?php for ($i = 1; $i <= 20; $i++): ?>
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div id="instrument_name" class="fields" style="display: none">
                            <div class="field field-70">
                                <legend>Название музыкального инструмента</legend>
                                <input type="text" placeholder="Введите название музыкального инструмента">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-50">
                                <legend>Название номера </legend>
                                <input type="text" placeholder="Введите название номера" style="margin-top: 23px">
                            </div>
                            <div class="field field-50">
                                <legend>Возрастная категория</legend>
                                <select name="" id="nomination" required>
                                    <option value="0">Выберите категория</option>
                                    <option value="">Дошкольники</option>
                                    <option value="">Младшие классы</option>
                                    <option value="">Старшие классы</option>
                                    <option value="">Взрослые</option>
                                </select>
                            </div>
                        </div>
                        <div class="quiz-steps-btn">
                            <button id="btn_to_step2" class="btn btn-border-red next-step-2">Вперед</button>
                        </div>
                    </div>

                    <!--Шаг 2-->
                    <div class="quiz-step" id="step-2">
                        {{--<div class="type-order">
                            <button class="btn-black"><i class="demo-icon icon-user"></i> Солист</button>
                            <button class="btn-black active"><i class="demo-icon icon-users"></i> Коллектив (от 2-х человек)</button>
                        </div>
                        <p>Если в коллективе <span class="red">более 5-ти человек</span>, то стоимость участия не превышает 2 750 ₽.<br /> Если в коллективе <span class="red">более 4-х человек</span>, и они являются учениками ДДУ, то стоимость участия не превышает 1 800 ₽.</p>
                        <p><span class="red">К примеру, 10 участников коллектива заплатят 2 750 ₽ вместо 3 900 ₽!</span></p>--}}
                        {{--<div class="fields">
                            <div class="field field-100">
                                <legend>Название номера</legend>
                                <input type="text" placeholder="Введите название номера">
                            </div>
                        </div>--}}
                        <div id="kollective_name" class="fields fields-align-end">
                            <div class="field field-100">
                                <legend>Название коллектива</legend>
                                <input type="text" name="participant_first_name[]" required>
                            </div>
                            {{--<div class="field field-100" style="margin-top: 20px">
                                <input type="checkbox" class="checkbox" id="checkbox-fio" />
                                <label for="checkbox-fio">Указать ФИ участников</label>

                            </div>--}}
                        </div>
                        {{--<div class="fields">
                            <div class="field field-33">
                                <legend>Имя участника</legend>
                                <input type="text" name="participant_first_name[]" required>
                            </div>
                            <div class="field field-33">
                                <legend>Фамилия участника</legend>
                                <input type="text" name="participant_last_name[]" required>
                            </div>
                            <div class="field field-33">
                                <button onclick="delParticipant(this)" class="btn btn-border-red" style="margin-top: 20px">Удалить</button>
                            </div>
                        </div>--}}
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

                        <template id="template_add_participant">
                            <div class="fields">
                                <div class="field field-33">
                                    <legend>Имя участника</legend>
                                    <input type="text" name="participant_first_name[]" required>
                                </div>
                                <div class="field field-33">
                                    <legend>Фамилия участника</legend>
                                    <input type="text" name="participant_last_name[]" required>
                                </div>
                                <div class="field field-33">
                                    <button onclick="delParticipant(this)" class="btn btn-border-red" style="margin-top: 20px">Удалить</button>
                                </div>
                            </div>
                        </template>
                        <div id="participant_wrap_btn" class="fields">
                            <div class="field field-100">
                                <button id="add_participant" class="add"><i class="demo-icon icon-plus-circle"></i>Указать участника</button>
                            </div>
                        </div>

                        {{--<div class="fields">
                            <div class="field field-30">
                                <legend>Диплом для всего коллектива</legend>
                                <div class="checks">
                                    <input type="checkbox" class="checkbox" id="checkbox-type-diplom" />
                                    <label for="checkbox-type-diplom">Электронный</label>
                                    <input type="checkbox" class="checkbox" id="checkbox-type-diplom2" />
                                    <label for="checkbox-type-diplom2">Печатный</label>
                                </div>
                            </div>
                            <div class="field field-70">
                                <legend>Именные дипломы для участников коллектива</legend>
                                <div class="checks">
                                    <input type="checkbox" class="checkbox" id="checkbox-type-diplom3" />
                                    <label for="checkbox-type-diplom3">Не требуется</label>
                                    <input type="checkbox" class="checkbox" id="checkbox-type-diplom4" />
                                    <label for="checkbox-type-diplom4">Электронный</label>
                                    <input type="checkbox" class="checkbox" id="checkbox-type-diplom5" />
                                    <label for="checkbox-type-diplom5">Печатный</label>
                                </div>
                            </div>
                        </div>--}}
                        <div id="checks_teachers" class="fields" style="display: none">
                            <div class="field field-100">
                                <legend>Получить благодарственное письмо для педагога</legend>
                                <div class="checks">
                                    <input type="checkbox" class="checkbox" id="checkbox-type-diplom6" />
                                    <label for="checkbox-type-diplom6">Не требуется</label>

                                    <input type="checkbox" class="checkbox" id="checkbox-type-diplom7" />
                                    <label for="checkbox-type-diplom7">Электронный</label>

                                    <input type="checkbox" class="checkbox" id="checkbox-type-diplom8" />
                                    <label for="checkbox-type-diplom8">Печатный</label>
                                </div>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-100">
                                <p>Если необходимо благодарственное письмо для педагога, введите личные данные препадователя</p>
                            </div>
                            <div id="wrap_btn_add_teacher" class="field field-70">
                                <button id="btn_add_teacher" class="add add-teacher"><i class="demo-icon icon-plus-circle"></i>Добавить педагога</button>
                            </div>
                        </div>
                        <div class="add-teacher-fields">
                            <template id="template_add_teacher">
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
                                        <button onclick="delTeacher(this)" class="btn btn-border-red" style="margin-top: 20px">Удалить педагога</button>
                                    </div>
                                    <hr style="display: block; width: 100%; margin-bottom: 20px;">
                                </div>
                            </template>

                            <div class="fields">
                                <div class="field field-100">
                                    <button class="add"><i class="demo-icon icon-plus-circle"></i>Добавить педагога</button>
                                </div>
                            </div>
                        </div>


                        <div class="quiz-steps-btn">
                            <button class="btn btn-border-gray prev-step-1">Назад</button>
                            <button class="btn btn-border-red next-step-3">Вперед</button>
                        </div>
                    </div>
                    <!--Шаг 3-->
                    <div class="quiz-step" id="step-3">
                        <div class="fields">
                            <div class="field field-33">
                                <legend>Ресурс</legend>
                                <select name="" id="nomination" required>
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
                            {{--<div class="field field-70">
                                <legend>Или добавьте ссылку на видео с файлообменника</legend>
                                <input type="text" placeholder="Место для вашей ссылки">
                            </div>--}}
                            <div class="field field-100">
                                <p class="attention"><strong>ВНИМАНИЕ!</strong> Для участия в конкурсе обязательно предоставление видеозаписи. Если в данный момент у Вас отсутствует возможность загрузки видеозаписи, то после оплаты участия Вам придет письмо на электронную почту, где Вы сможете указать ссылку на видеозапись.</p>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-100">
                                <legend>Комментарий</legend>
                                <textarea name="" placeholder="Введите дополнительную информацию по заявке..."></textarea>
                            </div>
                            {{--<div class="field field-100">
                                <button class="add add-data-edu"><i class="demo-icon icon-plus-circle"></i>Добавить данные об учебном заведении</button>
                            </div>--}}
                        </div>
                        <!--Добавить данные об учебном заведении-->
                        {{--<div class="fields-edu-add">
                            <div class="fields">
                                <div class="field field-50">
                                    <legend>Страна участника</legend>
                                    <select name="" id="">
                                        <option value="">Россия</option>
                                        <option value="">Россия</option>
                                        <option value="">Россия</option>
                                    </select>
                                </div>
                                <div class="field field-50">
                                    <legend>Населенный пункт</legend>
                                    <select name="" id="">
                                        <option value="">Введите населенный пункт участника</option>
                                        <option value="">Россия</option>
                                        <option value="">Россия</option>
                                    </select>
                                </div>
                            </div>
                            <div class="fields">
                                <div class="field field-70">
                                    <legend>Учебное заведение</legend>
                                    <input type="text" placeholder="Введите название учебного заведения">
                                </div>
                            </div>
                        </div>--}}
                        <div class="quiz-steps-btn">
                            <button class="btn btn-border-gray prev-step-2">Назад</button>
                            <button class="btn btn-border-red next-step-4">Вперед</button>
                        </div>
                    </div>
                    <!--Шаг 4-->
                    <div class="quiz-step" id="step-4">
                        <div class="fields">
                            <div class="field field-50">
                                <h3>Пример вашего диплома</h3>
                                <div class="diplom"><img src="{{ asset('assets/front/img/diplom-big.png') }}" alt=""></div>
                            </div>
                            <div class="field field-50">
                                <h3>Данные по заявке</h3>
                                <div class="item">
                                    <legend>Название конкурса</legend>
                                    <select name="" id="">
                                        <option value="">Голос России</option>
                                        <option value="">Голос России</option>
                                        <option value="">Голос России</option>
                                    </select>
                                </div>
                                <div class="item">
                                    <legend>Номинация</legend>
                                    <select name="" id="">
                                        <option value="">Спой-ка!</option>
                                        <option value="">Спой-ка!</option>
                                        <option value="">Спой-ка!</option>
                                    </select>
                                </div>
                                <div class="item">
                                    <legend>Направление</legend>
                                    <select name="" id="">
                                        <option value="">Сольное исполнение</option>
                                        <option value="">Сольное исполнение</option>
                                    </select>
                                </div>
                                <div class="item">
                                    <legend>Возрастная категория</legend>
                                    <select name="" id="">
                                        <option value="">Старшая (15 - 20)</option>
                                        <option value="">Старшая (15 - 20)</option>
                                    </select>
                                </div>
                                <div class="item">
                                    <legend>Дата проведения</legend>
                                    <p>11.06.2021</p>
                                </div>
                                <div class="item">
                                    <legend>Имя участника</legend>
                                    <input type="text">
                                </div>
                                <div class="item">
                                    <legend>Фамилия участника</legend>
                                    <input type="text">
                                </div>
                                <div class="item">
                                    <legend>Название номера</legend>
                                    <input type="text">
                                </div>
                                <div class="item">
                                    <legend>Название учебного заведения</legend>
                                    <input type="text">
                                </div>
                                <div class="item">
                                    <legend>ФИО преподавателя</legend>
                                    <input type="text">
                                </div>
                                <div class="item">
                                    <legend>Страна учасника</legend>
                                    <select name="" id="">
                                        <option value="">Россия</option>
                                        <option value="">Россия</option>
                                    </select>
                                </div>
                                <div class="item">
                                    <legend>Населенный пункт</legend>
                                    <select name="" id="">
                                        <option value="">г. Москва</option>
                                        <option value="">г. Москва</option>
                                    </select>
                                </div>
                                <div class="item">
                                    <input type="checkbox" class="checkbox" id="checkbox2" />
                                    <label for="checkbox2">Подтверждаю правильность указанных данных</label>
                                </div>
                            </div>
                        </div>
                        <div class="quiz-steps-btn">
                            <button class="btn btn-border-gray prev-step-3">Назад</button>
                            <button class="btn btn-border-red next-step-5">Перейти к оплате</button>
                        </div>
                    </div>
                    <!--Шаг 5-->
                    <div class="quiz-step" id="step-5">
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
                                <select name="" id="">
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
                                <select name="" id="">
                                    <option value="">Введите название области/края/района</option>
                                    <option value="">Россия</option>
                                    <option value="">Россия</option>
                                </select>
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-70">
                                <legend>Населенный пункт</legend>
                                <select name="" id="">
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
                            <button class="btn btn-border-gray prev-step-4">Назад</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_scripts')
    <script>
{{--    Шаг 1    --}}
$(function() {
    // от количества человек или номинации показываем поле инструмент
    $('#nomination, #cnt_people').on('change', function (){
        let nomination = $('#nomination').val();
        let cnt_people = $('#cnt_people').val();
        if (nomination === 'Instrumental' && cnt_people === '1'){
            $('#instrument_name').css('display', 'block');
        }else {
            $('#instrument_name').css('display', 'none');
        }
    });
    {{--    Шаг 2    --}}
    $('#btn_to_step2').on('click', function (){
        // Показывать ли поле для названия коллектива
        let cnt_people = parseInt($('#cnt_people').val());
        if (cnt_people > 1){
            $('#kollective_name').css('display', 'block');
        }else {
            $('#kollective_name').css('display', 'none');
        }
    });
    // добавить участника
    $('#add_participant').on('click', function (){
        let template = $('template#template_add_participant').clone();
        $('#participant_wrap_btn').before(template.html());
    });
    // добавить учителя
    $('#btn_add_teacher').on('click', function (){
        $('#checks_teachers').css('display', 'block');

        let template = $('template#template_add_teacher').clone();
        $('#checks_teachers').before(template.html());
    });
    // скрыть лишние чекбоксы
    $('#checkbox-type-diplom6').on('change', function (){
        if (this.checked) {
            $('label[for="checkbox-type-diplom7"], label[for="checkbox-type-diplom8"]').css('display', 'none');
            $('#checkbox-type-diplom7, #checkbox-type-diplom8').prop( "checked", false ).css('display', 'none');
        }else {
            $('label[for="checkbox-type-diplom7"], label[for="checkbox-type-diplom8"]').css('display', 'inline-block');
        }
    });
});

// Удалить участника из формы (шаг 2)
function delParticipant(el){
    $(el).parents('.fields').remove();
}
// Удалить педагога из формы (шаг 2)
function delTeacher(el){
    el.parentElement.parentElement.remove();
    let teachers = document.querySelectorAll('.teacher-item')
    if (teachers.length === 0){
        $('#checks_teachers').css('display', 'none');
    }
}
    </script>
@endsection

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
                <!--@submit.prevent="submitHandler($event.target)"-->
                <form id="application_form" action="{{ route('front.bid.form.store') }}" method="post">
                @csrf
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

                            <div class="field field-33 custom-select-my" v-if="active_professional">
                                <legend>Название конкурса<span class="required">*</span></legend>
                                @verbatim
                                    <select name="competition_id">
                                        <option value=''>-------</option>
                                        <option :value='item.id' v-for="item in competitions_filter()" :key="item.id">{{ item.name }}</option>
                                    </select>
                                @endverbatim
                            </div>

                            <div class="field field-33 custom-select-my" v-if="!active_professional">
                                <legend>Название конкурса<span class="required">*</span></legend>
                                @verbatim
                                    <select name="competition_id">
                                        <option value=''>-------</option>
                                        <option :value='item.id' v-for="item in competitions_filter()" :key="item.id">{{ item.name }}</option>
                                    </select>
                                @endverbatim
                            </div>



                            <div class="field field-33">
                                <legend>Номинация<span class="required">*</span></legend>
                                @verbatim
                                    <select @change="instrument_show();" name="nomination_id" id="nomination" v-model="nomination_id">
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
                                <input type="text" name="musical_instrument" value="{{ old('musical_instrument') }}" placeholder="Введите название музыкального инструмента">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-100">
                                <legend>Название номера </legend>
                                <input type="text" name="musical_number" value="{{ old('musical_number') }}" placeholder="Например, Руслан и Людмила" style="margin-top: 23px">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field field-100" style="margin-bottom: 40px">
                                <legend>Возрастная категория (сделать обязательным)<span class="required">*</span></legend>
                                @verbatim
                                    <select
                                        name="age_group_id"
                                        id="age_group"
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
                        <div class="fields fields-align-end" v-if="!solo">
                            <div id="kollective_name" class="field field-100">
                                <legend>Название коллектива</legend>
                                <input type="text" name="koll_name" value="{{ old('koll_name') }}" placeholder='Например, музыкальный ансамбль "Мелодия"'>
                            </div>
                        </div>
                        <div class="fields field-100">
                            <div class="field field-50">
                                <legend>Страна участника<span class="required">*</span></legend>
                                @verbatim
                                    <select name="country_id" id="country_first" v-model="current_country_id">
                                        <option value="">-----</option>
                                        <option v-for="country in countries" :value="country.id" :key="country.id">{{ country.name }}</option>
                                    </select>
                                @endverbatim
                            </div>
                            <div class="field field-50">
                                <legend>Город<span class="required">*</span></legend>
                                <input type="text" name="city" value="{{ old('city') }}" placeholder="Например, Москва">
                            </div>
                            <div class="field field-100" style="margin-top: 20px">
                                <legend>Учебное заведение</legend>
                                <input type="text" name="educational_institution" value="{{ old('educational_institution') }}" placeholder="Например, ДШИ имени С.В. Рахманинова">
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
                                <legend style="margin-top: 30px" v-if="!solo && price.diploma_electro_model > 0">Так же нужен общий диплом</legend>
                                <div class="checks">
                                    <input
                                        @change="on_diploma_electro"
                                        name="diploma_electro_model"
                                        type="checkbox" class="checkbox"
                                        id="diploma_electro_model"
                                        v-if="!solo && price.diploma_electro_model > 0"
                                        v-model.number="price.diploma_electro_model"
                                    >
                                    <label
                                        for="diploma_electro_model"
                                        v-if="!solo && price.diploma_electro_model > 0"
                                    >Электронный</label>

                                    <input name="general_diploma_print" type="checkbox" class="checkbox" id="general_diploma_print" v-model="print_checkbox_print_diploma"  v-if="active_professional && !solo">
                                    <label for="general_diploma_print"  v-if="active_professional && !solo">Печатный</label>
                                </div>
                            </div>

                            <div class="field field-100" v-if="print_checkbox_print_diploma">
                                <div class="checks" style="margin-top: 20px; display: flex; align-items: center;">
                                    <label class="number" for="general_diploma_print_cnt">Количество общих печатных дипломов</label>
                                    <input @change="change_price()" name="quantity_kollective_diploma" type="number" min="0" class="number" id="general_diploma_print_cnt" v-model.number="price.general_diplom_print_quantity">
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
                                <select name="resource" id="resource">
                                    <option value="youtube">Youtube</option>
                                    <option value="vk">Вконтакте</option>
                                    <option value="ok">Однокласники</option>
                                    <option value="file_sharing">Файлообменник</option>
                                </select>
                            </div>
                            <div class="field field-33">
                                <legend>Добавьте ссылку на видео</legend>
                                <input type="text" name="link_to_resource" value="{{ old('link_to_resource') }}" placeholder="Место для вашей ссылки">
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
                                <textarea name="comment" placeholder="Введите дополнительную информацию по заявке...">{{ old('comment') }}</textarea>
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
                                                            <input @change="change_price(); setTariffId();" type="radio" name="tariff_radio" :value="tariff" v-model="price.current_tariff">
                                                            <input type="hidden" name="tariff_id" :value="tariff.id" v-if="price.tariff_id === tariff.id">
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
                                    <input type="checkbox" name="confirm_data" class="checkbox" id="checkbox2" />
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
                                <input type="text" name="email" value="{{ old('email') }}" placeholder="Введите адрес электронной почты">
                                <p>На указанную электронную почту будет отправлена ссылка для загрузки видео и после прохождения конкурса отправлен диплом. <b>Обязательно проверьте на правильность!</b></p>
                            </div>
                            <div class="field field-50">
                                <legend>Номер телефона<span class="required">*</span></legend>
                                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Введите номер телефона">
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
                                <input type="text" name="state" value="{{ old('state') }}">
                                <!--<select name="" id="state">
                                    <option value="">Введите название области/края/района</option>
                                    <option value="">Россия</option>
                                    <option value="">Россия</option>
                                </select>-->
                            </div>
                        </div>
                        <!--<div class="fields" v-show="active_professional">
                            <div class="field field-70">
                                <legend>Населенный пункт</legend>
                                <input type="text">
                            <select name="" id="city">
                                    <option value="">Введите населенный пункт участника</option>
                                    <option value="">Россия</option>
                                    <option value="">Россия</option>
                                </select>
                            </div>
                        </div>-->
                        <div class="fields" v-show="active_professional">
                            <div class="field field-25">
                                <legend>Улица</legend>
                                <input type="text" name="street" value="{{ old('street') }}" placeholder="Введите название улицы">
                            </div>
                            <div class="field field-25">
                                <legend>Дом</legend>
                                <input type="text" name="house" value="{{ old('house') }}" placeholder="Введите номер">
                            </div>
                            <div class="field field-25">
                                <legend>Квартира</legend>
                                <input type="text" name="apartment" value="{{ old('apartment') }}" placeholder="Введите номер">
                            </div>
                            <div class="field field-25">
                                <legend>Индекс</legend>
                                <input type="text" name="postcode" value="{{ old('postcode') }}" placeholder="Введите индекс">
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

                        <div class="text-center">
                            <button class="btn btn-red btn-buy">Оплатить онлайн</button>
                            <!--<input type="submit" class="btn btn-red btn-buy" value="Оплатить онлайн">-->
                        </div>
                        <div class="fields">
                            <div class="field field-50">
                                <p class="big">Подать заявку на участие в конкурсе, но <a href="">оплатить с помощью квитанции</a></p>
                                <p>На указанную эл.почту будет отправлена квитанция на оплату и ссылка для возможности оплаты онлайн. Подробнее <a href="">здесь</a>. <b>Без оплаты заявка не рассматривается.</b></p>
                            </div>
                            <div class="field field-50 text-right">
                                <button @click.prevent="" class="btn btn-border-red">Получить квитанцию</button>
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


<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 order-lg-8">
                <div class="wrapper">
                    <div class="f-item">
                        <h4>Об организации</h4>
                        <ul class="menu">
                            @foreach($buttom_menu as $item)
                            <li><a href="{{ $item['link'] }}">{{ $item['label'] }}</a></li>
                            @endforeach
                            {{--<li><a href="">Бесплатные конкурсы</a></li>
                            <li><a href="">Конкурсы с участием профессионального жюри</a></li>
                            <li><a href="">Результаты</a></li>
                            <li><a href="">Жюри</a></li>
                            <li><a href="">Частые вопросы</a></li>
                            <li><a href="">Контакты</a></li>--}}
                        </ul>
                    </div>
                    <div class="f-item f-contacts">
                        <h4>Связаться с нами</h4>
                        <p><a href="">8 938 476 19 18</a></p>
                        <p><a href="">8 918 980 90 74</a></p>
                        <p><a href="">info@concursant.ru</a></p>
                        <div class="social">
                            <a href=""><i class="demo-icon icon-vk"></i></a>
                            <a href=""><i class="demo-icon icon-insta"></i></a>
                            <a href=""><i class="demo-icon icon-fb"></i></a>
                            <a href=""><i class="demo-icon icon-odnoklassniki"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 order-lg-1">
                <div class="logo"><a href=""><img src="{{ asset('assets/front/img/logo.svg') }}" alt=""></a></div>
                <div class="copyright">
                    <p><strong>©2021 КОНКУРСАНТ</strong><br /> Российское агентство творческих технологий</p>
                    <p>Свидетельство 23 №008461094 от 22.02.2012 Всероссийские и международные дистанционные творческие конкурсы по видеозаписям для детей и  зрослых, для любителей и профессионалов</p>
                </div>
            </div>
        </div>
    </div>
</footer>


<div class="hidden">
    <form action="" class="form popup-form" id="callback">
        <h3>Оставить сообщение</h3>
        <input type="text"  name="Имя" placeholder="Ваше имя"  required="required"><br>
        <input type="text"  name="Телефон" placeholder="Номер телефона" required="required"><br>
        <input type="text"  name="E-mail" placeholder="E-mail" required="required"><br>
        <textarea name="" name="Сообщение" id="" placeholder="Сообщение"></textarea>
        <button class="btn btn-feed">Отправить</button>
    </form>

    <div class="quiz-modal" id="quiz-1">
        <div class="quiz">
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
            </div>
            <!--Шаг 1-->
            <div class="quiz-step active" id="step-1">
                <div class="fields">
                    <div class="field field-50">
                        <legend>Название конкурса </legend>
                        <select name="" id="">
                            <option value="">Голос России</option>
                            <option value="">Голос России 2</option>
                            <option value="">Голос России 3</option>
                        </select>
                    </div>
                    <div class="field field-50">
                        <legend>Номинация</legend>
                        <select name="" id="">
                            <option value="">Введите название или выберите его из</option>
                            <option value="">Голос России 2</option>
                            <option value="">Голос России 3</option>
                        </select>
                    </div>
                </div>
                <div class="fields">
                    <div class="field field-70">
                        <legend>Название музыкального инструмента</legend>
                        <input type="text" placeholder="Введите название музыкального инструмента">
                    </div>
                </div>
                <div class="quiz-steps-btn">
                    <button class="btn btn-border-red next-step-2">Вперед</button>
                </div>
            </div>
            <!--Шаг 2-->
            <div class="quiz-step" id="step-2">
                <div class="type-order">
                    <button class="btn-black active"><i class="demo-icon icon-user"></i> Солист</button>
                    <button class="btn-black"><i class="demo-icon icon-users"></i> Коллектив (от 2-х человек)</button>
                </div>
                <div class="fields">
                    <div class="field field-50">
                        <legend>Имя участника</legend>
                        <input type="text" placeholder="Введите имя участника">
                    </div>
                    <div class="field field-50">
                        <legend>Фамилия участника</legend>
                        <input type="text" placeholder="Введите фамилию участника">
                    </div>
                </div>
                <div class="fields">
                    <div class="field field-50">
                        <legend>Выберите возрастную категорию</legend>
                        <select name="" id="">
                            <option value="">Старшая (15 - 20)</option>
                            <option value="">Старшая (15 - 20)</option>
                            <option value="">Старшая (15 - 20)</option>
                        </select>
                    </div>
                    <div class="field field-50">
                        <legend>Название номера</legend>
                        <input type="text" placeholder="Введите название номера">
                    </div>
                </div>
                <div class="fields">
                    <div class="field field-33">
                        <legend>Имя педагога</legend>
                        <input type="text" placeholder="Введите имя педагога">
                    </div>
                    <div class="field field-33">
                        <legend>Фамилия педагога</legend>
                        <input type="text" placeholder="Введите фамилию педагога">
                    </div>
                    <div class="field field-33">
                        <legend>Отчество педагога</legend>
                        <input type="text" placeholder="Введите отчество педагога">
                    </div>
                </div>
                <div class="fields fields-align-center">
                    <div class="field field-50">
                        <legend>Должность</legend>
                        <input type="text" placeholder="Введите название номера">
                    </div>
                    <div class="field field-50">
                        <input type="checkbox" class="checkbox" id="checkbox" />
                        <label for="checkbox">Получить благодарственное письмо для педагога</label>
                    </div>
                </div>
                <button class="add"><i class="demo-icon icon-plus-circle"></i>Добавить педагога</button>
                <div class="quiz-steps-btn">
                    <button class="btn btn-border-gray prev-step-1">Назад</button>
                    <button class="btn btn-border-red next-step-3">Вперед</button>
                </div>
            </div>
            <!--Шаг 3-->
            <div class="quiz-step" id="step-3">
                <div class="fields">
                    <div class="field field-70">
                        <legend>Добавьте ссылку на видео <img src="img/icon/youtube.svg" alt=""></legend>
                        <input type="text" placeholder="Место для вашей ссылки">
                    </div>
                    <div class="field field-30">
                        <div class="links-question">
                            <a href="" class="link-question">Как подготовить видео для участия</a>
                            <a href="" class="link-question">Как загрузить видео на Youtube</a>
                        </div>
                    </div>
                </div>
                <div class="fields">
                    <div class="field field-70">
                        <legend>Или добавьте ссылку на видео с файлообменника</legend>
                        <input type="text" placeholder="Место для вашей ссылки">
                    </div>
                    <div class="field field-100">
                        <p class="attention"><strong>ВНИМАНИЕ!</strong> Для участия в конкурсе обязательно предоставление видеозаписи. Если в данный момент у Вас отсутствует возможность загрузки видеозаписи, то после оплаты участия Вам придет письмо на электронную почту, где Вы сможете указать ссылку на видеозапись.</p>
                    </div>
                </div>
                <div class="fields">
                    <div class="field field-100">
                        <legend>Комментарий</legend>
                        <textarea name="" placeholder="Введите дополнительную информацию по заявке..."></textarea>
                    </div>
                    <div class="field field-100">
                        <button class="add" id="add-data-edu"><i class="demo-icon icon-plus-circle"></i>Добавить данные об учебном заведении</button>
                    </div>
                </div>
                <!--Добавить данные об учебном заведении-->
                <div class="fields-edu-add">
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
                </div>
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
                        <div class="diplom"><img src="img/diplom-big.png" alt=""></div>
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
                <div class="tarifs">
                    <h3>Выберите тариф</h3>
                    <div class="wrapper">
                        <div class="tarif">
                            <div class="title">Выгодный</div>
                            <div class="term">срок <span>до 30 дней</span></div>
                            <div class="info">Результат будет известен до 15.02.2021</div>
                            <div class="price">Бесплатно</div>
                        </div>
                        <div class="tarif">
                            <div class="title">Оптимальный</div>
                            <div class="term">срок <span>до 15 дней</span></div>
                            <div class="info">Результат будет известен до 30.01.2021</div>
                            <div class="price">+ 400 ₽</div>
                        </div>
                        <div class="tarif">
                            <div class="title">Срочный</div>
                            <div class="term">срок <span>до 3-х дней</span></div>
                            <div class="info">Результат будет известен до 15.02.2021</div>
                            <div class="price">+ 600 ₽</div>
                        </div>
                        <div class="tarif">
                            <div class="title">Супер-срочный</div>
                            <div class="term red">срок <span>1 день</span></div>
                            <div class="info">Результат будет известен до 15.02.2021</div>
                            <div class="price">+ 1000 ₽</div>
                        </div>
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
                    <div class="check-item">
                        <input type="checkbox" class="checkbox" id="checkbox3" />
                        <label for="checkbox3">Согласие на размещение представленного конкурсного материал на сайте www.concursant.ru, в группах и каналах социальных сетей «Конкурсант»</label>
                        <input type="checkbox" class="checkbox" id="checkbox4" />
                        <label for="checkbox4">Я прочитал(а) и ознакомлен(а) с правилами размещения материалов на ресурсе www.concursant.ru и даю свое согласие на участие в конкурсе, на обработку моих персональных данных и на получение уведомлений об итогах и новостях сайта по электронной почте.</label>
                    </div>
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
<div class="done-w">
    <div class="done-window">Спасибо за заявку<br /><small>Ожидайте нашего звонка.</small></div>
</div>
<script src="{{ asset('assets/front/js/scripts.min.js') }}"></script>
@yield('footer_scripts')

</body>
</html>

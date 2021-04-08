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
                    thanks_teacher: {{ $price->thanks_teacher }},
            thanks_teacher_quantity: 0,

                // стоимость индивидуального диплома для участника в любительском (электронный)
                diploma: {{ $price->diploma }},
            diploma_quantity: 0,
                // коллективный диплом в любительском конкурсе
                diploma_kollective_electro: {{ $price->diploma_kollective_electro }},
            diploma_electro_model: false,
                diploma_kollective_electro_for_order: 0,

                // цена на текущий тарифф
                // tariff_price: 0,
                current_tariff: {name:'', quantity: 0, price: 0},
            tariff_id: false,

                // цена на текущую возрастную группу
                age_group_price: 0,

                // стоимость печати сольного/индивидуального/индивидуальный в СОЛИСТЕ
                // диплома за штуку в профессиональном конкурсе (на бумаге)
                diploma_print_solist: {{ $price->diploma_print_solist }},
            diploma_print_solist_quantity: 0, // минимум

                // стоимость печати сольного/индивидуального/индивидуальный в КОЛЛЕКТИВЕ
                // диплома за штуку в профессиональном конкурсе (на бумаге)
                diploma_print_kollective: {{ $price->diploma_print_kollective }},
            diploma_print_kollective_quantity: 0,

                // Цена общего диплома в профессиональном коллективе
                general_diplom_print: {{ $price->general_diplom_print }},
            // количество общих дипломов
            general_diplom_print_quantity: 0,

                // текущая цена доставки в эту страну
                country_postal_delivery: 0,

                // скидка на каждого последующего участника
                discount: {{ $price->discount }},
            // скидка начиная с этого участника
            cnt_person: {{ $price->cnt_person }},
            // свыше этого количества участников бесплатно
            max_quantity_participants_price: {{ $price->max_quantity_participants_price }},
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
            // select_competition: '',
            // competitions_filtered: '',
            competitions: {!! json_encode($competitions, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES ) !!},

            // текущая возрастная группа
            age_group_id: 0,
                // возрастные группы
                age_groups: {!! json_encode($age_groups, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES ) !!},

            // текущая номинация
            nomination_id: '',
                // номинации
                nominations: {!! json_encode($nominations, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES ) !!},

            // тарифы
            tariffs: {!! json_encode($tariffs, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES ) !!},

            // текущая страна
            current_country_id: '',
                countries: {!! json_encode($countries, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES ) !!},

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
                    // console.log('солист в любительском конкурсе')
                    // this.current_price = this.price.tariff_price + (this.price.thanks_teacher * this.price.thanks_teacher_quantity);
                    this.current_price = parseInt(this.price.current_tariff.price) + (this.price.thanks_teacher * this.price.thanks_teacher_quantity);

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
                        + parseInt(this.price.country_postal_delivery);

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
                    this.current_price = parseInt(this.price.current_tariff.price)
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
                    // console.log('коллектив в профессиональном конкурсе')

                    // число участников со скидкой
                    let people_cnt = this.price.max_quantity_participants_price - this.price.cnt_person + 1;
                    if (people_cnt > this.price.max_quantity_participants_price){
                        people_cnt = this.price.max_quantity_participants_price;
                    }

                    // console.log('people_cnt', people_cnt)

                    // максимальное число платных участников
                    /*if (this.price.number_participants > this.price.max_quantity_participants_price){
                        this.price.number_participants = this.price.max_quantity_participants_price;
                    }*/

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
                        + parseInt(this.price.country_postal_delivery) // доставка в страну
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
                }

                for (let i = 0; i < this.price.order.length; i++){
                    this.price.full_price += this.price.order[i].price
                }
            },
            setTariffId(){
                this.price.tariff_id = this.price.current_tariff.id;
            },
            /*send(){
                // this.$root.submit()
                // application_form.submit()
                this.$refs.application_form.submit();
            },*/
            submitHandler(target) {
                console.log(target)
                // target.submit();
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
            competitions_filter(){
                if (this.active_professional) {
                    return this.competitions.filter(item => item.type.type === 'professional');
                }else if (!this.active_professional){
                    return this.competitions.filter(item => item.type.type === 'amateur');
                }
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
            // this.competitions_filtered = this.competitions_filter();
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
                // this.$forceUpdate();
                // this.competitions_filtered = this.competitions_filter();
            },
            age_group_id(val){
                let group = this.age_groups.filter(item => item.id === val);
                console.log(group)
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
                    this.price.country_postal_delivery = parseInt(country[0].postage_price);
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
            <input type="text" name="participant_first_name[]">
        </div>
        <div class="field field-33">
            <legend>Фамилия участника</legend>
            <input type="text" name="participant_last_name[]">
        </div>
        <div class="field field-33" v-show="!solo">
            <button @click.prevent="deleteParticipant($event.target)" class="btn btn-border-red" style="margin-top: 20px">Удалить участника</button>
        </div>
                        @verbatim
    <div class="field field-100">
        <legend style="margin-top: 30px" v-if="!active_professional && !solo">Персональный диплом</legend>
        <legend style="margin-top: 30px" v-else-if="active_professional">Закажите диплом с ориг печатью и оставьте на память</legend>
        <div class="checks">
            <input name="participant_diploma_electro" type="checkbox" class="checkbox" :id="'checkbox_person_diplom_electro-' + counter" v-model="participant_electro_diploma" v-if="!active_professional && !solo">
            <label :for="'checkbox_person_diplom_electro-' + counter" v-if="!active_professional && !solo">Электронный</label>

            <input name="participant_diploma_print" type="checkbox" class="checkbox" :id="'checkbox_person_diplom_printed-' + counter" v-if="active_professional" v-model="case_print">
            <label :for="'checkbox_person_diplom_printed-' + counter" v-if="active_professional">Печатный</label>
        </div>
    </div>
    <div class="field field-100" v-if="active_professional && case_print">
        <div class="checks" style="margin-top: 20px; display: flex; align-items: center;">
            <label class="number" :for="'checkbox_person_cnt_diplom_print-' + counter">Количество персональных печатных дипломов этому участнику</label>
            <input name="quantity_person_diploma[]" type="number" min="0" class="number" :id="'checkbox_person_cnt_diplom_print-' + counter" v-model.number="person_cnt_diplom_print">
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
                <input type="text" name="teacher_first_name[]">
            </div>
            <div class="field field-33">
                <legend>Фамилия педагога</legend>
                <input type="text" name="teacher_last_name[]">
            </div>
            <div class="field field-33">
                <legend>Отчество педагога</legend>
                <input type="text" name="teacher_third_name[]">
            </div>
        </div>
        <div class="fields field-100 fields-align-center">
            <div class="field field-100">
                <legend>Должность педагога</legend>
                <input type="text" name="teacher_job[]">
            </div>
        </div>
        <div class="field field-100" style="text-align: right;">
            <button @click.prevent="deleteTeacher($event.target)" class="btn btn-border-red" style="margin-top: 20px">Удалить педагога</button>
        </div>
@verbatim
    <div class="field field-100">
        <legend style="margin-top: 30px">Благодарственное письмо для педагога</legend>
        <div class="checks" style="margin-top: 30px">
            <input name="teacher_letter_electro[]" type="checkbox" class="checkbox" :id="'checkbox_teacher_person_diplom_electro-' + counter" v-model="teacher_letter">
            <label :for="'checkbox_teacher_person_diplom_electro-' + counter">В электронном виде</label>
            <input name="teacher_letter_print[]" type="checkbox" class="checkbox" :id="'checkbox_teacher_person_diplom_printed-' + counter" v-show="active_professional">
            <label :for="'checkbox_teacher_person_diplom_printed-' + counter" v-show="active_professional">Печатный</label>
        </div>
    </div>
@endverbatim
        <hr style="display: block; width: 100%; margin-bottom: 20px;">
    </div>`
    });

    appl.mount('#app');


</script>

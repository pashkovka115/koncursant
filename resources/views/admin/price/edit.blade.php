@extends('admin.layouts.app')
@section('title') Цены @endsection
@section('header')

@endsection
@section('content')
    @component('admin.layouts.components.breadcrumb')
        @slot('title') Цены @endslot
        @slot('active') Цены @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">

            <form id="form_edit_price" action="{{ route('admin.price.update', ['id' => $price->id]) }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Индивидуальный диплом участника в любительском конкурсе (электронный)</label>
                            <input type="number" name="diploma" value="{{ $price->diploma }}" min="0" class="form-control default">
                        </div>
                        <div class="form-group">
                            <label>Коллективный диплом в любительском конкурсе (электронный)</label>
                            <input type="number" name="diploma_kollective_electro" value="{{ $price->diploma_kollective_electro }}" min="0" class="form-control default">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Стоимость печати индивидуального диплома СОЛИСТА в профессиональном конкурсе</label>
                            <input type="number" name="diploma_print_solist" value="{{ $price->diploma_print_solist }}" min="0" class="form-control default">
                        </div>
                        <div class="form-group">
                            <label>Стоимость печати индивидуального диплома в КОЛЛЕКТИВЕ в профессиональном конкурсе</label>
                            <input type="number" name="diploma_print_kollective" value="{{ $price->diploma_print_kollective }}" min="0" class="form-control default">
                        </div>
                        <div class="form-group">
                            <label>Стоимость общего диплома в профессиональном коллективе</label>
                            <input type="number" name="general_diplom_print" value="{{ $price->general_diplom_print }}" min="0" class="form-control default">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Благодарственное письмо педагогу</label>
                            <input type="number" name="thanks_teacher" value="{{ $price->thanks_teacher }}" min="0" class="form-control default">
                        </div>
                        <div class="form-group">
                            <label>Скидка на каждого последующего участника</label>
                            <input type="number" name="discount" value="{{ $price->discount }}" min="0" class="form-control default">
                        </div>
                        <div class="form-group">
                            <label>Скидка начиная с этого участника</label>
                            <input type="number" name="cnt_person" value="{{ $price->cnt_person }}" min="0" class="form-control default">
                        </div>
                        <div class="form-group">
                            <label>Свыше этого количества участников бесплатно</label>
                            <input type="number" name="max_quantity_participants_price" value="{{ $price->max_quantity_participants_price }}" min="0" class="form-control default">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <button type="submit" name="btn_save_list" class="btn btn-success">Сохранить</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
@section('footer')

@endsection

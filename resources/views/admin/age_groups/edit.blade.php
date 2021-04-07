@extends('admin.layouts.app')
@section('title') Редактируем возрастную группу @endsection
@section('header')

@endsection
@section('content')
    @component('admin.layouts.components.breadcrumb')
        @slot('title') Редактируем возрастную группу @endslot
        @slot('li_2') Возрастные группы @endslot
        @slot('a_2') {{ route('admin.competitions.age_group.index') }} @endslot
        @slot('active') Редактируем возрастную группу @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.competitions.age_group.update', ['id' => $group->id]) }}" method="post">
                @csrf

                <div class="form-group">
                    <label>Наименование</label>
                    <input type="text" name="name" value="{{ $group->name }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Возраст</label>
                    <input type="text" name="age" value="{{ $group->age }}" class="form-control">
                </div>

                <div class="form-group">
                    <label>Цена</label>
                    <input type="number" name="price" value="{{ $group->price }}" min="0" class="form-control">
                </div>

                <div class="form-group mt-5">
                    <div>
                        <button type="submit" name="btn_save_list" class="btn btn-success">Сохранить и перейти в список</button>
                        <button type="submit" name="btn_save_edit" class="btn btn-primary">Сохранить и продолжить редактирование</button>
                        <a href="{{ route('admin.competitions.age_group.index') }}" class="btn btn-warning text-white">Перейти в список без сохранения</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
@section('footer')

@endsection

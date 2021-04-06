@extends('admin.layouts.app')
@section('title') Тариф @endsection
@section('header')

@endsection
@section('content')
    @component('admin.layouts.components.breadcrumb')
        @slot('title') Редактируем тариф @endslot
        @slot('active') Редактируем тариф @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.competitions.tariffs.update', ['id' => $tariff->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Имя</label>
                    <input type="text" name="name" value="{{ $tariff->name }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Тип</label>
                    <select name="type" class="form-control">
                        <option value="solist" @if($tariff->type == 'solist') selected @endif>Солист</option>
                        <option value="kollective" @if($tariff->type == 'kollective') selected @endif>Коллектив</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Продолжительность (дней)</label>
                    <input id="number" name="duration" value="{{ $tariff->duration }}" type="number" min="0" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">Цена</label>
                    <input id="number" name="price" value="{{ $tariff->price }}" type="number" min="0" class="form-control">
                </div>

                <div class="form-group">
                    <div>
                        <button type="submit" name="btn_save_list" class="btn btn-success">Сохранить и перейти в список</button>
                        <button type="submit" name="btn_save_edit" class="btn btn-primary">Сохранить и продолжить редактирование</button>
                        <a href="{{ route('admin.competitions.tariffs.index') }}" class="btn btn-warning text-white">Перейти в список без сохранения</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
@section('footer')


@endsection

@extends('admin.layouts.app')
@section('title') Редактируем тип конкурса @endsection
@section('header')

@endsection
@section('content')
    @component('admin.layouts.components.breadcrumb')
        @slot('title') Редактируем тип конкурса @endslot
        @slot('li_2') Список типов @endslot
        @slot('a_2') {{ route('admin.competitions.types.index') }} @endslot
        @slot('active') Редактируем тип @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.competitions.types.update', ['id' => $competition->id]) }}" method="post">
                @csrf

                <div class="form-group">
                    <label>Имя</label>
                    <input type="text" name="name" value="{{ $competition->name }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <div>
                        <button type="submit" name="btn_save_list" class="btn btn-success">Сохранить и перейти в список</button>
                        <button type="submit" name="btn_save_edit" class="btn btn-primary">Сохранить и продолжить редактирование</button>
                        <a href="{{ route('admin.competitions.types.index') }}" class="btn btn-warning text-white">Перейти в список без сохранения</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
@section('footer')


@endsection

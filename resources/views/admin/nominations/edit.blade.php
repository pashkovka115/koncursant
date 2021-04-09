@extends('admin.layouts.app')
@section('title') Номинации @endsection
@section('header')

@endsection
@section('content')
    @component('admin.layouts.components.breadcrumb')
        @slot('title') Редактируем наминацию @endslot
        @slot('active') Редактируем наминацию @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.competitions.nominations.update', ['id' => $nomination->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Имя</label>
                    <input type="text" name="name" value="{{ $nomination->name }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <div>
                        <button type="submit" name="btn_save_list" class="btn btn-success">Сохранить и перейти в список</button>
                        <button type="submit" name="btn_save_edit" class="btn btn-primary">Сохранить и продолжить редактирование</button>
                        <a href="{{ route('admin.competitions.nominations.index') }}" class="btn btn-warning text-white">Перейти в список без сохранения</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
@section('footer')


@endsection

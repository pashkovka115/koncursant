@extends('admin.layouts.app')
@section('title') Оценки @endsection
@section('header')

@endsection
@section('content')
    @component('admin.layouts.components.breadcrumb')
        @slot('title') Редактируем оценку @endslot
        @slot('active') Редактируем оценку @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.competitions.appraisal.update', ['id' => $appraisal->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Имя</label>
                    <input type="text" name="name" value="{{ $appraisal->name }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <div>
                        <button type="submit" name="btn_save_list" class="btn btn-success">Сохранить и перейти в список</button>
                        <button type="submit" name="btn_save_edit" class="btn btn-primary">Сохранить и продолжить редактирование</button>
                        <a href="{{ route('admin.competitions.appraisal.index') }}" class="btn btn-warning text-white">Перейти в список без сохранения</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
@section('footer')


@endsection

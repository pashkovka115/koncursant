@extends('admin.layouts.app')
@section('title') Редактируем вопрос @endsection
@section('header')

@endsection
@section('content')
    @component('admin.layouts.components.breadcrumb')
        @slot('title') Редактируем вопрос @endslot
        @slot('li_2') Вопросы @endslot
        @slot('a_2') {{ route('admin.questions.index') }} @endslot
        @slot('active') Редактируем вопрос @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.questions.update', ['id' => $question->id]) }}" method="post">
                @csrf
                <div class="custom-control custom-checkbox mb-3">
                    <?php
                    $checked = '';
                    if ($question->active == '1'){
                        $checked = ' checked';
                    }
                    ?>
                    <input type="checkbox" name="active" id="customCheck1"{{ $checked }} class="custom-control-input">
                    <label for="customCheck1" class="custom-control-label">Показывать на сайте</label>
                </div>

                <div class="form-group">
                    <label>Вопрос</label>
                    <input type="text" name="question" value="{{ $question->question }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Ответ</label>
                    <div>
                        <textarea name="answer" rows="5" class="form-control">{{ $question->answer }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <button type="submit" name="btn_save_list" class="btn btn-success">Сохранить и перейти в список</button>
                        <button type="submit" name="btn_save_edit" class="btn btn-primary">Сохранить и продолжить редактирование</button>
                        <a href="{{ route('admin.questions.index') }}" class="btn btn-warning text-white">Перейти в список без сохранения</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
@section('footer')


@endsection

@extends('admin.layouts.app')
@section('title') === @endsection
@section('header')

@endsection
@section('content')
    @component('admin.layouts.components.breadcrumb')
        @slot('title') === @endslot
        @slot('li_2') === @endslot
        @slot('a_2') = @endslot
        @slot('active') === @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">

            <form action="#" method="post">
                @csrf
                <div class="custom-control custom-checkbox mb-3">
                    <?php
                    $checked = '';
                    if ($...->active == '1'){
                        $checked = ' checked';
                    }
                    ?>
                    <input type="checkbox" name="active" id="customCheck1"{{ $checked }} class="custom-control-input">
                    <label for="customCheck1" class="custom-control-label">Показывать на сайте</label>
                </div>

                <div class="form-group">
                    <label>Имя</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Описание</label>
                    <div>
                        <textarea name="description" rows="5" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <button type="submit" name="btn_save_list" class="btn btn-success">Сохранить и перейти в список</button>
                        <button type="submit" name="btn_save_edit" class="btn btn-primary">Сохранить и продолжить редактирование</button>
                        <a href="#" class="btn btn-warning text-white">Перейти в список без сохранения</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
@section('footer')


@endsection

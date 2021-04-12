@extends('admin.layouts.app')
@section('title') Редактируем страницу @endsection
@section('header')

@endsection
@section('content')
    @component('admin.layouts.components.breadcrumb')
        @slot('title') Редактируем страницу @endslot
        @slot('li_2') Все страницы @endslot
        @slot('a_2') {{ route('admin.pages.info.index') }} @endslot
        @slot('active') {{ $page->name }} @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.pages.info.update', ['id' => $page->id]) }}" method="post">
                @csrf
                <div class="custom-control custom-checkbox mb-3">
                    <?php
                    $checked = '';
                    if ($page->active == '1'){
                        $checked = ' checked';
                    }
                    ?>
                    <input type="checkbox" name="active" id="customCheck1"{{ $checked }} class="custom-control-input">
                    <label for="customCheck1" class="custom-control-label">Показывать на сайте</label>
                </div>

                <div class="form-group">
                    <label>Имя</label>
                    <input type="text" name="name" value="{{ $page->name }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Описание</label>
                    <div>
                        <textarea id="elm1" name="content" rows="5" class="form-control">{{ $page->content }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <button type="submit" name="btn_save_list" class="btn btn-success">Сохранить и перейти в список</button>
                        <button type="submit" name="btn_save_edit" class="btn btn-primary">Сохранить и продолжить редактирование</button>
                        <a href="{{ route('admin.pages.info.index') }}" class="btn btn-warning text-white">Перейти в список без сохранения</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
@section('footer')
    {{--  Text Editor  --}}
    <!--tinymce js-->
    <script src="{{ URL::asset('/assets/libs/tinymce/tinymce.min.js')}}"></script>
    <!-- init js -->
    <script src="{{ URL::asset('/assets/js/pages/jquery.form-editor.init.js')}}"></script>
    {{-- END Text Editor  --}}

@endsection

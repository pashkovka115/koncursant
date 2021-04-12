@extends('admin.layouts.app')
@section('title') Контакты @endsection
@section('header')

@endsection
@section('content')
    @component('admin.layouts.components.breadcrumb')
        @slot('title') Редактируем контакт @endslot
        @slot('li_2') Список контактов @endslot
        @slot('a_2') {{ route('admin.pages.contacts.index') }} @endslot
        @slot('active') Контакт @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.pages.contacts.update', ['id' => $contact->id]) }}" method="post">
                @csrf

                <div class="form-group">
                    <label>Ключ</label>
                    <input type="text" class="form-control" value="{{ $contact->key }}" disabled style="background-color: rgba(145,145,145,0.45)">
                </div>

                @if($contact->value != 'x')
                <div class="form-group">
                    <label>Значение</label>
                    <input type="text" name="value" class="form-control" value="{{ $contact->value }}">
                </div>
                @endif

                @if($contact->value2 != 'x')
                <div class="form-group">
                    <label>Значение 2</label>
                    <input type="text" name="value2" class="form-control" value="{{ $contact->value2 }}">
                </div>
                @endif

                @if($contact->description != 'x')
                <div class="form-group">
                    <label>Описание</label>
                    <div>
                        <textarea id="elm1" name="description" rows="5" class="form-control">{{ $contact->description }}</textarea>
                    </div>
                </div>
                @endif

                <div class="form-group">
                    <div>
                        <button type="submit" name="btn_save_list" class="btn btn-success">Сохранить и перейти в список</button>
                        <button type="submit" name="btn_save_edit" class="btn btn-primary">Сохранить и продолжить редактирование</button>
                        <a href="{{ route('admin.pages.contacts.index') }}" class="btn btn-warning text-white">Перейти в список без сохранения</a>
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

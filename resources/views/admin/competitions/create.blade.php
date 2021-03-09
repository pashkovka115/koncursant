@extends('admin.layouts.app')
@section('title') Конкурс @endsection

@section('header')
    <!-- Summernote css -->
    <link href="{{ URL::asset('/assets/libs/summernote/summernote.min.css')}}" rel="stylesheet" type="text/css" />
    {{-- Select2 --}}
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('admin.layouts.components.breadcrumb')
        @slot('title') Новый конкурс @endslot
        @slot('li_2') Все конкурсы @endslot
        @slot('a_2') {{ route('admin.competitions.all.index') }} @endslot
        @slot('active') Новый конкурс @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.competitions.all.store') }}" method="post">
                @csrf
                <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" name="active" id="customCheck1" class="custom-control-input">
                    <label for="customCheck1" class="custom-control-label">Показывать на сайте</label>
                </div>

                <div class="form-group">
                    <label class="control-label">Тип</label>
                    <select name="types[]" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Выбрать ...">
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Имя</label>
                    <input type="text" name="name" value="" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Описание</label>
                    <div>
                        <textarea id="elm1" name="description" rows="5" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <button type="submit" name="btn_save_list" class="btn btn-success">Сохранить и перейти в список</button>
                        <button type="submit" name="btn_save_edit" class="btn btn-primary">Сохранить и продолжить редактирование</button>
                        <a href="{{ route('admin.competitions.all.index') }}" class="btn btn-warning text-white">Перейти в список без сохранения</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
@section('footer')
    {{--  Text Editor  --}}
    <!-- Summernote js -->
    <script src="{{ URL::asset('/assets/libs/summernote/summernote.min.js')}}"></script>
    <!--tinymce js-->
    <script src="{{ URL::asset('/assets/libs/tinymce/tinymce.min.js')}}"></script>
    <!-- init js -->
    <script src="{{ URL::asset('/assets/js/pages/form-editor.init.js')}}"></script>
    {{-- END Text Editor  --}}
    {{-- Select2 --}}
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js')}}"></script>
    <script>
        // Select2
        $(".select2").select2();
    </script>
@endsection

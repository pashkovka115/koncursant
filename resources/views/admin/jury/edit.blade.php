@extends('admin.layouts.app')
@section('title') Редактировать жюри @endsection

@section('header')
    
@endsection

@section('content')
    @component('admin.layouts.components.breadcrumb')
        @slot('title') Редактировать жюри @endslot
        @slot('li_2') Жюри @endslot
        @slot('a_2') {{ route('admin.jury.index') }} @endslot
        @slot('active') Редактировать жюри @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">

            <form enctype="multipart/form-data" action="{{ route('admin.jury.update', ['id' => $person->id]) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <div class="custom-control custom-checkbox mb-3">
                            <?php
                            $checked = '';
                            if ($person->active == '1'){
                                $checked = ' checked';
                            }
                            ?>
                            <input type="checkbox" name="active" id="customCheck1"{{ $checked }} class="custom-control-input">
                            <label for="customCheck1" class="custom-control-label">Показывать на сайте</label>
                        </div>

                        <div class="form-group">
                            <label>Имя</label>
                            <input type="text" name="name" value="{{ $person->name }}" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Специальность в жюри</label>
                            <input type="text" name="direction" value="{{ $person->direction }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Специальности (укажите через запятую)</label>
                            <input type="text" name="profession" value="{{ $person->profession }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="custom-file col-sm-12">
                            <input id="customFile" name="img" type="file" class="custom-file-input">
                            <label for="customFile" class="custom-file-label">Выбрать изображение</label>
                        </div>
                        <div class="col-sm-12 mt-3">
                            @if($person->img)
                            <img src="/storage/{{ $person->img }}" style="max-height: 180px; width: auto;">
                                <div class="custom-control custom-checkbox mt-3">
                                    <input type="checkbox" name="delete_img" id="customCheck2" class="custom-control-input">
                                    <label for="customCheck2" class="custom-control-label">Удалить изображение</label>
                                </div>
                            @else
                                <img src="/assets/images/not-found.png" style="max-height: 180px; width: auto;">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Описание</label>
                    <div>
                        <textarea id="elm1" name="description" rows="5" class="form-control">{!! $person->description !!}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label>Образование</label>
                    <div>
                        <textarea id="elm2" name="ducation" rows="5" class="form-control">{!! $person->ducation !!}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label>География трудовой деятельности</label>
                    <div>
                        <textarea id="elm3" name="geography_of_work" rows="5" class="form-control">{!! $person->geography_of_work !!}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <button type="submit" name="btn_save_list" class="btn btn-success">Сохранить и перейти в список</button>
                        <button type="submit" name="btn_save_edit" class="btn btn-primary">Сохранить и продолжить редактирование</button>
                        <a href="{{ route('admin.jury.index') }}" class="btn btn-warning text-white">Перейти в список без сохранения</a>
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

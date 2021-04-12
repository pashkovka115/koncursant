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

            <ul class="nav nav-pills nav-justified mb-3" role="tablist">
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link active" data-toggle="tab" href="#general" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">Общая информация</span>
                    </a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-toggle="tab" href="#conditions" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">Условия</span>
                    </a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-toggle="tab" href="#orgkomitet" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">Оргкомитет</span>
                    </a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-toggle="tab" href="#reward" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">Награды</span>
                    </a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-toggle="tab" href="#rank" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">Звания</span>
                    </a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-toggle="tab" href="#nominations" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">Номинации</span>
                    </a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-toggle="tab" href="#diploma" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">Пример диплома</span>
                    </a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-toggle="tab" href="#cost" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">Стоимость</span>
                    </a>
                </li>
            </ul>

            <form action="{{ route('admin.competitions.types.update', ['id' => $type->id]) }}" method="post">
                @csrf

                <div class="tab-content p-3 text-muted">

                    <div class="tab-pane active" id="general" role="tabpanel">
                        <div class="form-group">
                            <label>Имя</label>
                            <input type="text" name="name" value="{{ $type->name }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="tab-pane" id="conditions" role="tabpanel">
                        <div class="form-group">
                            <label>Условия участия</label>
                            <div>
                                <textarea id="elm2" name="conditions" rows="5" class="form-control">{!! $type->conditions !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="orgkomitet" role="tabpanel">
                        <div class="form-group">
                            <label>Оргкомитет</label>
                            <div>
                                <textarea id="elm3" name="email_description" rows="5" class="form-control">{!! $type->email_description !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="reward" role="tabpanel">
                        <div class="form-group">
                            <label>Оценки и награждения</label>
                            <div>
                                <textarea id="elm4" name="reward" rows="5" class="form-control">{!! $type->reward !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="rank" role="tabpanel">
                        <div class="form-group">
                            <label>Звания</label>
                            <div>
                                <textarea id="elm5" name="rank" rows="5" class="form-control">{!! $type->rank !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="nominations" role="tabpanel">
                        <div class="form-group">
                            <label>Номинации</label>
                            <div>
                                <textarea  id="elm6" name="nominations" rows="5" class="form-control">{!! $type->nominations !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="diploma" role="tabpanel">
                        <div class="form-group">
                            <label>Пример диплома</label>
                            <div>
                                <p>{{ $type->diploma }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="cost" role="tabpanel">
                        <div class="form-group">
                            <label>Стоимость участия</label>
                            <div>
                                <textarea id="elm7" name="cost" rows="5" class="form-control">{!! $type->cost !!}</textarea>
                            </div>
                        </div>
                    </div>

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
    {{--  Text Editor  --}}
    <!--tinymce js-->
    <script src="{{ URL::asset('/assets/libs/tinymce/tinymce.min.js')}}"></script>
    <!-- init js -->
{{--    <script src="{{ URL::asset('/assets/js/pages/jquery.form-editor.init.js')}}"></script>--}}
    {{-- END Text Editor  --}}


    <script>
        $(document).ready(function () {
            if($("#elm2").length > 0){
                tinymce.init({
                    selector: "textarea#elm2",
                    language: 'ru',
                    theme: "modern",
                    height:400,
                    convert_urls: false,
                    relative_urls : false,
                    plugins: [
                        "advlist autolink link lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | print preview fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
            if($("#elm3").length > 0){
                tinymce.init({
                    selector: "textarea#elm3",
                    language: 'ru',
                    theme: "modern",
                    height:400,
                    convert_urls: false,
                    relative_urls : false,
                    plugins: [
                        "advlist autolink link lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | print preview fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
            if($("#elm4").length > 0){
                tinymce.init({
                    selector: "textarea#elm4",
                    language: 'ru',
                    theme: "modern",
                    height:400,
                    convert_urls: false,
                    relative_urls : false,
                    plugins: [
                        "advlist autolink link lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | print preview fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
            if($("#elm5").length > 0){
                tinymce.init({
                    selector: "textarea#elm5",
                    language: 'ru',
                    theme: "modern",
                    height:400,
                    convert_urls: false,
                    relative_urls : false,
                    plugins: [
                        "advlist autolink link lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | print preview fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
            if($("#elm6").length > 0){
                tinymce.init({
                    selector: "textarea#elm6",
                    language: 'ru',
                    theme: "modern",
                    height:400,
                    convert_urls: false,
                    relative_urls : false,
                    plugins: [
                        "advlist autolink link lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | print preview fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
            if($("#elm7").length > 0){
                tinymce.init({
                    selector: "textarea#elm7",
                    language: 'ru',
                    theme: "modern",
                    height:400,
                    convert_urls: false,
                    relative_urls : false,
                    plugins: [
                        "advlist autolink link lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | print preview fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
        });
    </script>

@endsection

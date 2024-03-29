@extends('admin.layouts.app')
@section('title') Конкурс @endsection

@section('header')

@endsection

@section('content')
    @component('admin.layouts.components.breadcrumb')
        @slot('title') Редактируем конкурс @endslot
        @slot('li_2') Все конкурсы @endslot
        @slot('a_2') {{ route('admin.competitions.all.index') }} @endslot
        @slot('active') Редактируем конкурс @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">

            <ul class="nav nav-pills nav-justified" role="tablist">
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link active" data-toggle="tab" href="#general" role="tab">
                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                        <span class="d-none d-sm-block">Общая информация</span>
                    </a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-toggle="tab" href="#age" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">Возрастные группы</span>
                    </a>
                </li>
                <li class="nav-item waves-effect waves-light">
                    <a class="nav-link" data-toggle="tab" href="#nominations" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                        <span class="d-none d-sm-block">Номинации</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content p-3 text-muted">
                <div class="tab-pane active" id="general" role="tabpanel">

            <form enctype="multipart/form-data" action="{{ route('admin.competitions.all.update', ['id' => $competition->id]) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="custom-control custom-checkbox mb-3">
                            <?php
                            $checked = '';
                            if ($competition->active == '1'){
                                $checked = ' checked';
                            }
                            ?>
                            <input type="checkbox" name="active" id="customCheck1"{{ $checked }} class="custom-control-input">
                            <label for="customCheck1" class="custom-control-label">Показывать на сайте</label>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Тип</label>
                            <select name="competition_type_id" class="form-control" data-placeholder="Выбрать ...">
                                @foreach($types_all as $type)
                                    @php
                                        $selected = '';
                                        if ($competition->competition_type_id == $type->id){
                                            $selected = ' selected';
                                        }
                                    @endphp
                                    <option value="{{ $type->id }}"{{ $selected }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Имя</label>
                            <input type="text" name="name" value="{{ $competition->name }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <h5>Маленькое</h5>
                        <div class="custom-file">
                            <input name="img" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Выбрать файл</label>
                        </div>
                        <div class="my-3">
                        @if($competition->img)
                            <img src="/storage/{{ $competition->img }}" style="max-height: 180px; width: auto;">
                                <div class="custom-control custom-checkbox mt-3">
                                    <input type="checkbox" name="delete_img" id="customCheck2" class="custom-control-input">
                                    <label for="customCheck2" class="custom-control-label">Удалить изображение</label>
                                </div>
                        @else
                            <img src="/assets/images/not-found.png" style="max-height: 180px; width: auto;">
                        @endif
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <h5>Большое</h5>
                        <div class="custom-file">
                            <input name="bg_img" type="file" class="custom-file-input" id="customFile2">
                            <label class="custom-file-label" for="customFile2">Выбрать файл</label>
                        </div>
                        <div class="my-3">
                        @if($competition->bg_img)
                            <img src="/storage/{{ $competition->bg_img }}" style="max-height: 180px; max-width: 370px;">
                                <div class="custom-control custom-checkbox mt-3">
                                    <input type="checkbox" name="delete_bg_img" id="customCheck3" class="custom-control-input">
                                    <label for="customCheck3" class="custom-control-label">Удалить изображение</label>
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
                        <textarea id="elm1" name="description" rows="5" class="form-control">{{ $competition->description }}</textarea>
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

                <div class="tab-pane" id="age" role="tabpanel">
                    <form action="{{ route('admin.competitions.all.attach_age_group', ['competition_id' => $competition->id]) }}" method="post" class="row mb-3 d-flex align-items-center">
                        @csrf
                        <div class="form-group col-sm-4">
                            @php
                            $ids = array_keys($competition->ageGroups->keyBy('id')->toArray());
                            @endphp
                            <label>Возрастные группы</label>
                            <select name="age_group" class="form-control" required>
                                @forelse($age_groups as $age_group)
                                    @if(!in_array($age_group->id, $ids))
                                <option value="{{ $age_group->id }}">{{ $age_group->name }}</option>
                                    @endif
                                @empty
                                    <option value="">Нечего добавить</option>
                                @endforelse
                            </select>
                        </div>
                        <button class="btn btn-primary h-50" style="margin-top: 0.75rem!important;" type="submit">Добавить</button>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped mb-0">

                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Наименование</th>
                                <th>Возраст</th>
                                <th>Открепить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($competition->ageGroups as $group)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $group->name }}</td>
                                <td>{{ $group->age }}</td>
                                <td>
                                    <a href="{{ route('admin.competitions.all.detach_age_group', ['competition_id' => $competition->id]) }}" class="text-danger"
                                       onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $group->id }}').submit(); return false;">
                                        <i class="mdi mdi-trash-can font-size-18"></i></a>
                                    <form id="form_{{ $group->id }}" action="{{ route('admin.competitions.all.detach_age_group', ['competition_id' => $competition->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="age_group" value="{{ $group->id }}">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="tab-pane" id="nominations" role="tabpanel">
                    <form action="{{ route('admin.competitions.all.attach_nomination', ['competition_id' => $competition->id]) }}" method="post" class="row mb-3 d-flex align-items-center">
                        @csrf
                        <div class="form-group col-sm-4">
                            @php
                                $ids = array_keys($competition->nominations->keyBy('id')->toArray());
                            @endphp
                            <label>Номинации</label>
                            <select name="nomination_id" class="form-control" required>
                                @forelse($nominations as $nomination)
                                    @if(!in_array($nomination->id, $ids))
                                        <option value="{{ $nomination->id }}">{{ $nomination->name }}</option>
                                    @endif
                                @empty
                                    <option value="">Нечего добавить</option>
                                @endforelse
                            </select>
                        </div>
                        <button class="btn btn-primary h-50" style="margin-top: 0.75rem!important;" type="submit">Добавить</button>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-striped mb-0">

                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Наименование</th>
                                <th>Открепить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($competition->nominations as $nomination)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $nomination->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.competitions.all.detach_nomination', ['competition_id' => $competition->id]) }}" class="text-danger"
                                           onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $nomination->id }}').submit(); return false;">
                                            <i class="mdi mdi-trash-can font-size-18"></i></a>
                                        <form id="form_{{ $nomination->id }}" action="{{ route('admin.competitions.all.detach_nomination', ['competition_id' => $competition->id]) }}" method="POST" style="display: none;">
                                            @csrf
                                            <input type="hidden" name="nomination_id" value="{{ $nomination->id }}">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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

    {{-- File Input --}}
    <script src="{{ URL::asset('/assets/libs/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        bsCustomFileInput.init();
    </script>
    {{-- END File Input --}}
@endsection

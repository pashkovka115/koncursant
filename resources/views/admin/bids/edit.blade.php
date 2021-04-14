@extends('admin.layouts.app')
@section('title') Редактируем заявку @endsection
@section('header')

@endsection
@section('content')
    @component('admin.layouts.components.breadcrumb')
        @slot('title') Редактируем заявку @endslot
        @if($bid->competition)
            @slot('li_2') {{ $bid->competition->name }} @endslot
            @slot('a_2') {{ route('admin.bids.concrete.competition', ['competition_id' => $bid->competition->id]) }} @endslot
        @endif
        @slot('active') Редактируем заявку @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.bids.update', ['id' => $bid->id]) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <?php
                                    $sp = explode('/', $bid->link_to_resource);

                                    if($bid->resource == 'youtube' and $bid->link_to_resource){
                                        echo '<iframe src="https://www.youtube.com/embed/' . $sp[count($sp) - 1] . '" class="embed-responsive-item"></iframe>';
                                    }elseif ($bid->resource == 'file_sharing' and $bid->link_to_resource){
                                        echo $bid->link_to_resource;
                                    }
                                    ?>
                                </div>

                                <p style="margin-top: 20px; margin-bottom: 20px;">
                                    @if(stripos($bid->link_to_resource, '://') !== false)
                                    <a target="_blank" href="{{ $bid->link_to_resource }}">Оригинальная ссылка</a>
                                    @else
                                    Нет ссылки
                                    @endif
                                </p>
                                <div class="form-group">
                                    <select name="resource" class="form-control">
                                        <option value="youtube" @if($bid->resource == 'youtube') selected @endif>Youtube</option>
                                        <option value="vk" @if($bid->resource == 'vk') selected @endif>Вконтакте</option>
                                        <option value="ok" @if($bid->resource == 'ok') selected @endif>Однокласники</option>
                                        <option value="file_sharing" @if($bid->resource == 'file_sharing') selected @endif>Файлообменник</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <input name="link_to_resource" class="form-control" value="{{ $bid->link_to_resource }}">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <span class="badge bg-light text-dark">№ {{ $bid->id }}</span>
                                <span class="badge bg-light text-dark"><i class="fas fa-user"></i>
                                    @if($bid->cnt_people == 'solist')
                                        Солист
                                    @elseif($bid->cnt_people == 'kollective')
                                        Коллектив
                                    @endif
                                        - {{ $bid->ageGroup->name ?? '' }}
                                </span>
                                <span class="badge bg-light text-dark"><i class="fas fa-music"></i> {{ $bid->musical_instrument }}</span>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Название номера</label>
                                    <input name="musical_number" class="form-control" value="{{ $bid->musical_number }}">
                                </div>
                                <div class="form-group">
                                    <label>Комментарй</label>
                                    <div>
                                        <textarea name="comment" rows="3" class="form-control">{{ $bid->comment }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Оценка</label>
                                    <select name="appraisal_id" class="form-control">
                                        <option value="">===</option>
                                        @foreach($appraisals as $appraisal)
                                            <?php
                                            $selected = '';
                                            if ($bid->appraisal_id == $appraisal->id){
                                                $selected = ' selected';
                                            }
                                            ?>
                                            <option value="{{ $appraisal->id }}"{{ $selected }}>{{ $appraisal->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Статус</label>
                                    <select name="processe_state" class="form-control">
                                        <option value="4" @if($bid->processe_state == '5') selected @endif>Не обработана</option>
                                        <option value="3" @if($bid->processe_state == '4') selected @endif>Ошибка данных</option>
                                        <option value="2" @if($bid->processe_state == '3') selected @endif>Нет видео</option>
                                        <option value="2" @if($bid->processe_state == '2') selected @endif>В работе</option>
                                        <option value="1" @if($bid->processe_state == '1') selected @endif>Допущена к оценке</option>
                                        <option value="0" @if($bid->processe_state == '0') selected @endif>Завершена</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Информация</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">Участники</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#messages-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Наставники</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#settings-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                            <span class="d-none d-sm-block">Уч. заведение</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Название коллектива</label>
                                                    <input name="koll_name" type="text" value="{{ $bid->koll_name }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Тип</label>
                                                    <select name="type" class="form-control">
                                                        <option value="amateur" @if($bid->type == 'amateur') selected @endif>Любительский</option>
                                                        <option value="professional" @if($bid->type == 'professional') selected @endif>Професионаьный</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Конкурс</label>
                                                    <select name="competition_id" class="form-control">
                                                        <option value="">========</option>
                                                        @foreach($competitions as $competition)
                                                            @php
                                                            $selected = '';
                                                            if ($bid->competition_id == $competition->id){
                                                                $selected = ' selected';
                                                            }
                                                            @endphp
                                                        <option value="{{ $competition->id }}"{{ $selected }}>{{ $competition->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Номинация</label>
                                                    <select name="nomination_id" class="form-control">
                                                        <option value="">========</option>
                                                        @foreach($nominations as $nomination)
                                                            @php
                                                                $selected = '';
                                                                if ($bid->nomination_id == $nomination->id){
                                                                    $selected = ' selected';
                                                                }
                                                            @endphp
                                                        <option value="{{ $nomination->id }}"{{ $selected }}>{{ $nomination->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Возрастная группа</label>
                                                    <select name="age_group_id" class="form-control">
                                                        <option value="">========</option>
                                                        @foreach($age_groups as $group)
                                                            @php
                                                                $selected = '';
                                                                if ($bid->age_group_id == $group->id){
                                                                    $selected = ' selected';
                                                                }
                                                            @endphp
                                                        <option value="{{ $group->id }}"{{ $selected }}>{{ $group->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Тариф</label>
                                                    <select name="tariff_id" class="form-control">
                                                        <option value="">========</option>
                                                        @foreach($tariffs as $tariff)
                                                            @php
                                                                $selected = '';
                                                                if ($bid->tariff_id == $tariff->id){
                                                                    $selected = ' selected';
                                                                }
                                                            @endphp
                                                            <option value="{{ $tariff->id }}"{{ $selected }}>{{ $tariff->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Солист / Коллектив</label>
                                                    <select name="cnt_people" class="form-control">
                                                        <option value="solist" @if($bid->cnt_people == 'solist') selected @endif>Солист</option>
                                                        <option value="kollective" @if($bid->cnt_people == 'kollective') selected @endif>Коллектив</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="profile-1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Телефон</label>
                                                    <input name="phone" type="text" value="{{ $bid->phone }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>E-mail</label>
                                                    <input name="email" type="text" value="{{ $bid->email }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Страна</label>
                                                    <select name="country_id" class="form-control">
                                                        <option value="">==========</option>
                                                        @foreach($countries as $country)
                                                            @php
                                                                $selected = '';
                                                                if ($bid->country_id == $country->id){
                                                                    $selected = ' selected';
                                                                }
                                                            @endphp
                                                        <option value="{{ $country->id }}"{{ $selected }}>{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Город</label>
                                                    <input type="text" name="city" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        @foreach($bid->participants as $participant)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Имя участника</label>
                                                        <input type="text" name="participant_first_name[]" value="{{ $participant->first_name }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Фамилия участника</label>
                                                        <input type="text" name="participant_last_name[]" value="{{ $participant->last_name }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="tab-pane" id="messages-1" role="tabpanel">
                                        @foreach($bid->teachers as $teacher)
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Имя преподавателя</label>
                                                        <input type="text" name="teacher_first_name[]" value="{{ $teacher->first_name }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Фамилия преподавателя</label>
                                                        <input type="text" name="teacher_last_name[]" value="{{ $teacher->last_name }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Отчество преподавателя</label>
                                                        <input type="text" name="teacher_third_name[]" value="{{ $teacher->third_name }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Должность преподавателя</label>
                                                        <input type="text" name="teacher_job[]" value="{{ $teacher->job }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane" id="settings-1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input name="educational_institution" type="text" value="{{ $bid->educational_institution }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
{{--    todo: определиться с кнопками                --}}
                    <div>
{{--                        <button type="submit" name="btn_save_list" class="btn btn-success">Сохранить и перейти в список</button>--}}
                        <button type="submit" name="btn_save_edit" class="btn btn-primary">Сохранить</button>
{{--                        <button type="submit" name="btn_save_edit" class="btn btn-primary">Сохранить и продолжить редактирование</button>--}}
{{--                        <a href="#" class="btn btn-warning text-white">Перейти в список без сохранения</a>--}}
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
@section('footer')


@endsection

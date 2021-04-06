@extends('admin.layouts.app')
@section('title') Оцениваем заявку @endsection
@section('header')

@endsection
@section('content')
    @if($bid)
    @component('admin.layouts.components.breadcrumb')
        @slot('title') Оцениваем заявку @endslot
{{--        @if($bid->competition)--}}
{{--            @slot('li_2') {{ $bid->competition->name }} @endslot--}}
{{--            @slot('a_2') {{ route('admin.bids.concrete.competition', ['competition_id' => $bid->competition->id]) }} @endslot--}}
{{--        @endif--}}
        @slot('active') Оцениваем заявку @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">

{{--            <form action="{{ route('admin.bids.update', ['id' => $bid->id]) }}" method="post">--}}
            <form action="{{ route('admin.estimate.update', ['id' => $bid->id]) }}" method="post">
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

                                <p style="margin-top: 20px; margin-bottom: 0;">
                                    <a target="_blank" href="{{ $bid->link_to_resource }}">Оригинальная ссылка</a>
                                </p>
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
                                    <p class="form-control">{{ $bid->musical_number }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Комментарй</label>
                                    <p class="form-control">{{ $bid->comment }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Оценка</label>
                                    <input name="appraisal" class="form-control" type="text" value="{{ $bid->appraisal }}">
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
                                                    <p class="form-control">{{ $bid->koll_name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Тип</label>
                                                    <p class="form-control">
                                                        @if($bid->type == 'amateur') Любительский @endif
                                                        @if($bid->type == 'professional') Професионаьный @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Конкурс</label>
                                                    <p class="form-control">{{ $bid->competition->name }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Номинация</label>
                                                    <p class="form-control">{{ $bid->nomination->name }}</p>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Возрастная группа</label>
                                                    <p class="form-control">{{ $bid->ageGroup->name }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Тариф</label>
                                                    <p class="form-control">{{ $bid->tariff->name }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Солист / Коллектив</label>
                                                    <p class="form-control">
                                                        @if($bid->cnt_people == 'solist') Солист @endif
                                                        @if($bid->cnt_people == 'kollective') Коллектив @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="profile-1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Телефон</label>
                                                    <p class="form-control">{{ $bid->phone }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>E-mail</label>
                                                    <p class="form-control">{{ $bid->email }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Страна</label>
                                                    <p class="form-control">{{ $bid->country->name }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Город</label>
                                                    <p class="form-control">{{ $bid->city }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        @foreach($bid->participants as $participant)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Имя участника</label>
                                                        <p class="form-control">{{ $participant->first_name }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Фамилия участника</label>
                                                        <p class="form-control">{{ $participant->last_name }}</p>
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
                                                        <p class="form-control">{{ $teacher->first_name }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Фамилия преподавателя</label>
                                                        <p class="form-control">{{ $teacher->last_name }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Отчество преподавателя</label>
                                                        <p class="form-control">{{ $teacher->third_name }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Должность преподавателя</label>
                                                        <p class="form-control">{{ $teacher->job }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane" id="settings-1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <p class="form-control">{{ $bid->educational_institution }}</p>
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
                        <button type="submit" name="btn_save" class="btn btn-primary">Сохранить</button>
                        <button type="submit" name="btn_save_and_next" class="btn btn-success text-white">Сохранить и перейти к следующей заявке</button>
                        <a href="{{ route('admin.estimate.index') }}" class="btn btn-warning text-white">Перейти в список без сохранения</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
    @else
        <div class="card">
            <div class="card-body">
                <h3>Нет заявок для оценки</h3>
            </div>
        </div>
    @endif
@endsection
@section('footer')


@endsection

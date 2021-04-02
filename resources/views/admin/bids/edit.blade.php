@extends('admin.layouts.app')
@section('title') Редактируем заявку @endsection
@section('header')

@endsection
@section('content')
    @component('admin.layouts.components.breadcrumb')
        @slot('title') Редактируем заявку @endslot
        @slot('li_2') {{ $bid->competition->name }} @endslot
        @slot('a_2') {{ route('admin.bids.concrete.competition', ['competition_id' => $bid->competition->id]) }} @endslot
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
                                    <iframe src="https://www.youtube.com/embed/1y_kfWUCFDQ" class="embed-responsive-item"></iframe>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe width="560" height="315" src="//ok.ru/videoembed/2280922680025" frameborder="0" allow="autoplay" allowfullscreen></iframe>
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
                                        - {{ $bid->ageGroup->name }}
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
                                    <input name="appraisal" class="form-control" type="text" value="{{ $bid->appraisal }}">
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
                                            <span class="d-none d-sm-block">Участник</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#messages-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Наставник</span>
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
                                                    <input type="text" value="{{ $bid->koll_name }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Тип</label>
                                                    <select name="type" class="form-control">
                                                        <option value="amateur">Любительский</option>
                                                        <option value="professional">Професионаьный</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Конкурс</label>
                                                    <select name="type" class="form-control">
                                                        <option value="">========</option>
                                                        <option value="">=========</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Номинация</label>
                                                    <select name="type" class="form-control">
                                                        <option value="">========</option>
                                                        <option value="">===========</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Возрастная группа</label>
                                                    <select name="type" class="form-control">
                                                        <option value="">========</option>
                                                        <option value="">===========</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Тариф</label>
                                                    <select name="type" class="form-control">
                                                        <option value="">========</option>
                                                        <option value="">===========</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Солист / Коллектив</label>
                                                    <select name="type" class="form-control">
                                                        <option value="">========</option>
                                                        <option value="">===========</option>
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
                                                    <input type="text" value="{{ $bid->phone }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>E-mail</label>
                                                    <input type="text" value="{{ $bid->email }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Страна</label>
                                                    <select name="country" class="form-control">
                                                        <option value="">==========</option>
                                                        <option value="">=======</option>
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
                                                        <input type="text" name="user_first_name[]" value="{{ $participant->first_name }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Фамилия участника</label>
                                                        <input type="text" name="user_last_name[]" value="{{ $participant->last_name }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="tab-pane" id="messages-1" role="tabpanel">
                                        @foreach($bid->teachers as $teacher)
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Имя преподавателя</label>
                                                        <input type="text" name="teacher_first_name[]" value="{{ $teacher->first_name }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Фамилия преподавателя</label>
                                                        <input type="text" name="teacher_last_name[]" value="{{ $teacher->last_name }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Отчество преподавателя</label>
                                                        <input type="text" name="teacher_third_name[]" value="{{ $teacher->third_name }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="tab-pane" id="settings-1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" value="{{ $bid->educational_institution }}" class="form-control">
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

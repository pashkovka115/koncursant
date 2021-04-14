@extends('layouts.app')

@section('head_scripts')

@endsection

@section('content')
    <section class="result-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="title-h1">Результаты</h1>
                    <div class="contests-menu">
                        <ul>
                            <li><span>Бесплатные конкурсы</span></li>
                            <li><a href="{{ route('front.results.index_prof') }}">Конкурсы с участием<br /> профессионального жюри</a></li>
                        </ul>
                    </div>
                    <div class="years-menu">
                        <ul>
                            @foreach($years as $year)
                            <li><a href="{{ route('front.results.show_free', ['competition_slug' => $competition->slug, 'year_bid' => $year]) }}">{{ $year }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="aside">
                                <div class="quarter-menu">
                                    <?php
                                    $parameters = request()->route()->parameters();
                                    ?>
                                    <ul>
                                        <?php $parameters['quarter'] = 1; ?>
                                        <li><a href="{{ route('front.results.show_free', $parameters) }}">— I КВАРТАЛ</a></li>
                                            <?php $parameters['quarter'] = 2; ?>
                                        <li><a href="{{ route('front.results.show_free', $parameters) }}">— II КВАРТАЛ</a></li>
                                            <?php $parameters['quarter'] = 3; ?>
                                        <li><a href="{{ route('front.results.show_free', $parameters) }}">— III КВАРТАЛ</a></li>
                                            <?php $parameters['quarter'] = 4; ?>
                                        <li><a href="{{ route('front.results.show_free', $parameters) }}">— IV КВАРТАЛ</a></li>
                                    </ul>
                                </div>
                                <p class="info">Для просмотра выступлений «кликните» по фамилии конкурсанта или названию коллектива.</p>
                                <p class="info"><strong>Также вы можете подписаться и смотреть выступления конкурсантов в плейлистах на нашем канале в YouTube.</strong></p>
                                <p><a href="{{ option('youtube')->value }}" target="_blank" class="btn btn-border-red">Перейти на канал</a></p>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="title-result">
                                <div class="left">
                                    <div class="title">{{ $competition->name }}</div>
                                    <p>{{ $competition->short_description }}</p>
                                </div>
                                <div class="right">
                                    <div class="age-groups">
                                        <h3>Возрастные группы:</h3>
                                        <ul>
                                            @foreach($competition->ageGroups as $group)
                                            <li>{{ $group->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="result-banner-main"><img src="{{ asset('assets/front/img/rainbow-bg.png') }}" alt=""></div>

                        </div>
                    </div>
                    <table class="table display" style="width:100%">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Имя</th>
                            <th>Возрастная группа</th>
                            <th>Номер</th>
                            <th>Учебное заведение</th>
                            <th>Награда</th>
                            <th>Дата</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bids as $bid)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ $bid->link_to_resource }}" target="_blank"><?php
                                    if ($bid->participants->count() > 0){
                                        echo $bid->participants[0]->last_name;
                                    }
                                    ?></a></td>
                            <td>{{ $bid->ageGroup->name }}</td>
                            <td>{{ $bid->musical_number }}</td>
                            <td>{{ $bid->educational_institution }}</td>
                            <td>{{ $bid->appraisal->name }}</td>
                            <td>{{ date('d.m.Y', $bid->updated_at->timestamp) }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>№</th>
                            <th>Имя</th>
                            <th>Возрастная группа</th>
                            <th>Номер</th>
                            <th>Учебное заведение</th>
                            <th>Награда</th>
                            <th>Дата</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_scripts')

@endsection

@extends('layouts.app')

@section('head_scripts')

@endsection

@section('content')
    <section class="result-page result-list-page">
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
                            <li><a href="{{ route('front.results.index_free', ['year' => $year]) }}">{{ $year }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="wrapper">
                        @foreach($competitions as $name => $competition)
                        <div class="result-box">
                            <div class="image"><a href=""><img src="{{ asset('storage/' . $competition[0]['competition_img']) }}" alt=""></a></div>
                            <div class="title">
                                <a href="{{ route('front.results.show_free', [
                                                                            'competition_slug' => $competition[0]['competition_slug'],
                                                                            'year_bid' => $competition[0]['year_bid']
                                                                            ]) }}">{{ $name }}</a>
                            </div>
                            <div class="intro">{{ $competition[0]['short_description'] }}</div>
                            <div class="quarter-menu">
                                <?php
                                $quarters = [];
                                foreach($competition as $com){
                                    $quarters[$com['quarter_bid']] = '';
                               }
                                $quarters = array_keys($quarters);
                                sort($quarters);
                                echo '<ul>';
                                    foreach($quarters as $quarter){
                                        echo "<li><a href='". route('front.results.show_free', [
                                                                    'competition_slug' => $competition[0]['competition_slug'],
                                                                    'year_bid' => $competition[0]['year_bid'],
                                                                    'quarter' => $quarter
                                                                    ]) ."'>";
                                            if($quarter == 1){
                                                echo '— I КВАРТАЛ';
                                            }elseif($quarter == 2){
                                                echo '— II КВАРТАЛ';
                                            }elseif($quarter == 3){
                                                echo '— III КВАРТАЛ';
                                            }elseif($quarter == 4){
                                                echo '— IV КВАРТАЛ';
                                            }
                                        echo '</a></li>';
                                   }
                                echo '</ul>';
                                ?>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer_scripts')

@endsection

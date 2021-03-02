@extends('admin.layouts.app')
@section('title') Главная страница @endsection
@section('header')

@endsection
@section('content')
    @component('admin.layouts.components.breadcrumb')
        @slot('title') Главная @endslot
        @slot('li_2') Главная @endslot
        @slot('a_2') /admin @endslot
    @endcomponent

    <div class="row">

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body overflow-hidden">
                            <p class="text-truncate font-size-14 mb-2">
                                Новых заявок
                            </p>
                            <h4 class="mb-0">10</h4></div>
                        <div class="text-primary"><i class="ri-store-2-line font-size-24"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body overflow-hidden">
                            <p class="text-truncate font-size-14 mb-2">
                                Пользователей
                            </p>
                            <h4 class="mb-0">4</h4></div>
                        <div class="text-primary"><i class="ri-user-line font-size-24"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('footer')


@endsection

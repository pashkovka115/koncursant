@extends('admin.layouts.app')
@section('title') Оценить заявки @endsection
@section('header')
    <!-- DataTables -->
    <link href="{{ URL::asset('assets/datatables/datatables.bootstrap4/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        table.dataTable.nowrap th, table.dataTable.nowrap td{
            white-space: normal;
        }
    </style>
@endsection
@section('content')
@component('admin.layouts.components.breadcrumb')
    @slot('title') Оценить заявки @endslot
    @slot('active') Оценить заявки @endslot
@endcomponent

<div class="card">
    <div class="card-body">

        <ul class="nav nav-pills mb-3" role="tablist">
            <li class="nav-item waves-effect waves-light">
                <a class="nav-link active" data-toggle="tab" href="#amateur" role="tab">
                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                    <span class="d-none d-sm-block">Любительские</span>
                </a>
            </li>
            <li class="nav-item waves-effect waves-light">
                <a class="nav-link" data-toggle="tab" href="#professional" role="tab">
                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                    <span class="d-none d-sm-block">Профессиональные</span>
                </a>
            </li>
        </ul>

        <div class="tab-content p-3 text-muted">
            <div class="tab-pane active" id="amateur" role="tabpanel">

        <table id="datatable_amateur" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
            <tr>
                <th>Номер заявки</th>
                <th>Конкурс</th>
                <th>Номинация</th>
                <th>Возрастная группа</th>
                <th>Тариф</th>
                <th>Статус оплаты</th>
                <th>Видео</th>
                <th>Дата заявки</th>
                <th>Оценить до</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bids_amateur as $amateur)
                <tr>
                    <td>{{ $amateur->id }}</td>
                    @php
                   // dump($amateur)
                    @endphp
                    <td>{{ $amateur->competition->name ?? '' }}</td>
                    <td>{{ $amateur->nomination->name ?? '' }}</td>
                    <td>{{ $amateur->ageGroup->name ?? '' }}</td>
                    <td>{{ $amateur->tariff->name ?? '' }}</td>
                    <td>---</td>
                    <td>
                        @if($amateur->link_to_resource)
                            Да
                        @else
                        Нет
                        @endif
                    </td>
                    <td>
                        <?php
                        $date = DateTime::createFromFormat('Y-m-d H:i:s', $amateur->created_at);
                        echo $date->format('d.m.Y');
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($amateur->tariff){
                            $date->add(new DateInterval('P'.$amateur->tariff->duration.'D'));
                            echo $date->format('d.m.Y');
                        }
                        ?>
                    </td>
                    <td>
                        <a href="{{ route('admin.estimate.edit', ['id' => $amateur->id]) }}" class="mr-3 text-warning" title="Оценить"><i class="fas fa-star"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Номер заявки</th>
                <th>Конкурс</th>
                <th>Номинация</th>
                <th>Возрастная группа</th>
                <th>Тариф</th>
                <th>Статус оплаты</th>
                <th>Видео</th>
                <th>Дата заявки</th>
                <th>Оценить до</th>
                <th>Действия</th>
            </tr>
            </tfoot>
        </table>

            </div>

            <div class="tab-pane" id="professional" role="tabpanel">
                <table id="datatable_professional" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Номер заявки</th>
                        <th>Конкурс</th>
                        <th>Номинация</th>
                        <th>Возрастная группа</th>
{{--                        <th>Тариф</th>--}}
                        <th>Статус оплаты</th>
                        <th>Видео</th>
                        <th>Дата заявки</th>
                        <th>Оценить до</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bids_professional as $professional)
                        <tr>
                            <td>{{ $professional->id }}</td>
                            <td>{{ $professional->competition->name ?? '' }}</td>
                            <td>{{ $professional->nomination->name ?? '' }}</td>
                            <td>{{ $professional->ageGroup->name ?? '' }}</td>
{{--                            <td>{{ $professional->tariff->name ?? '' }}</td>--}}
                            <td>---</td>
                            <td>
                                @if($professional->link_to_resource)
                                    Да
                                @else
                                    Нет
                                @endif
                            </td>
                            <td>
                                <?php
                                $date = DateTime::createFromFormat('Y-m-d H:i:s', $professional->created_at);
                                echo $date->format('d.m.Y');
                                ?>
                            </td>
                            <td>
                                <?php
                                // todo: Оценить до - как определить
                                /*if ($professional->tariff){
                                    $date->add(new DateInterval('P'.$professional->tariff->duration.'D'));
                                    echo $date->format('d.m.Y');
                                }*/
                                ?>
                            </td>
                            <td>
                                <a href="{{ route('admin.estimate.edit', ['id' => $professional->id]) }}" class="mr-3 text-warning" title="Оценить"><i class="fas fa-star"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Номер заявки</th>
                        <th>Конкурс</th>
                        <th>Номинация</th>
                        <th>Возрастная группа</th>
{{--                        <th>Тариф</th>--}}
                        <th>Статус оплаты</th>
                        <th>Видео</th>
                        <th>Дата заявки</th>
                        <th>Оценить до</th>
                        <th>Действия</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection
@section('footer')
    <!-- Datatable init js -->
    <script src="{{ asset('assets/datatables/datatables.bootstrap4/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/datatables.bootstrap4/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function () {

            $('#datatable_amateur').DataTable({
                "pagingType": "full_numbers",

                language: {
                    "processing": "Подождите...",
                    "search": "Поиск:",
                    "lengthMenu": "Показать _MENU_ записей",
                    "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                    "infoEmpty": "Записи с 0 до 0 из 0 записей",
                    "infoFiltered": "(отфильтровано из _MAX_ записей)",
                    "infoPostFix": "",
                    "loadingRecords": "Загрузка записей...",
                    "zeroRecords": "Записи отсутствуют.",
                    "emptyTable": "В таблице отсутствуют данные",
                    "paginate": {
                        "first": "Первая",
                        "previous": "Предыдущая",
                        "next": "Следующая",
                        "last": "Последняя"
                    },
                    "aria": {
                        "sortAscending": ": активировать для сортировки столбца по возрастанию",
                        "sortDescending": ": активировать для сортировки столбца по убыванию"
                    }
                }
            });

            $('#datatable_professional').DataTable({
                "pagingType": "full_numbers",

                language: {
                    "processing": "Подождите...",
                    "search": "Поиск:",
                    "lengthMenu": "Показать _MENU_ записей",
                    "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                    "infoEmpty": "Записи с 0 до 0 из 0 записей",
                    "infoFiltered": "(отфильтровано из _MAX_ записей)",
                    "infoPostFix": "",
                    "loadingRecords": "Загрузка записей...",
                    "zeroRecords": "Записи отсутствуют.",
                    "emptyTable": "В таблице отсутствуют данные",
                    "paginate": {
                        "first": "Первая",
                        "previous": "Предыдущая",
                        "next": "Следующая",
                        "last": "Последняя"
                    },
                    "aria": {
                        "sortAscending": ": активировать для сортировки столбца по возрастанию",
                        "sortDescending": ": активировать для сортировки столбца по убыванию"
                    }
                }
            });
        });
    </script>

@endsection

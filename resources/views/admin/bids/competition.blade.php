@extends('admin.layouts.app')
@section('title') Заявки на любительские конкурсы @endsection
@section('header')

@endsection
@section('content')
    @component('admin.layouts.components.breadcrumb')
        @slot('title') {{ $str_type }} @endslot
        @slot('active') Заявки на {{ mb_strtolower($str_type) }} конкурсы @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">

            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                        @foreach($bids as $bid)
                            <tr>
                                <td>---</td>
                                <td>{{ $bid->competition->name }}</td>
                                <td>{{ $bid->nomination->name }}</td>
                                <td>{{ $bid->ageGroup->name }}</td>
                                <td>{{ $bid->tariff->name }}</td>
                                <td>---</td>
                                <td>
                                    @if($bid->link_to_resource)
                                        Да
                                    @else
                                        Нет
                                    @endif
                                </td>
                                <td>
                                    <?php
                                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $bid->created_at);
                                    echo $date->format('d.m.Y');
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $date->add(new DateInterval('P'.$bid->tariff->duration.'D'));
                                    echo $date->format('d.m.Y');
                                    ?>
                                </td>
                                <td>
                                    <a href="" class="mr-3 text-warning"><i class="ri-pencil-fill font-size-18"></i></a>

                                    <a href="#" class="text-danger" onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $bid->id }}').submit(); return false;">
                                        <i class="mdi mdi-trash-can font-size-18"></i></a>
                                    <form id="form_{{ $bid->id }}" action="" method="POST" style="display: none;">
                                        @csrf
                                    </form>
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
    </div>

@endsection
@section('footer')
    <!-- Datatable init js -->
    <script src="{{ asset('assets/datatables/datatables.bootstrap4/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/datatables.bootstrap4/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function () {

            $('#datatable').DataTable({
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

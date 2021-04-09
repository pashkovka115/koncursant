@extends('admin.layouts.app')
@section('title') Номинации @endsection
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
    @slot('title') Список номинаций @endslot
    @slot('active') Список номинаций @endslot
@endcomponent

<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal">
            <i class="ri-add-fill"></i> Добавить</button>
    </div>
    <div class="card-body">
        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
            <tr>
                <th>№</th>
                <th>Имя</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($nominations as $nomination)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $nomination->name }}</td>
                    <td>
                        <a href="{{ route('admin.competitions.nominations.edit', ['id' => $nomination->id]) }}" class="mr-3 text-warning">
                            <i class="ri-pencil-fill font-size-18"></i>
                        </a>

                        <a href="{{ route('admin.competitions.nominations.destroy', ['id' => $nomination->id]) }}" class="text-danger"
                           onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $nomination->id }}').submit(); return false;">
                            <i class="mdi mdi-trash-can font-size-18"></i></a>
                        <form id="form_{{ $nomination->id }}" action="{{ route('admin.competitions.nominations.destroy', ['id' => $nomination->id]) }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>№</th>
                <th>Имя</th>
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

    <div id="myModal" class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Новая номинация</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="save_form" action="{{ route('admin.competitions.nominations.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Имя</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Отмена</button>
                    <button id="btnSave" type="button" class="btn btn-primary waves-effect waves-light">Добавить</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        $('#btnSave').click(function (){
            $('#save_form').submit();
        });
    </script>
@endsection

@extends('admin.layouts.app')
@section('title') Список возрастных групп @endsection
@section('header')
    <!-- DataTables -->
    <link href="{{ URL::asset('assets/datatables/datatables.bootstrap4/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        table.dataTable.nowrap th, table.dataTable.nowrap td{
            white-space: normal;
        }
    </style>
    {{-- Select2 --}}
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        {{-- Select2 --}}
        span.select2-selection.select2-selection--multiple{
            min-width: 150px;
        }
    </style>
@endsection
@section('content')
@component('admin.layouts.components.breadcrumb')
    @slot('title') Список возрастных групп @endslot
    @slot('active') Список возрастных групп @endslot
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
                <th>Цена</th>
                <th>Возраст</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->price }}</td>
                    <td>{{ $group->age }}</td>
                    <td>
                        <a href="{{ route('admin.competitions.age_group.edit', ['id' => $group->id]) }}" class="mr-3 text-warning">
                            <i class="ri-pencil-fill font-size-18"></i>
                        </a>

                        <a href="{{ route('admin.competitions.age_group.destroy', ['id' => $group->id]) }}" class="text-danger"
                           onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $group->id }}').submit(); return false;">
                            <i class="mdi mdi-trash-can font-size-18"></i></a>
                        <form id="form_{{ $group->id }}" action="{{ route('admin.competitions.age_group.destroy', ['id' => $group->id]) }}" method="POST" style="display: none;">
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
                <th>Цена</th>
                <th>Возраст</th>
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
                    <h5 class="modal-title mt-0" id="myModalLabel">Добавить новую возрастную группу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="save_form" action="{{ route('admin.competitions.age_group.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Наименование</label>
                            <input type="text" name="name" value="" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Возраст</label>
                            <input type="text" name="age" value="" class="form-control">
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

    {{-- Select2 --}}
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js')}}"></script>
    <script>
        // Select2
        $(".select2").select2();
    </script>
@endsection

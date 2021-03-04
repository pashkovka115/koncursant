@extends('admin.layouts.app')
@section('title') Жюри @endsection
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
    @slot('title') Список жюри @endslot
    @slot('li_2') Список жюри @endslot
    @slot('a_2')  @endslot
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
                <th>Краткое описание</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($jury as $person)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $person->name }}</td>
                    <td>{{ mb_strimwidth(strip_tags($person->description), 0, 100, '...') }}</td>
                    <td>
                        <a href="{{ route('front.jury.show', ['slug' => $person->slug]) }}" target="_blank" class="mr-3 text-primary">
                            <i class="ri-eye-line font-size-18"></i>
                        </a>
                        <a href="{{ route('admin.jury.edit', ['id' => $person->id]) }}" class="mr-3 text-warning">
                            <i class="ri-pencil-fill font-size-18"></i>
                        </a>

                        <a href="{{ route('admin.jury.destroy', ['id' => $person->id]) }}" class="text-danger"
                           onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $person->id }}').submit(); return false;">
                            <i class="ri-delete-bin-fill font-size-18"></i></a>
                        <form id="form_{{ $person->id }}" action="{{ route('admin.jury.destroy', ['id' => $person->id]) }}" method="POST" style="display: none;">
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
                <th>Краткое описание</th>
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
                    <h5 class="modal-title mt-0" id="myModalLabel">Новый член жюри</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" id="save_form" action="{{ route('admin.jury.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" name="active" id="customCheck1" class="custom-control-input">
                                    <label for="customCheck1" class="custom-control-label">Показывать на сайте</label>
                                </div>

                                <div class="form-group">
                                    <label>Имя</label>
                                    <input type="text" name="name" value="" class="form-control" >
                                </div>

                                <div class="custom-file col-sm-12">
                                    <input id="customFile" name="img" type="file" class="custom-file-input">
                                    <label for="customFile" class="custom-file-label">Выбрать изображение</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
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

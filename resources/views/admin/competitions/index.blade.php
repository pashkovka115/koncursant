@extends('admin.layouts.app')
@section('title') Конкурсы @endsection
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
        ul.select2-selection__rendered{
            min-width: 150px;
        }
    </style>
@endsection
@section('content')
@component('admin.layouts.components.breadcrumb')
    @slot('title') Список конкурсов @endslot
    @slot('active') Список конкурсов @endslot
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
            @foreach($competitions as $competition)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $competition->name }}</td>
                    <td>{{ mb_strimwidth(strip_tags($competition->description), 0, 100, '...') }}</td>
                    <td>
                        <a href="#" class="mr-3 text-primary"><i class="ri-eye-line font-size-18"></i></a>
                        <a href="{{ route('admin.competitions.all.edit', ['id' => $competition->id]) }}" class="mr-3 text-warning">
                            <i class="ri-pencil-fill font-size-18"></i>
                        </a>

                        <a href="{{ route('admin.competitions.all.destroy', ['id' => $competition->id]) }}" class="text-danger"
                           onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $competition->id }}').submit(); return false;">
                            <i class="mdi mdi-trash-can font-size-18"></i></a>
                        <form id="form_{{ $competition->id }}" action="{{ route('admin.competitions.all.destroy', ['id' => $competition->id]) }}" method="POST" style="display: none;">
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

    {{--  Text Editor  --}}
    <!-- Summernote js -->
    <script src="{{ URL::asset('/assets/libs/summernote/summernote.min.js')}}"></script>
    <!--tinymce js-->
    <script src="{{ URL::asset('/assets/libs/tinymce/tinymce.min.js')}}"></script>
    <!-- init js -->
    <script src="{{ URL::asset('/assets/js/pages/form-editor.init.js')}}"></script>
    {{-- END Text Editor  --}}

    <div id="myModal" class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Новый конкурс</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="save_form" action="{{ route('admin.competitions.all.store') }}" method="post">
                        @csrf
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" name="active" id="customCheck1" class="custom-control-input">
                            <label for="customCheck1" class="custom-control-label">Показывать на сайте</label>
                        </div>
                        <div class="form-group">
                            <label>Имя</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Описание</label>
                            <div>
                                <textarea id="elm1" name="description" rows="5" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <label>Тип</label>
                            <select name="competition_type_id" class="form-control" data-placeholder="Выбрать ...">
                                @foreach($types as $t)
                                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                                @endforeach
                            </select>
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

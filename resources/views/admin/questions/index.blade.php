@extends('admin.layouts.app')
@section('title') Вопрос - ответ @endsection
@section('header')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('admin.layouts.components.breadcrumb')
    @slot('title') Список вопросов @endslot
    @slot('li_2') Список вопросов @endslot
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
                <th>Вопрос</th>
                <th>Ответ</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($questions as $question)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $question->question }}</td>
                    <td>{{ mb_strimwidth(strip_tags($question->answer), 0, 100, '...') }}</td>
                    <td>
                        <a href="#" class="mr-3 text-primary"><i class="ri-eye-line font-size-18"></i></a>
                        <a href="{{ route('admin.questions.edit', ['id' => $question->id]) }}" class="mr-3 text-warning"><i class="ri-pencil-fill font-size-18"></i></a>

                        <a href="{{ route('admin.questions.destroy', ['id' => $question->id]) }}" class="text-danger"
                           onclick="if (confirm('Удалить?')) document.getElementById('form_{{ $question->id }}').submit(); return false;">
                            <i class="mdi mdi-trash-can font-size-18"></i></a>
                        <form id="form_{{ $question->id }}" action="{{ route('admin.questions.destroy', ['id' => $question->id]) }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>№</th>
                <th>Вопрос</th>
                <th>Ответ</th>
                <th>Действия</th>
            </tr>
            </tfoot>
        </table>

    </div>
</div>

@endsection
@section('footer')
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js')}}"></script>

    <div id="myModal" class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Новая пара. Вопрос - ответ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="save_form" action="{{ route('admin.questions.store') }}" method="post">
                        @csrf
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" name="active" id="customCheck1" class="custom-control-input">
                            <label for="customCheck1" class="custom-control-label">Показывать на сайте</label>
                        </div>

                        <div class="form-group">
                            <label>Вопрос</label>
                            <input type="text" name="question" value="" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Ответ</label>
                            <div>
                                <textarea name="answer" rows="5" class="form-control"></textarea>
                            </div>
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

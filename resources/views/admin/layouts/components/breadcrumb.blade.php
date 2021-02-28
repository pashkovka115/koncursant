 <!-- start page title -->
 <div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">{{ $title }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/admin">Админ-панель</a></li>
                    @if(isset($li_2))
                    <li class="breadcrumb-item"><a href="{{ $a_2 }}">{{ $li_2 }}</a></li>
                    @endif
                    @if(isset($li_3))
                    <li class="breadcrumb-item"><a href="{{ $a_3 }}">{{ $li_3 }}</a></li>
                    @endif
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

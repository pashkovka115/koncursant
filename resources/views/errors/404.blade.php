<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error 404</title>
    <link href="{{ URL::asset('/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
{{--    <link href="{{ URL::asset('/assets/css/icons.min.css')}}" id="icons-style" rel="stylesheet" type="text/css" />--}}
    <!-- App Css-->
    <link href="{{ URL::asset('/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="my-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center my-5">
                    <h1 class="font-weight-bold text-error">4 <span class="error-text">0<img src="{{ URL::asset('/assets/images/error-img.png')}}" alt="" class="error-img"></span> 4</h1>
                    <h3 class="text-uppercase">Извините, страница не найдена.</h3>
                    <div class="mt-5 text-center">
                        <a class="btn btn-primary waves-effect waves-light" href="{{url('/')}}">Вернуться на главную</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<style>
    .block-error{
        background-color: red;
    }
    ul#errors{
        display: flex;
        flex-direction: column;
        align-items: center;
        color: white;
        font-weight: bold;
    }
</style>
<div class="block-error">
    <div class="row-error">
        @if($errors->any())
            <ul id="errors">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <li>{!! $error !!}</li>
                    </div>
                @endforeach
            </ul>
            <script>
                setTimeout(function() {
                    $('#errors').fadeOut('fast');
                }, 10000);
            </script>
        @endif
        {{--@if (session()->has('message'))
            <div class="alert alert-info" role="alert">
                {!! session()->get('message') !!}
            </div>
        @endif--}}
    </div>
</div>

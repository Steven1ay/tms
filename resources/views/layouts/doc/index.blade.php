<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    <link rel="stylesheet" href="{{asset('libs/pure/pure-min.css')}}">
    <link rel="stylesheet" href="{{asset('libs/editormd/css/editormd.min.css')}}">
    <link rel="stylesheet" href="{{asset('libs/wangEditor-3.0.3/wangEditor.min.css')}}">
    {{--<link rel="stylesheet" href="{{asset('libs/simditor-2.3.6/styles/simditor.css')}}">--}}

    @yield('style')
</head>
<body >
<header class="header pure-g">
    <div class="logo pure-u-1-8">云笔记</div>
    <div class="user-info pure-u-7-8">
        <span>{{session('user')['name']}}</span>
        <span> | </span>
        <span class="logout" onclick="main.loginOut()">退出</span>
    </div>
</header>

@yield('content')
<script src="{{asset('/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/libs/template/template-native.js')}}"></script>
<script src="{{asset('/libs/editormd/editormd.min.js')}}"></script>
<script src="{{asset('/libs/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('/libs/wangEditor-3.0.3/wangEditor.min.js')}}"></script>
{{--<script src="{{asset('/libs/simditor-2.3.6/scripts/simditor.support.js')}}"></script>--}}
{{--<script src="{{asset('/libs/simditor-2.3.6/scripts/simditor.min.js')}}"></script>--}}
@yield('script')

</body>
</html>

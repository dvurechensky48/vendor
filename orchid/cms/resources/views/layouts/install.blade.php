<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title','Orchid')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="apple-touch-icon" sizes="180x180" href="/orchid/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/orchid/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/orchid/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/orchid/manifest.json">
    <link rel="mask-icon" href="/orchid/safari-pinned-tab.svg" color="#ac5ca0">
    <meta name="theme-color" content="#f8f9fa">


    <link rel="stylesheet" href="{{asset('/orchid/css/orchid.css')}}" type="text/css"/>
    <script async="async" src="{{asset('/orchid/js/orchid.js')}}" type="text/javascript"></script>
</head>

<!-- install bg-dark bg-gd-dk  -->
<body class="">


<div class="wrapper box-shadow bg-white-only">
    <div class="row">
        <div class="col-xs-6">
            <h1 class="m-n font-thin h3 text-black">@yield('title')</h1>
            <small class="text-muted">@yield('descriptions')</small>
        </div>

        <div class="col-xs-6 text-right">
            <a href="/"><img src="/orchid/img/logo.svg" width="50px" height="50px" class="wrapper-xs"></a>
        </div>

    </div>

</div>


<div class="container m-t-md m-b-md">

    <div class="col-md-8 col-md-offset-2 bg-white b box-shadow no-padder">
        <div class="hbox hbox-auto-xs hbox-auto-sm">
            <div class="col w-md b-r">
                <div class="wrapper hidden-sm hidden-xs">
                    <ul class="nav nav-pills nav-stacked nav-sm">
                        <li class="{{active('install::welcome')}}">
                            <a href="{{route('install::welcome')}}">
                                {{trans('cms::install.welcome.title')}}
                            </a>
                        </li>
                        <li class="{{active('install::environment')}}">
                            <a href="{{route('install::environment')}}">
                                {{trans('cms::install.environment.title')}}
                            </a>
                        </li>
                        <li class="{{active('install::requirements')}}">
                            <a href="{{route('install::requirements')}}">
                                {{trans('cms::install.requirements.title')}}
                            </a>
                        </li>
                        <li class="{{active('install::permissions')}}">
                            <a href="{{route('install::permissions')}}">
                                {{trans('cms::install.permissions.title')}}
                            </a>
                        </li>
                        <li class="{{active('install::administrator')}}">
                            <a href="{{route('install::administrator')}}">
                                {{trans('cms::install.administrator.title')}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col">

                <div class="wrapper">
                    @yield('container')

                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>

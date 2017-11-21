@extends('cms::layouts.install')

@section('title', trans('cms::install.welcome.title'))
@section('descriptions', trans('cms::install.welcome.message'))

@section('container')


    @if(!is_null($exception))
        <div class="alert alert-danger" role="alert">{{$exception}}</div>
    @endif

    <h4 class="m-b font-thin b-b b-light-cs wrapper-xs">
        {{ trans('cms::install.welcome.message') }}
    </h4>

    <p class="text-justify">
        {{ trans('cms::install.welcome.body') }}

    </p>

    <p class="text-justify">
        {{ trans('cms::install.welcome.footer') }}
    </p>



    <div class="row m-t-xl m-b-md wrapper-xs v-center block-xs">
        <div class="col-sm-6 col-xs-12 b-r b-light">
            <p class="text-xs">
                The MIT License (MIT) Copyright <br>© Chernyaev Alexandr
            </p>
        </div>
        <div class="col-sm-6 col-xs-12 text-right"><a href="{{ route('install::environment') }}"
                                                      class="btn btn-link text-ellipsis"> <span
                        class="text-md text-ellipsis">{{ trans('cms::install.next') }}</span></a>
        </div>
    </div>




@stop

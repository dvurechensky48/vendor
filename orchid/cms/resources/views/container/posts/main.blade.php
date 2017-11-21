@extends('dashboard::layouts.dashboard')
@section('title',$type->name)
@section('description',$type->description)
@section('navbar')
    <div class="col-sm-6 col-xs-12 text-right">
        <div class="btn-group" role="group">
            <a href="{{ route('dashboard.posts.type.create',$type->slug)}}" class="btn btn-link"><i
                        class="icon-plus fa fa-2x"></i></a>
        </div>
    </div>
@stop
@section('content')
    @if($data->count() > 0)
        <section class="wrapper">
            <div class="bg-white-only  bg-auto no-border-xs">


                {!! $type->showFilterDashboard() !!}

                <div class="panel-body row">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="w-xs">{{trans('cms::common.Manage')}}</th>
                                @foreach($fields as $key => $name)
                                    @if(is_array($name))
                                        <th>{{$name['name']}}</th>
                                    @else
                                        <th>{{$name}}</th>
                                    @endif
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $datum)
                                <tr>
                                    <td class="text-center">
                                        <a href="{{route('dashboard.posts.type.edit',[
                                    'type' => $type->slug,
                                    'slug' => $datum->id])
                                    }}"><i class="fa fa-bars"></i></a>
                                    </td>
                                    @foreach($fields as $key => $name)
                                        <td>
                                            @if(is_array($name))
                                                {!! $name['action']($datum) !!}
                                            @else
                                                {{ $datum->getContent($key) }}
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-sm-8">
                                <small class="text-muted inline m-t-sm m-b-sm">{{trans('cms::common.show')}} {{$data->total()}}
                                    -{{$data->perPage()}} {{trans('cms::common.of')}} {!! $data->count() !!} {{trans('cms::common.elements')}}</small>
                            </div>
                            <div class="col-sm-4 text-right text-center-xs">
                                {!! $data->appends('search')->render() !!}
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </section>
    @else
        <section class="wrapper">
            <div class="bg-white-only bg-auto no-border-xs">


                {!! $type->showFilterDashboard() !!}


                <div class="jumbotron text-center bg-white not-found">
                    <div>
                        <h3 class="font-thin">{{trans('cms::post/general.not_found')}}</h3>
                        <a href="{{ route('dashboard.posts.type.create',$type->slug)}}"
                           class="btn btn-link">{{trans('cms::post/general.create')}}</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
@stop

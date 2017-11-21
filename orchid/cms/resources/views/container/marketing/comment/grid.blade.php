@extends('dashboard::layouts.dashboard')


@section('title',$name)
@section('description',$description)



@section('content')


    <!-- main content  -->
    <section class="wrapper">
        <div class="bg-white-only bg-auto no-border-xs">

            @if($comments->count() > 0)
                <div class="panel">

                    <div class="panel-body row">


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="w-xs text-center">{{trans('cms::common.Manage')}}</th>
                                    <th class="w-xs text-center">{{trans('cms::marketing/comment.status')}}</th>
                                    <th>{{trans('cms::marketing/comment.content')}}</th>
                                    <th>Материал</th>
                                    <th>{{trans('cms::marketing/comment.user')}}</th>
                                    <th>{{trans('cms::common.Last edit')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($comments as $comment)

                                    <tr>
                                        <td class="text-center">
                                            <a href="{{route('dashboard.marketing.comment.edit',$comment->id)}}"><i
                                                        class="fa fa-bars"></i></a>
                                        </td>

                                        <td class="text-center">
                                            @if($comment->isApproved())
                                                <i class="icon-check"></i>
                                            @else
                                                <i class="icon-close"></i>
                                            @endif
                                        </td>


                                        <td>{{ \Illuminate\Support\Str::limit($comment->content) }}</td>


                                        <td>
                                            @if(!is_null($comment->post))
                                                <a href="{{ route('dashboard.posts.type.edit',[
                                            $comment->post->type,
                                            $comment->post->id
                                        ]) }}">{{trans('cms::marketing/comment.go')}}</a>
                                            @else
                                                {{trans('cms::marketing/comment.delete')}}
                                            @endif
                                        </td>

                                        <td><a href="{{ route('dashboard.systems.users.edit',$comment->user_id) }}">Перейти</a>
                                        </td>
                                        <td>{{ $comment->updated_at}}</td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-sm-8">
                                <small class="text-muted inline m-t-sm m-b-sm">{{trans('cms::common.show')}} {{$comments->total()}}
                                    -{{$comments->perPage()}} {{trans('cms::common.of')}} {!! $comments->count() !!} {{trans('cms::common.elements')}}</small>
                            </div>
                            <div class="col-sm-4 text-right text-center-xs">
                                {!! $comments->render() !!}
                            </div>
                        </div>
                    </footer>
                </div>

            @else

                <div class="jumbotron text-center bg-white not-found">
                    <div>
                        <h3 class="font-thin">{{trans('cms::marketing/comment.not_found')}}</h3>
                    </div>
                </div>

            @endif

        </div>
    </section>
    <!-- / main content  -->


@stop





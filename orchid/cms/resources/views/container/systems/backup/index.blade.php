@extends('dashboard::layouts.dashboard')


@section('title', trans('cms::systems/backup.title') )
@section('description', trans('cms::systems/backup.description'))



@section('content')


    <!-- main content  -->
    <section class="wrapper">
        <div class="bg-white-only bg-auto no-border-xs">

            @if(count($backups) > 0)
                <div class="panel">

                    <div class="panel-body row">


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="w-xs">{{trans('cms::common.Manage')}}</th>
                                    <th>{{trans('cms::systems/backup.location')}}</th>
                                    <th>{{trans('cms::common.Last edit')}}</th>
                                    <th>{{trans('cms::systems/backup.file_size')}}</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($backups as $backup)
                                    <tr>
                                        <td class="text-center">
                                            @if ($backup['download'])
                                                <a class="#"
                                                   href="{{route('dashboard.systems.backup.download',[
                                                   'disk' =>$backup['disk'],
                                                   'path'=> urlencode($backup['file_path']),
                                                   'file_name'=>  urlencode($backup['file_name']),

                                                   ])}}"

                                                ><i
                                                            class="fa fa-cloud-download"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{ $backup['disk'] }}</td>
                                        <td>{{ \Carbon\Carbon::createFromTimeStamp($backup['last_modified'])->formatLocalized('%d %B %Y, %H:%M') }}</td>
                                        <td>{{ round((int)$backup['file_size']/1048576, 2).' MB' }}</td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>


                </div>

            @else

                <div class="jumbotron text-center bg-white not-found">
                    <div>
                        <h3 class="font-thin">
                            {{trans('cms::systems/backup.no_disks_configured')}}
                        </h3>
                    </div>
                </div>

            @endif

        </div>
    </section>
    <!-- / main content  -->


@stop





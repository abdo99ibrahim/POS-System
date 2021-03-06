@extends('layouts.dashboard.app')

@section('content')
<div class="content-wrapper">

    <section class="content-header">

        <h1>@lang('site.users')
        </h1>

        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a>
            </li>
            <li><a href="{{ route('dashboard.users.index') }}">@lang('site.users')</a></li>
            <li class="ative">@lang('site.add')</li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">
                    @lang('site.add')
                </div>
            </div>
            <div class="box-body">
                @include('partials._errors')
                <form action="{{ route('dashboard.users.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('post') }}
                    <div class="form-group">
                        <label>@lang('site.first_name')</label>
                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
                    </div>
                    <div class="form-group">
                        <label>@lang('site.last_name')</label>
                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                    </div>
                    <div class="form-group">
                        <label>@lang('site.email')</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label>@lang('site.image')</label>
                        <input type="file" name="image" id="imgInp" class="form-control">
                    </div>
                    <div class="form-group">
                        <img src="{{asset('uploads/user_images/default.png')}}" style="width: 100px" class="img-thumbnail img_preview" id="blah" alt="">
                    </div>
                    <div class="form-group">
                        <label>@lang('site.password')</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>@lang('site.password_confirmation')</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">@lang('site.permissions')</label>
                        <!-- Custom Tabs -->
                        <div class="card">
                            <div class="card-header d-flex p-0">
                                @php
                                   $models=['users','categories','products','clients','orders'];
                                   $maps = ['create','read','update','delete'];
                                @endphp
                                <ul class="nav nav-pills ml-auto p-2" style="margin-bottom: 12px">
                                    @foreach ($models as $index=>$model)
                                    <li class="nav-item {{$index==0 ? 'active': ''}}"><a class="nav-link " href="#{{$model}}"
                                            data-toggle="tab">@lang('site.'.$model)</a></li>
                                    @endforeach
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    @foreach ($models as $index=>$model)
                                    <div class="tab-pane {{$index==0 ? 'active': ''}}" id="{{$model}}">
                                        @foreach ($maps as $map)
                                        <input type="checkbox" name="permissions[]" value="{{$map.'_'.$model}}"
                                            class="form-check-input" id="{{$map}}">
                                        <label class="form-check-label" style="margin-left:5px"for="{{$map}}">@lang('site.' .$map)</label>
                                        @endforeach
                                    </div>
                                    @endforeach
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- ./card -->
                    </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END CUSTOM TABS -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
        </div>
        </form>
</div>
</div>

</section><!-- end of content -->

</div><!-- end of content wrapper -->
@endsection

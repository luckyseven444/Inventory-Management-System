@extends('layouts.app')
@section('title', 'Add Supplier')
@section('content')
    <div id="content" class="app-content box-shadow-z0" role="main">
        <div class="app-header white box-shadow navbar-md">
            <div class="navbar">
                <!-- Open side - Naviation on mobile -->
                <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up">
                    <i class="material-icons"></i>
                </a>
                <!-- / -->

                <!-- Page title - Bind to $state's title -->
                <div class="navbar-item pull-left h5" ng-bind="$state.current.data.title" id="pageTitle"></div>

                <!-- navbar right -->
                <ul class="nav navbar-nav pull-right">
                    <li class="nav-item dropdown pos-stc-xs">
                        <!-- dropdown -->
                        <div class="dropdown-menu pull-right w-xl animated fadeInUp no-bg no-border no-shadow">
                            <div class="scrollable" style="max-height: 220px">
                                <ul class="list-group list-group-gap m-a-0">
                                    <li class="list-group-item black lt box-shadow-z0 b">
          <span class="pull-left m-r">
            <img src="../assets/images/a0.jpg" alt="..." class="w-40 img-circle">
          </span>
                                        <span class="clear block">
            Use awesome <a href="" class="text-primary">animate.css</a><br>
            <small class="text-muted">10 minutes ago</small>
          </span>
                                    </li>
                                    <li class="list-group-item black lt box-shadow-z0 b">
          <span class="pull-left m-r">
            <img src="../assets/images/a1.jpg" alt="..." class="w-40 img-circle">
          </span>
                                        <span class="clear block">
            <a href="" class="text-primary">Joe</a> Added you as friend<br>
            <small class="text-muted">2 hours ago</small>
          </span>
                                    </li>
                                    <li class="list-group-item dark-white text-color box-shadow-z0 b">
          <span class="pull-left m-r">
            <img src="../assets/images/a2.jpg" alt="..." class="w-40 img-circle">
          </span>
                                        <span class="clear block">
            <a href="" class="text-primary">Danie</a> sent you a message<br>
            <small class="text-muted">1 day ago</small>
          </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- / dropdown -->
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link clear" href="" data-toggle="dropdown" aria-expanded="false">
          <span class="avatar w-32">
            <img src="../assets/images/a0.jpg" alt="...">
            <i class="on b-white bottom"></i>
          </span>
                        </a>
                        <div class="dropdown-menu pull-right dropdown-menu-scale">
                            <a class="dropdown-item" ui-sref="app.inbox.list">
                                <span>Inbox</span>
                                <span class="label warn m-l-xs">3</span>
                            </a>
                            <a class="dropdown-item" ui-sref="app.page.profile">
                                <span>Profile</span>
                            </a>
                            <a class="dropdown-item" ui-sref="app.page.setting">
                                <span>Settings</span>
                                <span class="label primary m-l-xs">3/9</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" ui-sref="app.docs">
                                Need help?
                            </a>
                            <a class="dropdown-item" href="{{ url('/logout') }}"> logout </a>
                        </div>
                    </li>
                    <li class="nav-item hidden-md-up">
                        <a class="nav-link" data-toggle="collapse" data-target="#collapse" aria-expanded="true">
                            <i class="material-icons"></i>
                        </a>
                    </li>
                </ul>
                <!-- / navbar right -->

            </div>
        </div>
        <div class="padding"></div>
        <div class="padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Add supplier Info.</div>
                            <div class="panel-body">

                                {!! Form::model($supplier,['url' => $supplier ? 'supplier/'.$supplier->id.'/update' : 'supplier/supplier-store','method'=>'post','file'=>true,'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
                                <div class="form-group text-right">

                                    {!! Form::label('name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
                                    <div class="col-lg-10">
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                                        <div class="error">{{ $errors->first('name') }}</div>
                                    </div>
                                </div>
                                <div class="form-group text-right">

                                    {!! Form::label('email', 'email:', ['class' => 'col-lg-2 control-label']) !!}
                                    <div class="col-lg-10">
                                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'email']) !!}
                                        <div class="error">{{ $errors->first('email') }}</div>
                                    </div>
                                </div>
                                <div class="form-group text-right">

                                    {!! Form::label('code', 'Code:', ['class' => 'col-lg-2 control-label']) !!}
                                    <div class="col-lg-10">
                                        {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Code']) !!}
                                        <div class="error">{{ $errors->first('code') }}</div>
                                    </div>
                                </div>
                                <div class="form-group text-right">

                                    {!! Form::label('address', 'Address:', ['class' => 'col-lg-2 control-label']) !!}
                                    <div class="col-lg-10">
                                        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
                                        <div class="error">{{ $errors->first('address') }}</div>
                                    </div>
                                </div>

                                <div class="col-lg-10 col-lg-offset-2">
                                    {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div> 
                    </div>

                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection


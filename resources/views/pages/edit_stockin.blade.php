@extends('layouts.app')
@section('title', 'Add Produts to Stock')
@section('content')
    <div id="content" class="app-content box-shadow-z0" role="main">
        <div class="app-header white box-shadow navbar-md">
            <div class="navbar">
                <!-- Open side - Naviation on mobile -->
                <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up">
                    <i class="material-icons">
                    </i>
                </a>
                <!-- / -->
                <!-- Page title - Bind to $state's title -->
                <div class="navbar-item pull-left h5" ng-bind="$state.current.data.title" id="pageTitle">
                </div>
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
                    Use awesome
                    <a href="" class="text-primary">animate.css
                    </a>
                    <br>
                    <small class="text-muted">10 minutes ago
                    </small>
                  </span>
                                    </li>
                                    <li class="list-group-item black lt box-shadow-z0 b">
                  <span class="pull-left m-r">
                    <img src="../assets/images/a1.jpg" alt="..." class="w-40 img-circle">
                  </span>
                                        <span class="clear block">
                    <a href="" class="text-primary">Joe
                    </a> Added you as friend
                    <br>
                    <small class="text-muted">2 hours ago
                    </small>
                  </span>
                                    </li>
                                    <li class="list-group-item dark-white text-color box-shadow-z0 b">
                  <span class="pull-left m-r">
                    <img src="../assets/images/a2.jpg" alt="..." class="w-40 img-circle">
                  </span>
                                        <span class="clear block">
                    <a href="" class="text-primary">Danie
                    </a> sent you a message
                    <br>
                    <small class="text-muted">1 day ago
                    </small>
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
              <i class="on b-white bottom">
              </i>
            </span>
                        </a>
                        <div class="dropdown-menu pull-right dropdown-menu-scale">
                            <a class="dropdown-item" ui-sref="app.inbox.list">
              <span>Inbox
              </span>
                                <span class="label warn m-l-xs">3
              </span>
                            </a>
                            <a class="dropdown-item" ui-sref="app.page.profile">
              <span>Profile
              </span>
                            </a>
                            <a class="dropdown-item" ui-sref="app.page.setting">
              <span>Settings
              </span>
                                <span class="label primary m-l-xs">3/9
              </span>
                            </a>
                            <div class="dropdown-divider">
                            </div>
                            <a class="dropdown-item" ui-sref="app.docs">
                                Need help?
                            </a>
                            <a class="dropdown-item" href="{{ url('/logout') }}"> logout
                            </a>
                        </div>
                    </li>
                    <li class="nav-item hidden-md-up">
                        <a class="nav-link" data-toggle="collapse" data-target="#collapse" aria-expanded="true">
                            <i class="material-icons">
                            </i>
                        </a>
                    </li>
                </ul>
                <!-- / navbar right -->
            </div>
        </div>
        <div class="padding">
        </div>
        <div class="padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Edit Stock Info.
                            </div>
                            <div class="panel-body">
                                {!! Form::model($stockin,['url' => $stockin ? 'stockin/'.$stockin->id.'/update' : 'stockin/stockin-store','method'=>'post','file'=>true,'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) !!}

                                <div class="form-group row ">
                                    <div class="col-md-2"></div>
                                    <div class="col-lg-10">
                                        <div class="col-md-2"> <h6>Product</h6></div>
                                        <div class="col-md-2"> <h6>Quantity</h6></div>
                                        <div class="col-md-2"> <h6>Unit Price</h6></div>
                                        <div class="col-md-2"> <h6>Discount</h6></div>
                                        <div class="col-md-2"> <h6>Total</h6></div>
                                    </div>
                                </div>

                                <div class="form-group ss appendHere row">

                                    {!! Form::label('', '', ['class' => 'col-lg-2 control-label']) !!}
                                    <div class="col-lg-10">

                                        <div class="col-md-2 ">
                                            <h6 class="text-primary text-left " >@php echo $product; @endphp</h6>
                                            <input type="hidden" value='@php echo $stockin->id; @endphp' name="id">
                                            <input type="hidden" value='@php echo $stockin->product_id; @endphp' name="product_id">
                                        </div>

                                        <div class="col-md-2 ">

                                            {!! Form::text('quantity', null, ['class' => 'form-control quantity', 'placeholder' => 'Quantity', 'id'=>'qty']) !!}
                                            <div class="error">{{ $errors->first('quantity') }}</div>
                                        </div>

                                        <div class="col-md-2 ">

                                            {!! Form::text('unit_price', null, ['class' => 'form-control unit_price', 'placeholder' => 'Unit Price', 'id'=>'price']) !!}
                                            <div class="error">{{ $errors->first('unit_price') }}</div>
                                        </div>

                                        <div class="col-md-2 ">

                                            {!! Form::text('discount', null, ['class' => 'form-control discount', 'placeholder' => 'Discount', 'id'=>'discount']) !!}
                                            <div class="error">{{ $errors->first('discount') }}</div>
                                        </div>

                                        <div class="col-md-2 ">

                                            {!! Form::text('total', null, ['class' => 'form-control total', 'placeholder' => 'Total', 'id'=>'total']) !!}
                                            <div class="error">{{ $errors->first('total') }}</div>
                                        </div>

                                        <div class="clearfix">
                                        </div>
                                        <div class="error">{{ $errors->first('stock') }}
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <div class="col-lg-10 col-lg-offset-2">
                                        {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info '] ) !!}
                                        <button type="button" class="btn btn-lg btn-info alert-danger"><a href="{{ url('stockin') }}">Cancel</a></button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

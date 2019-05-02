@extends('layouts.app')
@section('title', 'Produts to be Stock Out')
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
                            <div class="panel-heading">Add Stock Info.
                            </div>
                            <div class="panel-body">
                                {!! Form::model($stockout,['url' => $stockout ? 'stockout/'.$stockout->id.'/update' : 'stockout/stockout-store',
                                'method'=>'post','file'=>true]) !!}
                                @if(old('sell_qty'))
                                    @php
                                        $old_ids = old('product_id');
                                        $old_product_name = old('product_name');
                                        $old_lot = old('lot');
                                        $old_unit_price = old('unit_price');
                                        $old_current_quantity = old('current_quantity');

                                        $old_sell_qty = old('sell_qty');
                                        $old_order_qty = old('order_qty');
                                        $old_sell_un_pr = old('sell_un_pr');
                                    @endphp
                                    <div class="form-group row ">
                                        {!! Form::label('customer', 'Customer:', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::select('customer',$customers, '', ['class' => 'form-control', 'placeholder' => 'Select Customer....']) !!}
                                            <div class="error">{{ $errors->first('customer') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="multi" id="multi">
                                    </div>

                                    @php

                                    $temp_ids=array(); $temp_ids=$old_ids;

                                    $output = "<table class='table'><thead><tr><th>Product</th><th>Order Qty.</th><th>Lot</th><th>Unit Price</th><th>Selling Unit Price</th><th>Available Qty</th><th>Selling Quantity</th><th>Total</th></tr></thead><tbody class='tbody'>";

                                        echo $output;

                                        foreach (array_unique($temp_ids) as $key=>$value) {

                                        $name = old('product_name');

                                        echo "<tr class='pinx'>";

                                            echo "<td>". $name[array_search($value, array_unique($temp_ids))] ."</td>";
                                            echo '<input type="hidden" value='.$name[array_search($key, array_unique($temp_ids))]. ' name="product_name[]">';
                                            echo '<input type="hidden" value='.$old_ids[array_search($key, array_unique($temp_ids))]. ' name="product_id[]">';


                                            echo "<td>". '<input type="text" size="4" name="order_qty[]">' ."</td>";

                                            echo "<td class='my_custom'>"; echo'<table>';
                                                    foreach ($old_lot[$name[array_search($value, array_unique($temp_ids))]] as $lot ){
                                                    echo "<tr><td>".$lot."</td></tr>";
                                                    echo '<input type="hidden" value='.$lot. ' name="lot['.$name[array_search($value, array_unique($temp_ids))].'][]">'."</td></tr>";
                                                    echo '<input type="hidden" value='.$lot. ' name="id['.$name[array_search($value, array_unique($temp_ids))].'][]">'."</td></tr>";
                                                    }
                                                    echo '</table>';
                                                echo "</td>";

                                            echo "<td class='my_custom'>"; echo'<table>';
                                                    foreach ($old_unit_price[$name[array_search($value, array_unique($temp_ids))]] as $lot ){
                                                    echo "<tr><td>".$lot."</td></tr>";
                                                    echo '<input type="hidden" value='.$lot. ' name="lot['.$name[array_search($value, array_unique($temp_ids))].'][]">'."</td></tr>";
                                                    echo '<input type="hidden" value='.$lot. ' name="id['.$name[array_search($value, array_unique($temp_ids))].'][]">'."</td></tr>";
                                                    }
                                                    echo '</table>';
                                                echo "</td>";

                                            echo "<td>"; echo'<table>';
                                                    for ($i=0;$i<count($old_unit_price[$name[array_search($value, array_unique($temp_ids))]]);$i++){
                                                    echo "<tr><td>".'<input type="text" size="4" name="sell_un_pr['.$name[array_search($key, array_unique($temp_ids))].'][]">'."</td></tr>";
                                                    }
                                                    echo '</table>';
                                                echo "</td>";


                                            echo "<td class='my_custom'>"; echo'<table>';
                                                    foreach ($old_current_quantity[$name[array_search($value, array_unique($temp_ids))]] as $lot ){
                                                    echo "<tr><td>".$lot."</td></tr>";
                                                    echo '<input type="hidden" value='.$lot. ' name="lot['.$name[array_search($value, array_unique($temp_ids))].'][]">'."</td></tr>";
                                                    echo '<input type="hidden" value='.$lot. ' name="id['.$name[array_search($value, array_unique($temp_ids))].'][]">'."</td></tr>";
                                                    }
                                                    echo '</table>';
                                                echo "</td>";


                                            echo "<td>"; echo'<table>';
                                                    for ($i=0;$i<count($old_unit_price[$name[array_search($value, array_unique($temp_ids))]]);$i++){
                                                    echo "<tr><td>".'<input type="text" class="sell_qty" size="4" name="sell_un_pr['.$name[array_search($key, array_unique($temp_ids))].'][]">'."</td></tr>";
                                                    }
                                                    echo '</table>';
                                                echo "</td>";

                                            echo "<td>".'<div class=total'.'></div>'."</td>";

                                            echo "</tr>";
                                        }

                                        echo "</tbody></table>";
                                        @endphp
                                @else
                                    <div class="form-group row ">
                                        {!! Form::label('customer', 'Customer:', ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::select('customer',$customers, '', ['class' => 'form-control', 'placeholder' => 'Select Customer....']) !!}
                                            <div class="error">{{ $errors->first('customer') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="multi" id="multi">
                                    </div>
                                    <div class="wrapper">
                                    </div>
                                @endif
                                <div class="form-group row">

                                    <div class="col-lg-10 col-lg-offset-2">
                                        {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info '] ) !!}
                                        <button type="button" class="btn btn-lg btn-info alert-danger"><a href="{{ url('stockout') }}">Cancel</a></button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix">
            </div>
        </div>
    </div>
    </div>
    </div>
    <div>
    </div>
    @push('scripts11')
        <script>
            $('.multi').multi_select({
                selectColor: 'purple',
                selectSize: 'small',
                selectText: 'Select Product',
                duration: 300,
                easing: 'slide',
                listMaxHeight: 300,
                selectedCount: 2,
                sortByText: true,
                fillButton: true,
                data: {!! json_encode($products) !!}
            ,
            onSelect: function(values) {
                //console.log('return values: ', values);
            }
            }
            );
            $(document).on("click", ".multi", function(){
                    var ajaxResult=[];
                    var json = {
                        items: $('.multi').multi_select('getSelectedValues') };
                    if (json.items.length) {
                        $(json.items).each(function(index, item) {
                                ajaxResult.push(item);
                            }
                        );
                    }
                    $.ajax({
                            type : 'GET',
                            url: '{{url('/product_id_multiselect')}}',
                            data: {
                                product_id: ajaxResult
                            }
                            ,
                            success:function(data){
                                //console.log(data);
                                $('.multi').next().html(data);
                            }
                        }
                    );
                }
            );
        </script>
    @endpush

    @push('script_total')
        <script>
            $(document).ready(function () {
                function calc_total(a){
                    var parent = $(a).parents('.pinx');

                    var child;
                    child = [].map.call($(parent).find('.sell_qty').get(), e => e.value);//console.log(child);

                    var total = 0;
                    for (var i = 0; i < child.length; i++) {
                        total += child[i] << 0;
                    }
                    parent.find('.total').text(total);
                }

                $(document).on("focusout", ".sell_qty", function(){
                    calc_total($(this))
                });
            })
       </script>
    @endpush
@endsection

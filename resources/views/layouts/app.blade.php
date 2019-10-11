<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inventory Management:@yield('title')</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- styles imported from Flatkit -->
    <link rel="stylesheet" href="{{asset('assets/animate.css/animate.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/glyphicons/glyphicons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/material-design-icons/material-design-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/bootstrap/dist/css/bootstrap.min.css')}}" type="text/css" />
    <!-- build:css ../assets/styles/app.min.css -->
    <link rel="stylesheet" href="{{asset('assets/styles/app.css')}}" type="text/css" />
    <!-- endbuild -->
    <link rel="stylesheet" href="{{asset('assets/styles/font.css')}}" type="text/css" />
    <!-- Multiselect -->
    <link rel="stylesheet" href="{{asset('css/multi.select.css')}}" type="text/css" />
    <!-- My select -->
    <link rel="stylesheet" href="{{asset('css/my_custom.css')}}" type="text/css" />
</head>
<body>
<div class="app" id="app">
    <!-- ############ LAYOUT START-->
    <!-- aside -->
    <div id="aside" class="app-aside modal fade folded md nav-expand">
        <div class="left navside indigo-900 dk" layout="column">
            <div class="navbar navbar-md no-radius">
                <div>
                    <a class="navbar-brand" href="{{URL::to('/')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="24" height="24">
                            <path d="M 4 4 L 44 4 L 44 44 Z" fill="#009688">
                            </path>
                            <path d="M 4 4 L 34 4 L 24 24 Z" fill="rgba(0,0,0,0.15)">
                            </path>
                            <path d="M 4 4 L 24 4 L 4  44 Z" fill="#6cc788">
                            </path>
                        </svg>
                        <img src="../assets/images/logo.png" alt="." class="hide">
                        <span class="hidden-folded inline">INVENTORY<br>MANAGEMENT
                </span>
                    </a>
                </div>
            </div>
            
            <div flex class="hide-scroll">
                <nav class="scroll nav-active-primary">
                    <div>
                        <ul class="nav" ui-nav>
                            <li ui-sref-active="active">
                                <a href="{{URL::to('supplier')}}">
                      <span class="nav-icon">
                        <i class="fa fa-level-up">
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z" fill="#6cc788">
                            </path>
                          </svg>
                        </i>
                      </span>
                                    <span class="nav-text">Suppliers
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <nav class="scroll nav-active-primary">
                    <div>
                        <ul class="nav" ui-nav>
                            <li ui-sref-active="active">
                                <a href="{{URL::to('customer')}}">
                      <span class="nav-icon">
                        <i class="fa fa-level-up">
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z" fill="#6cc788">
                            </path>
                          </svg>
                        </i>
                      </span>
                                    <span class="nav-text">Customers
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <nav class="scroll nav-active-primary">
                    <div>
                        <ul class="nav" ui-nav>
                            <li ui-sref-active="active">
                                <a href="{{URL::to('stockin/add-stockin')}}">
                      <span class="nav-icon">
                        <i class="fa fa-ellipsis-v">
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z" fill="#6cc788">
                            </path>
                          </svg>
                        </i>
                      </span>
                                    <span class="nav-text">Stock In
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <nav class="scroll nav-active-primary">
                    <div>
                        <ul class="nav" ui-nav>
                            <li ui-sref-active="active">
                                <a href="{{URL::to('stockout/add-stockout')}}">
                      <span class="nav-icon">
                        <i class="fa fa-check">
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z" fill="#6cc788">
                            </path>
                          </svg>
                        </i>
                      </span>
                                    <span class="nav-text">Stock Out
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <nav class="scroll nav-active-primary">
                    <div>
                        <ul class="nav" ui-nav>
                            <li ui-sref-active="active">
                                <a href="{{URL::to('check-stock')}}">
                      <span class="nav-icon">
                        <i class="fa fa-check">
                          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
                            <path d="M24,20c-7.72,0-14,6.28-14,14h4c0-5.51,4.49-10,10-10s10,4.49,10,10h4C38,26.28,31.721,20,24,20z" fill="#6cc788">
                            </path>
                          </svg>
                        </i>
                      </span>
                                    <span class="nav-text">Check Stock
                      </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- / aside -->
@yield('content')
<!-- ############ PAGE END-->
    <!-- / -->
    <!-- theme switcher -->

    <!-- / -->
    <!-- ############ LAYOUT END-->
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}">
</script>

<!-- jQuery -->
<script src="{{asset('libs/jquery/jquery/dist/jquery.js')}}">
</script> 
<!-- Bootstrap -->
 <script src="{{asset('libs/jquery/tether/dist/js/tether.min.js')}}">
</script>
<script src="{{asset('libs/jquery/bootstrap/dist/js/bootstrap.js')}}">
</script>

<!-- Scripts for multidropdown -->
<script src="{{ asset('js/multi.select.js') }}">
</script>
<!-- core -->
{{--<script src="{{asset('libs/jquery/underscore/underscore-min.js')}}">
</script>
<script src="{{asset('libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js')}}">
</script>
<script src="{{asset('libs/jquery/PACE/pace.min.js')}}">
</script>
<script src="{{asset('html/scripts/config.lazyload.js')}}">
</script>
<script src="{{asset('html/scripts/palette.js')}}">
</script>
<script src="{{asset('html/scripts/ui-load.js')}}">
</script>
<script src="{{asset('html/scripts/ui-jp.js')}}">
</script>
<script src="{{asset('html/scripts/ui-include.js')}}">
</script>
<script src="{{asset('html/scripts/ui-device.js')}}">
</script>
<script src="{{asset('html/scripts/ui-form.js')}}">
</script>
<script src="{{asset('html/scripts/ui-nav.js')}}">
</script>
<script src="{{asset('html/scripts/ui-screenfull.js')}}">
</script>
<script src="{{asset('html/scripts/ui-scroll-to.js')}}">
</script>
<script src="{{asset('html/scripts/ui-toggle-class.js')}}">
</script>--}}

<!-- ajax -->
 <script src="{{asset('libs/jquery/jquery-pjax/jquery.pjax.js')}}">
</script>

<!-- <script src="{{asset('libs/EasyAutocomplete/jquery.easy-autocomplete.min.js')}}">
</script>  -->

<script type="text/javascript">
    
    $(function () {
            $("body").on("click", '.add', function () {
                    var html = $('.ss').html();
                    $('.appendHere').after('<div class="form-group row remv">' + html + '</div>');
                }
            );
            $("body").on("click", '.remove', function () {
                    $(this).parentsUntil().closest('.remv').remove();
                }
            );
        }
    );
</script>


<!-- <script type="text/javascript">
    $(document).ready(function () {
        var index = $(".form-group row remv").length+1;

        $('.add').click(function() {
        index = index + 1;
        
        var theId = 'list_' + (index);
        $li.attr("id", theId);
        $('#sortable').append($li);
        
    });

    });
</script> -->

<script type="text/javascript">
    $(document).ready(function () {

        $(document).on("keyup", ".product", function(){
                var parent_el= $(this).parents(".col-md-2");
                var field_val=$(this).val();
                    $.ajax({
                            type : 'GET',
                            url: '{{url('search')}}',
                            data: {
                                _token: '<?php echo csrf_token() ?>',
                                product: field_val
                            }
                            ,
                            success:function(data){
                                parent_el.find('.tree').html(data);
                            }
                        }
                    );
                }
            );
        }
    );
    $(document).on('click', '.tree li', function(){
            $(this).parents(".col-md-2").find('input').val($(this).text());
            $(this).parents(".col-md-2").find('.tree').html('');
        }
    );

</script>

<script type="text/javascript">
    $(document).ready(function () {

            $(document).on("change", ".hit", function(){
                    var parent_el= $(this).parents(".col-md-2");
                    var field_val=$(this).val();
                    $.ajax({
                            type : 'GET',
                            url: '{{url('/search_product_id')}}',
                            data: {
                                product_id: field_val
                            }
                            ,
                            success:function(data){
                                parent_el.next().find('.free').html(data);
                            }
                        }
                    );
                }
            );
        }
    );
    $(document).on('change', '.quantity', function(){
            //$(this).parents(".col-md-2").find('input').val($(this).text());
            $(this).parents(".col-md-2").find('.free').html('');
        }
    );

</script>

<script type="text/javascript">
    $(document).ready(function () {
        // let price = 0;
        // let qty = 0;
        // let discount = 0;

        // $('#qty').keyup(function(e) {
        //     qty = e.target.value;
        //     updateTotal();
        // });
        //
        // $('#price').keyup(function(e) {
        //     price = e.target.value;
        //     updateTotal();
        // });
        //
        // $('#discount').keyup(function(e) {
        //     discount = e.target.value;
        //     updateTotal();
        // });

        function calc_total($a, $b){
            $native = $($a).val();
            $parent_of_native = $($a).parents(".col-lg-10");
            $counterpart = $parent_of_native.find("."+ $b).val();
            $total = $native * $counterpart;
            $parent_of_native.find('.total').val($total);
        }

        function calc_discount($a, $b){
            $active = $($a).val();
            $parent_of_active = $($a).parents(".col-lg-10");
            $counterpart = $parent_of_active.find("."+ $b).val();
            $final = $counterpart - (($counterpart/100) * $active);
            $parent_of_native.find('.total').val($final);
        }

        $(document).on("focusout", ".quantity", function(){
            calc_total($(this), "unit_price")
        });
        $(document).on("focusout", ".unit_price", function(){
            calc_total($(this), "quantity")
        });
        $(document).on("focusout", ".discount", function(){
            calc_discount($(this), "total")
        });
    });
</script>
@stack('scripts11')
@stack('script_total')
@stack('stockscript')
@stack('stock_out_script')

<!-- endbuild -->
</body>
</html>

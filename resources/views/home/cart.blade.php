<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 2.0.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- Head BEGIN -->
<head>
    <meta charset="utf-8">
    <title>Shopping cart | Metronic Shop UI</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta content="Metronic Shop UI description" name="description">
    <meta content="Metronic Shop UI keywords" name="keywords">
    <meta content="keenthemes" name="author">

    <meta property="og:site_name" content="-CUSTOMER VALUE-">
    <meta property="og:title" content="-CUSTOMER VALUE-">
    <meta property="og:description" content="-CUSTOMER VALUE-">
    <meta property="og:type" content="website">
    <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
    <meta property="og:url" content="-CUSTOMER VALUE-">

    <link rel="shortcut icon" href="favicon.ico">
    <link href="/favicon.ico" rel="SHORTCUT ICON" type="image/ico">

    <!-- Fonts START -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow&subset=all" rel="stylesheet" type="text/css">
    <!-- Fonts END -->

    <!-- Global styles START -->
    <link href="{{asset('assets/home/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/home/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
    <link href="{{asset('assets/home/plugins/fancybox/source/jquery.fancybox.css')}}" rel="stylesheet">
    <link href="{{asset('assets/home/plugins/bxslider/jquery.bxslider.css')}}" rel="stylesheet">
    <!-- Page level plugin styles END -->

    <!-- Theme styles START -->
    <link href="{{asset('assets/home/css/style-metronic.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/home/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/home/css/style-responsive.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/home/css/custom.css')}}" rel="stylesheet" type="text/css">
    <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body>


<div class="main">
    <div class="container">
        @if($cartList)
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">
                <h1>我的购物车</h1>
                <div class="shopping-cart-page">
                    <div class="shopping-cart-data clearfix">
                        <div class="table-wrapper-responsive">
                            <table summary="Shopping cart">
                                <tr>
                                    <th class="shopping-cart-image">商品图</th>
                                    <th class="shopping-cart-description">商品名</th>
                                    <th class="shopping-cart-ref-no">商品类别</th>
                                    <th class="shopping-cart-quantity">购买数量</th>
                                    <th class="shopping-cart-price">商品单价</th>
                                    <th class="shopping-cart-total" colspan="2">小计</th>
                                </tr>
                                @foreach($cartList as $cart)
                                <tr>
                                    <td class="shopping-cart-image">
                                        <a href="#"><img src="{{$cart['image']}}" alt="..."></a>
                                    </td>
                                    <td class="shopping-cart-description">
                                        <h3><a href="#">{{$cart['name']}}</a></h3>
                                    </td>
                                    <td class="shopping-cart-ref-no">
                                        {{$cart['type_id']}}
                                    </td>
                                    <td class="shopping-cart-quantity" gid="{{$cart['id']}}">
                                        <div class="product-quantity">
                                            <input id="product-quantity" type="text"  value="{{$cart['buynum']}}" readonly class="form-control input-sm">
                                        </div>
                                    </td>
                                    <td class="shopping-cart-price">
                                        <strong>￥<span>{{$cart['price']}}</span></strong>
                                    </td>
                                    <td class="shopping-cart-total">
                                        <strong>￥<span>{{sprintf("%.2f", $cart['buynum']*$cart['price'])}}</span></strong>
                                    </td>
                                    <td class="del-goods-col">
                                        <a class="del-goods" href="#"><i class="fa fa-align-right"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                        <div class="shopping-total">
                            <ul>
                                </li>
                                <li class="shopping-total-price">
                                    <em>Total</em>
                                    <strong class="price">￥<span></span></strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a class="btn btn-default" href="/index">继续购物<i class="fa fa-shopping-cart"></i></a>
                    <a class="btn btn-primary" href="/cart/order">确认购买<i class="fa fa-check"></i></a>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
        @else
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">
                <h1>我的购物车</h1>
                <div class="shopping-cart-page">
                    <div class="shopping-cart-data clearfix">
                        <p>你尚未购买任何商品，快去购物吧！</p>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
        @endif

    </div>
</div>


<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
<script src="{{asset('assets/home/plugins/respond.min.js')}}"></script>
<![endif]-->
<script src="{{asset('assets/home/plugins/jquery-1.10.2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/home/plugins/jquery-migrate-1.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/home/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('assets/home/plugins/back-to-top.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/home/plugins/jQuery-slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS(REQUIRED ONLY FOR CURRENT PAGE) -->
<script type="text/javascript" src="{{asset('assets/home/plugins/fancybox/source/jquery.fancybox.pack.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/home/plugins/bxslider/jquery.bxslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/home/plugins/zoom/jquery.zoom.min.js')}}"></script><!-- product zoom -->
<script src="{{asset('assets/home/plugins/bootstrap-touchspin/bootstrap.touchspin.js')}}" type="text/javascript"></script><!-- Quantity -->

<script type="text/javascript" src="{{asset('assets/home/scripts/app.js')}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initBxSlider();
        App.initImageZoom();
        App.initTouchspin();
    });
</script>
<!-- END PAGE LEVEL JAVASCRIPTS -->

<script>
    $(function () {
        var sum = 0;
        $("td.shopping-cart-total span").each(function () {
            var total = parseFloat($(this).html(), 2);
            sum += total;
        });
        sum = sum.toFixed(2);
        $('li.shopping-total-price span').html(sum);

    });
    //获取购买数量
    $("table").on("click", "button", function () {

        var gid = $(this).parent().parent().parent().parent().attr('gid');
        var buynum = parseFloat($(this).parent().parent().children(':input').val());
        var that = this;

        $.ajax({
            url: "{{url('cart/ajaxUpdateGoods')}}",
            data: "gid="+gid+"&buynum="+buynum,
            type: 'get',
            success: function (data) {
                var price = data.price;
                var total = (buynum*price).toFixed(2);
                $(that).parent().parent().parent().parent().nextAll('.shopping-cart-total').children().children('span').html(total);
                var sum = 0;
                $("td.shopping-cart-total span").each(function () {
                    var total = parseFloat($(this).html());
                    sum += total;
                });
                sum = sum.toFixed(2);
                $('li.shopping-total-price span').html(sum);
            },
            dataType: 'json'
        })
    });
</script>


</body>
<!-- END BODY -->
</html>
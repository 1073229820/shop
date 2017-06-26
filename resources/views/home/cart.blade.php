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
                                    <th class="shopping-cart-description">商品简要</th>
                                    <th class="shopping-cart-ref-no">商品类别</th>
                                    <th class="shopping-cart-quantity">购买数量</th>
                                    <th class="shopping-cart-price">商品单价</th>
                                    <th class="shopping-cart-total" colspan="2">小计</th>
                                </tr>
                                @foreach($cartList as $cart)
                                <tr>
                                    <td class="shopping-cart-image">
                                        <a href="#"><img src="{{asset('assets/home/temp/products/model3.jpg')}}" alt="Berry Lace Dress"></a>
                                    </td>
                                    <td class="shopping-cart-description">
                                        <h3><a href="#">{{$cart->goods_name}}</a></h3>
                                        <p><strong>Item 1</strong> - {{$cart->logo}} </p>
                                        <em>查看详情</em>
                                    </td>
                                    <td class="shopping-cart-ref-no">
                                        {{$cart->cat_id}}
                                    </td>
                                    <td class="shopping-cart-quantity">
                                        <div class="product-quantity">
                                            <input id="product-quantity" type="text"  value="1" readonly class="form-control input-sm">
                                        </div>
                                    </td>
                                    <td class="shopping-cart-price">
                                        <strong>￥<span>{{$cart->price}}</span></strong>
                                    </td>
                                    <td class="shopping-cart-total">
                                        <strong>￥<span>{{1*$cart->price}}</span></strong>
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
                                <li>
                                    <em>Sub total</em>
                                    <strong class="price"><span>$</span>47.00</strong>
                                </li>
                                <li>
                                    <em>Shipping cost</em>
                                    <strong class="price"><span>$</span>3.00</strong>
                                </li>
                                <li class="shopping-total-price">
                                    <em>Total</em>
                                    <strong class="price"><span>$</span>50.00</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button class="btn btn-default" type="submit">继续购物<i class="fa fa-shopping-cart"></i></button>
                    <button class="btn btn-primary" type="submit">确认购买<i class="fa fa-check"></i></button>
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
    //获取购买数量
    $("td.shopping-cart-quantity").on("click", "button", function () {
        var num = $('#product-quantity').val();
        var price = $('td.shopping-cart-price span').html();
        var total = (num*price).toFixed(2);//保留两位小数
        $('td.shopping-cart-total span').html(total);
    });
</script>


</body>
<!-- END BODY -->
</html>
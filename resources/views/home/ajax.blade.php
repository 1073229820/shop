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
    <title>Metronic Shop</title>

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
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&subset=all" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow&subset=all" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->
    <!-- Fonts END -->

    <!-- Global styles START -->
    <link href="assets1/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
    <link href="assets1/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <link href="assets1/plugins/bxslider/jquery.bxslider.css" rel="stylesheet">
    <link rel="stylesheet" href="assets1/plugins/layerslider/css/layerslider.css" type="text/css">
    <!-- Page level plugin styles END -->

    <!-- Theme styles START -->
    <link href="assets1/css/style-metronic.css" rel="stylesheet" type="text/css">
    <link href="assets1/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets1/css/style-responsive.css" rel="stylesheet" type="text/css">
    <link href="assets1/css/custom.css" rel="stylesheet" type="text/css">
    <!-- Theme styles END -->

    <style type="text/css">
        .nodata{display:none; height:32px; line-height:32px; text-align:center; color:#999; font-size:14px}
    </style>
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body>
<!-- BEGIN TOP BAR -->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span>+1 456 6717</span></li>
                    <!-- BEGIN CURRENCIES -->
                    <li class="shop-currencies">
                        <a href="javascript:void(0);">€</a>
                        <a href="javascript:void(0);">£</a>
                        <a href="javascript:void(0);" class="current">$</a>
                    </li>
                    <!-- END CURRENCIES -->
                    <!-- BEGIN LANGS -->
                    <li class="langs-block">
                        <a href="javascript:void(0);" class="current">English <i class="fa fa-angle-down"></i></a>
                        <div class="langs-block-others-wrapper"><div class="langs-block-others">
                                <a href="javascript:void(0);">Japanese</a>
                                <a href="javascript:void(0);">Germany</a>
                                <a href="javascript:void(0);">Turkish</a>
                            </div></div>
                    </li>
                    <!-- END LANGS -->
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    <li><a href="{{url('order')}}">My Account</a></li>
                    <li><a href="#">My Wishlist</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                    <li><a href="login-page.html">Log In</a></li>
                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>
</div>
<!-- END TOP BAR -->

<!-- BEGIN HEADER -->
<div role="navigation" class="navbar header no-margin">
    <div class="container">
        <div class="navbar-header">
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <a href="index.html" class="navbar-brand"><img src="assets1/img/logo_red.png" alt="Metronic Shop UI"></a><!-- LOGO -->
        </div>
        <!-- BEGIN CART -->
        <div class="cart-block">
            <div class="cart-info">
                <a href="javascript:void(0);" class="cart-info-count">3 items</a>
                <a href="javascript:void(0);" class="cart-info-value">$1260</a>
            </div>
            <i class="fa fa-shopping-cart"></i>
            <!-- BEGIN CART CONTENT -->
            <div class="cart-content-wrapper">
                <div class="cart-content">
                    <ul class="scroller" style="height: 250px;">
                        <li>
                            <a href="item.html"><img src="assets1/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="assets1/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="assets1/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="assets1/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="assets1/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="assets1/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="assets1/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="assets1/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                    </ul>
                    <div class="text-right">
                        <a href="shopping-cart.html" class="btn btn-default">View Cart</a>
                        <a href="checkout.html" class="btn btn-primary">Checkout</a>
                    </div>
                </div>
            </div>
            <!-- END CART CONTENT -->
        </div>
        <!-- END CART -->
        <!-- BEGIN NAVIGATION -->
        <div class="collapse navbar-collapse mega-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="false" data-target="product-list.html" href="product-list.html">
                        Woman
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <!-- BEGIN DROPDOWN MENU -->
                    <ul class="dropdown-menu" aria-labelledby="mega-menu">
                        <li>
                            <div class="nav-content">
                                <!-- BEGIN DROPDOWN MENU - COLUMN -->
                                <div class="nav-content-col">
                                    <h3>Footwear</h3>
                                    <ul>
                                        <li><a href="product-list.html">Astro Trainers</a></li>
                                        <li><a href="product-list.html">Basketball Shoes</a></li>
                                        <li><a href="product-list.html">Boots</a></li>
                                        <li><a href="product-list.html">Canvas Shoes</a></li>
                                        <li><a href="product-list.html">Football Boots</a></li>
                                        <li><a href="product-list.html">Golf Shoes</a></li>
                                        <li><a href="product-list.html">Hi Tops</a></li>
                                        <li><a href="product-list.html">Indoor and Court Trainers</a></li>
                                    </ul>
                                </div>
                                <!-- END DROPDOWN MENU - COLUMN -->
                                <!-- BEGIN DROPDOWN MENU - COLUMN -->
                                <div class="nav-content-col">
                                    <h3>Clothing</h3>
                                    <ul>
                                        <li><a href="product-list.html">Base Layer</a></li>
                                        <li><a href="product-list.html">Character</a></li>
                                        <li><a href="product-list.html">Chinos</a></li>
                                        <li><a href="product-list.html">Combats</a></li>
                                        <li><a href="product-list.html">Cricket Clothing</a></li>
                                        <li><a href="product-list.html">Fleeces</a></li>
                                        <li><a href="product-list.html">Gilets</a></li>
                                        <li><a href="product-list.html">Golf Tops</a></li>
                                    </ul>
                                </div>
                                <!-- END DROPDOWN MENU - COLUMN -->
                                <!-- BEGIN DROPDOWN MENU - COLUMN -->
                                <div class="nav-content-col">
                                    <h3>Accessories</h3>
                                    <ul>
                                        <li><a href="product-list.html">Belts</a></li>
                                        <li><a href="product-list.html">Caps</a></li>
                                        <li><a href="product-list.html">Gloves, Hats and Scarves</a></li>
                                    </ul>

                                    <h3>Clearance</h3>
                                    <ul>
                                        <li><a href="product-list.html">Jackets</a></li>
                                        <li><a href="product-list.html">Bottoms</a></li>
                                    </ul>
                                </div>
                                <!-- END DROPDOWN MENU - COLUMN -->
                                <!-- BEGIN DROPDOWN MENU - BRANDS -->
                                <div class="nav-brands">
                                    <ul>
                                        <li><a href="product-list.html"><img title="esprit" alt="esprit" src="assets1/temp/brands/esprit.jpg"></a></li>
                                        <li><a href="product-list.html"><img title="gap" alt="gap" src="assets1/temp/brands/gap.jpg"></a></li>
                                        <li><a href="product-list.html"><img title="next" alt="next" src="assets1/temp/brands/next.jpg"></a></li>
                                        <li><a href="product-list.html"><img title="puma" alt="puma" src="assets1/temp/brands/puma.jpg"></a></li>
                                        <li><a href="product-list.html"><img title="zara" alt="zara" src="assets1/temp/brands/zara.jpg"></a></li>
                                    </ul>
                                </div>
                                <!-- END DROPDOWN MENU - BRANDS -->
                            </div>
                        </li>
                    </ul>
                    <!-- END DROPDOWN MENU -->
                </li>
                <li><a href="product-list.html">Men</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="false" data-target="product-list.html" href="product-list.html">
                        Kids
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <!-- BEGIN DROPDOWN MENU -->
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu">
                            <a href="product-list.html">Hi Tops <i class="fa fa-angle-right"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="product-list.html">Second Level Link</a></li>
                                <li><a href="product-list.html">Second Level Link</a></li>
                                <li class="dropdown-submenu">
                                    <a href="product-list.html">Second Level Link <i class="fa fa-angle-right"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="product-list.html">Third Level Link</a></li>
                                        <li><a href="product-list.html">Third Level Link</a></li>
                                        <li><a href="product-list.html">Third Level Link</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="product-list.html">Running Shoes</a></li>
                        <li><a href="product-list.html">Jackets and Coats</a></li>
                        <li><a href="product-list.html">Tennis Clothing</a></li>
                        <li class="dropdown-submenu">
                            <a href="product-list.html">Running Clothing <i class="fa fa-angle-right"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="product-list.html">Second Level Link</a></li>
                                <li><a href="product-list.html">Second Level Link</a></li>
                                <li class="dropdown-submenu">
                                    <a href="product-list.html">Second Level Link <i class="fa fa-angle-right"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="product-list.html">Third Level Link</a></li>
                                        <li><a href="product-list.html">Third Level Link</a></li>
                                        <li><a href="product-list.html">Third Level Link</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- END DROPDOWN MENU -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="false" data-target="product-list.html" href="product-list.html">
                        New
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <!-- BEGIN DROPDOWN MENU -->
                    <ul class="dropdown-menu" aria-labelledby="mega-menu-catalogue">
                        <li>
                            <div class="nav-content">
                                <div class="product-item">
                                    <div class="pi-img-wrapper">
                                        <a href="item.html"><img src="assets1/temp/products/model4.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                                    </div>
                                    <h3><a href="item.html">Berry Lace Dress</a></h3>
                                    <div class="pi-price">$29.00</div>
                                    <a href="#" class="btn btn-default add2cart">Add to cart</a>
                                </div>
                                <div class="product-item">
                                    <div class="pi-img-wrapper">
                                        <a href="item.html"><img src="assets1/temp/products/model3.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                                    </div>
                                    <h3><a href="item.html">Berry Lace Dress</a></h3>
                                    <div class="pi-price">$29.00</div>
                                    <a href="#" class="btn btn-default add2cart">Add to cart</a>
                                </div>
                                <div class="product-item">
                                    <div class="pi-img-wrapper">
                                        <a href="item.html"><img src="assets1/temp/products/model7.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                                    </div>
                                    <h3><a href="item.html">Berry Lace Dress</a></h3>
                                    <div class="pi-price">$29.00</div>
                                    <a href="#" class="btn btn-default add2cart">Add to cart</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- END DROPDOWN MENU -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="false" data-target="#" href="#">
                        Pages
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <!-- BEGIN DROPDOWN MENU -->
                    <ul class="dropdown-menu">
                        <li><a href="index-light-footer.html">Light Footer</a></li>
                        <li><a href="product-list.html">Product List</a></li>
                        <li><a href="search-result.html">Search Result</a></li>
                        <li><a href="item.html">Product Page</a></li>
                        <li><a href="shopping-cart-null.html">Shopping Cart (Null Cart)</a></li>
                        <li><a href="shopping-cart.html">Shopping Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="reg-page.html">Registration Page</a></li>
                        <li><a href="login-page.html">Login Page</a></li>
                        <li><a href="forgotton-password.html">Forget Password</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li><a href="terms-conditions-page.html">Terms & Conditions</a></li>
                        <li><a href="site-map.html">Site Map</a></li>
                        <li><a href="page-404.html">404</a></li>
                        <li><a href="page-500.html">500</a></li>
                    </ul>
                    <!-- END DROPDOWN MENU -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="false" data-target="#" href="#">
                        Features
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <!-- BEGIN DROPDOWN MENU -->
                    <ul class="dropdown-menu">
                        <li><a href="feature-typography.html">Typography</a></li>
                        <li><a href="feature-forms.html">Forms</a></li>
                        <li><a href="feature-buttons.html">Buttons</a></li>
                        <li><a href="feature-icons.html">Icons</a></li>
                    </ul>
                    <!-- END DROPDOWN MENU -->
                </li>
                <li><a href="http://keenthemes.com/preview/metronic_admin/ecommerce_index.html">Admin theme</a></li>
                <!-- BEGIN TOP SEARCH -->
                <li class="menu-search">
                    <span class="sep"></span>
                    <i class="fa fa-search search-btn"></i>
                    <div class="search-box">
                        <form action="#">
                            <div class="input-group">
                                <input type="text" placeholder="Search" class="form-control">
                                <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </span>
                            </div>
                        </form>
                    </div>
                </li>
                <!-- END TOP SEARCH -->
            </ul>
        </div>
        <!-- END NAVIGATION -->
    </div>
</div>
<!-- END HEADER -->

<!-- BEGIN SLIDER -->
<div class="page-slider margin-bottom-35">
    <!--LayerSlider begin-->
    <div id="layerslider" style="width: 100%; height: 494px; margin: 0 auto;">
        <!--LayerSlider layer-->
        <div class="ls-layer ls-layer1" style="slidedirection: right; transition2d: 24,25,27,28; ">
            <img src="assets1/temp/sliders/slide1/bg.jpg" class="ls-bg" alt="Slide background">
            <div class="ls-s-1 title" style=" top: 96px; left: 35%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; white-space: nowrap;">
                Tones of <strong>shop UI features</strong> designed
            </div>
            <div class="ls-s-1 mini-text" style=" top: 338px; left: 35%; slidedirection : fade; slideoutdirection : fade; durationout : 750; easingin : easeOutQuint; delayin : 300; showuntil : 4000; white-space: nowrap;">
                Lorem ipsum dolor sit amet  constectetuer diam<br > adipiscing elit euismod ut laoreet dolore.
            </div>
        </div>

        <!--LayerSlider layer-->
        <div class="ls-layer ls-layer2" style="slidedirection: right; transition2d: 110,111,112,113; ">
            <img src="assets1/temp/sliders/slide2/bg.jpg" class="ls-bg" alt="Slide background">
            <div class="ls-s-1 ls-title title" style=" top: 40%; left: 21%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; easingout : easeInOutQuint; delayin : 0; delayout : 0; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; white-space: nowrap;">
                <strong class="title">Unlimted</strong>
                Layout Options
                <em class="title">Fully Responsive</em>
            </div>

            <div class="ls-s-2 ls-price title" style=" top: 50%; left: 45%; slidedirection : fade; slideoutdirection : fade; durationout : 109750; easingin : easeOutQuint; delayin : 300; scalein : .8; scaleout : .8; showuntil : 4000; white-space: nowrap;">
                <b>from</b>
                <strong><span>$</span>25</strong>
            </div>

            <a href="#" class="ls-s-1 ls-more mini-text" style=" top: 72%; left: 21%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; easingout : easeInOutQuint; delayin : 0; delayout : 0; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; display: inline-block; white-space: nowrap;">
                See More Details
            </a>
        </div>

        <!--LayerSlider layer-->
        <div class="ls-layer ls-layer3" style="slidedirection: right; transition2d: 92,93,105; ">
            <img src="assets1/temp/sliders/slide3/bg.jpg" class="ls-bg" alt="Slide background">

            <div class="ls-s-1 ls-title" style=" top: 83px; left: 33%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; white-space: nowrap;">
                Full Admin & Frontend
                <strong>eCommerce UI</strong>
                Is Ready For Your Project
            </div>

            <div class="ls-s-1" style=" top: 333px; left: 33%; slidedirection : fade; slideoutdirection : fade; durationout : 750; easingin : easeOutQuint; delayin : 300; scalein : .8; scaleout : .8; showuntil : 4000; white-space: nowrap; font-size: 20px; font: 20px 'Open Sans Light', sans-serif;">
                <a href="#" class="ls-buy">
                    Buy It Now!
                </a>
                <div class="ls-price">
                    <span>All these for only:</span>
                    <strong>25<sup>$</sup></strong>
                </div>
            </div>
        </div>

        <!--LayerSlider layer-->
        <div class="ls-layer ls-layer5" style="slidedirection: right; transition2d: 110,111,112,113; ">
            <img src="assets1/temp/sliders/slide5/bg.jpg" class="ls-bg" alt="Slide background">

            <div class="ls-s-1 title" style=" top: 35%; left: 60%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; white-space: nowrap;">
                The most<br>
                wanted bijouterie
            </div>

            <div class="ls-s-1 mini-text" style=" top: 70%; left: 60%; slidedirection : fade; slideoutdirection : fade; durationout : 750; easingin : easeOutQuint; delayin : 300; scalein : .8; scaleout : .8; showuntil : 4000; white-space: nowrap;">
                <span>Lorem ipsum and</span>
                <a href="#">Buy It Now!</a>
            </div>
        </div>
    </div>
    <!--LayerSlider end-->
</div>
<!-- END SLIDER -->

<div class="main">
    <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SALE PRODUCT -->
            <div class="col-md-12 sale-product">
                <h2>New Arrivals</h2>
                <div class="bxslider-wrapper">
                    <ul class="bxslider" data-slides-phone="1" data-slides-tablet="2" data-slides-desktop="5" data-slide-margin="15">
                        @foreach($goodsList as $goods)
                        <li>
                            <div class="product-item">
                                <div class="pi-img-wrapper">
                                    <img src="assets1/temp/products/model1.jpg" class="img-responsive" alt="Berry Lace Dress">
                                    <div>
                                        <a href="assets1/temp/products/model1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                    </div>
                                </div>
                                <h3><a href="item.html">{{$goods->goods_name}}</a></h3>
                                <div class="pi-price">￥{{$goods->price}}</div>
                                <a href="#" class="btn btn-default add2cart">加入购物车</a>
                                <div class="sticker sticker-sale"></div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>


            <!-- END SALE PRODUCT -->
        </div>

        <!-- END SALE PRODUCT & NEW ARRIVALS -->
        <div class="nodata">123</div>

    </div>
</div>


<!-- BEGIN fast view of a product -->
<div id="product-pop-up" style="display: none; width: 700px;">
    <div class="product-page product-pop-up">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-3">
                <div class="product-main-image">
                    <img src="assets1/temp/products/model7.jpg" alt="Cool green dress with red bell" class="img-responsive">
                </div>
                <div class="product-other-images">
                    <a href="#" class="active"><img alt="Berry Lace Dress" src="assets1/temp/products/model3.jpg"></a>
                    <a href="#"><img alt="Berry Lace Dress" src="assets1/temp/products/model4.jpg"></a>
                    <a href="#"><img alt="Berry Lace Dress" src="assets1/temp/products/model5.jpg"></a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-9">
                <h1>Cool green dress with red bell</h1>
                <div class="price-availability-block clearfix">
                    <div class="price">
                        <strong><span>$</span>47.00</strong>
                        <em>$<span>62.00</span></em>
                    </div>
                    <div class="availability">
                        Availability: <strong>In Stock</strong>
                    </div>
                </div>
                <div class="description">
                    <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat
                        Nostrud duis molestie at dolore.</p>
                </div>
                <div class="product-page-options">
                    <div class="pull-left">
                        <label class="control-label">Size:</label>
                        <select class="form-control input-sm">
                            <option>L</option>
                            <option>M</option>
                            <option>XL</option>
                        </select>
                    </div>
                    <div class="pull-left">
                        <label class="control-label">Color:</label>
                        <select class="form-control input-sm">
                            <option>Red</option>
                            <option>Blue</option>
                            <option>Black</option>
                        </select>
                    </div>
                </div>
                <div class="product-page-cart">
                    <div class="product-quantity">
                        <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                    </div>
                    <button class="btn btn-primary" type="submit">Add to cart</button>
                    <button class="btn btn-default" type="submit">More details</button>
                </div>
            </div>

            <div class="sticker sticker-sale"></div>
        </div>
    </div>
</div>
<!-- END fast view of a product -->

<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
<script src="assets1/plugins/respond.min.js"></script>
<![endif]-->
<script src="assets1/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets1/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="assets1/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets1/plugins/back-to-top.js"></script>
{{--<script type="text/javascript" src="assets1/plugins/jQuery-slimScroll/jquery.slimscroll.min.js"></script>--}}
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script type="text/javascript" src="assets1/plugins/fancybox/source/jquery.fancybox.pack.js"></script><!-- pop up -->
{{--<script type="text/javascript" src="assets1/plugins/bxslider/jquery.bxslider.min.js"></script><!-- slider for products -->--}}
{{--<script type="text/javascript" src='assets1/plugins/zoom/jquery.zoom.min.js'></script><!-- product zoom -->--}}
<script src="assets1/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->

<!-- BEGIN LayerSlider -->
<script src="assets1/plugins/layerslider/jQuery/jquery-easing-1.3.js" type="text/javascript"></script>
<script src="assets1/plugins/layerslider/jQuery/jquery-transit-modified.js" type="text/javascript"></script>
<script src="assets1/plugins/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
<script src="assets1/plugins/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
<!-- END LayerSlider -->

<script type="text/javascript" src="assets1/scripts/app.js"></script>
<script type="text/javascript" src="assets1/scripts/index.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initBxSlider();
        Index.initLayerSlider();
        App.initImageZoom();
        App.initTouchspin();
    });
</script>
<!-- END PAGE LEVEL JAVASCRIPTS -->

{{--ajax滚动加载首页商品--}}
<script type="text/javascript">
    $(function(){
        var winH = $(window).height(); //页面可视区域高度
        var catId = [1, 4, 5, 6, 8]; // 首页加载的商品类别id
        var index = 1;//catId数组索引
        $(window).scroll(function () {
            var pageH = $(document.body).height(); //页面总高度
            var scrollT = $(document).scrollTop(); //滚动条top
            var aa = (pageH-winH-scrollT)/winH;
            if(aa<0.01 && index<catId.length){
                $.getJSON("{{ url('ajaxGet') }}", {catId: catId[index]}, function(json){

                    if(json){

                        $(".nodata").show().html("<img src='{{asset('assets/home/img/load.gif')}}'/>");

                        var str = "";
                        str += '<div class="row margin-bottom-40">';
                        str += '<div class="col-md-12 sale-product">';
                        str += '<h2>New Arrivals</h2>';
                        str += '<div class="bxslider-wrapper">';
                        str += '<ul class="bxslider" data-slides-phone="1" data-slides-tablet="2" data-slides-desktop="5" data-slide-margin="15">';
                        $.each(json, function(key, val){

                            str += '<li>';
                            str += '<div class="product-item">';
                            str += '<div class="pi-img-wrapper">';
                            str += '<img src="assets1/temp/products/model1.jpg"  class="img-responsive" alt="Berry Lace Dress">';
                            str += '<div>';
                            str += '<a href="assets1/temp/products/model1.jpg" class="btn btn-default fancybox-button">Zoom</a>';
                            str += '<a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>';
                            str += '</div>';
                            str += '</div>';
                            str += '<h3><a href="item.html">'+val['goods_name']+'</a></h3>';
                            str += '<div class="pi-price">￥'+val['price']+'</div>';
                            str += '<a href="#" class="btn btn-default add2cart">加入购物车</a>';
//                            str += '<div class="sticker sticker-sale"></div>';
                            str += '</div>';
                            str += '</li>';

                        });

                         str += '</ul>';
                         str += '</div>';
                         str += '</div>';
                         str += '</div>';

                        $(".nodata").before(str);
                        index++;
                        if(index >= catId.length){
                            $(".nodata").show().html("别滚动了，已经到底了。。。");
                            setTimeout(function() {
                                $(".nodata").hide();
                            }, 3000);
                            return false;
                        }



                    }else{
                        return false;
                    }

                    
                });


            }
        });
    });
</script>
<script>


    $.extend({
        includePath: '',
        include: function(file) {
            var files = typeof file == "string" ? [file]:file;
            for (var i = 0; i < files.length; i++) {
                var name = files[i].replace(/^\s|\s$/g, "");
                var att = name.split('.');
                var ext = att[att.length - 1].toLowerCase();
                var isCSS = ext == "css";
                var tag = isCSS ? "link" : "script";
                var attr = isCSS ? " type='text/css' rel='stylesheet' " : " language='javascript' type='text/javascript' ";
                var link = (isCSS ? "href" : "src") + "='" + $.includePath + name + "'";
                if ($(tag + "[" + link + "]").length == 0) document.write("<" + tag + attr + link + "></" + tag + ">");
            }
        }
    });

    //使用方法
    $.includePath = 'http://localhost/laravel-pjax/public/assets1/plugins/jQuery-slimScroll/';
    $.include(['jquery.slimscroll.min.js']);

    $.includePath = 'http://localhost/laravel-pjax/public/assets1/plugins/bxslider/';
    $.include(['jquery.bxslider.min.js']);

    $.includePath = 'http://localhost/laravel-pjax/public/assets1/plugins/zoom/';
    $.include(['jquery.zoom.min.js']);

    $.includePath = 'http://localhost/laravel-pjax/public/assets1/plugins/bootstrap/css/';
    $.include(['bootstrap.css']);
</script>
</body>
<!-- END BODY -->
</html>
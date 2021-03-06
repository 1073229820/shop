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
    <title>Login | Metronic Shop UI</title>

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
    <link href="assets/home/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/home/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
    <link href="assets/home/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
    <link href="assets/home/plugins/bxslider/jquery.bxslider.css" rel="stylesheet">
    <link href="assets/home/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- Page level plugin styles END -->

    <!-- Theme styles START -->
    <link href="assets/home/css/style-metronic.css" rel="stylesheet" type="text/css">
    <link href="assets/home/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/home/css/style-responsive.css" rel="stylesheet" type="text/css">
    <link href="assets/home/css/custom.css" rel="stylesheet" type="text/css">
    <!-- Theme styles END -->
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
                                <a href="javascript:void(0);">French</a>
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
                    <li><a href="checkout.blade.php">Checkout</a></li>
                    <li><a href="{{url('ulogin')}}">Log In</a></li>
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
            <a href="index.html" class="navbar-brand"><img src="assets/home/img/logo_red.png" alt="Metronic Shop UI"></a><!-- LOGO -->
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
                            <a href="item.html"><img src="assets/home/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="assets/home/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="assets/home/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="assets/home/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="assets/home/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="assets/home/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="assets/home/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="assets/home/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                    </ul>
                    <div class="text-right">
                        <a href="shopping-cart.html" class="btn btn-default">View Cart</a>
                        <a href="checkout.blade.php" class="btn btn-primary">Checkout</a>
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
                                        <li><a href="product-list.html"><img title="esprit" alt="esprit" src="assets/home/temp/brands/esprit.jpg"></a></li>
                                        <li><a href="product-list.html"><img title="gap" alt="gap" src="assets/home/temp/brands/gap.jpg"></a></li>
                                        <li><a href="product-list.html"><img title="next" alt="next" src="assets/home/temp/brands/next.jpg"></a></li>
                                        <li><a href="product-list.html"><img title="puma" alt="puma" src="assets/home/temp/brands/puma.jpg"></a></li>
                                        <li><a href="product-list.html"><img title="zara" alt="zara" src="assets/home/temp/brands/zara.jpg"></a></li>
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
                                        <a href="item.html"><img src="assets/home/temp/products/model4.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                                    </div>
                                    <h3><a href="item.html">Berry Lace Dress</a></h3>
                                    <div class="pi-price">$29.00</div>
                                    <a href="#" class="btn btn-default add2cart">Add to cart</a>
                                </div>
                                <div class="product-item">
                                    <div class="pi-img-wrapper">
                                        <a href="item.html"><img src="assets/home/temp/products/model3.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
                                    </div>
                                    <h3><a href="item.html">Berry Lace Dress</a></h3>
                                    <div class="pi-price">$29.00</div>
                                    <a href="#" class="btn btn-default add2cart">Add to cart</a>
                                </div>
                                <div class="product-item">
                                    <div class="pi-img-wrapper">
                                        <a href="item.html"><img src="assets/home/temp/products/model7.jpg" class="img-responsive" alt="Berry Lace Dress"></a>
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
                <li class="dropdown active">
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
                        <li><a href="checkout.blade.php">Checkout</a></li>
                        <li><a href="reg-page.html">Registration Page</a></li>
                        <li class="active"><a href="login-page.html">Login Page</a></li>
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

<div class="main">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">Login</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-3">
                <ul class="list-group margin-bottom-25 sidebar-menu">
                    <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Login/Register</a></li>
                    <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Restore Password</a></li>
                    <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> My account</a></li>
                    <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Address book</a></li>
                    <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Wish list</a></li>
                    <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Returns</a></li>
                    <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Newsletter</a></li>
                </ul>
            </div>
            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-9">

                <div class="content-form-page">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                           <h1>密码找回邮件邮件发送，请到邮箱收件箱激活密码找回邮件！！</h1>
                        </div>
                        <div class="col-md-4 col-sm-4 pull-right">
                            <div class="form-info">
                                <h2><em>Important</em> Information</h2>
                                <p>Duis autem vel eum iriure at dolor vulputate velit esse vel molestie at dolore.</p>

                                <button type="button" class="btn btn-default">More details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>

<!-- BEGIN BRANDS -->
<div class="brands">
    <div class="container">
        <div class="row">
            <div class="bxslider-wrapper">
                <ul class="bxslider" data-slides-phone="1" data-slides-tablet="3" data-slides-desktop="6" data-slide-margin="15">
                    <li><a href="#"><img src="assets/home/temp/brands/canon.jpg" alt="canon" title="canon"></a></li>
                    <li><a href="#"><img src="assets/home/temp/brands/esprit.jpg" alt="esprit" title="esprit"></a></li>
                    <li><a href="#"><img src="assets/home/temp/brands/gap.jpg" alt="gap" title="gap"></a></li>
                    <li><a href="#"><img src="assets/home/temp/brands/next.jpg" alt="next" title="next"></a></li>
                    <li><a href="#"><img src="assets/home/temp/brands/puma.jpg" alt="puma" title="puma"></a></li>
                    <li><a href="#"><img src="assets/home/temp/brands/zara.jpg" alt="zara" title="zara"></a></li>
                    <li><a href="#"><img src="assets/home/temp/brands/canon.jpg" alt="canon" title="canon"></a></li>
                    <li><a href="#"><img src="assets/home/temp/brands/esprit.jpg" alt="esprit" title="esprit"></a></li>
                    <li><a href="#"><img src="assets/home/temp/brands/gap.jpg" alt="gap" title="gap"></a></li>
                    <li><a href="#"><img src="assets/home/temp/brands/next.jpg" alt="next" title="next"></a></li>
                    <li><a href="#"><img src="assets/home/temp/brands/puma.jpg" alt="puma" title="puma"></a></li>
                    <li><a href="#"><img src="assets/home/temp/brands/zara.jpg" alt="zara" title="zara"></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END BRANDS -->

<!-- BEGIN STEPS -->
<div class="steps3 steps3red">
    <div class="container">
        <div class="row">
            <div class="col-md-4 steps3-col">
                <i class="fa fa-truck"></i>
                <div>
                    <h2>Free shipping</h2>
                    <em>Express delivery withing 3 days</em>
                </div>
                <span>&nbsp;</span>
            </div>
            <div class="col-md-4 steps3-col">
                <i class="fa fa-gift"></i>
                <div>
                    <h2>Daily Gifts</h2>
                    <em>3 Gifts daily for lucky customers</em>
                </div>
                <span>&nbsp;</span>
            </div>
            <div class="col-md-4 steps3-col">
                <i class="fa fa-phone"></i>
                <div>
                    <h2>477 505 8877</h2>
                    <em>24/7 customer care available</em>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END STEPS -->

<!-- BEGIN PRE-FOOTER -->
<div class="pre-footer">
    <div class="container">
        <div class="row">
            <!-- BEGIN BOTTOM ABOUT BLOCK -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>About us</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip  commodo consequat. </p>
                <p>Duis autem vel eum iriure dolor vulputate velit esse molestie at dolore.</p>
            </div>
            <!-- END BOTTOM ABOUT BLOCK -->
            <!-- BEGIN BOTTOM INFO BLOCK -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>Information</h2>
                <ul class="list-unstyled">
                    <li><i class="fa fa-angle-right"></i> <a href="#">Delivery Information</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Customer Service</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Order Tracking</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Shipping & Returns</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="contacts.html">Contact Us</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Careers</a></li>
                    <li><i class="fa fa-angle-right"></i> <a href="#">Payment Methods</a></li>
                </ul>
            </div>
            <!-- END INFO BLOCK -->
            <!-- BEGIN TWITTER BLOCK -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>Latest Tweets</h2>
                <dl class="dl-horizontal f-twitter">
                    <dt><i class="fa fa-twitter"></i></dt>
                    <dd>
                        <a href="#">@keenthemes</a>
                        Imperdiet condimentum diam dolor lorem sit consectetur adipiscing
                        <span>3 min ago</span>
                    </dd>
                </dl>
                <dl class="dl-horizontal f-twitter">
                    <dt><i class="fa fa-twitter"></i></dt>
                    <dd>
                        <a href="#">@keenthemes</a>
                        Imperdiet condimentum diam dolor lorem sit consectetur adipiscing
                        <span>3 min ago</span>
                    </dd>
                </dl>
                <dl class="dl-horizontal f-twitter">
                    <dt><i class="fa fa-twitter"></i></dt>
                    <dd>
                        <a href="#">@keenthemes</a>
                        Imperdiet condimentum diam dolor lorem sit consectetur adipiscing
                        <span>3 min ago</span>
                    </dd>
                </dl>
            </div>
            <!-- END TWITTER BLOCK -->
            <!-- BEGIN BOTTOM CONTACTS -->
            <div class="col-md-3 col-sm-6 pre-footer-col">
                <h2>Our Contacts</h2>
                <address class="margin-bottom-40">
                    35, Lorem Lis Street, Park Ave<br>
                    California, US<br>
                    Phone: 300 323 3456<br>
                    Fax: 300 323 1456<br>
                    Email: <a href="mailto:info@metronic.com">info@metronic.com</a><br>
                    Skype: <a href="skype:metronic">metronic</a>
                </address>
            </div>
            <!-- END BOTTOM CONTACTS -->
        </div>
        <hr>
        <div class="row">
            <!-- BEGIN SOCIAL ICONS -->
            <div class="col-md-6 col-sm-6">
                <ul class="social-icons">
                    <li><a class="rss" data-original-title="rss" href="#"></a></li>
                    <li><a class="facebook" data-original-title="facebook" href="#"></a></li>
                    <li><a class="twitter" data-original-title="twitter" href="#"></a></li>
                    <li><a class="googleplus" data-original-title="googleplus" href="#"></a></li>
                    <li><a class="linkedin" data-original-title="linkedin" href="#"></a></li>
                    <li><a class="youtube" data-original-title="youtube" href="#"></a></li>
                    <li><a class="vimeo" data-original-title="vimeo" href="#"></a></li>
                    <li><a class="skype" data-original-title="skype" href="#"></a></li>
                </ul>
            </div>
            <!-- END SOCIAL ICONS -->
            <!-- BEGIN NEWLETTER -->
            <div class="col-md-6 col-sm-6">
                <div class="pre-footer-subscribe-box pull-right">
                    <h2>Newsletter</h2>
                    <form action="#">
                        <div class="input-group">
                            <input type="text" placeholder="youremail@mail.com" class="form-control">
                            <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                  </span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END NEWLETTER -->
        </div>
    </div>
</div>
<!-- END PRE-FOOTER -->

<!-- BEGIN FOOTER -->
<div class="footer padding-top-15">
    <div class="container">
        <div class="row">
            <!-- BEGIN COPYRIGHT -->
            <div class="col-md-6 col-sm-6 padding-top-10">
                2014 © Metronic Shop UI. ALL Rights Reserved.
            </div>
            <!-- END COPYRIGHT -->
            <!-- BEGIN PAYMENTS -->
            <div class="col-md-6 col-sm-6">
                <ul class="list-unstyled list-inline pull-right margin-bottom-15">
                    <li><img src="assets/home/img/payments/western-union.jpg" alt="We accept Western Union" title="We accept Western Union"></li>
                    <li><img src="assets/home/img/payments/american-express.jpg" alt="We accept American Express" title="We accept American Express"></li>
                    <li><img src="assets/home/img/payments/MasterCard.jpg" alt="We accept MasterCard" title="We accept MasterCard"></li>
                    <li><img src="assets/home/img/payments/PayPal.jpg" alt="We accept PayPal" title="We accept PayPal"></li>
                    <li><img src="assets/home/img/payments/visa.jpg" alt="We accept Visa" title="We accept Visa"></li>
                </ul>
            </div>
            <!-- END PAYMENTS -->
        </div>
    </div>
</div>
<!-- END FOOTER -->

<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
<script src="assets/home/plugins/respond.min.js"></script>
<![endif]-->
<script src="assets/home/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/home/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="assets/home/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/home/plugins/back-to-top.js"></script>
<script type="text/javascript" src="assets/home/plugins/jQuery-slimScroll/jquery.slimscroll.min.js"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script type="text/javascript" src="assets/home/plugins/fancybox/source/jquery.fancybox.pack.js"></script><!-- pop up -->
<script type="text/javascript" src="assets/home/plugins/bxslider/jquery.bxslider.min.js"></script><!-- slider for products -->
<script src="assets/home/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>

<script type="text/javascript" src="assets/home/scripts/app.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initUniform();
        App.initBxSlider();
    });
</script>
<!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
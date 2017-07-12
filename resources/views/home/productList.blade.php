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
  <title>Men category | Metronic Shop UI</title>

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
  <link href="/assets/home/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="/assets/home/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="/assets/home/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">              
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"><!-- for slider-range -->
  <link href="/assets/home/plugins/bxslider/jquery.bxslider.css" rel="stylesheet">
  <link href="/assets/home/plugins/rateit/src/rateit.css" rel="stylesheet" type="text/css">
  <link href="/assets/home/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="/assets/home/css/style-metronic.css" rel="stylesheet" type="text/css">
  <link href="/assets/home/css/style.css" rel="stylesheet" type="text/css">
  <link href="/assets/home/css/style-responsive.css" rel="stylesheet" type="text/css">  
  <link href="/assets/home/css/custom.css" rel="stylesheet" type="text/css">
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body>
    @include('/home/head')

    <div class="title-wrapper">
      <div class="container"><div class="container-inner">
        <h1><span>MEN</span> CATEGORY</h1>
        <em>Over 4000 Items are available here</em>
      </div></div>
    </div>

    <div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">Men category</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-5">
              <ul class="list-group margin-bottom-25 sidebar-menu">
                  <li class="list-group-item clearfix"><a href="product-list.html"><i class="fa fa-angle-right"></i> 全部商品</a></li>
                  @foreach($type as $one)
                      @if($one['pid'] == 0)
                          <li class="list-group-item clearfix dropdown">
                              <a href="javascript:void(0);">
                                  <i class="fa fa-angle-right"></i>
                                  {{$one['name']}}
                                  <i class="fa fa-angle-down"></i>
                              </a>
                              @foreach($type as $two)
                                  @if($two['pid'] == $one['id'])
                                      <ul class="dropdown-menu">
                                          <li class="list-group-item dropdown clearfix">
                                              <a href="javascript:void(0);">
                                                  <i class="fa fa-circle"></i>
                                                  {{$two['name']}}
                                                  <i class="fa fa-angle-down"></i>
                                              </a>
                                              @foreach($type as $three)
                                                  @if($three['pid'] == $two['id'])
                                                      <ul class="dropdown-menu">
                                                          <li class="list-group-item dropdown clearfix">
                                                              <a href="{{asset('/productlist?type='.$three['id'])}}">
                                                                  <i class="fa fa-circle"></i>
                                                                  {{$three['name']}}
                                                              </a>
                                                          </li>
                                                      </ul>
                                                  @endif
                                              @endforeach
                                          </li>
                                      </ul>
                                  @endif
                              @endforeach
                          </li>
                      @endif
                  @endforeach
              </ul>



          </div>
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">

            <div class="row list-view-sorting clearfix">
              <div class="col-md-2 col-sm-2 list-view">
                <a href="#"><i class="fa fa-th-large"></i></a>
                <a href="#"><i class="fa fa-th-list"></i></a>
              </div>
              <div class="col-md-10 col-sm-10">
                <div class="pull-right">
                  <label class="control-label">排序方式:</label>
                  <select class="form-control input-sm" name="ordername">
                    <option value="created_at,asc">时间:新->旧</option>
                    <option value="created_at,desc" >时间:旧->新</option>
                    <option value="price,asc" >价格：低->高</option>
                    <option value="price,desc" >价格：高->低</option>
                    <option value="num,asc" >销售量：低->高</option>                    
                    <option value="num,desc" >销售量：高->低</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- BEGIN 商品列表 -->
            <div class="row product-list">
              @foreach($goods as $v)
              <!-- PRODUCT ITEM START -->
              <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="{{$v->image}}" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="{{$v->image}}" class="btn btn-default fancybox-button">Zoom</a>
                        <a href="{{asset('/item/'.$v->id)}}" class="btn btn-default fancybox-fast-view">View</a>
                      </div>
                    </div>
                    <h3><a href="{{asset('/item/'.$v->id)}}">{{$v->name}}</a></h3>
                    <div class="pi-price">${{$v->price}}</div>
                    <a href="#" class="btn btn-default add2cart">加入购物车</a>
                  </div>
              </div>
              <!-- 商品列表 END -->
              @endforeach
            </div>
            <!-- END PRODUCT LIST -->
            <!-- 分页 -->
            <div class="row">
             <div class="col-sm-6">
                 <div class="dataTables_info" id="sample-table-2_info">共 {{$goods->total()}} 件商品</div>
             </div>
             <div class="col-sm-6" >
                 <div class="dataTables_paginate paging_bootstrap" style="float: right;">
                     {{$goods->links()}}
                 </div>
             </div> 
            </div>
            <!-- END 分页 -->
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
              <li><a href="#"><img src="/assets/home/temp/brands/canon.jpg" alt="canon" title="canon"></a></li>
              <li><a href="#"><img src="/assets/home/temp/brands/esprit.jpg" alt="esprit" title="esprit"></a></li>
              <li><a href="#"><img src="/assets/home/temp/brands/gap.jpg" alt="gap" title="gap"></a></li>
              <li><a href="#"><img src="/assets/home/temp/brands/next.jpg" alt="next" title="next"></a></li>
              <li><a href="#"><img src="/assets/home/temp/brands/puma.jpg" alt="puma" title="puma"></a></li>
              <li><a href="#"><img src="/assets/home/temp/brands/zara.jpg" alt="zara" title="zara"></a></li>
              <li><a href="#"><img src="/assets/home/temp/brands/canon.jpg" alt="canon" title="canon"></a></li>
              <li><a href="#"><img src="/assets/home/temp/brands/esprit.jpg" alt="esprit" title="esprit"></a></li>
              <li><a href="#"><img src="/assets/home/temp/brands/gap.jpg" alt="gap" title="gap"></a></li>
              <li><a href="#"><img src="/assets/home/temp/brands/next.jpg" alt="next" title="next"></a></li>
              <li><a href="#"><img src="/assets/home/temp/brands/puma.jpg" alt="puma" title="puma"></a></li>
              <li><a href="#"><img src="/assets/home/temp/brands/zara.jpg" alt="zara" title="zara"></a></li>
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
              <li><img src="/assets/home/img/payments/western-union.jpg" alt="We accept Western Union" title="We accept Western Union"></li>
              <li><img src="/assets/home/img/payments/american-express.jpg" alt="We accept American Express" title="We accept American Express"></li>
              <li><img src="/assets/home/img/payments/MasterCard.jpg" alt="We accept MasterCard" title="We accept MasterCard"></li>
              <li><img src="/assets/home/img/payments/PayPal.jpg" alt="We accept PayPal" title="We accept PayPal"></li>
              <li><img src="/assets/home/img/payments/visa.jpg" alt="We accept Visa" title="We accept Visa"></li>
            </ul>
          </div>
          <!-- END PAYMENTS -->
        </div>
      </div>
    </div>
    <!-- END FOOTER -->

    <!-- BEGIN fast view of a product -->
    <div id="product-pop-up" style="display: none; width: 700px;">
            <div class="product-page product-pop-up">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                  <div class="product-main-image">
                    <img src="/assets/home/temp/products/model7.jpg" alt="Cool green dress with red bell" class="img-responsive">
                  </div>
                  <div class="product-other-images">
                    <a href="#" class="active"><img alt="Berry Lace Dress" src="/assets/home/temp/products/model3.jpg"></a>
                    <a href="#"><img alt="Berry Lace Dress" src="/assets/home/temp/products/model4.jpg"></a>
                    <a href="#"><img alt="Berry Lace Dress" src="/assets/home/temp/products/model5.jpg"></a>
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
                    <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat </p>
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
    <!-- BEGIN CORE PLUGINS(REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="/assets/home/plugins/respond.min.js"></script>  
    <![endif]-->  
    <script src="/assets/home/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="/assets/home/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="/assets/home/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script type="text/javascript" src="/assets/home/plugins/back-to-top.js"></script>   
    <script type="text/javascript" src="/assets/home/plugins/jQuery-slimScroll/jquery.slimscroll.min.js"></script> 
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS(REQUIRED ONLY FOR CURRENT PAGE) -->
    <script type="text/javascript" src="/assets/home/plugins/fancybox/source/jquery.fancybox.pack.js"></script>  
    <script type="text/javascript" src="/assets/home/plugins/bxslider/jquery.bxslider.min.js"></script><!-- slider for products -->
    <script src="/assets/home/plugins/rateit/src/jquery.rateit.js" type="text/javascript"></script>
    <script type="text/javascript" src='/assets/home/plugins/zoom/jquery.zoom.min.js'></script><!-- product zoom -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script><!-- for slider-range -->
    <script src="/assets/home/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
    <script src="/assets/home/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->
    <script type="text/javascript" src="/assets/home/scripts/app.js"></script>
    <script type="text/javascript">

      $('select').change( function () {
        var arr= $(this).val().split(',');
        var ordername = arr[0];
        var order = arr[1];
        console.log(order+'+'+ordername);
        location.href="{{asset('/productlist')}}"+'?order='+order+'&ordername='+ordername;

      })




      jQuery(document).ready(function() {
        App.init();
        App.initBxSlider(); 
        App.initImageZoom();
        App.initSliderRange();
        App.initUniform(); 
        App.initTouchspin();
      });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
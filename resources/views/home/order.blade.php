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
  <title>Create new account | Metronic Shop UI</title>

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
  <link href="/assets/home/plugins/bxslider/jquery.bxslider.css" rel="stylesheet">
  <link href="/assets/home/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
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

<div class="main">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="index.html">Home</a></li>
      <li><a href="">Store</a></li>
      <li class="active">Create new account</li>
    </ul>
    <!-- BEGIN SIDEBAR & CONTENT -->
    <div class="row margin-bottom-40">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar col-md-3 col-sm-3">
        <ul class="list-group margin-bottom-25 sidebar-menu">
          <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Login/Register</a></li>
          <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Restore Password</a></li>
          <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> My account</a></li>
          <li class="list-group-item clearfix"><a href="/histtory/orders"><i class="fa fa-angle-right"></i> 历史订单</a></li>
          <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Wish list</a></li>
          <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Returns</a></li>
          <li class="list-group-item clearfix"><a href="#"><i class="fa fa-angle-right"></i> Newsletter</a></li>
        </ul>
      </div>
      <!-- END SIDEBAR -->

      <!-- BEGIN CONTENT -->
      <div class="col-md-9 col-sm-9">
        <h1>Create an account</h1>
        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @if(is_object($errors))
                @foreach($errors->all() as $error)
                  <p>{{$error}}</p>
                @endforeach
              @else
                <p>{{$errors}}</p>
              @endif
            </ul>
          </div>
        @endif
        <div class="content-form-page">
          <div class="row">
            <div class="col-md-7 col-sm-7">
              <form class="form-horizontal" role="form" action="{{url('newinfo')}}" method="post">
                <input type="hidden" name="id" value="{{$user->id}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <fieldset>
                  <legend>Your personal details</legend>
                  <div class="form-group">
                    <label for="user_name" class="col-lg-4 control-label">用户名： <span class="require">*</span></label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="firstname" name="user_name" value="{{$user->user_name}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class="col-lg-4 control-label">真实姓名： <span class="require">*</span></label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" id="lastname" name="name" value="{{$user->name}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pass" class="col-lg-4 control-label">密码： <span class="require">*</span></label>
                    <div class="col-lg-8">

                      <input type="password" class="form-control" id="password" name="pass" value="{{$user->pass}}">

                    </div>
                  </div>

                  <div class="form-group">
                    <label  for="password" class="col-lg-4 control-label">性别：</label>
                    <div class="radio-list col-lg-8">
                      <label class="radio-inline">


                        <input type="radio" name="sex"  value="1" @if($user->sex==1)
                          checked
                               @else
                                 @endif
                          > 男
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="sex"  value="0" @if($user->sex==0)
                        checked
                        @else
                                @endif> 女

                      </label>

                    </div>
                  </div>


                </fieldset>
                <fieldset>
                  <legend>Your password</legend>

                  <div class="form-group">
                    <label for="email" class="col-lg-4 control-label">Email： <span class="require">*</span></label>
                    <div class="col-lg-8">

                      <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">

                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email" class="col-lg-4 control-label">电话： <span class="require">*</span></label>
                    <div class="col-lg-8">

                      <input type="text" class="form-control" id="email" name="phone" value="{{$user->phone}}">

                    </div>
                  </div>

                </fieldset>
                <fieldset>
                  <legend>Newsletter</legend>
                  <div class="checkbox form-group">
                    <label>
                      <div class="col-lg-4 col-sm-4">Singup for Newsletter</div>
                      <div class="col-lg-8 col-sm-8">
                        <input type="checkbox">
                      </div>
                    </label>
                  </div>
                </fieldset>
                <div class="row">
                  <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                    <button type="submit" class="btn btn-primary">Create an acoount</button>
                    <button type="button" class="btn btn-default">Cancel</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-4 col-sm-4 pull-right">
              <div class="form-info">
                <h2><em>Important</em> Information</h2>
                <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed sit nonumy nibh sed euismod ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip  commodo quat.</p>

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

<!-- Load javascripts at bottom, this will reduce page load time -->
<!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
<!--[if lt IE 9]>
<script src="/assets/home/plugins/respond.min.js"></script>
<![endif]-->
<script src="/assets/home/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="/assets/home/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="/assets/home/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/assets/home/plugins/back-to-top.js"></script>
<script type="text/javascript" src="/assets/home/plugins/jQuery-slimScroll/jquery.slimscroll.min.js"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
<script type="text/javascript" src="/assets/home/plugins/fancybox/source/jquery.fancybox.pack.js"></script><!-- pop up -->
<script type="text/javascript" src="/assets/home/plugins/bxslider/jquery.bxslider.min.js"></script><!-- slider for products -->
<script src="/assets/home/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>

<script type="text/javascript" src="/assets/home/scripts/app.js"></script>
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
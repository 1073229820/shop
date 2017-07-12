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
                    @if(empty(session('user')))
                        <li><a href="/ulogin">登录</a></li>
                    @else
                        <li><a href="{{url('order')}}">{{session('user')->user_name}}</a></li>
                    @endif
                    <li><a href="logout">退出</a></li>


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
            <a href="{{asset('/home')}}" class="navbar-brand"><img src="/assets/home/img/logo_red.png" alt="Metronic Shop UI"></a><!-- LOGO -->
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
                            <a href="item.html"><img src="/assets/home/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="/assets/home/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="/assets/home/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="/assets/home/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="/assets/home/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="/assets/home/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="/assets/home/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                            <span class="cart-content-count">x 1</span>
                            <strong><a href="item.html">Rolex Classic Watch</a></strong>
                            <em>$1230</em>
                            <a href="javascript:void(0);" class="del-goods"><i class="fa fa-times"></i></a>
                        </li>
                        <li>
                            <a href="item.html"><img src="/assets/home/temp/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
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
            <ul class="nav navbar-nav">         <!-- 这个ul是整个导航栏 -->
                @foreach($type as $one)
                    @if($one['pid'] == 0)
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="false" data-target="product-list.html" href="product-list.html">
                                {{$one['name']}}
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <!-- BEGIN DROPDOWN MENU -->
                            <ul class="dropdown-menu" aria-labelledby="mega-menu">

                                <li>
                                    <div class="nav-content">
                                        @foreach($type as $two)
                                            @if($two['pid'] == $one['id'])

                                                <div class="nav-content-col">
                                                    <h3>{{$two['name']}}</h3>
                                                    <ul>
                                                        @foreach($type as $three)
                                                            @if($three['pid'] == $two['id'])
                                                                <li><a href="{{asset('/productlist?type='.$three['id'])}}">{{$three['name']}}</a></li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <!-- BEGIN DROPDOWN MENU - BRANDS -->
                                    <div class="nav-brands">
                                        <ul>
                                            <li><a href="product-list.html"><img title="esprit" alt="esprit" src="/assets/home/temp/brands/esprit.jpg"></a></li>
                                            <li><a href="product-list.html"><img title="gap" alt="gap" src="/assets/home/temp/brands/gap.jpg"></a></li>
                                            <li><a href="product-list.html"><img title="next" alt="next" src="/assets/home/temp/brands/next.jpg"></a></li>
                                            <li><a href="product-list.html"><img title="puma" alt="puma" src="/assets/home/temp/brands/puma.jpg"></a></li>
                                            <li><a href="product-list.html"><img title="zara" alt="zara" src="/assets/home/temp/brands/zara.jpg"></a></li>
                                        </ul>
                                    </div>
                                    <!-- END DROPDOWN MENU - BRANDS -->
                                </li>
                            </ul>
                            <!-- END DROPDOWN MENU -->
                        </li>
                    @endif
                @endforeach
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="false" data-target="product-list.html" href="product-list.html">
                        新上市
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <!-- BEGIN DROPDOWN MENU -->
                    <ul class="dropdown-menu" aria-labelledby="mega-menu-catalogue">
                        <li>
                            <div class="nav-content">
                                @for($i=0;$i<3;$i++)
                                    <div class="product-item">
                                        <div class="pi-img-wrapper">
                                            <a href="{{asset('/item/'.$newgoods[$i]->id)}}"><img src="{{$newgoods[$i]->image}}"></a>
                                        </div>
                                        <h3><a href="{{asset('/item/'.$newgoods[$i]->id)}}">{{$newgoods[$i]->name}}</a></h3>
                                        <div class="pi-price">${{$newgoods[$i]->price}}</div>
                                        <a href="#" class="btn btn-default add2cart">加入购物车</a>
                                    </div>
                                @endfor

                            </div>
                        </li>
                    </ul>
                    <!-- END DROPDOWN MENU -->
                </li>

                <!-- BEGIN TOP SEARCH -->
                <li class="menu-search">
                    <span class="sep"></span>
                    <i class="fa fa-search search-btn"></i>
                    <div class="search-box">
                        <form action="{{asset('/productlist')}}" method="get">
                            <div class="input-group">
                                <input type="text" placeholder="搜索内容" class="form-control" name="search">
                                <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">搜索</button>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>首页 - 素材火 Admin</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- basic styles -->

    <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/admin/css/font-awesome.min.css')}}" />

    <!--[if IE 7]>
    <link rel="stylesheet" href="{{asset('assets/admin/css/font-awesome-ie7.min.css')}}" />
    <![endif]-->

    <!-- page specific plugin styles -->

    <!-- fonts -->

    <link rel="stylesheet" href="{{asset('assets/admin/css/ace-fonts.css')}}" />

    <!-- ace styles -->

    <link rel="stylesheet" href="{{asset('assets/admin/css/ace.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/admin/css/ace-rtl.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/admin/css/ace-skins.min.css')}}" />

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="{{asset('assets/admin/css/ace-ie.min.css')}}" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <script src="{{asset('assets/admin/js/ace-extra.min.js')}}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="{{asset('assets/admin/js/html5shiv.js')}}"></script>
    <script src="{{asset('assets/admin/js/respond.min.js')}}"></script>
    <![endif]-->


    <!--[if !IE]> -->
    <script type="text/javascript">
        window.jQuery || document.write("<script src='{{asset('assets/admin/js/jquery-2.0.3.min.js')}}'>"+"<"+"/script>");
    </script>
    <!-- <![endif]-->

    <!--[if IE]>
    <script type="text/javascript">
        window.jQuery || document.write("<script src='{{asset('assets/admin/js/jquery-1.10.2.min.js')}}'>"+"<"+"/script>");
    </script>
    <![endif]-->

</head>

<body>
@include('admin.layouts.header')<!-- /引入头文件 -->

<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>

    @include('admin.layouts.sidebar')<!-- /引入侧边栏 -->

        <div class="main-content" id="pjax-container">
            @yield('content')
        </div>

        <div class="ace-settings-container" id="ace-settings-container">
            <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                <i class="icon-cog bigger-150"></i>
            </div>

            <div class="ace-settings-box" id="ace-settings-box">
                <div>
                    <div class="pull-left">
                        <select id="skin-colorpicker" class="hide">
                            <option data-skin="default" value="#438EB9">#438EB9</option>
                            <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                            <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                            <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                        </select>
                    </div>
                    <span>&nbsp; Choose Skin</span>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
                    <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                    <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
                    <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                    <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                </div>

                <div>
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                    <label class="lbl" for="ace-settings-add-container">
                        Inside
                        <b>.container</b>
                    </label>
                </div>
            </div>
        </div><!-- /#ace-settings-container -->
    </div><!-- /.main-container-inner -->

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="icon-double-angle-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='{{asset('assets/admin/js/jquery.mobile.custom.min.js')}}'>"+"<"+"/script>");
</script>
<script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/js/typeahead-bs2.min.js')}}"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="{{asset('assets/admin/js/excanvas.min.js')}}"></script>
<![endif]-->

<script src="{{asset('assets/admin/js/jquery-ui-1.10.3.custom.min.js')}}"></script>
<script src="{{asset('assets/admin/js/jquery.ui.touch-punch.min.js')}}"></script>
<script src="{{asset('assets/admin/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/admin/js/jquery.easy-pie-chart.min.js')}}"></script>
<script src="{{asset('assets/admin/js/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/admin/js/flot/jquery.flot.min.js')}}"></script>
<script src="{{asset('assets/admin/js/flot/jquery.flot.pie.min.js')}}"></script>
<script src="{{asset('assets/admin/js/flot/jquery.flot.resize.min.js')}}"></script>
<script type="text/javascript" src="{{url('/layer/layer.js')}}"></script>

<!-- ace scripts -->

<script src="{{asset('assets/admin/js/ace-elements.min.js')}}"></script>
<script src="{{asset('assets/admin/js/ace.min.js')}}"></script>

<!-- inline scripts related to this page -->

<script src="{{asset('assets/admin/js/jquery.pjax.js')}}"></script>
<script>

//     $.pjax.defaults.timeout = 8000;
//    $(document).pjax('a:not(a[target="_blank"])', {
//        container: '#pjax-content'
//    });


    $(document).pjax('a', '#pjax-container');
    $(document).on("pjax:timeout", function(event) {
        // 阻止超时导致链接跳转事件发生
        event.preventDefault()
    });


</script>





<script src="{{asset('assets/admin/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/js/jquery.dataTables.bootstrap.js')}}"></script>

</body>
</html>

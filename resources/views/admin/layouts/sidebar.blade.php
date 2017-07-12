<div class="sidebar" id="sidebar">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="icon-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="icon-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="icon-group"></i>
            </button>

            <button class="btn btn-danger">
                <i class="icon-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- #sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="active">
            <a href="index.html">
                <i class="icon-dashboard"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-list"></i>
                <span class="menu-text"> 商品管理 </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li>
                    <a href="{{url('admin/goods')}}">
                        <i class="icon-double-angle-right"></i>
                        浏览商品
                    </a>
                </li>

                <li>
                    <a href="{{url('admin/goods/create')}}">
                        <i class="icon-double-angle-right"></i>
                        添加商品
                    </a>
                </li>
                
                <li>
                    <a href="{{url('admin/attribute')}}">
                        <i class="icon-double-angle-right"></i>
                        商品属性
                    </a>
                </li>

            </ul>
        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-list"></i>
                <span class="menu-text"> 分类管理 </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li>
                    <a href="{{url('admin/goodstype')}}">
                        <i class="icon-double-angle-right"></i>
                        浏览分类
                    </a>
                </li>

                <li>
                    <a href="{{url('admin/goodstype/create')}}">
                        <i class="icon-double-angle-right"></i>
                        添加分类
                    </a>
                </li>
            </ul>
        </li>


        @if (session('adminname'))
            {{--@if (session('adminname')->ability(array('admin', 'administrator'), array('admin_create', 'admin_edit', 'admin_delete')))--}}
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-list"></i>
                        <span class="menu-text"> 管理员 </span>
                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li>
                            <a href="{{url('/admin/admins')}}">
                                <i class="icon-double-angle-right"></i>
                                管理员列表
                            </a>
                        </li>

                        <li>
                            <a href="{{url('admin/admins/create')}}">
                                <i class="icon-double-angle-right"></i>
                                添加管理员
                            </a>
                        </li>
                    </ul>
                </li>
            {{--@endif--}}
        @endif
        @if (session('adminname'))
           {{--@if (session('adminname')->ability(array('admin', 'roles'), array('role_create', 'role_edit', 'role_delete')))--}}
{{--            @if (session('adminname')->hasRole(['admin', 'roles']))--}}
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-list"></i>
                        <span class="menu-text"> 角色管理 </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li>
                            <a href="{{url('/admin/roles')}}">
                                <i class="icon-double-angle-right"></i>
                                角色列表
                            </a>
                        </li>

                        <li>
                            <a href="{{url('admin/roles/create')}}">
                                <i class="icon-double-angle-right"></i>
                                添加角色
                            </a>
                        </li>
                    </ul>
                </li>
            {{--@endif--}}
        @endif

        @if (session('adminname'))
            {{--@if (session('adminname')->ability(array('admin', 'perms'),array('perms_create,', 'perms_edit', 'perms_delete')))--}}
                <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-list"></i>
                <span class="menu-text"> 权限管理 </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li>
                    <a href="{{url('/admin/permissions')}}">
                        <i class="icon-double-angle-right"></i>
                        权限列表
                    </a>
                </li>

                <li>
                    <a href="{{url('admin/permissions/create')}}">
                        <i class="icon-double-angle-right"></i>
                        添加权限
                    </a>
                </li>
            </ul>
        </li>
            {{--@endif--}}
        @endif





        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-list"></i>
                <span class="menu-text"> 订单管理 </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li>
                    <a href="{{url('admin/orders')}}">
                        <i class="icon-double-angle-right"></i>
                        浏览订单
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-edit"></i>
                <span class="menu-text"> 友情链接管理 </span>
                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li>

                    <a href="{{url('admin/link')}}">
                        <i class="icon-double-angle-right"></i>
                        友情链接列表

                    </a>
                </li>

                <li>
                    <a href="{{url('admin/link/create')}}">
                        <i class="icon-double-angle-right"></i>
                        添加友情链接
                    </a>
                </li>


            </ul>
        </li>

        <li>
            <a href="{{url('admin/userInfo')}}">
                <i class="icon-list-alt"></i>
                <span class="menu-text"> 会员管理 </span>
            </a>
        </li>






    </ul><!-- /.nav-list -->

    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
    </div>

    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        } catch (e) {
        }
    </script>
</div>
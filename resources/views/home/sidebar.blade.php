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
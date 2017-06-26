@foreach($roles as $role)
<div class="col-md-8">

        <div class="panel {{$role->name == 'admin'?'panel-success':'panel-default'}} ">

            <div class="panel-heading">
                <i class="fa fa-btn fa-user"></i>
                {{$role->display_name or $role->name}}
        </div>

            <div class="panel-body">
                <ul class="fa-ul">
                    @foreach($role->perms as $perms)
                    <li>
                        <i class="fa fa-li fa-tag"></i>
                        {{$perms->display_name}}
                    </li>
                    @endforeach
                </ul>
            </div>

            @if($role->description)
            <div class="panel-body">
                角色描述： {{$role->description}}
            </div>
            @endif

        </div>
    </div>
@endforeach



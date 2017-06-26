@extends('admin.layouts.app')

@section('content')
    <h3>编辑角色</h3>
    <form action="/admin/roles/{{{$role->id}}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="_method" value="PUT">

        @if($role->name !== 'admin')
            角色名称：<input type="text" name="name" value="{{$role->name}}"><br><br>
        @endif
        显示名称：<input type="text" name="display_name" value="{{$role->display_name}}"><br><br>
        角色描述：<input type="text" name="description" value="{{$role->description}}"><br><br>

        <div>
            @foreach($perms as $perm)
                <label>
                    <input type="checkbox" name="perm[]" value="{{$perm->id}}" {{$role->hasPermission($perm->name)?'checked':''}}>{{$perm->display_name or $perm->name}}
                </label>
            @endforeach
        </div>

        <input type="submit" value="提交">
        <input type="reset" value="重置">
    </form>

@endsection
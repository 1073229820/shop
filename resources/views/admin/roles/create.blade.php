@extends('admin.layouts.app')

@section('content')
    <h3>新建角色</h3>
    <form action="/admin/roles" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        角色名称：<input type="text" name="name"><br><br>
        显示名称：<input type="text" name="display_name"><br><br>
        角色描述：<input type="text" name="description"><br><br>

        <div>
            @foreach($perms as $perm)

                <label>
                    <input type="checkbox" name="perm[]" value="{{$perm->id}}">{{$perm->display_name or $perm->name}}
                </label>
            @endforeach
        </div>

        <input type="submit" value="提交">
        <input type="reset" value="重置">
    </form>

@endsection
@extends('admin.layouts.app')

@section('content')
    <h3>新建权限</h3>
    <form action="/admin/permissions" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        权限名称：<input type="text" name="name"><br><br>
        显示名称：<input type="text" name="display_name"><br><br>
        权限描述：<input type="text" name="description"><br><br>

        <input type="submit" value="提交">
        <input type="reset" value="重置">
    </form>

@endsection
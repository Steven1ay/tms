@extends('layouts.admin')
@section('content')
    <div class="mdui-bread-crumb ">
        账号审核

    </div>
    <div class="mdui-divider" style="margin-bottom: 15px;"></div>
    <div class="mdui-table-fluid">
        <table class="mdui-table mdui-table-hoverable mdui-table-selectable">
            <thead>
            <tr>
                <th>序号</th>
                <th>昵称</th>
                <th>权限</th>
                <th>邮箱</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($list as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->auth }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td data-id="{{ $item->id }}"><button type="button" class="mdui-btn mdui-btn-raised mdui-color-theme-accent">审核</button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
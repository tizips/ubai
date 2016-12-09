@extends('layouts.admin')

@section('Style')
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="toolbar">
                        {{--Here you can write extra buttons/actions for the toolbar --}}
                    </div>

                    <table id="bootstrap-table" class="table">
                        <thead>
                        <th data-field="state" data-checkbox="true"></th>
                        <th data-field="id" class="text-center">ID</th>
                        <th data-field="title" data-sortable="true">文章标题</th>
                        <th data-field="category" data-sortable="true">栏目</th>
                        <th data-field="author" data-sortable="true">作者</th>
                        <th data-field="time" data-sortable="true">时间</th>
                        <th data-field="actions" class="td-actions text-right" data-events="operateEvents" data-formatter="operateFormatter">操作</th>
                        </thead>
                        <tbody>
                        @foreach($article as $value)
                            <tr>
                                <td></td>
                                <td>{{ $value -> id }}</td>
                                <td>{{ $value -> article_title }}</td>
                                <td>{{ $value -> cat_name }}</td>
                                <td>{{ $value -> author }}</td>
                                <td>{{ $value -> deleted_at }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right pagination">
                        {{ $article->links() }}
                    </div>
                </div><!--  end card  -->
            </div> <!-- end col-md-12 -->
        </div> <!-- end row -->

    </div>
@endsection
@section('JavaScript')
    <script type="text/javascript">

        var $table = $('#bootstrap-table');

        function operateFormatter(value, row, index) {
            return [
                '<a rel="tooltip" title="还原" class="btn btn-simple btn-info btn-icon table-action edit" href="javascript:void(0)">',
                '<i class="iconfont">&#xe6ae;</i>',
                '</a>',
                '<a rel="tooltip" title="彻底删除" class="btn btn-simple btn-danger btn-icon table-action remove" href="javascript:void(0)">',
                '<i class="iconfont">&#xe6b9;</i>',
                '</a>',
                '</div>',
            ].join('');
        }

        $().ready(function(){
            window.operateEvents = {
                'click .edit': function (e, value, row, index) {
                    swal({  title: "确定还原文章 ?",
                        text: "文章将会被移出垃圾箱，可以进行编辑操作 !",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn btn-info btn-fill",
                        confirmButtonText: "确定 !",
                        cancelButtonClass: "btn btn-danger btn-fill",
                        cancelButtonText: "取消",
                        closeOnConfirm: false,
                    },function(){
                        $.ajax({
                            url: '/admin/toRestoreArt',
                            type: 'get',
                            data: { id: row.id},
                            success: function (data) {
                                if (data['status']===1) {
                                    notify('success' , data['msg']);
                                    $table.bootstrapTable('remove', {
                                        field: 'id',
                                        values: [row.id]
                                    });
                                }else if (data['status']===0) {
                                    notify('error' , data['msg']);
                                }else {
                                    notify('error' , '服务器错误，请稍后请重试 ！');
                                }
                            },
                            error: function () {
                                notify('error' , '服务器错误，请稍后请重试 ！');
                            }
                        });
                    });
                },
                'click .remove': function (e, value, row, index) {
                    swal({  title: "确定删除 ?",
                        text: "文章将会被彻底删除，此操作不可逆 !",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn btn-info btn-fill",
                        confirmButtonText: "确定 !",
                        cancelButtonClass: "btn btn-danger btn-fill",
                        cancelButtonText: "取消",
                        closeOnConfirm: false,
                    },function(){
                        $.ajax({
                            url: '/admin/toDeleteDustbin',
                            type: 'get',
                            data: { id: row.id},
                            success: function (data) {
                                if (data['status']===1) {
                                    notify('success' , data['msg']);
                                    $table.bootstrapTable('remove', {
                                        field: 'id',
                                        values: [row.id]
                                    });
                                }else if (data['status']===0) {
                                    notify('error' , data['msg']);
                                }else {
                                    notify('error' , '服务器错误，请稍后请重试 ！');
                                }
                            },
                            error: function () {
                                notify('error' , '服务器错误，请稍后请重试 ！');
                            }
                        });
                    });
                }
            };

            $table.bootstrapTable({
                toolbar: ".toolbar",
                clickToSelect: true,
                showRefresh: true,
                search: true,
                showToggle: true,
                showColumns: true,
                pagination: true,
                searchAlign: 'left',
                pageSize: 8,
                clickToSelect: false,
                pageList: [8,10,25,50,100],

                formatShowingRows: function(pageFrom, pageTo, totalRows){
                    {{-- 在这里什么都不做，我们不想显示文本“显示X的Y从……” --}}
                },
                formatRecordsPerPage: function(pageNumber){
                    return pageNumber + " rows visible";
                },
                icons: {
                    refresh: 'fa fa-refresh',
                    toggle: 'fa fa-th-list',
                    columns: 'fa fa-columns',
                    detailOpen: 'fa fa-plus-circle',
                    detailClose: 'ti-close'
                }
            });

            {{-- 激活提示后的数据表的初始化 --}}
            $('[rel="tooltip"]').tooltip();

//            $(window).resize(function () {
//                $table.bootstrapTable('resetView');
//            });
        });

    </script>
@endsection
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
                                <th data-field="id" class="text-center">ID</th>
                                <th data-field="title">网站名称</th>
                                <th data-field="author">网址</th>
                                <th data-field="lastActionMan">最后操作人</th>
                                <th data-field="time" data-sortable="true">时间</th>
                                <th data-field="order" data-sortable="true">排序</th>
                                <th data-field="status">状态</th>
                                <th data-field="actions" class="td-actions text-right" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
                                </thead>
                                <tbody>
                                @foreach($link as $value)
                                <tr>
                                    <td>{{ $value -> id }}</td>
                                    <td>{{ $value -> web_name }}</td>
                                    <td><a href="{{ $value -> web_url }}" target="_blank">{{ $value -> web_url }}</a></td>
                                    <td>{{ $value -> operate_user_name }}</td>
                                    <td>{{ $value -> created_at }}</td>
                                    <td>
                                        <button class="btn btn-round">{{ $value -> web_order }}</button>
                                    </td>
                                    <td>
                                        <button class="btn @if($value -> web_status ==0) btn-success @else btn-warning @endif btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                @if($value->web_status==0)
                                                    <i class="fa fa-check-circle"></i>
                                                    @else
                                                    <i class="fa fa-warning"></i>
                                                @endif
                                            </span>
                                            {{ $value -> link_status_name }}
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pull-right pagination">
                                {{ $link->links() }}
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
                        '<div class="table-icons">',
                        '<a rel="tooltip" title="编辑" class="btn btn-simple btn-info btn-icon table-action view" href="/admin/editLink/'+row.id+'">',
                        '<i class="iconfont">&#xe6b0;</i>',
                        '</a>',
                        '<a rel="tooltip" title="删除" class="btn btn-simple btn-danger btn-icon table-action remove" href="/admin/delLink/'+row.id+'">',
                        '<i class="iconfont">&#xe6b9;</i>',
                        '</a>',
                        '</div>'
                    ].join('');
                }

                $().ready(function(){
//                    window.operateEvents = {
//                        'click .remove': function (e, value, row, index) {
//                            swal({  title: "确定删除 ?",
//                                text: "友情链接将会被删除，此操作不可逆 !",
//                                type: "warning",
//                                showCancelButton: true,
//                                confirmButtonClass: "btn btn-info btn-fill",
//                                confirmButtonText: "确定 !",
//                                cancelButtonClass: "btn btn-danger btn-fill",
//                                cancelButtonText: "取消",
//                                closeOnConfirm: false,
//                            },function(){
//                                $.ajax({
//                                    url: '/admin/delLink',
//                                    type: 'get',
//                                    data: { id: row.id},
//                                    success: function (data) {
//                                        if (data['status']===1) {
//                                            notify('success' , data['msg']);
//                                            $table.bootstrapTable('remove', {
//                                                field: 'id',
//                                                values: [row.id]
//                                            });
//                                        }else if (data['status']===0) {
//                                            notify('error' , data['msg']);
//                                        }else {
//                                            notify('error' , '服务器错误，请稍后请重试 ！');
//                                        }
//                                    },
//                                    error: function () {
//                                        notify('error' , '服务器错误，请稍后请重试 ！');
//                                    }
//                                });
//                            });
//                        }
//                    };

                    $table.bootstrapTable({
                        toolbar: ".toolbar",
                        showRefresh: true,
                        search: true,
                        showToggle: true,
                        showColumns: true,
//                        pagination: true,
                        searchAlign: 'left',
//                        pageSize: 8,
                        clickToSelect: false,
//                        pageList: [8,10,25,50,100],

                        formatShowingRows: function(pageFrom, pageTo, totalRows){
//                             在这里什么都不做，我们不想显示文本“显示X的Y从……”
                        },
//                        formatRecordsPerPage: function(pageNumber){
//                            return pageNumber + " rows visible";
//                        },
                        icons: {
                            refresh: 'fa fa-refresh',
                            toggle: 'fa fa-th-list',
                            columns: 'fa fa-columns',
                            detailOpen: 'fa fa-plus-circle',
                            detailClose: 'ti-close'
                        }
                    });

//                     激活提示后的数据表的初始化
                    $('[rel="tooltip"]').tooltip();

                    $(window).resize(function () {
                        $table.bootstrapTable('resetView');
                    });
                });

            </script>
@endsection
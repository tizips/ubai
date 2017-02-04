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
                                <th data-field="title" data-sortable="true">标题</th>
                                <th data-field="author" data-sortable="true">作者</th>
                                <th data-field="time">留言时间</th>
                                <th data-field="status">状态</th>
                                <th data-field="actions" class="td-actions text-right" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
                                </thead>
                                <tbody>
                                @foreach($msg as $value)
                                <tr>
                                    <td>{{ $value->comment_id }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->comment_user_name }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            隐藏
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pull-right pagination">
                                {{ $msg->links() }}
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
                        '<a rel="tooltip" title="查看详情" class="btn btn-simple btn-info btn-icon table-action view" href="javascript:void(0)">',
                        '<i class="iconfont">&#xe639;</i>',
                        '</a>',
                        '<a rel="tooltip" title="删除" class="btn btn-simple btn-danger btn-icon table-action remove" href="javascript:void(0)">',
                        '<i class="iconfont">&#xe6b9;</i>',
                        '</a>',
                        '</div>',
                    ].join('');
                }

                $().ready(function(){
                    window.operateEvents = {
                        'click .view': function (e, value, row, index) {
                            var info = JSON.stringify(row);

                            swal('You click view icon, row: ', info);
                            console.log(info);
                        },
                        'click .remove': function (e, value, row, index) {
                            console.log(row);
                            $table.bootstrapTable('remove', {
                                field: 'id',
                                values: [row.id]
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
//                             在这里什么都不做，我们不想显示文本“显示X的Y从……”
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

//                     激活提示后的数据表的初始化
                    $('[rel="tooltip"]').tooltip();

                    $(window).resize(function () {
                        $table.bootstrapTable('resetView');
                    });
                });

            </script>
@endsection
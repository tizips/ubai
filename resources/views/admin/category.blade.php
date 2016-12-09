@extends('layouts.admin')

@section('content')
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="toolbar">
                                {{--Here you can write extra buttons/actions for the toolbar --}}
                                <button class="btn" style="margin-right: 15px;">删除</button>
                            </div>

                            <table id="bootstrap-table" class="table" id="Category">
                                <thead>
                                <th data-field="state" data-checkbox="true"></th>
                                <th data-field="id" class="text-center">ID</th>
                                <th data-field="catName">栏目名称</th>
                                <th data-field="order" data-events="operateEvents">排序</th>
                                <th data-field="page">单页面</th>
                                <th data-field="status" data-events="operateEvents">状态</th>
                                <th data-field="actions" class="td-actions text-right" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
                                </thead>
                                <tbody>
                                @foreach($catInfo as $value)
                                <tr>
                                    <td></td>
                                    <td>{{ $value['id'] }}</td>
                                    <td>{{ $value['cat_title'] }}</td>
                                    <td>
                                        <button class="btn btn-round order">{{ $value['cat_order'] }}</button>
                                    </td>
                                    <td>
                                        <button class="btn @if($value['cat_page'] ==1) btn-warning @endif  btn-xs btn-round">
                                            <span class="btn-label">
                                                @if($value['cat_page']==1)<i class="fa fa-check"></i> @else <i class="fa fa-close"></i> @endif
                                            </span>
                                            @if($value['cat_page']==1)是 @else  否 @endif
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn @if($value['cat_status'] ==1) btn-danger @else btn-success @endif  btn-xs btn-fill btn-round status">
                                            <span class="btn-label">
                                                @if($value['cat_status']==1)<i class="fa fa-close"></i> @else <i class="fa fa-check"></i> @endif
                                            </span>
                                            {{ $value['cat_status_name'] }}
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div><!--  end card  -->
                    </div> <!-- end col-md-12 -->
                </div> <!-- end row -->

            </div>

@endsection
@section('JavaScript')
    <script type="text/javascript">


        function operateFormatter(value, row, index) {
            return [
                '<div class="table-icons">',
                '<a rel="tooltip" title="添加子栏目" class="btn btn-simple btn-warning btn-icon table-action view" href="/admin/addCat/'+ row.id +'">',
                '<i class="iconfont">&#xe670;</i>',
                '</a>',
                '<a rel="tooltip" title="编辑" class="btn btn-simple btn-info btn-icon table-action edit" href="/admin/editCat/'+row.id+'">',
                '<i class="iconfont">&#xe668;</i>',
                '</a>',
                '<a rel="tooltip" title="删除" class="btn btn-simple btn-danger btn-icon table-action remove" href="javascript:;">',
                '<i class="iconfont">&#xe6b9;</i>',
                '</a>',
                '</div>',
            ].join('');
        }

        $().ready(function() {

            var $table = $('#bootstrap-table');
            console.log($table);
            window.operateEvents = {
                'click .remove': function (e, value, row, index) {
                    swal({  title: "确定删除 ?",
                        text: "栏目将会被删除，此操作不可逆 !",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn btn-info btn-fill",
                        confirmButtonText: "确定 !",
                        cancelButtonClass: "btn btn-danger btn-fill",
                        cancelButtonText: "取消",
                        closeOnConfirm: false,
                    },function(){
                        $.ajax({
                            url: '/admin/delCat',
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
                'click .status': function (e, value, row, index) {
                    swal({
                        text: "是否修改栏目状态 !",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn btn-info btn-fill",
                        confirmButtonText: "确定",
                        cancelButtonClass: "btn btn-danger btn-fill",
                        cancelButtonText: "取消",
                        closeOnConfirm: false,
                    },function(){
                        $.ajax({
                            url: '/admin/editCatStatus',
                            type: 'get',
                            data: { id: row.id},
                            success: function (data) {
                                if (data['status']===1) {
                                    notify('success' , data['msg']);
                                    window.location.reload();
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
                'click .order': function (e, value, row, index) {
                    console.log(row.id);
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

            $('[rel="tooltip"]').tooltip();

//            $(window).resize(function () {
//                $table.bootstrapTable('resetView');
//            });
        });

    </script>
@endsection
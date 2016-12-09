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
                                <tr>
                                    <td>1</td>
                                    <td>Dakota Rice</td>
                                    <td>$36,738</td>
                                    <td>16:12 16.8.19</td>
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
                                <tr>
                                    <td>2</td>
                                    <td>Minerva Hooper</td>
                                    <td>$23,789</td>
                                    <td>$23,789</td>
                                    <td>Curaçao</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sage Rodriguez</td>
                                    <td>$56,142</td>
                                    <td>$56,142</td>
                                    <td>Netherlands</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Philip Chaney</td>
                                    <td>$38,735</td>
                                    <td>Korea, South</td>
                                    <td>Korea, South</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Doris Greene</td>
                                    <td>$63,542</td>
                                    <td>Malawi</td>
                                    <td>Malawi</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Mason Porter</td>
                                    <td>$78,615</td>
                                    <td>Chile</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Alden Chen</td>
                                    <td>$63,929</td>
                                    <td>Finland</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Colton Hodges</td>
                                    <td>Colton Hodges</td>
                                    <td>$93,961</td>
                                    <td>Nicaragua</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Illana Nelson</td>
                                    <td>Illana Nelson</td>
                                    <td>$56,142</td>
                                    <td>$56,142</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Nicole Lane</td>
                                    <td>Nicole Lane</td>
                                    <td>Nicole Lane</td>
                                    <td>$93,148</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>Chaim Saunders</td>
                                    <td>Chaim Saunders</td>
                                    <td>$5,502</td>
                                    <td>Romania</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Josiah Simon</td>
                                    <td>$50,265</td>
                                    <td>$50,265</td>
                                    <td>$50,265</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>Ila Poole</td>
                                    <td>Ila Poole</td>
                                    <td>Montenegro</td>
                                    <td>Pontevedra</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Shana Mejia</td>
                                    <td>Shana Mejia</td>
                                    <td>Ballarat</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>Lana Ryan</td>
                                    <td>$64,151</td>
                                    <td>$64,151</td>
                                    <td>Portobuffolè</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td>Daquan Bender</td>
                                    <td>Sao Tome and Principe</td>
                                    <td>Sao Tome and Principe</td>
                                    <td>Walhain-Saint-Paul</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>17</td>
                                    <td>Connor Wagner</td>
                                    <td>$86,537</td>
                                    <td>$86,537</td>
                                    <td>Germany</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>18</td>
                                    <td>$35,094</td>
                                    <td>Laos</td>
                                    <td>Laos</td>
                                    <td>Saint-Mard</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>19</td>
                                    <td>Winifred Ryan</td>
                                    <td>$64,436</td>
                                    <td>$64,436</td>
                                    <td>Ronciglione</td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
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

                    $(window).resize(function () {
                        $table.bootstrapTable('resetView');
                    });
                });

            </script>
@endsection
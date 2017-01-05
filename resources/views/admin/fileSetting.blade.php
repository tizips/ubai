@extends('layouts.admin')

@section('content')
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ url('admin/toFileSetting') }}" class="form-horizontal" id="firendLinkValidatioin" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header"></div>
                                <div class="content">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">是否开启七牛云存储</label>
                                        <div class="col-md-9">
                                            <label class="checkbox">
                                                <input name="isQiniu" type="checkbox" @if(old('isQiniu')) {{ old('isQiniu') ? 'checked' : '' }} @else {{ config('qiniu.isQiniu') ? 'checked' : '' }} @endif data-toggle="checkbox" value="1">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">七牛云储存空间名称</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="七牛云储存空间名称" name="bucket" value="{{ config('qiniu.bucket') }}" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">七牛云储存 SecretKey</label>
                                        <div class="col-md-9">
                                            <input type="text" name="SecretKey" value="{{ config('qiniu.SecretKey') }}" class="form-control" placeholder="七牛云储存 SecretKey">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">七牛云储存 AccessKey</label>
                                        <div class="col-md-9">
                                            <input type="text" name="AccessKey" value="{{ config('qiniu.AccessKey') }}" placeholder="七牛云储存 AccessKey" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">七牛云储存域名</label>
                                        <div class="col-md-9">
                                            <input type="text" name="domain" value="{{ config('qiniu.domain') }}" placeholder="七牛云储存域名" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"></label>
                                        <div class="col-md-9">
                                            <button type="submit" class="btn btn-info btn-fill btn-wd">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
@endsection
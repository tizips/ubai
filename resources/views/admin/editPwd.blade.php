@extends('layouts.admin')

@section('Style')
@endsection

@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="card card-wizard" id="wizardCard">
                            <form id="wizardForm" method="" action="">

                                <div class="header text-center">
                                    <p class="category">请根据提示，修改密码</p>
                                </div>

                                <div class="content">
                                    <ul class="nav">
                                        <li><a href="#tab1" data-toggle="tab">第一步</a></li>
                                        <li><a href="#tab2" data-toggle="tab">第二步</a></li>
                                        <li><a href="#tab3" data-toggle="tab">第三步</a></li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane" id="tab1">
                                            <h5 class="text-center">请填写你的邮箱及密码</h5>
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label class="control-label">邮箱</label>
                                                        <input class="form-control"
                                                               type="text"
                                                               name="email"
                                                               placeholder="ex: ***@example.com"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label class="control-label">密码<star>*</star></label>
                                                        <input class="form-control"
                                                               type="password"
                                                               name="pwd"
                                                               placeholder="请输入你的密码"
                                                        />
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="tab-pane" id="tab2">
                                            <h5 class="text-center">Please give us more details about your platform.</h5>
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label class="control-label">Your Website<star>*</star></label>
                                                        <input class="form-control"
                                                               type="text"
                                                               name="website"
                                                               url="true"
                                                               placeholder="ex: http://www.creative-tim.com"
                                                        />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-5 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label class="control-label">Framework Type</label>
                                                        <input class="form-control"
                                                               type="text"
                                                               name="framework"
                                                               placeholder="ex: http://www.creative-tim.com"
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">Language<star>*</star></label>

                                                        <!--     IMPORTANT! - the "bootstrap select picker" is not compatible with jquery.validation.js, that's why we use the "default select" inside this wizard. We will try to contact the guys who are responsibble for the "bootstrap select picker" to find a solution. Thank you for your patience.
                                                         -->

                                                        <select name="cities" class="form-control">
                                                            <option selected="" disabled="">- language -</option>
                                                            <option value="ms">Bahasa Melayu</option>
                                                            <option value="ca">Català</option>
                                                            <option value="da">Dansk</option>
                                                            <option value="de">Deutsch</option>
                                                            <option value="en">English</option>
                                                            <option value="es">Español</option>
                                                            <option value="el">Eλληνικά</option>
                                                            <option value="fr">Français</option>
                                                            <option value="it">Italiano</option>
                                                            <option value="hu">Magyar</option>
                                                            <option value="nl">Nederlands</option>
                                                            <option value="no">Norsk</option>
                                                            <option value="pl">Polski</option>
                                                            <option value="pt">Português</option>
                                                            <option value="fi">Suomi</option>
                                                            <option value="sv">Svenska</option>
                                                            <option value="tr">Türkçe</option>
                                                            <option value="is">Íslenska</option>
                                                            <option value="cs">Čeština</option>
                                                            <option value="ru">Русский</option>
                                                            <option value="th">ภาษาไทย</option>
                                                            <option value="zh">中文 (简体)</option>
                                                            <option value="zh-TW">中文 (繁體)</option>
                                                            <option value="ja">日本語</option>
                                                            <option value="ko">한국어</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-5 col-md-offset-1">
                                                    <div class="form-group">
                                                        <label class="control-label">Bootstrap Version</label>

                                                        <!--     IMPORTANT! - the "bootstrap select picker" is not compatible with jquery.validation.js, that's why we use the "default select" inside this wizard. We will try to contact the guys who are responsibble for the "bootstrap select picker" to find a solution. Thank you for your patience.
                                                         -->

                                                        <select name="cities" class="form-control">
                                                            <option selected="" disabled="">- version -</option>
                                                            <option value="1.1">Bootstrap 1.1</option>
                                                            <option value="2.0">Bootstrap 2.0</option>
                                                            <option value="3.0">Bootstrap 3.0</option>
                                                            <option value="4.0">Bootstrap 4.0(alpha)</option>
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label class="control-label">Price</label>
                                                        <input class="form-control"
                                                               type="text"
                                                               name="price"
                                                               placeholder="ex: 19.00"
                                                        />
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="tab-pane" id="tab3">
                                            <h2 class="text-center text-space">Yuhuuu! <br><small> Click on "<b>Finish</b>" to join our community</small></h2>
                                        </div>

                                    </div>
                                </div>

                                <div class="footer">
                                    <button type="button" class="btn btn-default btn-fill btn-wd btn-back pull-left">上一步</button>

                                    <button type="button" class="btn btn-info btn-fill btn-wd btn-next pull-right">下一步</button>
                                    <button type="button" class="btn btn-info btn-fill btn-wd btn-finish pull-right" onclick="onFinishWizard()">完成</button>

                                    <div class="clearfix"></div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
@endsection

@section('JavaScript')
            <script type="text/javascript">
                $().ready(function(){

//                    var $validator = $("#wizardForm").validate({
//                        rules: {
//                            email: {
//                                required: true,
//                                email: true,
//                                minlength: 5
//                            },
//                            first_name: {
//                                required: false,
//                                minlength: 5
//                            },
//                            last_name: {
//                                required: false,
//                                minlength: 5
//                            },
//                            website: {
//                                required: true,
//                                minlength: 5,
//                                url: true
//                            },
//                            framework: {
//                                required: false,
//                                minlength: 4
//                            },
//                            cities: {
//                                required: true
//                            },
//                            price:{
//                                number: true
//                            }
//                        }
//                    });



                    // 你也可以使用 nav-pills-[blue | azure | green | orange | red] 这些不同的颜色用于 wizard

                    $('#wizardCard').bootstrapWizard({
                        tabClass: 'nav nav-pills',
                        nextSelector: '.btn-next',
                        previousSelector: '.btn-back',
                        onNext: function(tab, navigation, index) {
//                            var $valid = $('#wizardForm').valid();

//                            if(!$valid) {
//                                $validator.focusInvalid();
//                                return false;
//                            }
                            var $current = index+1;

                            if ($current == 2) {
//                                return false;
                            }
                            notify('success' , $current);
                        },
                        onInit : function(tab, navigation, index){

                            //检查制表符的数量并填充整个行
                            var $total = navigation.find('li').length;
                            $width = 100/$total;

                            $display_width = $(document).width();

                            if($display_width < 600 && $total > 3){
                                $width = 50;
                            }

                            navigation.find('li').css('width',$width + '%');
                        },
                        onTabClick : function(tab, navigation, index){
                            // 禁用的可点击的标签
                            return false;
                        },
                        onTabShow: function(tab, navigation, index) {
                            var $total = navigation.find('li').length;
                            var $current = index+1;

                            var wizard = navigation.closest('.card-wizard');

                            // 如果它是最后一个选项卡，然后隐藏最后一个按钮，并显示完成，而不是
                            if($current >= $total) {
                                $(wizard).find('.btn-next').hide();
                                $(wizard).find('.btn-finish').show();
                            } else if($current == 1){
                                $(wizard).find('.btn-back').hide();
                            } else {
                                $(wizard).find('.btn-back').show();
                                $(wizard).find('.btn-next').show();
                                $(wizard).find('.btn-finish').hide();
                            }
                        }

                    });

                });

                function onFinishWizard(){
                    //在这里，你可以做一些事情，把表单到服务器通过AJAX和显示一个吞咽成功消息

                    swal("Good job!", "You clicked the finish button!", "success");
                }
            </script>
@endsection
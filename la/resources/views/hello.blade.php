<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        @include('UEditor::head');
        

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div>
<form action="/save" method="post">
<input type="text" name="title" value="">
<!-- 加载编辑器的容器 -->
<script id="container" name="content" type="text/plain">
    这里写你的初始化内容
    </script>
<input type="submit" name="submit" value="submit" />
</form>

<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.    
    });
    UE.Editor.prototype._bkGetActionUrl = UE.Editor.prototype.getActionUrl;
    UE.Editor.prototype.getActionUrl = function(action){
        if(action == 'uploadimage' || action == 'uploadscrawl' || action == 'uploadfile'){
            return '/saveImg/'+action;
        }else if (action == 'uploadvideo'){
            return '/stone/';
        }else{
            return this._bkGetActionUrl.call(this, action);
        }
    }
    </script>
    </body>
</html>

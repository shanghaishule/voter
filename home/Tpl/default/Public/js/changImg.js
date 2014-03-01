	function changImg(url, path){
        $.ajaxFileUpload({
            url: url, //上传文件的服务端
            secureuri:false,  //是否启用安全提交
            dataType: 'text',   //数据类型
            fileElementId:'pic', //表示文件域ID

            //提交成功后处理函数      html为返回值，status为执行的状态
            success: function(data,status)  
            {
            	alert(data);
            	alert(status);
            	$("#imgContainer1").append("<img src=\""+path+data +"\" style=\"width: 200px;height:auto;\" />");
            	document.getElementById('pic_url').value = data;
            	alert(document.getElementById('pic_url').value);
            },

            //提交失败处理函数
            error: function (data, status, e)
            {
                $.each(data,function(i,n){  
                    $("#imgContainer1").append("<span>图片加载失败！</span>");      
                });             
            }
        })
    }
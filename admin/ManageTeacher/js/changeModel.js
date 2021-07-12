var valid = false;

 $(document).ready(function(){
   $('#inputGroupFileAddon04').hide();
    $("#myForm").show();
    $("#myBatch").hide();
    $("#success").hide();

  const url = location.search;//获取？后面的字符串（包括？）
  let theRequest = new Object();//定义一个对象，用来存储参数

  //转为可用的json格式，以便查看参数
  //这一步也可以使用URLSearchParams实现
  if(url.indexOf('?')!=-1){
    const allPara = url.substr(1);//去掉？
    const allParas = allPara.split("&");
    for(let i = 0;i < allParas.length; i++){
      const paraArr = allParas[i].split("=");
      const name = paraArr[0];
      const attr = paraArr[1];
      theRequest[name]=attr;
    }
    //判断如type字段为batch,即批量上传后的重定向则，转到批量上传界面
    if(theRequest.type == "batch"){
      $("#myForm").hide();
      $("#myBatch").show();
    }
    //判断如flag字段为success,则提示成功，否则提示失败
    if(theRequest.flag == "success"){
      $("#success").show();
    }
    else if(theRequest.flag == "fail"){
      $("#success").show();
      $("#success").removeClass("alert-success");
      $("#success").addClass("alert-danger");
      $("#success").text("添加失败！请重新上传");
    }

    const realURL = window.location;
    const para = "?type=batch";
		window.history.pushState({},'',realURL.origin + realURL.pathname + para);//pushState将url放入地址栏中
    //window.location.replace(realURL.origin + realURL.pathname);replace会重新加载所以不使用replace
  }

    //点击批量上传，显示batch表单
    $("#batch").click(function(){
      $("#myForm").hide();
      $("#myBatch").show();
      $("#success").hide();
    });
    //点击单个上传显示single表单
    $("#single").click(function(){
      $("#myForm").show();
      $("#myBatch").hide();
      $("#success").hide();
    });

    $("#inputGroupFile04").change(function(){
      $("#success").hide();
      $('#inputGroupFileAddon04').hide();
        var fileReader = new FileReader();
        var file = $(this).prop('files')[0];
        /*if (file) {
            fileReader.readAsDataURL(file);
        } else {
            tipFn('请选择文件');
            return;
        }
        */
        //判断文件大小
        if (file.size > 2000000) {
              $("#values").text('文件大小不得超过 2 M');
              return;
        };

        //判断文件类型
        const suffix = file.name.split(".")[1];
        if(!((suffix=="xlsx")||(suffix=="xls"))){
          $("#values").text('请上传xls/xlsx文件');
          return;
        }

        //将多个文件名分开
        var fullpath = $(this).val();
        var filename = fullpath.split('\\');
        //显示上传按钮
        $('#inputGroupFileAddon04').show();
        valid = true;
    })  
  })
  function validate(){
      if(valid!=true){
        $("#values").text('请上传满足条件的文件哦');
        return false;
      }
    return true;
  }
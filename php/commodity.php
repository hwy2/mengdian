<?php
	//json头
	header("Content-type: application/json;charset=utf-8");
	//跨域
	header("Access-Control-Allow-Credentials: true");
	header("Access-Control-Allow-Origin: *");
	//CORS
	header("Access-Control-Request-Methods:GET, POST, PUT, DELETE, OPTIONS");
    header('Access-Control-Allow-Headers:x-requested-with,content-type,test-token,test-sessid');//注意头部自定义参数不要用下划线
   
    // 获取参数
    $getCommodity = $_POST['id'];

    if($getCommodity == 1){
        $listimg = array('http://img.3dcw.cn/commodity.png','http://img.3dcw.cn/commodity.png',
        'http://img.3dcw.cn/commodity.png','http://img.3dcw.cn/commodity.png',
        'http://img.3dcw.cn/commodity.png');
        $message = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/commodity.png','price'=>'9.90',
        'place'=>'郑州',"express"=>'10.00','listimg'=>$listimg, 'number'=>1);
    }else{
        $message = array("");
    }

    $arrlist = array('status'=>0,'message'=>$message); 
    exit(json_encode($arrlist));
?>
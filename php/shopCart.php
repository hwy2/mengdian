<?php
	//json头
	header("Content-type: application/json;charset=utf-8");
	//跨域
	header("Access-Control-Allow-Credentials: true");
	header("Access-Control-Allow-Origin: *");
	//CORS
	header("Access-Control-Request-Methods:GET, POST, PUT, DELETE, OPTIONS");
    header('Access-Control-Allow-Headers:x-requested-with,content-type,test-token,test-sessid');//注意头部自定义参数不要用下划线
   
    $shopCart1= array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','taste'=>'芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90',
    'number'=>3);
    $shopCart2= array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','taste'=>'芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90',
    'number'=>1);
    $shopCart3= array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','taste'=>'芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90',
    'number'=>1);

    $message = array($shopCart1,$shopCart2,$shopCart3);
    $arrlist = array('status'=>0,'message'=>$message); 
    exit(json_encode($arrlist));
?>
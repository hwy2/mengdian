<?php
   header('Content-Type:application/json; charset=utf-8'); 
   //header('Content-Type: text/html;charset=utf-8');
   header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
   header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); // 允许请求的类型
   
   $arr1 = array('url'=>'','img'=>'http://img.3dcw.cn/swipeimg1.png');
   $arr2 = array('url'=>'','img'=>'http://img.3dcw.cn/swipeimg2.png');
   $arr3 = array($arr1,$arr2); 
   $arr4 = array('status'=>0,'message'=>$arr3); 
     
   exit(json_encode($arr4));
?>
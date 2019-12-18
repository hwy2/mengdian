<?php
   header('Content-Type:application/json; charset=utf-8'); 
   //header('Content-Type: text/html;charset=utf-8');
   header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
   header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); // 允许请求的类型
   
   $arr1 = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90');
   $arr2 = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90');
   $arr3 = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90');
   $arr4 = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90');
   $arr5 = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90');
   $arr6 = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90');
   $arr7 = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90');
   $arr8 = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90');
   $arr9 = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90');
   $arr10 = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90');
   $arr11 = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90');
   $arr12 = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90');
   $arr13 = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90');
   $arr14 = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90');
   $arr15 = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90');
   $arr16 = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90');
   $arr17 = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90');
   $arr18 = array('id'=>1,'title'=>'萌一点 帝王蟹片 芝士味 90克','img'=>'http://img.3dcw.cn/chips.png','price'=>'9.90');
   $message = array($arr1,$arr2,$arr3,$arr4,$arr5,$arr6,$arr7,$arr8,$arr9,$arr10,$arr11,$arr12,$arr13,$arr14,$arr15,$arr16,$arr17,$arr18); 
   $arrlist = array('status'=>0,'message'=>$message); 
   
   exit(json_encode($arrlist));
?>
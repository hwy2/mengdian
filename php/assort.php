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
    $getClassification = $_POST['classification'];
    // $raw = file_get_contents('php://input');
    // $DataArray = json_decode($raw);
    // if (strpos($raw, '&') !== false) {
    //     $getClassification0 = explode('&', $raw);
    //     $getClassification1 = explode('=', $getClassification0[0]);
    //     $getClassification2 = explode('=', $getClassification0[1]);
    //     $getClassification = array($getClassification1[0],$getClassification1[1],$getClassification2[0],$getClassification2[1]);
    // } else {
    //     $getClassification = explode('=', $raw);
    // }
    
    $message = array('null'); 
    // 一级类目
    $primaryClassification =array('鞋靴','食品','生鲜','女装','手机','百货','内衣','饰品',
    '箱包','母婴','数码','美妆','电器','洗护','家装','运动');

    // 二级类目
    // 猜你喜欢
    $like1 = array('title'=>'马丁靴','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $like2 = array('title'=>'女士运动鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $like3 = array('title'=>'男休闲皮鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $like4 = array('title'=>'板鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $like5 = array('title'=>'瘦瘦鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $like6 = array('title'=>'男士帆布鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $like7 = array('title'=>'男士工装靴 ','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $like8 = array('title'=>'女切尔西靴','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $like9 = array('title'=>'女士雪地靴','imgUrl'=>'http://img.3dcw.cn/xie.png');

    $likeShoes = array($like1,$like2,$like3,$like4,$like5,$like6,$like7,$like8,$like9);

    // 男鞋
    $man1 = array('title'=>'男士马丁靴','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $man2 = array('title'=>'男士工装靴','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $man3 = array('title'=>'男休闲皮鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $man4 = array('title'=>'男士帆布鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $man5 = array('title'=>'男正装皮鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $man6 = array('title'=>'男士网面鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $man7 = array('title'=>'男士豆豆鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $man8 = array('title'=>'男士人字拖','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $man9 = array('title'=>'男士雨鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $man10 = array('title'=>'男沙滩凉鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $man11 = array('title'=>'男士罗马鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $man12 = array('title'=>'男士洞洞鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $manShoes = array($man1,$man2,$man3,$man4,$man5,$man6,$man7,$man8,$man9,$man10,$man11,
    $man12);

    // 女鞋
    $woman1 = array('title'=>'女士马丁靴','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $woman2 = array('title'=>'女士运动鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $woman3 = array('title'=>'女切尔西靴','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $woman4 = array('title'=>'女士雪地靴','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $woman5 = array('title'=>'女士高跟鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $woman6 = array('title'=>'女士帆布鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $woman7 = array('title'=>'女士豆豆鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $woman8 = array('title'=>'女士单鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $woman9 = array('title'=>'女士乐福鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $woman10 = array('title'=>'女士玛丽珍','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $woman11 = array('title'=>'女士奶奶鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $woman12 = array('title'=>'女士穆勒鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $woman13 = array('title'=>'女士凉鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $woman14 = array('title'=>'一字带凉鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');
    $woman15 = array('title'=>'女士雨鞋','imgUrl'=>'http://img.3dcw.cn/xie.png');

    $womanShoes = array($woman1,$woman2,$woman3,$woman4,$woman5,$woman6,$woman7,$woman8,$woman9,
    $woman10,$woman11,$woman12,$woman13,$woman14,$woman15);

    $ShoesLike = array('name'=>'猜你喜欢','category'=>$likeShoes);
    $ShoesMan = array('name'=>'男鞋','category'=>$manShoes);
    $ShoesWoman = array('name'=>'女鞋','category'=>$womanShoes);

    $shoes = array($ShoesLike,$ShoesMan,$ShoesWoman);

    // 猜你喜欢
    $likeFood1 = array('title'=>'零食','imgUrl'=>'http://img.3dcw.cn/food.png');
    $likeFood2 = array('title'=>'糕点','imgUrl'=>'http://img.3dcw.cn/food.png');
    $likeFood3 = array('title'=>'方便面','imgUrl'=>'http://img.3dcw.cn/food.png');
    $likeFood4 = array('title'=>'饼干','imgUrl'=>'http://img.3dcw.cn/food.png');
    $likeFood5 = array('title'=>'粉丝米线','imgUrl'=>'http://img.3dcw.cn/food.png');
    $likeFood6 = array('title'=>'每日坚果','imgUrl'=>'http://img.3dcw.cn/food.png');
    $likeFood7 = array('title'=>'牛肉干 ','imgUrl'=>'http://img.3dcw.cn/food.png');
    $likeFood8 = array('title'=>'酸奶','imgUrl'=>'http://img.3dcw.cn/food.png');
    $likeFood9 = array('title'=>'麦片','imgUrl'=>'http://img.3dcw.cn/food.png');

    $likeFood = array($likeFood1,$likeFood2,$likeFood3,$likeFood4,$likeFood5,$likeFood6,$likeFood7,$likeFood8,$likeFood9);

    // 零食大礼包
    $snack1 = array('title'=>'零食大礼包','imgUrl'=>'http://img.3dcw.cn/food.png');
    $snack2 = array('title'=>'伴手礼','imgUrl'=>'http://img.3dcw.cn/food.png');
    $snack3 = array('title'=>'喜糖','imgUrl'=>'http://img.3dcw.cn/food.png');
    $snack4 = array('title'=>'喜饼大礼包','imgUrl'=>'http://img.3dcw.cn/food.png');

    $SnackBox = array($snack1,$snack2,$snack3,$snack4);

    $FoodLike = array('name'=>'猜你喜欢','category'=>$likeFood);
    $FoodSnackBox = array('name'=>'礼品礼包','category'=>$SnackBox);

    $foodstuff = array($FoodLike,$FoodSnackBox);

    if ($getClassification == 'classification'){
        $message = array($primaryClassification); 
    } else if ($getClassification == 'reclassify'){
        $reclassify = $_POST['reclassify'];
        switch($reclassify){
            case '鞋靴':
                $message = array($shoes); 
                break;
            case '食品':
                $message = array($foodstuff); 
                break;
            default:
                $message = array('null'); 
                break;
        }
    } else {
        $message = array('null'); 
    }

    $arrlist = array('status'=>0,'message'=>$message,'classification'=>$getClassification); 
    exit(json_encode($arrlist));
?>
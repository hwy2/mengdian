<template>
  <div class="home">
    <!-- 顶部标签 -->
    <mt-header fixed id="header">
      <router-link to="home" slot="left">
        <mt-button>
          <img id="md" src="../assets/md.png" />
        </mt-button>
      </router-link>
      <router-link to="home" slot="right">
        <mt-button>
          <img id="message" src="../assets/message.png" />
        </mt-button>
      </router-link>
    </mt-header>
    <!-- 轮播图 -->
    <mt-swipe :auto="4000" id="swipeList">
      <mt-swipe-item v-for="(item,index) in swipeImg" :key="index">
        <img :src="item.img" />
      </mt-swipe-item>
    </mt-swipe>
    <!-- 菜单栏 -->
    <div id="menuList">
      <ul>
        <li v-for="item in menuList" :key="item.id" @click="menuitem(item.router.name)">
          <router-link :to="item.router">
            <img :src="item.imgsrc" :alt="item.title" />
            <p>{{item.title}}</p>
          </router-link>
        </li>
      </ul>
    </div>
    <!-- 广告 -->
    <div id="advertising">
      <img :src="advertise" />
    </div>
    <!-- 推荐 -->
    <div id="recommend">
      <img :src="zan" alt="推荐" />
    </div>
    <!-- 商品信息 -->
    <div id="allCommodity">
      <ul>
        <li v-for="(item,index) in allCommodity" :key="index" @click="openDialog(item.id)">
          <div class="bgc">
            <div id="commodityImg">
              <img :src="item.img" />
            </div>
            <p id="title">{{item.title}}</p>
            <p style="color:red;">￥{{item.price}}</p>
          </div>
        </li>
      </ul>
    </div>
    <dia-log @close="closeDialog" v-if="visible" :commodityId="commodityId"></dia-log>
    <!-- 我是有底线的 -->
    <div id="baseline">——— &nbsp;我是有底线的 &nbsp; ———</div>
  </div>
</template>

<script>
import { Indicator } from "mint-ui";
import imgsrc1 from "../assets/commodityCategory.png";
import imgsrc2 from "../assets/allcommodity.png";
import imgsrc3 from "../assets/allOrders.png";
import imgsrc4 from "../assets/league.png";
import advertise from "../assets/shrimpCracker.png";
import zan from "../assets/zan.png";
import DiaLog from "../components/dialog";

var menuList = [
  { id: 1, imgsrc: imgsrc1, title: "商品分类", router: { name: "assort" } },
  { id: 2, imgsrc: imgsrc2, title: "所有商品", router: { name: "" } },
  { id: 3, imgsrc: imgsrc3, title: "全部订单", router: { name: "" } },
  { id: 4, imgsrc: imgsrc4, title: "关于加盟", router: { name: "" } }
];
export default {
  name: "Home",
  data() {
    return {
      swipeImg: {},
      menuList: menuList,
      advertise: advertise,
      zan: zan,
      allCommodity: [],
      visible: false,
      commodityId: 0
    };
  },
  components: {
    DiaLog
  },
  methods: {
    getCommodityList: function() {
      this.$axios
        .get("commodityList.php")
        .then(res => {
          window.console.log(res);
          this.allCommodity = res.data.message;
        })
        .catch(err => {
          window.console.log("请求失败" + err);
        });
    },
    openDialog: function(id) {
      this.visible = true;
      this.commodityId = id;
    },
    closeDialog: function() {
      this.visible = false;
    },
    menuitem: function(item) {
      if (item == "assort") {
        this.$store.commit("setSelected", item);
      }
      window.console.log(item);
    }
  },
  created() {
    Indicator.open("加载中...");
    this.$axios
      .get("swipeImgs.php")
      .then(res => {
        this.swipeImg = res.data.message;
        this.getCommodityList();
        window.console.log("轮播图数据！" + this.swipeImg);
        Indicator.close();
      })
      .catch(error => {
        window.console.log("轮播图获取失败！/n" + error);
        Indicator.close();
      });
  }
};
</script>
<style lang='less' scoped>
* {
  margin: 0;
  padding: 0;
}
.home {
  background-color: #f3f3f3;
  height: 100%;
  overflow: auto;
}
#header {
  background-color: #e50112;
  height: 49px;
  img#md {
    height: 80%;
    padding-top: 5%;
    padding-left: 5%;
  }
  img#message {
    height: 25.5px;
    padding-top: 25%;
    padding-right: 5%;
  }
}
#swipeList {
  height: 150px;
  width: 100%;
  padding-top: 49px;
  img {
    width: 100%;
    height: 150px;
  }
}
#menuList {
  width: 100%;
  background: #fff;
  ul {
    display: flex;
    flex-wrap: wrap;
    li {
      float: left;
      list-style-type: none;
      width: 25%;
      text-align: center;
      padding: 15px 0;
      a {
        text-decoration: none;
        color: #636363;
        display: block;
        // padding-top: 25%;
        img {
          width: 50px;
          height: 50px;
          margin: 0 auto;
          display: block;
        }
        p {
          padding-top: 5px;
          font-size: 10px;
        }
      }
    }
  }
}
#advertising {
  width: 100%;
  height: 100px;
  img {
    width: 100%;
    height: 100px;
    margin-top: 13px;
  }
}
#recommend {
  width: 375px;
  height: 18px;
  margin-top: 15px;
  img {
    width: 100%;
    height: 18px;
    margin: 0 auto;
    display: block;
  }
}
#allCommodity {
  width: 100%;
  ul {
    display: flex;
    flex-wrap: wrap;
    li {
      list-style-type: none;
      background-color: #f3f3f3;
      height: 419/2px;
      width: 50%;
      padding-right: 6px;
      margin-bottom: 5px;
      box-sizing: border-box;
      .bgc {
        background-color: #fff;
        #commodityImg {
          border-bottom: #e0e0e0 2px solid;
          width: 100%;
          height: 136.5px;
          padding-top: 14.5px;
          img {
            display: block;
            margin: 0 auto;
            // transform: translateY(25px);
            height: 120px;
          }
        }
        p {
          padding-left: 9.5px;
          padding-top: 5.5px;
          font-size: 11.5px;
          color: #606060;
          line-height: 22.5px;
        }
        p:nth-child(3) {
          padding-top: 0;
        }
      }
    }
    li:nth-child(even) {
      padding-right: 0px;
    }
  }
}
#popupCommodity {
  background: #f3f3f3;
  height: 100%;
  width: 100%;
}
#baseline {
  text-align: center;
  padding-bottom: 58px;
  color: #c2bfbf;
}
</style>

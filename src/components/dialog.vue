<template>
  <transition name="fade">
    <div class="dialog-mask">
      <div class="dialog-wrapper animated fadeInUp" ref="dialogWrapper">
        <div class="dialog-container" ref="viewBox">
          <div id="back" @click="dialogClose()">
            <img src="../assets/fanhui.png" alt />
          </div>
          <div id="details">
            <img :src="detailsList.img" :alt="detailsList.title" />
            <p id="commodityTitle">{{detailsList.title}}</p>
            <p id="commodityPicre">￥{{detailsList.price}}</p>
            <p id="commodityRest">
              <span>发货地：{{detailsList.place}}</span>
              <span>快递费：{{detailsList.express}}</span>
            </p>
          </div>
          <div id="quality">
            <img src="../assets/quality.png" alt />
          </div>
          <div id="parameter">
            <div id="specification">
              <span>选择产品规格</span>
              <img src="@/assets/you.png" alt />
            </div>
            <div id="number">
              <span>数量：</span>
              <div id="modifynumber">
                <button @click="add()">+</button>
                <input v-model="value" />
                <button @click="subtract()">-</button>
              </div>
            </div>
          </div>
          <div id="container">
            <img id="particulars" src="@/assets/commodityParticulars.png" alt />
            <ul>
              <li v-for="(item,index) in detailsList.listimg" :key="index">
                <img v-lazy.container="item" />
              </li>
            </ul>
          </div>
          <!-- 我是有底线的 -->
          <div id="baseline">— &emsp;我是有底线的 &emsp;—</div>
          <div id="bottomBar">
            <div id="collect">
              <span @click="conditionActive()">
                <img src="@/assets/enshrine_active.png" alt v-if="condition" />
                <img src="@/assets/enshrine.png" alt v-else />
                <p>收藏</p>
              </span>
              <span>
                <router-link to="shopCart" class="setState">
                  <img src="@/assets/cart.png" alt />
                  <p>购物车</p>
                </router-link>
              </span>
            </div>
            <div id="purchased" @click="purchased()">
              <p>加入购物车</p>
            </div>
            <div id="payPass" @click="payPass()">
              <p>立即购买</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>
<script >
import qs from "qs";
import { Toast } from "mint-ui";
export default {
  name: "Dialog",
  data() {
    return {
      detailsList: [],
      selected: "",
      value: 1,
      condition: false,
      scroll: ""
    };
  },
  props: ["commodityId"],
  methods: {
    dialogClose: function() {
      this.$emit("close");
    },
    getCommodity: function(commodityId) {
      this.popupVisible = true;
      var pamrs = {
        id: commodityId
      };
      this.$axios
        .post("commodity.php", qs.stringify(pamrs))
        .then(res => {
          window.console.log(res);
          this.detailsList = res.data.message;
        })
        .catch(err => {
          window.console.log("请求失败" + err);
        });
    },
    add: function() {
      this.value += 1;
      this.detailsList.number = this.value;
      window.console.log(this.detailsList);
    },
    subtract: function() {
      if (this.value == 1) return;
      this.value -= 1;
      this.detailsList.number = this.value;
      window.console.log(this.detailsList);
    },
    conditionActive: function() {
      if (this.condition) {
        this.condition = false;
      } else {
        this.condition = true;
      }
    },
    payPass: function() {
      Toast("功能未开放");
    },
    purchased: function() {
      Toast({
        message: "添加成功，在购物车等亲~",
        iconClass: "icon icon-success"
      });

      var commodity = [];
      commodity["id"] = this.detailsList.id;
      commodity["img"] = "http://img.3dcw.cn/chips.png";
      commodity["number"] = this.value;
      commodity["price"] = this.detailsList.price;
      commodity["taste"] = "芝士味 90克";
      commodity["title"] = this.detailsList.title;

      this.$store.commit("pushCommodityList", commodity);
    }
  },
  created() {
    this.getCommodity(this.commodityId);
    //禁止主页面滑动
    this.noScroll();
  },
  destroyed() {
    //主页面可滑动
    this.canScroll();
  } //生命周期 - 销毁之前
};
</script>
<style scoped lang="less">
fade {
  width: 100%;
  height: 100%;
}
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.4s;
}
.fade-enter,
.fade-leave-active {
  opacity: 0;
}
.dialog-mask {
  background-color: rgba(0, 0, 0, 0.5);
  position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 99;
  display: table;
  animation-duration: 0.6s;
  overflow: auto;
  .dialog-wrapper {
    display: table-cell;
    vertical-align: middle;
    animation-duration: 0.3s;
    .dialog-container {
      margin: auto;
      top: 50%;
      background-color: #f3f3f3;
      width: 100%;
      height: 100%;
      overflow: auto;
      #back {
        width: 31px;
        height: 31px;
        background-color: #636363;
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 999;
        display: block;
        border-radius: 50px;
        img {
          margin-left: 22%;
          margin-top: 23%;
          width: 50%;
          height: 50%;
        }
      }
      #details {
        background-color: #fff;
        width: 100%;
        color: #646464;
        img {
          width: 100%;
          height: 300px;
        }
        #commodityTitle {
          font-size: 17px;
          padding-left: 2%;
          padding-bottom: 1%;
          padding-top: 1%;
        }
        #commodityPicre {
          font-size: 37/2px;
          padding-left: 3%;
          padding-bottom: 1%;
          padding-top: 1%;
          font-weight: bold;
          color: #e50112;
        }
        #commodityRest {
          font-size: 23/2px;
          padding-left: 1.8%;
          padding-bottom: 4%;
          padding-top: 2%;
          span {
            margin-right: 20%;
          }
        }
      }
      #quality {
        width: 100%;
        height: 50px;
        margin: 2.8% 0;
        img {
          width: 100%;
          // height: 100%;
        }
      }
      #parameter {
        width: 100%;
        height: 100px;
        background-color: #fff;
        font-size: 28/2px;
        margin-top: 4%;
        color: #646464;
        #specification {
          width: 100%;
          line-height: 50px;
          border-bottom: #f3f3f3 2px solid;
          padding-left: 3%;
          position: relative;
          img {
            width: 24px;
            height: 24px;
            position: absolute;
            right: 5%;
            top: 50%;
            transform: translateY(-12px);
          }
        }
        #number {
          width: 100%;
          height: 50%;
          line-height: 50px;
          padding-left: 3%;
          position: relative;
          span {
            font-size: 14px;
          }
          #modifynumber {
            position: absolute;
            left: 59px;
            top: 50%;
            transform: translateY(-50%);
            border: #c3c3c3 1px solid;
            height: 22px;
            button {
              width: 28px;
              height: 22px;
              background: unset;
              border: #f3f3f3 1px solid;
              background-color: #f3f3f3;
              color: #636363;
              font-weight: bold;
              float: left;
              font-size: 11px;
            }
            input {
              float: left;
              width: 50px;
              height: 20px;
              border: #f3f3f3 1px solid;
              text-align: center;
              font-size: 22/2px;
            }
          }
        }
      }
      #container {
        // padding-bottom: 90px;
        img#particulars {
          width: 100%;
        }
        ul {
          img {
            height: 300px;
            width: 100%;
          }
        }
      }
      #baseline {
        text-align: center;
        padding-bottom: 70px;
        color: #c2bfbf;
      }
      #bottomBar {
        position: absolute;
        bottom: 0;
        left: 0;
        z-index: 999;
        display: block;
        width: 100%;
        height: 98/2px;
        display: flex;
        flex-wrap: wrap;
        div {
          width: 33.33%;
          float: left;
          background-color: #fff;
          border: #fff 0.69px solid;
          height: 100px;
          box-sizing: border-box;
        }
        #collect {
          display: flex;
          flex-wrap: wrap;
          color: #646464;
          span {
            width: 50%;
            float: left;
            height: 100%;
            display: block;
            margin: 0 auto;
            text-align: center;
            img {
              height: 39/2px;
              margin-top: 5%;
            }
            .setState {
              text-decoration: none;
              color: #646464;
            }
          }
        }
        #purchased {
          background-color: #fc0;
          border: #fc0 0.69px solid;
          text-align: center;
          p {
            height: 100%;
            font-size: 27/2px;
            color: #fff;
            line-height: 98/2px;
          }
        }
        #payPass {
          background-color: #e00;
          border: #e00 0.69px solid;
          text-align: center;
          p {
            height: 100%;
            font-size: 27/2px;
            color: #fff;
            line-height: 98/2px;
          }
        }
      }
    }
  }
}
</style>
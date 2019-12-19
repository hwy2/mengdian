<!--  -->
<template>
    <div id="shopCart" :style="{height:(screenHeight-56)+'px'}">
        <!-- 顶部标签 -->
        <mt-header fixed id="header" :title="length">
            <mt-button slot="right">编辑</mt-button>
        </mt-header>
        <ul>
            <li v-for="(item,index) in commodityList" :key="index">
                <div id="commodityItem">
                    <div id="radioDomain">
                        <img
                            src="@/assets/checkbox.png"
                            alt="0"
                            class="checkboxs"
                            @click="checkbox($event,item.price*item.number)"
                        />
                    </div>
                    <div id="imgDomain">
                        <img :src="item.img" alt />
                    </div>
                    <div id="detailsDomain">
                        <div id="title">
                            <span>{{item.title}}</span>
                            <span>
                                <img src="@/assets/bianji.png" alt id="edit" />
                            </span>
                        </div>
                        <div id="taste">
                            <span>{{item.taste}}</span>
                        </div>
                        <div id="price">
                            <span>￥{{item.price*item.number|retainDoubleDigit}}</span>
                            <span id="number">x{{item.number}}</span>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div id="settlement">
            <div id="checkAll">
                <img src="@/assets/checkbox.png" alt @click="checkAll()" v-if="allState " />
                <img src="@/assets/checkbox_active.png" alt @click="checkAll()" v-else />
                <span id="all">全选</span>
            </div>
            <div id="summation">
                <div id="footing">
                    <span>合计：</span>
                    <span id="addPrice">￥{{price|retainDoubleDigit}}</span>
                </div>
                <div id="clearing">
                    <p>结算({{settlement}})</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
//这里可以导入其他文件（比如：组件，工具js，第三方插件js，json文件，图片文件等等）
//例如：import 《组件名称》 from '《组件路径》';
// import { Indicator } from 'mint-ui'
export default {
    //import引入的组件需要注入到对象中才能使用
    components: {},
    data() {
        //这里存放数据
        return {
            value: '',
            // commodityList: [],
            length: '',
            settlement: 0,
            screenHeight: document.documentElement.clientHeight - 56 + 'px',
            allState: true,
            priceList: [],
            price: 0
        }
    },
    filters: {
        //拦截器
        retainDoubleDigit: function(data) {
            return data.toFixed(2)
        }
    },
    //监听属性 类似于data概念
    computed: {
        commodityList: {
            get() {
                return this.$store.state.commodityList
            }
        }
    },
    //监控data中的数据变化
    watch: {
        screenHeight: function(val) {
            // 监听屏幕高度变化
            var oIframe = document.getElementById('maindiv')
            // alert(this.$store.getters.screenHeight)
            oIframe.style.height = Number(val) - 40 + 'px'
        }
    },
    //方法集合
    methods: {
        checkAll: function() {
            var $el = document.getElementsByClassName('checkboxs')
            if (this.allState) {
                this.allState = false
                for (var i = 0; i < $el.length; i++) {
                    if ($el[i].alt == '1') {
                        continue
                    }
                    $el[i].click()
                }
            } else {
                this.allState = true
                for (var i = 0; i < $el.length; i++) {
                    $el[i].click()
                }
            }
        },
        checkbox: function(event, value) {
            if (event.target.alt == 0) {
                event.target.src = require('@/assets/checkbox_active.png')
                event.target.alt = 1
                this.priceList.push(value.toFixed(2) * 1)
                window.console.log(this.priceList)
            } else {
                event.target.src = require('@/assets/checkbox.png')
                event.target.alt = 0
                for (var i = 0; i < this.priceList.length; i++) {
                    if (this.priceList[i] == value.toFixed(2)) {
                        this.priceList.splice(i, 1)
                    }
                }
                window.console.log(this.priceList)
            }
            var $el = document.getElementsByClassName('checkboxs')
            var states = false
            for (i = 0; i < $el.length; i++) {
                if ($el[i].alt == 1) {
                    states = true
                } else {
                    states = false
                    break
                }
            }
            window.console.log(states)
            if (states) {
                this.allState = false
            } else {
                this.allState = true
            }
            this.price = 0
            for (i = 0; i < this.priceList.length; i++) {
                this.price += this.priceList[i]
            }
            this.settlement = this.priceList.length
            window.console.log(this.price)
        }
    },
    //生命周期 - 创建完成（可以访问当前this实例）
    created() {
        this.length = '购物车(' + this.commodityList.length + ')'
    },
    //生命周期 - 挂载完成（可以访问DOM元素）
    mounted() {
        var that = this
        window.addEventListener('resize', function() {
            that.screenHeight = document.documentElement.clientHeight // 窗口高度
        })
    },
    beforeCreate() {}, //生命周期 - 创建之前
    beforeMount() {}, //生命周期 - 挂载之前
    beforeUpdate() {}, //生命周期 - 更新之前
    updated() {}, //生命周期 - 更新之后
    beforeDestroy() {}, //生命周期 - 销毁之前
    destroyed() {}, //生命周期 - 销毁完成
    activated() {} //如果页面有keep-alive缓存功能，这个函数会触发
}
</script>
<style lang='less' scoped>
#shopCart {
    background-color: #f3f3f3;
    width: 100%;
    height: 100%;
    #header {
        height: 49px;
    }
    ul {
        padding-top: 55px;
        width: 100%;
        background-color: #f3f3f3;
        li {
            background-color: #fff;
            margin-bottom: 2%;
            #commodityItem {
                padding: 3%;
                display: flex;
                flex-wrap: wrap;
                #radioDomain {
                    width: 10%;
                    img {
                        width: 20px;
                        height: 20px;
                        // opacity: 0;
                        margin-top: 90%;
                        margin-left: 1%;
                    }
                }
                #imgDomain {
                    width: 75px;
                    border: #999 solid 1px;
                    height: 75-8px;
                    padding-top: 8px;
                    img {
                        height: 119/2px;
                        display: block;
                        margin: 0 auto;
                    }
                }
                #detailsDomain {
                    width: 68%;
                    #title {
                        font-size: 13px;
                        padding-left: 5%;
                        margin-top: 3%;
                        line-height: 49/2px;
                        #edit {
                            width: 18px;
                            margin-top: 1%;
                            float: right;
                        }
                    }
                    #taste {
                        font-size: 11px;
                        line-height: 51/2px;
                        padding-left: 5%;
                        color: #999;
                    }
                    #price {
                        font-size: 11px;
                        color: #e50112;
                        padding-left: 5%;
                        #number {
                            float: right;
                            color: black;
                            letter-spacing: 1px;
                            font-size: 12px;
                        }
                    }
                }
            }
        }
    }
    #settlement {
        background-color: #fff;
        position: absolute;
        bottom: 110/2px;
        left: 0;
        width: 100%;
        height: 50px;
        display: flex;
        flex-wrap: wrap;
        #checkAll {
            float: left;
            width: 18.4%;
            line-height: 50px;
            img {
                width: 20px;
                height: 20px;
                // opacity: 0;
                margin-top: 7%;
                margin-left: 6%;
                vertical-align: sub;
            }
            #all {
                margin-left: 10px;
                font-size: 15px;
            }
        }
        #summation {
            float: left;
            width: 81.6%;
            display: flex;
            flex-wrap: wrap;
            #footing {
                float: left;
                width: 70%;
                line-height: 50px;
                font-size: 15px;
                text-align: right;
                overflow: auto;
                padding-right: 4px;
                box-sizing: border-box;
                #addPrice {
                    color: #e50112;
                }
            }
            #clearing {
                float: left;
                width: 30%;
                line-height: 50px;
                background-color: #e50112;
                font-size: 14px;
                color: #fff;
                p {
                    margin-left: 25%;
                }
            }
        }
    }
}
</style>
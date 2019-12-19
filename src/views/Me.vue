<!--  -->
<template>
    <div class="me" :style="style">
        <div class="account">
            <div class="account_warp">
                <img src="@/assets/head.png" alt />
                <p>昵称</p>
            </div>
            <div class="menus">
                <ul>
                    <li v-for="(item,index) in menus" :key="index">
                        <img :src="item.img" :alt="item.alt" />
                        <p>{{item.alt}}</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="assorts">
            <ul>
                <li v-for="(item,index) in lists" :key="index">
                    <div>
                        <img :src="item.img" alt />
                        <span>{{item.alt}}</span>
                        <img :src="item.you" alt class="icon" />
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
//这里可以导入其他文件（比如：组件，工具js，第三方插件js，json文件，图片文件等等）
//例如：import 《组件名称》 from '《组件路径》';
import imgsrc1 from '@/assets/payment.png'
import imgsrc2 from '@/assets/receiving.png'
import imgsrc3 from '@/assets/aftermarket.png'
import imgsrc4 from '@/assets/indent.png'
import img1 from '@/assets/shoucang2.png'
import img2 from '@/assets/site.png'
import img3 from '@/assets/service.png'
import img4 from '@/assets/guanyu.png'
import img5 from '@/assets/you.png'
export default {
    //import引入的组件需要注入到对象中才能使用
    components: {},
    name: 'Me',
    data() {
        //这里存放数据
        return {
            style: {
                height: document.documentElement.clientHeight + 'px'
            },
            menus: [
                { img: imgsrc1, alt: '待付款' },
                { img: imgsrc2, alt: '待收货' },
                { img: imgsrc3, alt: '退货/售后' },
                { img: imgsrc4, alt: '全部订单' }
            ],
            lists: [
                { img: img1, alt: '我的收藏', you: img5 },
                { img: img2, alt: '地址管理', you: img5 },
                { img: img3, alt: '客服中心', you: img5 },
                { img: img4, alt: '关于加盟', you: img5 }
            ]
        }
    },
    //监听属性 类似于data概念
    computed: {},
    //监控data中的数据变化
    watch: {},
    //方法集合
    methods: {},
    //生命周期 - 创建完成（可以访问当前this实例）
    created() {},
    //生命周期 - 挂载完成（可以访问DOM元素）
    mounted() {},
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
.me {
    background-color: #f3f3f3;
    width: 100%;
    .account {
        width: 100%;
        background-color: #fff;
        .account_warp {
            height: 150-31.5/2px;
            width: 100%;
            background-color: #ff6634;
            padding-top: 31.5/2px;
            img {
                margin: 0 auto;
                height: 152/2px;
                width: 152/2px;
                display: block;
                margin: 0 auto;
                border:  3px solid #f8976c;
                border-radius: 50%;
            }
            p {
                font-size: 35/2px;
                color: #fff;
                width: 100%;
                text-align: center;
                line-height: 1.8;
            }
        }
        .menus {
            width: 100%;
            height: 90px;
            ul {
                width: 100%;
                height: 100%;
                display: flex;
                flex-wrap: wrap;
                li {
                    float: left;
                    width: 25%;
                    img {
                        height: 27px;
                        margin-left: 32.5%;
                        margin-top: 25%;
                    }
                    p {
                        width: 100%;
                        text-align: center;
                        margin-top: 4px;
                        font-size: 23/2px;
                    }
                }
            }
        }
    }
    .assorts {
        width: 100%;
        margin-top: 3%;
        ul {
            width: 100%;
            li {
                width: 100%;
                height: 50px;
                background-color: #fff;
                line-height: 50px;
                margin-top: 2px;
                div {
                    margin-left: 5%;
                    margin-right: 5%;
                    font-size: 13px;
                    img {
                        width: 26/2px;
                        height: 26/2px;
                        margin-top: 5%;
                        vertical-align: sub;
                    }
                    span {
                        margin-left: 3%;
                        font-size: 23/2px;
                    }
                    img.icon {
                        float: right;
                    }
                }
            }
        }
    }
}
</style>
<template>
    <div id="assort">
        <!-- 搜索框 -->
        <mt-search id="search" v-model="value" cancel-text="取消" placeholder="搜索"></mt-search>
        <!-- 分类 -->
        <div id="assort_warp">
            <div id="left" :style="style">
                <ul>
                    <li
                        v-for="(item,index) in classificationList"
                        :key="index"
                        :class="{'active':index === flag}"
                        @click="active(index,item)"
                    >{{item}}</li>
                </ul>
            </div>
            <div id="right" :style="style">
                <ul>
                    <li v-for="(item,index) in reclassify" :key="index">
                        <h3>{{item.name}}</h3>
                        <ul>
                            <li v-for="(citem,i) in item.category" :key="i">
                                <img :src="citem.imgUrl" :alt="citem.title" />
                                <p>{{citem.title}}</p>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- 我是有底线的 -->
                <div id="baseline">—— &nbsp;我是有底线的 &nbsp;——</div>
            </div>
        </div>
    </div>
</template>

<script>
//这里可以导入其他文件（比如：组件，工具js，第三方插件js，json文件，图片文件等等）
//例如：import 《组件名称》 from '《组件路径》';
import qs from 'qs'
import { Indicator } from 'mint-ui'
export default {
    name: 'Assort',
    //import引入的组件需要注入到对象中才能使用
    components: {},
    data() {
        //这里存放数据
        return {
            classification: { classification: 'classification' },
            classificationList: [],
            reclassify: [],
            value: '',
            flag: 0,
            style: {
                height: document.documentElement.clientHeight - 52 + 'px'
            }
        }
    },
    //监听属性 类似于data概念
    computed: {},
    //监控data中的数据变化
    watch: {},
    //方法集合
    methods: {
        active: function(index, value) {
            // window.console.log(index)
            this.flag = index
            this.classification = {
                classification: 'reclassify',
                reclassify: value
            }
            this.$axios
                .post('assort.php', qs.stringify(this.classification))
                .then(res => {
                    // window.console.log('请求结果：', res)
                    this.reclassify = res.data.message[0]
                    // window.console.log('classificationList：', this.reclassify)
                })
                .catch(err => {
                    window.console.log('请求错误', err)
                })
        }
    },
    //生命周期 - 创建完成（可以访问当前this实例）
    created() {
        Indicator.open('加载中...')
        this.$axios
            .post('assort.php', qs.stringify(this.classification))
            .then(res => {
                window.console.log('请求结果：', res)
                this.classificationList = res.data.message[0]
                this.active(0, '鞋靴')
                Indicator.close()
            })
            .catch(err => {
                window.console.log('请求错误', err)
                Indicator.close()
            })
        this.noScroll()
    },
    //生命周期 - 挂载完成（可以访问DOM元素）
    mounted() {},
    beforeCreate() {}, //生命周期 - 创建之前
    beforeMount() {}, //生命周期 - 挂载之前
    beforeUpdate() {}, //生命周期 - 更新之前
    updated() {}, //生命周期 - 更新之后
    beforeDestroy() {}, //生命周期 - 销毁之前
    destroyed() {
        this.canScroll()
    }, //生命周期 - 销毁完成
    activated() {} //如果页面有keep-alive缓存功能，这个函数会触发
}
</script>
<style lang='less' scoped>
//@import url(); 引入公共css类
html {
    overflow: hidden;
    body {
        overflow: hidden;
    }
}
#assort {
    overflow: hidden;
}
#search {
    height: 50px;
    width: 100%;
}
#assort_warp {
    width: 100%;
    height: 100%;
    display: flex;
    flex-wrap: wrap;
    overflow: hidden;
    #left {
        width: 30%;
        text-align: center;
        height: 100%;
        overflow: auto;
        // display: flex;
        // flex-flow: wrap;
        ul {
            margin-bottom: 56px;
            // background-color: #f3f3f3;
            background-color: #fff;
            li {
                height: 45px;
                line-height: 45px;
                border-bottom: 1px solid #e1e1e1;
                font-size: 13px;
                list-style-type: none;
            }
            li:hover {
                background-color: #f3f3f3;
            }
            .active {
                border-left: 3px solid #e50112;
                color: #e50112;
                // background-color: #fff;
                background-color: #f3f3f3;
            }
        }
    }
    #right {
        width: 70%;
        background-color: #f3f3f3;
        overflow: auto;
        ul {
            width: 100%;
            margin-bottom: 5%;
            li {
                list-style-type: none;
                padding-left: 4%;
                padding-right: 4%;
                padding-top: 5%;
                h3 {
                    padding-bottom: 4%;
                }
                ul {
                    width: 100%;
                    display: flex;
                    flex-wrap: wrap;
                    background-color: #fff;
                    border-radius: 15px;
                    li {
                        width: 25%;
                        list-style-type: none;
                        padding: 4%;
                        text-align: center;
                        img {
                            width: 50px;
                            height: 50px;
                        }
                        p {
                        }
                    }
                }
            }
        }
        #baseline {
            text-align: center;
            padding-bottom: 10px;
            color: #c2bfbf;
            margin-bottom: 19%;
        }
    }
}
</style>
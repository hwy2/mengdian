<template>
    <div id="app">
        <!-- 路由组件 淡入淡出效果 -->
        <transition name="fade" mode="out-in">
            <router-view />
        </transition>
        <!-- 底部导航栏 -->
        <mt-tabbar v-model="selected" fixed>
            <mt-tab-item id="home">
                <img slot="icon" src="./assets/home_active.png" v-if="this.selected == 'home'" />
                <img slot="icon" src="./assets/home.png" v-else />
                首页
            </mt-tab-item>
            <mt-tab-item id="assort">
                <img slot="icon" src="./assets/assort_active.png" v-if="this.selected == 'assort'" />
                <img slot="icon" src="./assets/assort.png" v-else />
                分类
            </mt-tab-item>
            <mt-tab-item id="shopCart">
                <img slot="icon" src="./assets/cart_active.png" v-if="this.selected == 'shopCart'" />
                <img slot="icon" src="./assets/cart.png" v-else />
                购物车
            </mt-tab-item>
            <mt-tab-item id="me">
                <img slot="icon" src="./assets/me_active.png" v-if="this.selected == 'me'" />
                <img slot="icon" src="./assets/me.png" v-else />
                我的
            </mt-tab-item>
        </mt-tabbar>
    </div>
</template>

<script>
export default {
    name: 'App',
    data() {
        return {}
    },
    computed: {
        selected: {
            get() {
                return this.$store.state.selected
            },
            set(v) {
                // 使用vuex中的mutations中定义好的方法来改变
                this.$store.commit('setSelected', v)
            }
        }
    },
    methods: {
        updateHandler() {
            window.console.log(this.$router.name)
            this.$store.commit('setSelected', 'assort')
        }
    },
    watch: {
        selected: function(newV, oldV) {
            window.console.log('当前选择：' + newV)
            window.console.log('上一个选择：' + oldV)
            this.$router.push({ name: newV })
            this.$store.commit('setSelected', newV)
        }
    },
    created() {
        this.$router.push({ name: 'home' })
        this.$axios
            .post('shopCart.php')
            .then(res => {
                this.$store.commit('setCommodityList', res.data.message)
            })
            .catch(err => {
                window.console.log('请求错误', err)
            })
        //在页面加载时读取sessionStorage里的状态信息
        if (sessionStorage.getItem('store')) {
            this.$store.replaceState(
                Object.assign(
                    {},
                    this.$store.state,
                    JSON.parse(sessionStorage.getItem('store'))
                )
            )
        }

        //在页面刷新时将vuex里的信息保存到sessionStorage里
        window.addEventListener('beforeunload', () => {
            sessionStorage.setItem('store', JSON.stringify(this.$store.state))
        })
    }
}
</script>

<style lang="less">
* {
    margin: 0;
    padding: 0;
    html {
        overflow: hidden;
        body {
            overflow: hidden;
        }
    }
}
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
</style>

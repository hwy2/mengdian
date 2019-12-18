import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import './registerServiceWorker'
import Axios from 'axios'
import './assets/less/main.less'
import 'animate.css/animate.css'
// 引用全部mint UI
import Mint from 'mint-ui';
Vue.use(Mint);
import 'mint-ui/lib/style.css'

// 引用手淘rem
import 'lib-flexible'

// 配置Axios
Vue.prototype.$axios = Axios
//配置公共url
Axios.defaults.baseURL = 'http://www.3dcw.cn/mengdian/php/'
Axios.defaults.headers = {
  "Content-Type": "application/x-www-form-urlencoded;charset=UTF-8"
}

Vue.config.productionTip = false

//弹出框禁止滑动
Vue.prototype.noScroll = function () {
  var mo = function (e) {
    e.preventDefault()
  }
  document.body.style.overflow = 'hidden'
  document.addEventListener('touchmove', mo, false) // 禁止页面滑动
}

//弹出框可以滑动
Vue.prototype.canScroll = function () {
  var mo = function (e) {
    e.preventDefault()
  }
  document.body.style.overflow = 'auto' // 出现滚动条
  document.removeEventListener('touchmove', mo, false)
}

new Vue({
  router,
  store,
  render: h => h(App),
}).$mount('#app')
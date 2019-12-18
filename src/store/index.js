import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    selected: "home",
    commodityList: []
  },
  getters: {
    commodityList(state) {
      return state.commodityList
    }
  },
  mutations: {
    setSelected(state, status) {
      state.selected = status
    },
    setCommodityList(state, list) {
      state.commodityList = list;
    },
    pushCommodityList(state, list) {
      state.commodityList.push(list);
    }
  },
  actions: {
  },
  modules: {
  }
})

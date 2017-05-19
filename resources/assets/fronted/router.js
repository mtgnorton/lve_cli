import Vue from 'vue'
import Router from 'vue-router'
// 注册router组件
Vue.use(Router)
// 导入组件
import test from './components/test.vue'

let routes = [
  { path: '/test', name: 'test', component: test },
]

export default new Router({
  routes
})

<template>
    <div id="app">
      <div class="header">
        <el-button type="warning" @click="show = !show">打开弹框</el-button>
      </div>
      <div class="container">
        
      </div>
      <div class="footer">
        222
      </div>
      <transition name="fade">
      <div class="background" v-if="show">
       <el-button type="warning" @click="show = !show">关闭</el-button>
      </div>
      </transition>
     <router-view></router-view>
    </div>
</template>
<script type="text/javascript">
  export default{
    data() {
      return {
        show: false
      }
    }
  }
</script>
<style lang="stylus">
  @import './common/stylus/base.styl'
  #app
    .header 
      position: relative;
      height: 10%;
      background-color: #5cb85c;
    .background
      position: fixed
      top: 0 
      left: 0
      overflow: auto
      width 100%
      height 100%
      background:rgba(7,17,27,0.8)
      z-index 100
      transition: all 0.5s
      &.fade-enter-active , &.fade-leave
        opacity: 1
        background: rgba(7,17,27,0.8)
      &.fade-enter , &.fade-leave-active
        opacity: 0
        background: rgba(7,17,27,0)
</style>
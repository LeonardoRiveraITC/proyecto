<template>
  <div>
  <layout class="layout"/>
  <router-view class="content"></router-view>
  </div>
</template>

<script>
import Layout from '@/components/layout.vue';
  export default {
    components:{
        Layout
    }
  }
</script>

<style scoped>
.layout{
  padding-bottom: 20px;
}
.content{
  padding-top:100px ;
  padding-left:32% ;
}
</style>

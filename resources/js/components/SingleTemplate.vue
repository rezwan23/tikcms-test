<template>
  <div>
    <span>
      <div
        class="a"
        v-html="item.template"
      ></div>
    </span>
  </div>
</template>


<script>
export default {
  props: ["item"],
  data() {
    return {
      style : {}
    };
  },
  computed: {
    
  },
  methods:{
    
  },
  mounted(){
    
  }
};
</script>

<style scoped>

</style>


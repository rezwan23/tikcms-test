<template>
  <div>
    <span>
      <div
        class="a"
        v-html="item.template"
        :style="{'--css-url-template-id' : 'http://testapp.test/api/get-css/' + this.item.id}"
      ></div>
    </span>
  </div>
</template>


<script>
export default {
  props: ["item"],
  data() {
    return {
      url: "http://testapp.test/api/get-css/" + this.item.id,
    };
  },
  computed: {
    styleUrl() {
      return {
        "--css-url-template-id":
          "http://testapp.test/api/get-css/" + this.item.id,
      };
    },
  },
};
</script>

<style scoped>

  @import url("http://testapp.test/api/get-css/4");
</style>


<template>
  <div>
    <h1><center><button class="btn btn-primary" @click="getTemplates">Templates</button></center></h1>
    <div>
      <div class="row">
        <div v-for="(item, index) in templates" :key="index" class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3>Template {{ index + 1 }}</h3>
            </div>
            <div class="card-body">
              <SingleTemplate :item="item"></SingleTemplate>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import SingleTemplate from '../components/SingleTemplate.vue'


export default {
  name: "Ghani",
  data() {
    return {
      templates: [],
    };
  },
  components : {
      SingleTemplate
  },
  methods: {
    getTemplates() {
      axios
        .get("/api/get-templates")
        .then(({ data }) => {
          this.templates = data;
        })
        .catch((err) => {
          console.log("err.response.data.errors");
        });
    },
  },
  mounted() {
    
  },
};
</script>
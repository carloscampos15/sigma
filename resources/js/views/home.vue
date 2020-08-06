<template>
  <div class="container">
    <headerComponent />

    <div class="row" id="content-row">
      <div class="col text-right">
        <img id="sigma-logo" src="images/sigma-image.png" width="450" alt="Sigma image" />
      </div>
      <div class="col">
        <formComponent />
      </div>
    </div>
  </div>
</template>

<script>
import headerComponent from "./../components/header.vue";
import formComponent from "./../components/form.vue";
export default {
  props: [],
  components: { headerComponent, formComponent },
  data() {
    return {};
  },
  methods: {},
  created: function () {},
};
</script>

<style scoped>

.container{
  padding: 30px 0px 30px 0px;
}

#content-row {
  margin-top: 25px;
}
</style>

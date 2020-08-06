<template>
  <div class="text-center">
    <img id="sigma-logo" src="images/sigma-logo.png" alt="Sigma logo" />
    <h2 id="title">Prueba de desarrollo Sigma</h2>
    <p id="paragraph">
      Lorem Ipsum is simply dummy text of the printing and typesetting industry.
      Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
      when an unknown printer took a galley of type and scrambled it to make a type
      specimen book
    </p>
  </div>
</template>

<script>
export default {
  props: [],
  components: {},
  data() {
    return {};
  },
  methods: {},
  created: function () {},
};
</script>

<style scoped>
h2 {
  font-family: Roboto Condensed, sans-serif;
  font-weight: 700;
}

p {
  font-family: Roboto Condensed, sans-serif;
  font-weight: lighter;
  font-size: 15px;
}

#title {
  margin-top: 25px;
}

#paragraph {
  margin: 0 auto;
  width: 80%;
  margin-top: 25px;
}
</style>

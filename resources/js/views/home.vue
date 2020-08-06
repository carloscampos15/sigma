<template>
  <div class="container">
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

    <div class="row" id="content-row">
      <div class="col text-right">
        <img id="sigma-logo" src="images/sigma-image.png" width="450" alt="Sigma image" />
      </div>
      <div class="col">
        <div id="content-form">
          <form>
            <div class="form-group">
              <label for="department">Departamento*</label>
              <select class="form-control" name="department" id="department">
                <option disabled selected>Seleccionar Departamento</option>
              </select>
            </div>
            <div class="form-group">
              <label for="city">Ciudad*</label>
              <select class="form-control" name="city" id="city">
                <option disabled selected>Seleccionar Ciudad</option>
              </select>
            </div>
            <div class="form-group">
              <label for="name">Nombre*</label>
              <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                placeholder="Pepito de Jesus"
              />
            </div>
            <div class="form-group">
              <label for="name">Correo*</label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="pepitodejesus@gmail.com"
              />
            </div>
            <div id="content-button">
              <button id="btn-send" type="button" class="btn btn-primary">ENVIAR</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: [],
  components: {},
  data() {
    return {
      departments: [],
      cities: [],
    };
  },
  methods: {
    getDepartments() {
      const that = this;
      const route = `https://sigma-studios.s3-us-west-2.amazonaws.com/test/colombia.json`;
      console.log("hola mundo");
    },
  },
  created: function () {
      this.getDepartments();
  },
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

#sigma-logo {
  margin-top: 40px;
}

#title {
  margin-top: 25px;
}

#paragraph {
  margin: 0 auto;
  width: 80%;
  margin-top: 25px;
}

#content-row {
  margin-top: 25px;
}

#content-form {
  padding: 2rem;
  border-radius: 10px;
  -webkit-box-shadow: 1px 0px 18px -4px rgba(196, 196, 196, 1);
  -moz-box-shadow: 1px 0px 18px -4px rgba(196, 196, 196, 1);
  box-shadow: 1px 0px 18px -4px rgba(196, 196, 196, 1);
}

#content-button {
  text-align: center;
}

#btn-send {
  border-radius: 20px;
  padding: 8px 25px;
  background: rgb(224, 51, 119);
  border-color: rgb(224, 51, 119);
}
</style>

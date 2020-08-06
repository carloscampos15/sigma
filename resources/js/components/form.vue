<template>
  <div id="content-form">
    <form>
      <div class="form-group">
        <label for="department">Departamento*</label>
        <select
          v-model="form.state"
          class="form-control"
          name="state"
          id="department"
          @change="getCitiesByDepartment"
          :state="validateState('state')"
          aria-describedby="input-state-feedback"
        >
          <option v-for="(department, index) in departments" v-bind:key="index">{{department}}</option>
        </select>
        <div class="error" v-if="!$v.form.state.required">This is a required field</div>
        <div class="error" v-if="!$v.form.state.maxLength">Name must have at most {{$v.form.state.$params.maxLength.max}} letters.</div>
      </div>
      <div class="form-group">
        <label for="city">Ciudad*</label>
        <select
          v-model="form.city"
          class="form-control"
          name="city"
          id="city"
          aria-describedby="input-city-feedback"
          :state="validateState('city')"
        >
          <option v-for="(city, index) in cities" v-bind:key="index">{{city}}</option>
        </select>
        <div class="error" v-if="!$v.form.city.required">This is a required field</div>
        <div class="error" v-if="!$v.form.city.maxLength">Name must have at most {{$v.form.city.$params.maxLength.max}} letters.</div>
      </div>
      <div class="form-group">
        <label for="name">Nombre*</label>
        <input
          v-model="form.name"
          type="text"
          class="form-control"
          id="name"
          name="name"
          placeholder="Pepito de Jesus"
          :state="validateState('name')"
          aria-describedby="input-name-feedback"
        />
        <div class="error" v-if="!$v.form.name.required">This is a required field</div>
        <div class="error" v-if="!$v.form.name.maxLength">Name must have at most {{$v.form.name.$params.maxLength.max}} letters.</div>
      </div>
      <div class="form-group">
        <label for="name">Correo*</label>
        <input
          v-model="form.email"
          type="email"
          class="form-control"
          id="email"
          name="email"
          placeholder="pepitodejesus@gmail.com"
          :state="validateState('email')"
          aria-describedby="input-email-feedback"
        />
        <div class="error" v-if="!$v.form.email.required">This is a required field</div>
        <div class="error" v-if="!$v.form.email.email">invalid email address</div>
        <div class="error" v-if="!$v.form.email.maxLength">Name must have at most {{$v.form.email.$params.maxLength.max}} letters.</div>
      </div>
      <div id="content-button">
        <button id="btn-send" type="button" class="btn btn-primary" @click="onSubmit">ENVIAR</button>
      </div>
    </form>
  </div>
</template>

<script>
import { required, email, maxLength } from "vuelidate/lib/validators";
export default {
  props: [],
  components: {},
  data() {
    return {
      route_colombia: "data/colombia.json",
      route_ws: "api/contact",
      departments: [],
      cities: [],
      errors: true,
      form: {
        state: null,
        city: null,
        name: null,
        email: null,
      },
    };
  },
  methods: {
    getDepartments() {
      const that = this;

      // get json and show departments inside select
      axios
        .get(that.route_colombia)
        .then(function (response) {
          const departments = Object.keys(response.data);
          that.departments = departments;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    getCitiesByDepartment(event) {
      const department = event.target.value;
      const that = this;

      // get json and show departments inside select
      axios
        .get(that.route_colombia)
        .then(function (response) {
          const cities = response.data[department];
          that.cities = cities;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    onSubmit(event) {
      event.preventDefault();
      const that = this;

      that.$v.form.$touch();
      that.errors = true;
      if (that.$v.form.$anyError) return;


      // consume ws to save information, in the server side the data is validated too
      axios
        .post(that.route_ws, that.form)
        .then(function (response) {
          that.$swal(response.data.success);
          console.log();
        })
        .catch(function (error) {
          console.log(error.response.data.errors);
        });
    },
    validateState(value) {
      const { $dirty, $error } = this.$v.form[value];
      return $dirty ? !$error : null;
    },
  },
  validations: {
    form: {
      email: {
        required,
        email,
        maxLength: maxLength(30)
      },
      name: {
        required,
        maxLength: maxLength(50)
      },
      state: {
        required,
        maxLength: maxLength(30)
      },
      city: {
        required,
        maxLength: maxLength(50)
      },
    },
  },
  created: function () {
    this.getDepartments();
  },
};
</script>

<style scoped>
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

.error{
    color: red;
    font-size: smaller;
}
</style>

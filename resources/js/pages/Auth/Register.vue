<template>
  <v-app>
    <v-container fill-height>
      <v-row align="center" justify="center">
        <v-col cols="12" sm="4">
          <v-card min-height="300" min-width="300" color="" flat>
           <center>
            <v-avatar class="mr-3" color="grey lighten-5" size="70">
              <v-icon size="72" color="black"> mdi-laptop </v-icon>
            </v-avatar>
            </center>
            <v-form
              v-model="valid"
              ref="form"
              @submit.prevent="form.post('/register')"
              lazy-validation
            >
            <v-text-field
                v-model="form.name"
                class="mx-4"
                label="Nombre"
                outlined
                :rules="nameRules"
                type="email"
              ></v-text-field>
              <v-text-field
                v-model="form.email"
                class="mx-4"
                label="Correo electronico"
                outlined
                :rules="emailRules"
                type="email"
              ></v-text-field>
              <v-text-field
                v-model="form.password"
                class="mx-4"
                outlined
                :rules="passwordRules"
                label="Contraseña"
                type="password"
              ></v-text-field>
               <v-text-field
                    class="mx-4"
                    type="password"
                    v-model="form.password_confirmation"
                    :rules="[confirmPasswordRule]"
                    label="confirmar contraseña"
                    outlined
                  ></v-text-field>
              <v-row align="center" justify="space-around">
                <v-btn
                  class="my-4"
                  color="primary"
                  :disabled="!valid"
                  type="submit"
                >
                Registrarse
                </v-btn>
              </v-row>
              <v-row> </v-row>
              <v-row justify="end">
                <span class="mx-auto my-4"
                  >¿Ya cuentas con correo y contraseña?
                  <inertia-link href="/register">Iniciar sesión</inertia-link>
                </span>
              </v-row>
            </v-form>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
   <v-snackbar
        v-model="emailError"
        color="error"
        :timeout="6000"
        fixed
        right
        top
        class="mt-15">
        {{ form.errors }}
          <template v-slot:action="{ attrs }">
            <v-btn text v-bind="attrs" @click="error = false">
              <v-icon>mdi-close</v-icon>
            </v-btn>
          </template>
        </v-snackbar>
  </v-app>
</template>

<script>
export default {
  name: "Register",
  data() {
    return {
      form: this.$inertia.form({
        email: null,
        name:null,
        password: null,
        password_confirmation:null,
        remember: false,
      }),
      valid: false,
      nameRules: [
        (v) => !!v || "Ingrese su nombre",
        (v) =>
          !v ||
          v.length >= 3 ||
          "Su nombre debe contener al menos 3 caracteres",
      ],
      emailRules: [
        (v) =>
          /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
            String(v).toLowerCase()
          ) || "El email no contiene un formato valido",
      ],
      passwordRules: [
        (v) => !!v || "Ingrese una contraseña",
        (v) => !v || v.length >= 3 || "La contraseña no es valida",
      ],
    };
  },
  methods: {
    isEmpty(obj) {
      return Object.keys(obj).length === 0;
    },
  },
  computed:{
    confirmPasswordRule() {
      return () =>
        this.form.password === this.form.password_confirmation ||
        "Las contraseñas deben coincidir";
    },
    emailError(){
      return this.isEmpty(this.form.errors) ? false :true;
    }
  }
};
</script>

<style>
.custom-loader {
  animation: loader 1s infinite;
  display: flex;
}
@-moz-keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
@-webkit-keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
@-o-keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
@keyframes loader {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}
</style>
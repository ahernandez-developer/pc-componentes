<template>
  <v-app>
    <v-container style="height: 92%" fill-height>
      <app-bar />
      <v-row>
        <v-col cols="12" sm="12">
          <v-card flat light class="mt-7 pa-5">
            <v-card-title> Agregar categor&iacute;a </v-card-title>
            <v-form v-model="status" ref="form">
              <v-row class="my-5">
                <v-col cols="12" md="6">
                  <div v-if="errors.title" class="red--text">
                    {{ errors.title }}
                  </div>
                  <v-text-field
                    outlined
                    label="Nombre"
                    v-model="category.title"
                    :rules="titleRules"
                  >
                  </v-text-field>
                </v-col>
                <v-col cols="12" md="6">
                  <div v-if="errors.description" class="red--text">
                    {{ errors.description }}
                  </div>
                  <v-text-field
                    outlined
                    label="Descripción"
                    v-model="category.description"
                  />
                </v-col>
              </v-row>            
              <v-card-text>
                <v-row>
                  <v-spacer></v-spacer>

                  <v-btn
                    class="m-2"
                    color="secondary"
                    :href="$route('catalogs.categories.index')"
                    :block="$vuetify.breakpoint.xs"
                  >
                    Regresar
                    <v-icon dark right> mdi-keyboard-return</v-icon>
                  </v-btn>

                  <v-btn
                    class="m-2"
                    color="primary"
                    depressed
                    @click="validate"
                    :block="$vuetify.breakpoint.xs"
                  >
                    Confirmar
                    <v-icon dark right> mdi-check </v-icon>
                  </v-btn>
                </v-row>
              </v-card-text>
            </v-form>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>

<script>
import AppBar from "@/components/AppBar";

export default {
  name: "CategoriesCreate",
  components: {
    AppBar,
  },
  props: {
    errors: Object,
  },
  data: () => ({
    status: false,
    category: {
      title: "",
      description: "",
      local_image_url: "",
      web_image_url: "",
      firestore_reference: "",
    },
    titleRules: [
      (v) => !!v || "Ingrese el nombre",
      (v) =>
        !v || v.length >= 3 || "El nombre debe contener almenos dos caracteres",
    ],
    urlRules: [
      (v) => !!v || "Es importante identificar un contacto",
      (v) =>
        !v || v.length >= 3 || "El nombre debe contener almenos dos caracteres",
    ],
  }),
  methods: {
    validate(event) {
      let valid = this.$refs.form.validate();
      if (valid == true) this.storeCategory();
    },
    storeCategory() {
      this.$inertia.post(route("catalogs.categories.store"), this.category);
    },
  },
};
</script>

<template>
  <v-app>
    <v-container style="height: 92%" fill-height>
      <app-bar />
      <v-row>
        <v-col cols="12" sm="12">
          <v-card outlined light class="mt-7 pa-5">
            <v-card-title> Editar categor&iacute;a </v-card-title>
            <v-form v-model="status" ref="form">
              <v-row class="my-5">
                <v-col cols="12" md="6">
                  <div v-if="errors.title" class="red--text">{{ errors.title }}</div>
                  <v-text-field
                    outlined
                    label="Nombre"
                    v-model="category.title"
                    :rules="titleRules"
                  />
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
              <v-row class="my-5">
                <v-col cols="12" md="6">
                  <div v-if="errors.local_image_url" class="red--text">
                    {{ errors.local_image_url }}
                  </div>
                  <v-text-field
                    outlined
                    label="Url imagen local"
                    v-model="category.local_image_url"
                  />
                </v-col>
                <v-col cols="12" md="6">
                  <div v-if="errors.web_image_url" class="red--text">
                    {{ errors.web_image_url }}
                  </div>
                  <v-text-field
                    outlined
                    label="Url imagen web"
                    v-model="category.web_image_url"
                  />
                </v-col>
              </v-row>

              <v-row class="my-5">
                <v-col cols="12" md="6">
                  <div v-if="errors.firestore_reference" class="red--text">
                    {{ errors.firestore_reference }}
                  </div>
                  <v-text-field
                    outlined
                    label="Url imagen local"
                    v-model="category.firestore_reference"
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
                    :disabled="!status"
                    :block="$vuetify.breakpoint.xs"
                  >
                    Actualizar
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
  name: "CategoriesEdit",
  components: {
    AppBar,
  },
  props: {
    errors: Object,
    category: Object,
  },
  data: () => ({
    status: false,

    titleRules: [
      (v) => !!v || "Ingrese el nombre",
      (v) => !v || v.length >= 3 || "El nombre debe contener almenos dos caracteres",
    ],
  }),
  methods: {
    validate(event) {
      let valid = this.$refs.form.validate();
      if (valid == true) this.storeCategory();
    },
    storeCategory() {
      this.$inertia.put(
        route("catalogs.categories.update", this.category),
        this.category
      );
    },
  },
};
</script>

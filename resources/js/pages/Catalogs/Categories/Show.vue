<template>
  <v-app>
    <v-container style="height: 92%" fill-height>
      <app-bar />
      <v-row>
        <v-col cols="12" sm="12">
          <v-card outlined light class="mt-7 pa-5">
            <v-card-title> Informaci&oacute;n de categor&iacute;a </v-card-title>
            <v-row class="my-5">
              <v-col cols="12" md="6">
                <v-text-field outlined label="Nombre" v-model="category.title">
                </v-text-field>
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  label="Descripción"
                  v-model="category.description"
                />
              </v-col>
            </v-row>
            <v-row class="my-5">
              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  label="Url imagen local"
                  v-model="category.local_image_url"
                />
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  label="Url imagen web"
                  v-model="category.web_image_url"
                />
              </v-col>
              <v-col cols="12" md="6">
                <v-text-field
                  outlined
                  label="Firestore"
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
              </v-row>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>

<script>
import AppBar from "@/components/AppBar";

export default {
  name: "CategoriesShow",
  components: {
    AppBar,
  },
  props: {
    category: Object,
  },
};
</script>

<template>
  <v-app>
    <v-container style="height: 92%" fill-height>
      <app-bar />
      <v-row class="pt-15">
        <v-col cols="12" md="12">
          <v-card outlined>
            <v-data-table
              :headers="headers"
              :items="measures"
              class="elevation-0 primary--text"
              light
            >
              <template v-slot:[`item.is_active`]="{ item }">
                <v-container>
                  <v-avatar
                    :color="item.is_active ? 'green' : 'red'"
                    size="16"
                  ></v-avatar>
                </v-container>
              </template>
              <template v-slot:top>
                <v-toolbar flat>
                  <v-toolbar-title>Medidas</v-toolbar-title>

                  <v-spacer></v-spacer>

                  <v-btn :href="$route('catalogs')" color="secondary" dark class="m-2">
                    Regresar a cat&aacute;logos
                    <v-icon right>mdi-keyboard-return</v-icon>
                  </v-btn>
                  <v-btn
                    :href="$route('catalogs.measures.create')"
                    color="primary"
                    class="m-2"
                  >
                    Agregar
                    <v-icon right>mdi-plus</v-icon>
                  </v-btn>
                </v-toolbar>
                <v-dialog v-model="dialogtoggle" max-width="500px">
                  <v-card color="secondary" min-height="200px" class="d-flex flex-column">
                    <v-card-title>
                      <v-row align="center">
                        <p class="white--text px-3">
                          ¿Seguro que deseas
                          {{ selectedMeasure.is_active ? "desactivar" : "activar" }}
                          el medida
                          <span class="primary--text">
                            {{ selectedMeasure.name }}
                          </span>
                          ?
                        </p>
                      </v-row></v-card-title
                    >
                    <v-spacer></v-spacer>
                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn
                        color="primary"
                        class="white--text text-uppercase"
                        @click="closetoggle"
                        >Cancelar</v-btn
                      >
                      <v-spacer></v-spacer>
                      <v-btn
                        color="success"
                        class="white--text text-uppercase"
                        @click="toggleItemConfirm"
                        >Confirmar</v-btn
                      >
                      <v-spacer></v-spacer>
                    </v-card-actions>
                    <v-spacer></v-spacer>
                  </v-card>
                </v-dialog>
              </template>
              <template v-slot:[`item.actions`]="{ item }">
                <a :href="$route('catalogs.measures.show', item.id)">
                  <v-icon md class="mx-2"> mdi-eye </v-icon>
                </a>
                <a :href="$route('catalogs.measures.edit', item.id)">
                  <v-icon md class="mx-2"> mdi-pencil </v-icon>
                </a>
                <v-icon md @click="toggleItem(item)">
                  {{ item.is_active ? "mdi-delete" : "mdi-undo-variant" }}
                </v-icon>
              </template>
              <template v-slot:no-data>
                <v-btn
                  :href="$route('catalogs.measures.create')"
                  color="primary"
                  class="text-uppercase"
                >
                  Agregar una nuevo medida
                  <v-icon right>mdi-plus</v-icon>
                </v-btn>
              </template>
            </v-data-table>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>

<script>
import AppBar from "@/components/AppBar";

export default {
  name: "Measures",
  components: {
    AppBar,
  },
  props: ["measures"],

  data() {
    return {
      selectedMeasure: {},
      dialog: false,
      dialogtoggle: false,

      snackbarText: "",
      snackbarSubText: "",
      headers: [
        {
          text: "Id",
          align: "start",
          sortable: true,
          value: "id",
        },
        { text: "Nombre", value: "name" },
        { text: "Estado", value: "is_active" },
        {
          text: "Acciones",
          value: "actions",
          sortable: false,
          align: "center",
        },
      ],
    };
  },
  computed: {},
  methods: {
    toggleItem(item) {
      this.selectedMeasure = Object.assign({}, item);
      this.dialogtoggle = true;
    },
    toggleItemConfirm() {
      this.snackbarText = this.selectedMeasure.name;
      this.snackbarSubText = this.selectedMeasure.is_active ? "desactivado" : "activado";
      this.$inertia.delete(
        this.$route("catalogs.measures.destroy", this.selectedMeasure.id),
        this.selectedMeasure.id
      );
      this.closetoggle();
    },
    closetoggle() {
      this.dialogtoggle = false;

      this.selectedMeasure = {};
    },
  },
};
</script>

<style>
a:link {
  text-decoration: none;
}
</style>

<template>
  <v-app>
    <v-container style="height: 92%" fill-height>
      <app-bar />
      <v-row class="pt-15">
        <v-col cols="12" md="12">
          <v-card outlined>
            <v-data-table
              :headers="headers"
              :items="supplies"
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
                  <v-toolbar-title>Insumos</v-toolbar-title>

                  <v-spacer></v-spacer>

                  <v-btn :href="$route('catalogs')" color="secondary" dark class="m-2">
                    Regresar a cat&aacute;logos
                    <v-icon right>mdi-keyboard-return</v-icon>
                  </v-btn>
                  <v-btn
                    :href="$route('catalogs.supplies.create')"
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
                          {{ selectedSupplie.is_active ? "desactivar" : "activar" }}
                          el insumo
                          <span class="primary--text">
                            {{ selectedSupplie.name }}
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
                <a :href="$route('catalogs.supplies.show', item.id)">
                  <v-icon md class="mx-2"> mdi-eye </v-icon>
                </a>
                <a :href="$route('catalogs.supplies.edit', item.id)">
                  <v-icon md class="mx-2"> mdi-pencil </v-icon>
                </a>
                <v-icon md @click="toggleItem(item)">
                  {{ item.is_active ? "mdi-delete" : "mdi-undo-variant" }}
                </v-icon>
              </template>
              <template v-slot:no-data>
                <v-btn
                  :href="$route('catalogs.supplies.create')"
                  color="primary"
                  class="text-uppercase"
                >
                  Agregar un nuevo insumo
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
  name: "Supplies",
  components: {
    AppBar,
  },
  props: ["supplies"],

  data() {
    return {
      selectedSupplie: {},
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
        { text: "Medida", value: "id_measure" },
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
      this.selectedSupplie = Object.assign({}, item);
      this.dialogtoggle = true;
    },
    toggleItemConfirm() {
      this.snackbarText = this.selectedSupplie.name;
      this.snackbarSubText = this.selectedSupplie.is_active ? "desactivado" : "activado";
      this.$inertia.delete(
        this.$route("catalogs.supplies.destroy", this.selectedSupplie.id),
        this.selectedSupplie.id
      );
      this.closetoggle();
    },
    closetoggle() {
      this.dialogtoggle = false;

      this.selectedSupplie = {};
    },
  },
};
</script>

<style>
a:link {
  text-decoration: none;
}
</style>

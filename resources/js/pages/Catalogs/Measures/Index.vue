<template>
  <v-app>
    <v-container style="height: 92%" fill-height>
      <app-bar />
      <v-row class="pt-15">
        <v-col cols="12" md="12">
          <v-card outlined>
            <v-data-table
              :headers="headers"
              :items="suppliers"
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
                  <inertia-link href="/admin/catalogs/suppliers/create">
                    <v-btn color="primary" dark class="mb-2"> Agregar </v-btn>
                  </inertia-link>
                </v-toolbar>
                <v-dialog v-model="dialogtoggle" max-width="500px">
                  <v-card
                    color="tertiary"
                    min-height="200px"
                    class="d-flex flex-column"
                  >
                    <v-card-title class="primary--text mx-auto">
                      <v-row align="center">
                        ¿Seguro que deseas
                        {{
                          selectedSupplier.is_active ? "desactivar" : "activar"
                        }}
                        al proveedor {{ selectedSupplier.name }}?
                      </v-row></v-card-title
                    >
                    <v-spacer></v-spacer>
                    <v-card-actions>
                      <v-spacer></v-spacer>
                      <v-btn
                        color="info"
                        class="primary--text text-capitalize"
                        @click="closetoggle"
                        >Cancelar</v-btn
                      >
                      <v-spacer></v-spacer>
                      <v-btn
                        color="accent"
                        class="primary--text text-capitalize"
                        @click="toggleItemConfirm"
                        >Aceptar</v-btn
                      >
                      <v-spacer></v-spacer>
                    </v-card-actions>
                    <v-spacer></v-spacer>
                  </v-card>
                </v-dialog>
              </template>
              <template v-slot:[`item.actions`]="{ item }">
                <v-icon md @click="show(item.id)"> mdi-eye </v-icon>
                <v-icon md @click="edit(item.id)" class="mx-2">
                  mdi-pencil
                </v-icon>
                <v-icon md @click="toggleItem(item)">
                  {{ item.is_active ? "mdi-delete" : "mdi-undo-variant" }}
                </v-icon>
              </template>
              <template v-slot:no-data>
                <v-btn color="primary" class="text-capitalize">
                  Agregar un nuevo proveedor
                </v-btn>
              </template>
            </v-data-table>
          </v-card>
        </v-col>
      </v-row>
      <v-snackbar v-model="snackbar">
        Se ha {{ snackbarSubText }} con exito el proveedor {{ snackbarText }}
        <template v-slot:action="{ attrs }">
          <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">
            Cerrar
          </v-btn>
        </template>
      </v-snackbar>
    </v-container>
  </v-app>
</template>

<script>
import AppBar from "@/components/AppBar";

export default {
  name: "Suppliers",
  components: {
    AppBar,
  },
  props: ["suppliers"],
  created() {
    this.fetch();
  },
  data() {
    return {
      selectedSupplier: {},
      dialog: false,
      dialogtoggle: false,
      snackbar: false,
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
        { text: "Responsable", value: "responsable" },
        { text: "Teléfono", value: "phone_number" },
        { text: "Dirección", value: "address" },
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
    fetch() {},
    toggleItem(item) {
      this.selectedSupplier = Object.assign({}, item);
      this.dialogtoggle = true;
    },
    toggleItemConfirm() {
      this.snackbarText = this.selectedSupplier.name;
      this.snackbarSubText = this.selectedSupplier.is_active
        ? "desactivado"
        : "activado";
      dispatch(
        {
          controller: "suppliers",
          action: "status",
          params: this.selectedSupplier.id,
        },
        () => {
          this.snackbar = true;
          this.fetch();
          this.closetoggle();
        }
      );
    },
    closetoggle() {
      this.dialogtoggle = false;

      this.selectedSupplier = {};
    },
    show(id) {
      router.push({
        name: "CatalogsSuppliersShow",
        params: { id: id },
      });
    },
    edit(id) {
      router.push({
        name: "CatalogsSuppliersEdit",
        params: { id: id },
      });
    },
  },
};
</script>

<style >
a:link {
  text-decoration: none;
}
</style>
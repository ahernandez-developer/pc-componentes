<template>
  <v-app>
    <v-container style="height: 92%" fill-height>
      <app-bar />
      <v-row>
        <v-col cols="12" sm="12">
          <v-card  flat light class="mt-7 pa-5">
            <v-card-title> Agregar proveedor </v-card-title>
            <v-form v-model="status" ref="form">
              <v-row class="my-5">
                <v-col cols="12" md="6">
                  <div v-if="errors.name" class="red--text">{{ errors.name }}</div>
                  <v-text-field
                    outlined
                    label="Nombre"
                    v-model="supplier.name"
                    :rules="nameRules"
                  >
                  </v-text-field>
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field outlined label="Dirección" v-model="supplier.address" />
                </v-col>
              </v-row>
              <v-row class="my-5">
                <v-col cols="12" md="6">
                  <v-text-field
                    outlined
                    label="Responsable"
                    v-model="supplier.responsable"
                    :rules="responsableRules"
                  />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field
                    outlined
                    label="Teléfono"
                    v-model="supplier.phone_number"
                   
                  />
                </v-col>
              </v-row>

              <v-card-text>
                <v-row>
                  <v-spacer></v-spacer>

                  <v-btn
                    class="m-2"
                    color="secondary"
                    :href="$route('catalogs.suppliers.index')"
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
  name: "SuppliersCreate",
  components: {
    AppBar,
  },
  props: {
    errors: Object,
  },
  data: () => ({
    status: true,
    supplier: {
      name: "",
      address: "",
      responsable: "",
      phone_number: "",
      is_active: 1,
    },
    nameRules: [
      (v) => !!v || "Ingrese el nombre",
      (v) => !v || v.length >= 3 || "El nombre debe contener almenos dos caracteres",
    ],
    responsableRules: [
      (v) => !!v || "Es importante identificar un contacto",
      (v) => !v || v.length >= 3 || "El nombre debe contener almenos dos caracteres",
    ]    
  }),
  methods: {
    validate(event) {
      let valid = this.$refs.form.validate();
      if (valid == true) this.storeSupplier();
    },
    storeSupplier() {
      this.$inertia.post(route("catalogs.suppliers.store"), this.supplier);
    },
  },
};
</script>

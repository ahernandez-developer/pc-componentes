<template>
    <v-form v-model="status" lazy-validation ref="form">
      <div class="px-10 py-4">
        <v-row justify="space-between">
          <h1 class="ma-3">Editar proveedor</h1>
          <v-btn
            class="ma-3 primary--text text-capitalize"
            color="accent"
            depressed
            @click="validate"
            :disabled="!status"
          >
            Confirmar
            <v-icon dark right> mdi-check </v-icon>
          </v-btn>
        </v-row>
        <v-row>
          <v-col>
            <v-card light class="pa-5">
              <v-row class="my-5">
                <v-col cols="12" md="6">
                  <v-text-field
                    outlined
                    label="Nombre"
                    v-model="supplier.name"
                    :rules="nameRules"
                  />
                </v-col>
                <v-col cols="12" md="6">
                  <v-text-field
                    outlined
                    label="Dirección"
                    v-model="supplier.address"
                  />
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
                    :rules="phoneRules"
                  />
                </v-col>
              </v-row>
            </v-card>
          </v-col>
        </v-row>
      </div>
    </v-form>  
</template>

<script>
import AppBar from "@/components/AppBar";

export default {
  name: "Edit",
  components: {
    AppBar,
  },
  created() {
    this.supplierId = this.$route.params.id;
    this.findSupplier(this.supplierId);
  },
  data() {
    return {
      supplierId: 0,
      status: false,
      supplier: {},
      nameRules: [
        (v) => !!v || "Ingrese el nombre",
        (v) =>
          !v ||
          v.length >= 3 ||
          "El nombre debe contener almenos dos caracteres",
      ],
      responsableRules: [
        (v) => !!v || "Es importante identificar un contacto",
        (v) =>
          !v ||
          v.length >= 3 ||
          "El nombre debe contener almenos dos caracteres",
      ],
      phoneRules: [
        (v) =>
          !!v || "Ingrese un número de teléfono para contactar al proveedor",
        (v) => !v || v.length >= 3 || "Ingrese un número de teléfono valido",
      ],
    };
  },
  methods: {
    validate(event) {
      let valid = this.$refs.form.validate();      
      if (valid == true) this.updateSupplier();
    },
    findSupplier() {
      dispatch(
        {
          controller: "suppliers",
          action: "find",
          params: this.supplierId,
        },
        (response) => {
          
          this.supplier = response;
        }
      );
    },
    updateSupplier() {
      dispatch(
        {
          controller: "suppliers",
          action: "update",
          params: this.supplier,
        },
        (response) => {            
          router.push({ name: "CatalogsSuppliers" });
        }
      );
    },
  },
};
</script>

<style>
</style>
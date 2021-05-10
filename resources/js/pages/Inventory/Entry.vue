<template>
  <v-app>
    <v-container style="height: 92%" fill-height>
      <app-bar />
      <v-row class="mt-11" justify="space-between">
        <h1 class="ma-3">Entrada de inventario</h1>
        <v-btn
          class="ma-3 text-capitalize"
          color="success"
          depressed
          @click="validate"
        >
          Confirmar
          <v-icon dark right> mdi-check </v-icon>
        </v-btn>
      </v-row>
      <v-row>
        <v-col>
          <v-card flat>
            <v-form v-model="status" lazy-validation ref="form" class="pa-5">
              <v-row class="my-5">
                <v-col cols="12" md="12">
                  <v-autocomplete
                    v-model="entry.supplier"
                    :items="suppliers"
                    :filter="customFilter"
                    outlined
                    item-text="name"
                    item-value="id"
                    persistent-hint
                    :rules="supplierRules"
                    placeholder="Proveedor"
                    return-object
                    label="Proveedor"
                  ></v-autocomplete>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="12" md="12">
                  <v-autocomplete
                    class="pt-3"
                    v-model="entry.supply"
                    :items="supplies"
                    :filter="customFilter"
                    outlined
                    item-text="name"
                    item-value="id"
                    persistent-hint
                    :rules="supplyRules"
                    return-object
                    label="Insumo"
                  ></v-autocomplete>
                </v-col>
              </v-row>
              <v-row class="my-5">
                <v-col cols="12" md="6">
                  <v-text-field
                    v-model="entry.quantity"
                    outlined
                    label="Cantidad"
                    type="number"
                    :rules="quantityRules"
                  />
                </v-col>
                <v-col cols="12" md="2">
                  <v-text-field
                    v-model="entry.supply.measure.name"
                    outlined
                    label="Medida"
                    suffix="(s)"
                    type="text"
                    readonly
                  />
                </v-col>
                <v-col cols="12" md="4">
                  <v-text-field
                    v-model="entry.price"
                    outlined
                    label="Costo total de compra"
                    type="number"
                    :rules="priceRules"
                  />
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="12" md="6">
                  <v-text-field
                    outlined
                    class="pt-3"
                    v-model="entry.code"
                    placeholder="Numero de serie"
                  >
                  </v-text-field>
                </v-col>
              </v-row>
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
  name: "Entry",
  components: {
    AppBar,
  },
  props: {
    supplies: Array,
    suppliers: Array,
  },
  data: () => ({
    modal: false,
    entry: {
      supply: {
        measure: {},
      },
      supplier: {},
      quantity: null,
      price: null,
      code: "",
      expirationDate: new Date().toISOString().substr(0, 10),
    },
    status: false,
    supplyRules: [
      (v) => !!v || "seleccione un ingrediente",
      (v) => (!!v && v.id != null) || "Seleccione un ingrediente",
    ],
    supplierRules: [
      (v) => !!v || "seleccione un proveedor",
      (v) => (!!v && v.id != null) || "Seleccione un proveedor",
    ],
    quantityRules: [
      (v) => !!v || "Ingrese una cantidad",
      (v) => !v || v > 0 || "Ingrese un valor mayor que cero",
    ],
    priceRules: [
      (v) => !!v || "Ingrese una cantidad",
      (v) => !v || v > 0 || "Ingrese un valor mayor que cero",
    ],
    nameRules: [
      (v) => !!v || "Ingrese el nombre",
      (v) =>
        !v || v.length >= 3 || "El nombre debe contener almenos dos caracteres",
    ],
  }),
  methods: {
    validate() {
      let valid = this.$refs.form.validate();
      if (valid == true) this.storeInventoryEntry();
    },
    storeInventoryEntry() {
      this.$inertia.post(route("inventory.entry.store"), this.entry);
    },
    customFilter(item, queryText) {
      const textOne = item.name.toLowerCase();
      const searchText = queryText.toLowerCase();

      return textOne.indexOf(searchText) > -1;
    },
  },
};
</script>
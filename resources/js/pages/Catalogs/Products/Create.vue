<template>
  <v-app>
    <v-container style="height: 92%" fill-height>
      <app-bar />
      <v-row>
        <v-col cols="12" sm="12">
          <v-card flat light class="mt-7 pa-5">
            <v-card-title> Agregar producto </v-card-title>
            <v-card-actions>
              <v-spacer></v-spacer>

              <v-btn
                class="m-2"
                color="secondary"
                :href="$route('catalogs.products.index')"
                :block="$vuetify.breakpoint.xs"
              >
                Regresar
                <v-icon dark right> mdi-keyboard-return</v-icon>
              </v-btn>
              <v-btn
                class="ma-3 text-capitalize"
                color="primary"
                @click="validate"
                :disabled="!status"
              >
                Confirmar
                <v-icon dark right> mdi-check </v-icon>
              </v-btn>
            </v-card-actions>
            <v-form v-model="status" lazy-validation ref="form">
              <v-row class="my-5">
                <v-col cols="12" md="10">
                  <v-text-field
                    outlined
                    label="Nombre"
                    v-model="product.name"
                    :rules="nameRules"
                  />
                </v-col>
                <v-col cols="12" md="2">
                  <v-text-field
                    outlined
                    type="number"
                    label="Precio"
                    v-model="product.price"
                  />
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="12" md="8">
                  <v-autocomplete

                    v-model="product.id_category"
                    :items="categories"
                    :filter="customFilter"
                    outlined
                    item-text="title"
                    item-value="id"
                    persistent-hint
                    label="Categoria"
                  ></v-autocomplete>
                </v-col>

                <v-col cols="12" md="4">
                  <v-row justify="space-between" class="pt-3">
                    <v-btn
                      :outlined="!product.available"
                      x-large
                      :color="product.available ? 'success' : 'grey'"
                      class="mx-4 text-capitalize"
                      @click="product.available = true"
                      >Disponible</v-btn
                    >
                    <v-btn
                      :outlined="product.available"
                      x-large
                      :color="!product.available ? 'error' : 'grey'"
                      class="mx-4 text-capitalize"
                      @click="product.available = false"
                      >No disponible</v-btn
                    >
                  </v-row>
                </v-col>
              </v-row>
              <v-divider class="my-4"></v-divider>
              <v-row class="px-4" justify="space-between" align="center">
                <h2>Componentes</h2>
                <v-btn class="ma-3 text-capitalize" dark @click="addComponent">
                  Agregar componente
                  <v-icon right> mdi-plus </v-icon>
                </v-btn>
              </v-row>

              <v-row
                v-for="(component, index) in product.components"
                class="my-5"
                :key="index"
              >
                <v-col cols="12" md="6">
                  <v-autocomplete
                    class="pt-3"
                    v-model="component.supply"
                    :items="supplies"
                    :filter="customFilter"
                    outlined
                    item-text="name"
                    item-value="id"
                    persistent-hint
                    :rules="component.supplyRules"
                    return-object
                    label="Insumo"
                  ></v-autocomplete>
                </v-col>
                <v-col cols="12" md="2">
                  <v-text-field
                    class="pt-3"
                    outlined
                    label="Cantidad"
                    v-model="component.quantity"
                    type="number"
                    step="any"
                    min="0"
                    :rules="component.quantityRules"
                  />
                </v-col>
                <v-col cols="12" md="2">
                  <v-text-field
                    class="pt-3"
                    outlined
                    label="Medida"
                    v-model="component.supply.measure.name"
                    type="text"
                    readonly
                  />
                </v-col>
                <v-col cols="12" md="2">
                  <v-btn
                    v-if="product.components.length > 1"
                    class="ma-3 white--text text-capitalize"
                    color="error"
                    depressed
                    x-large
                    @click="removeComponent(index)"
                  >
                    Eliminar
                    <v-icon dark right> mdi-delete </v-icon>
                  </v-btn>
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
  name: "ProductsCreate",
  components: {
    AppBar,
  },
  props: {
    categories: Array,
    supplies: Array,
  },
  created() {
    console.log(this.supplies);
    this.addComponent();
  },
  data: () => ({
    status: false,
    product: {
      name: "",
      components: [],
      available: true,
      id_category: 1,
    },
    defaultComponent: {
      supply: {
        measure: {},
      },
      quantity: null,
      supplyRules: [
        (v) => !!v || "seleccione un componente",
        (v) => v.id != null || "seleccione un componente",
      ],
      quantityRules: [
        (v) => !!v || "Ingrese una cantidad",
        (v) => !v || v > 0 || "Ingrese un valor mayor que cero",
      ],
    },

    nameRules: [
      (v) => !!v || "Ingrese el nombre",
      (v) =>
        !v || v.length >= 3 || "El nombre debe contener almenos dos caracteres",
    ],
    responsableRules: [
      (v) => !!v || "Es importante identificar un contacto",
      (v) =>
        !v || v.length >= 3 || "El nombre debe contener almenos dos caracteres",
    ],
  }),
  methods: {
    validate() {
      let valid = this.$refs.form.validate();
      if (valid == true) this.storeProduct();
    },
    storeProduct() {
      this.$inertia.post("/admin/catalogs/products", this.product);
    },
    addComponent() {
      this.product.components.push(Object.assign({}, this.defaultComponent));
      this.product.components.reverse();
    },
    removeComponent(index) {
      this.product.components.splice(index, 1);
    },
    customFilter(item, queryText) {
      const textOne = item.name.toLowerCase();
      const searchText = queryText.toLowerCase();

      return textOne.indexOf(searchText) > -1;
    },
  },
};
</script>

<style>
</style>
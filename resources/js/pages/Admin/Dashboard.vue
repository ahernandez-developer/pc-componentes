<template>
  <v-app>
    <v-container style="height: 92%" fill-height>
      <app-bar/>
      <v-row align="center">
        <MenuOption
          v-for="(option, index) in options"
          cols="12"
          md="3"
          :key="index"
          :title="option.title"
          :icon="option.icon"
          :size="option.size"
          :route="option.route"
        />
      </v-row>
    </v-container>
  </v-app>
</template>

<script>

import AppBar from "@/components/AppBar.vue";
import MenuOption from "@/components/MenuOption.vue";
export default {
  name: "Home",
  components: {
    AppBar,
    MenuOption,
  },
  data() {
    return {
      options: [
         
        {
          icon: "mdi-pencil-box-multiple",
          size: "100px",
          title: "Catálogos",
          route: "/admin/catalogs",
        },
        {
          icon: "mdi-package-variant",
          size: "100px",
          title: "Inventario",
          route: "/admin/inventory",
        },
        {
          icon: "mdi-desktop-classic",
          size: "100px",
          title: "Categorias",
          route: "/admin/menu",
        },
        {
          icon: "mdi-cash-register",
          size: "100px",
          title: "Caja",
          route: "/admin/cashregister",
        }
      ],
    };
  },
};
</script>

<style >
a:link{
  text-decoration: none;
}
</style>

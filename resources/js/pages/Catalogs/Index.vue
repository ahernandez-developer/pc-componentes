<template>
  <v-app>
    <v-container style="height: 92%" fill-height>
      <app-bar />
      <v-row align="center" justify="start">
        <MenuOption
          v-for="(option, index) in options"
          cols="12"
          md="3"
          :key="index"
          :title="option.title"
          :route="option.route"
          :icon="option.icon"
          :size="option.size"
        />
      </v-row>
    </v-container>
  </v-app>
</template>

<script>
import AppBar from "@/components/AppBar.vue";
import MenuOption from "@/components/MenuOption.vue";
export default {
  name: "Catalogs",
  components: {
    AppBar,
    MenuOption,
  },
  created() {},
  data() {
    return {
      options: [
        {
          icon: "mdi-truck",
          size: "100px",
          title: "Proveedores",
          route: "/admin/catalogs/suppliers",
        },
        {
          icon: "mdi-package",
          size: "100px",
          title: "Medidas",
          route: "/admin/catalogs/measures",
        },
        {
          icon: "mdi-bookshelf",
          size: "100px",
          title: "Categorías",
          route: "/admin/menu",
        },
        {
          icon: "mdi-harddisk",
          size: "100px",
          title: "Insumos",
          route: "/admin/catalogs/supplies",
        },
        {
          icon: "mdi-desktop-tower-monitor",
          size: "100px",
          title: "Productos",
          route: "/admin/catalogs/products",
        },
      ],
    };
  },
};
</script>


<style >
a:link {
  text-decoration: none;
}
</style>
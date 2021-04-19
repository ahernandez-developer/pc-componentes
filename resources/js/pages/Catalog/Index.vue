<template>
  <v-app>
    <v-container style="height: 92%" fill-height>
      <app-bar/>
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
          size: "64px",
          title: "Proveedores",
          route: "/home/catalogs/suppliers",
        },
        {
          icon: "mdi-package",
          size: "64px",
          title: "Medidas",
          route: "/home/catalogs/measures",
        },
        {
          icon: "mdi-harddisk",
          size: "64px",
          title: "Insumos",
          route: "/home/catalogs/supplies",
        },
        {
          icon: "mdi-desktop-tower-monitor",
          size: "64px",
          title: "Productos",
          route: "/home/catalogs/products",
        },       
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
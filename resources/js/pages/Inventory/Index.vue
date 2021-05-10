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
  name: "Inventory",
  components: {
    AppBar,
    MenuOption,
  },
  created() {},
  data() {
    return {
      options: [
        {
          icon: "mdi-login-variant",
          size: "100px",
          title: "Entrada",
          route: "/admin/inventory/entry/create",
        },
        {
          icon: "mdi-logout-variant",
          size: "100px",
          title: "Salida",
          route: "/admin/inventory/departure/create",
        },
        {
          icon: "mdi-list-status",
          size: "100px",
          title: "Actual",
          route: "/admin/inventory/current",
        },
        // {
        //   icon: "mdi-magnify-plus",
        //   size: "100px",
        //   title: "Detalle",
        //   route: "/home/inventory/kardex",
        // },
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
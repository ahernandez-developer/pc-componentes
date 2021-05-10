<template>
  <div>
    <v-app-bar flat color="dark" dark fixed>
      <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>
      <v-toolbar-title>PC Componentes</v-toolbar-title>
    </v-app-bar>
    <v-navigation-drawer v-model="drawer" absolute temporary>
      <v-list nav dense>
        <v-list-item-group
          v-model="group"
          active-class="deep-purple--text text--accent-4"
        >
        <inertia-link :href="$route('admin')">
          <v-list-item>     
              <v-list-item-icon>
                <v-icon>mdi-home</v-icon>
              </v-list-item-icon>
              <v-list-item-title>Inicio</v-list-item-title>            
          </v-list-item>
        </inertia-link>
        </v-list-item-group>
         <v-list-item-group
          v-model="group"
          active-class="deep-purple--text text--accent-4"
        >
        <inertia-link :href="$route('catalogs')">
          <v-list-item>     
              <v-list-item-icon>
                <v-icon>mdi-view-grid</v-icon>
              </v-list-item-icon>
              <v-list-item-title>Catálogos</v-list-item-title>            
          </v-list-item>
        </inertia-link>
        </v-list-item-group>
         <v-list-item-group
          v-model="group"
          active-class="deep-purple--text text--accent-4"
        >
        <inertia-link :href="$route('inventory')">
          <v-list-item>     
              <v-list-item-icon>
                <v-icon>mdi-package</v-icon>
              </v-list-item-icon>
              <v-list-item-title>Inventario</v-list-item-title>            
          </v-list-item>
        </inertia-link>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

<script>
export default {
  name: "AppBar",
  data: () => ({
    drawer: false,
    group: null,
  }),
};
</script>

<style>
</style>
<template>
  <v-col :cols="cols" :md="md">
    <inertia-link :href="route">
      <v-card
        outlined
        color="dark"
        class="mx-2 my-4 px-4 py-4 pointer"
        rounded="lg"
      >
        <v-row justify="center">
          <v-icon
            light
            v-if="icon"
            class="dark--text"
            :style="{ 'font-size': size }"
            >{{ icon }}</v-icon
          >
        </v-row>
        <v-row justify="center">
          <v-card-title
            class="text-truncate display-1 font-weight-light dark--text px-2"
          >
            {{ title }}
          </v-card-title>
        </v-row>
      </v-card>
    </inertia-link>
  </v-col>
</template>

<script>
export default {
  props: ["img", "title", "route", "icon", "cols", "md", "size"],
  name: "MenuOption",
};
</script>

<style  scoped>
.pointer {
  cursor: pointer;
}
</style>
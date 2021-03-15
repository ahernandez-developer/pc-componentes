import Vue from "vue";
import Vuetify from 'vuetify/lib'


Vue.use(Vuetify);

export default new Vuetify({
  theme: {
    dark: true,
    themes: {
      dark: {
        primary: "#4A4A4A",
        secondary: "#696969",
        tertiary: "#FFFFFF",
        info: "#6DBEC4",
        accent: "#FFD500",
        error: "#b71c1c",
        background:"#FFFFFF",
      },
    },
  },
});

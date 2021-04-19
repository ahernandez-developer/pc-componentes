import Vue from "vue";
import Vuetify from 'vuetify/lib'
import '@mdi/font/css/materialdesignicons.css'

Vue.use(Vuetify);

export default new Vuetify({
  theme: {
    dark: false,
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

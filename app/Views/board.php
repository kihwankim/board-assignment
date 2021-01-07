<div id="app">
    <v-app>
      <v-main>
        <v-btn>Hello world</v-btn>
      </v-main>
    </v-app>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  <script>
    new Vue({ 
      el: '#app',
      vuetify: new Vuetify(),
    })
  </script>
<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <meta charset="utf-8"/>
  <title>view board</title>
</head>
<body>

<div id="app">
    <template>
    <v-app>
    <v-container>
        <v-card 
            elevation="2" 
            outlined 
            style="width: 30%, height=200">
            <v-toolbar dark>
                <v-toolbar-title>{{ board['title'] }}</v-toolbar-title>
                <v-subheader>{{ lastestDate() }}</v-subheader>
            </v-toolbar>
            <v-card-subtitle align="right">
                writer : {{ board['writer'] }}
            </v-card-subtitle>
            <v-card-text>
                {{ board['description'] }}
            </v-card-text>
        </v-card>
        <div align="right">
            <v-btn 
              large
              elevation="2"
              color="error"
              @click="deleteBoardDataAfterCheck"
            >
                delete
            </v-btn>
            <v-btn 
            large
            color="primary"
            elevation="2"
            @click="linkEditPage"
            >
                edit
            </v-btn>
      </div>
    </v-container>
    </v-app>
    </template>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    new Vue({ 
      el: '#app',
      vuetify: new Vuetify(),
      data: {
        board:{
            id: location.search,
            title: '',
            description: '',
            writer: '',
            created_at: '',
            updated_at: null
        },
        BASE_URL: 'http://localhost/version4/public/index.php'
      },
      created: function() {
        const data = location.pathname.split('/');
        const id = data[data.length - 1];
        fetch(`http://localhost/version4/public/index.php/data/board/${id}`)
          .then(res => {
            if(res.ok){
              return res.json();
            }
            throw new Error("Network reponse was not ok");
          })
          .then(json => {
            this.board = json.board;
          })
          .catch(error => {console.log(error)});
      },
      methods: {
          lastestDate() {
            if(this.board.updated_at != null) {
              return this.board.updated_at;
            } else {
              return this.board.created_at;
            }
          },
          deleteBoardDataAfterCheck() {
            if(confirm('Are you sure for deleting this board data?')){
              this.linkDelete();
            }
          },
          linkDelete() {
            axios.delete(`${this.BASE_URL}/data/removal/${this.board.id}`)
              .then(res => {
                window.location.href = `${this.BASE_URL}/home`;
              })
              .catch(error => {
                alert("not found");
              });
          },
          linkEditPage() {
            window.location.href = `${this.BASE_URL}/home/modification/${this.board.id}`;
          }
      }
    })
</script>
</body>
</html>

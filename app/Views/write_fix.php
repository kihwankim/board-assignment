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
  <title>edit page</title>
</head>
<body>

<div id="app">
<template>
  <div style="text-align: center; vertical-align: middle;">
      <div style="width:50%; display:inline-table; text-align: right; max-width: 700px; min-width: 100px">  
      <v-card>
          <v-card-title>
              <h2>Add a New Board Data</h2>
          </v-card-title>
          <v-card-text>
          <v-form class="px-3" 
              v-model="valid" 
              ref="form" 
          >
              <v-text-field
                v-model="board.writer"
                label="Writer"
                required
                name="writer"
                counter='30'
                :rules="[inputRules.minLenth, inputRules.validateMaxLengthOfWriter]"
              ></v-text-field>

              <v-text-field
                v-model="board.title"
                label="Title"
                required
                name="title"
                counter='45'
                :rules="[inputRules.minLenth, inputRules.validateMaxLengthOfTitle]"
              ></v-text-field>

              <v-textarea
                  label="Description"
                  v-model="board.description"
                  required
                  counter='1000'
                  name="description"
                  :rules="[inputRules.minLenth, inputRules.validateMaxLenth]"
              ></v-textarea>

              <v-btn
              class="mr-4"
              @click="editBoardData"
              :disabled="!valid"
              >
              submit
              </v-btn>
          </v-form>
          </v-card-text>
      </v-card>
    </div>
  </div>
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
        valid: false,
        board: {
            id: '',
            writer: '',
            title: '',
            description: '',            
        },
        inputRules: {
            minLenth: v => v.length >= 3 || 'Minimum length is 3 character',
            validateMaxLenth: v => v.length <= 1000 || 'exceed length more than 1000 characters',
            validateMaxLengthOfTitle: v => v.length <= 45 || 'exceed length more than 45 characters',
            validateMaxLengthOfWriter: v => v.length <= 30 || 'exceed length more than 30 characters'
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
        editBoardData() {
            const form = new FormData();
            console.log(this.board.id);
            form.append("id", this.board.id);
            form.append("writer", this.board.writer);
            form.append("title", this.board.title);
            form.append("description", this.board.description);
            console.log(form);
            axios.post(`${this.BASE_URL}/data/edit`, form)
              .then(res => {
                window.location.href = `${this.BASE_URL}/home`;
              })
              .catch(error => {
                alert("error for adding new board");
              });
          }
      } 
    })
</script>

</body>
</html>
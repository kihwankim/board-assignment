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
  <title>write</title>
</head>
<body>

<div id="app">
<template>
<v-app>
  <div style="text-align: center; vertical-align: middle;">
    <div style="width:50%; display:inline-table; text-align: right; max-width: 700px; min-width: 100px">
      <v-card class="elevation-0">
          <v-card-title>
              <h2>Add a New Board Data</h2>
          </v-card-title>
          <v-card-text>
          <v-form class="px-3" 
              v-model="valid" 
              ref="form" 
          >
              
              <v-text-field
                v-model="writer"
                label="Writer"
                required
                counter='30'
                :rules="[inputRules.minLenth, inputRules.validateMaxLengthOfWriter]"
                name="writer"
              ></v-text-field>

              <v-text-field
                v-model="title"
                label="Title"
                required
                name="title"
                counter='45'
                :rules="[inputRules.minLenth, inputRules.validateMaxLengthOfTitle]"
              ></v-text-field>

              <v-textarea
                  label="Description"
                  v-model="description"
                  required
                  counter='1000'
                  name="description"
                  :rules="[inputRules.minLenth, inputRules.validateMaxLenth]"
                  ></v-textarea>

              <v-btn
                  class="mr-4"
                  :disabled="!valid"
                  @click="createNewBoard"
              >
              submit
              </v-btn>
          </v-form>
          </v-card-text>
      </v-card>
      </div>
    </div>
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
        valid: false,
        writer: '',
        title: '',
        description: '',
        inputRules: {
            minLenth: v => v.length >= 3 || 'Minimum length is 3 character',
            validateMaxLenth: v => v.length <= 1000 || 'exceed length more than 1000 characters',
            validateMaxLengthOfTitle: v => v.length <= 45 || 'exceed length more than 45 characters',
            validateMaxLengthOfWriter: v => v.length <= 30 || 'exceed length more than 30 characters'
        },
        BASE_URL: 'http://localhost/version4/public/index.php'
      },
      methods: {
        createNewBoard() {
            const form = new FormData();
            form.append("writer", this.writer);
            form.append("title", this.title);
            form.append("description", this.description);
            axios.post(`${this.BASE_URL}/data/new`, form)
              .then(res => {
                window.location.href = `${this.BASE_URL}/home`;
              })
              .catch(error => {
                alert("error for adding new board");
              });
          },
      }
    })
</script>
</body>
</html>

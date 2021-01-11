<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
  <link href="../assets/board.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <meta charset="utf-8"/>
  <title>'hello'</title>
</head>
<body>

<div id="app">
<template>
  <v-simple-table>
    <template v-slot:default>
    <thead>
      <tr>
        <th class="text-left">#</th>
        <th class="text-left">Title</th>  
        <th class="text-left">Writer</th>
        <th class="text-left">Create At</th>  
      </tr>
    </thead>
    <tbody>
      <tr v-for="item in boards" @click="linkBoardDetailPage(item.id)">
        <td>{{ item.id }}</td>
        <td>{{ item.title }}</td>
        <td>{{ item.writer }}</td>
        <td>{{ item.create_at }}</td>
      </tr>
    </tbody>
    </template>
  </v-simple-table>
  </template>
  <div align="right">
            <v-btn 
            large
            elevation="2"
            @click="linkCreatePage"
            >
                create 
            </v-btn>
      </div>
      <div style="text-align:center" id="paging-data">
        <p v-html="pager"></p>
      </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script>
    new Vue({ 
      el: '#app',
      vuetify: new Vuetify(),
      data: {
          boards: [
            
          ],
        pager: '',
      },
      created: function() {
        const SEARCH_DATA = location.search;
        fetch(`http://localhost/version4/public/index.php/data${SEARCH_DATA}`)
          .then(res => {
            if(res.ok){
              return res.json();
            }
            throw new Error("Network reponse was not ok");
          })
          .then(json => {
            this.boards = json.boards;
            this.pager = json.pager;
          })
          .catch(error => {console.log(error)});
      },
      methods: {
          linkCreatePage() {
            window.location.href = `./home/board`;
          },
          linkBoardDetailPage(id) {
            window.location.href = `./home/board/${id}`;
          }
      },
    });
</script>

</body>
</html>

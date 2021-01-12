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
  <title>'write'</title>
</head>
<body>

<div id="app">
<template>
    <v-card>
        <v-card-title>
            <h2>Add a New Board Data</h2>
        </v-card-title>
        <v-card-text>
        <v-form class="px-3" 
            v-model="valid" 
            ref="form" 
            method="post" 
            action="../data/new">
            
            <v-text-field
            v-model="writer"
            label="Writer"
            required
            name="writer"
            ></v-text-field>

            <v-text-field
            v-model="title"
            label="Title"
            required
            name="title"
            :rules="inputRules"
            ></v-text-field>

            <v-textarea
                label="Description"
                v-model="description"
                required
                name="description"
                :rules="inputRules"
                ></v-textarea>

            <v-btn
            class="mr-4"
            type="submit"
            :disabled="!valid"
            >
            submit
            </v-btn>
        </v-form>
        </v-card-text>
    </v-card>
</template>

</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script>
    new Vue({ 
      el: '#app',
      vuetify: new Vuetify(),
      data: {
        valid: false,
        writer: '',
        title: '',
        description: '',
        inputRules: [
            v => v.length >= 3 || 'Minimum length is 3 character'
        ]
      },
    })
</script>
</body>
</html>

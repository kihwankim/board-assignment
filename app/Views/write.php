<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
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
            action="./new">
            
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
<?= $this->endSection() ?>

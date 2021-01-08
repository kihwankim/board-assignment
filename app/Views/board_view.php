<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div id="app">
    <v-container>
        <v-card style="width: 30%, height=200">
            <v-toolbar dark>
                <v-toolbar-title><?= $board['title'] ?></v-toolbar-title>
                <?= $board['create_at'] ?>
            </v-toolbar>
            <v-card-subtitle><?= $board['writer'] ?></v-card-subtitle>
            <?= $board['description'] ?>
        </v-card>
        <v-btn 
            color="red" 
            elevation="24"
            @click="back">
            Back
        </v-btn>
    </v-container>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script>
    new Vue({ 
      el: '#app',
      vuetify: new Vuetify(),
    })
</script>
<?= $this->endSection() ?>

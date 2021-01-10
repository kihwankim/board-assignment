<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div id="app">
    <template>
    <v-container>
        <v-card 
            elevation="2" 
            outlined 
            style="width: 30%, height=200">
            <v-toolbar dark>
                <v-toolbar-title><?= $board['title'] ?></v-toolbar-title>
                <v-subheader><?= $board['create_at'] ?></v-subheader>
            </v-toolbar>
            <v-card-subtitle align="right">
                writer : <?= $board['writer'] ?>
            </v-card-subtitle>
            <v-card-text>
                <?= $board['description'] ?>
            </v-card-text>
        </v-card>
        <div align="right">
            <v-btn 
            large
            elevation="2"
            @click="linkDelete(<?= $board['id'] ?>)"
            >
                delete
            </v-btn>
            <v-btn 
            large
            color="red"
            elevation="2"
            >
                edit
            </v-btn>
      </div>
    </v-container>
    </template>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script>
    new Vue({ 
      el: '#app',
      vuetify: new Vuetify(),
      data: {

      },
      methods: {
          linkDelete(id) {
            window.location.href = "../../home/delete/"+ id;
          }
      }
    })
</script>
<?= $this->endSection() ?>

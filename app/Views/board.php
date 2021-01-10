<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div id="app">
    <v-app>
      <v-main>
        <v-btn><?= $title ?></v-btn>
        <?php foreach($boards as $key => $value):?>
        <div>
          <div><?= $value['id'] ?></div>
          <div><?= $value['title'] ?></div>
        </div>
        <?php endforeach; ?>
        <?php if($pager): ?>
          <?php $pagi_path = 'version4/public/index.php/home'; ?>
          <?php $pager->setPath($pagi_path); ?>
          <?= $pager->links() ?>
        <?php endif; ?>
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
  <?= $this->endSection() ?>

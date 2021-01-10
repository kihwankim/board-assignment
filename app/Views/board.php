<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<div id="app">
  <v-container>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">create date</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($boards as $key => $value):?>
              <tr>
              <td>
                <?= $value['id'] ?>
              </td>
              <td>
                <a href="./home/board/<?= $value['id'] ?>">
                  <?= $value['title'] ?>
                </a>
              </td>
              <td>
                <?= $value['create_at']?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <div style="text-align: center;">
        <?php if($pager): ?>
          <?= $pager->links() ?>
        <?php endif; ?>
      </div>
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

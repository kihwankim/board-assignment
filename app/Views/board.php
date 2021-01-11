<?= $this->extend('layout/board_main') ?>

<?= $this->section('content') ?>
<div id="app">
<template>
    <v-container>
        <v-card 
            elevation="2" 
            outlined 
            style="width: 30%, height=200">
            <v-simple-table>
            <template v-slot:default>
              <thead>
                <tr>
                  <th class="text-left">
                    #
                  </th>
                  <th class="text-left">
                    Tittle
                  </th>
                  <th class="text-left">
                    Writer
                  </th>
                  <th class="text-left">
                    Create date
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="item in baords"
                  :key="item.id"
                  @click="linkBoardDetailPage(item.id)"
                >
                    <td>{{ item.id }}</td>
                    <td>{{ item.title }}</td>
                    <td>{{ item.writer }}</td>
                    <td>{{ item.create_at }}</td>
                </tr>
              </tbody>
            </template>
          </v-simple-table>
        </v-card>
        <div align="right">
            <v-btn 
            large
            elevation="2"
            @click="linkCreatePage"
            >
                create
            </v-btn>
      </div>
      <div style="text-align:center">
        <?php if($pager): ?>
          <?= $pager->links() ?>
        <?php endif; ?>
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
        baords: <?= json_encode($boards) ?>,
      },
      methods: {
          linkCreatePage() {
            window.location.href = `./home/board`;
          },
          linkBoardDetailPage(id) {
            window.location.href = `./home/board/${id}`;
          }
      }
    })
</script>

<?= $this->endSection() ?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <link href="http://localhost/version4/public//assets/board.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta charset="utf-8" />
    <title>baord</title>
</head>

<body>

    <div id="app">
        <template>
            <v-app>
                <!-- v-app - (header / v-navigation-drawer app / v-toolbar app / v-content) - v-container - row - col - 그리드 shall -->
                <v-container>
                    <v-card class="elevation-0" outlined>
                        <v-row>
                            <v-col>
                                <v-simple-table>
                                    <template v-slot:default>
                                        <thead>
                                            <tr class="d-flex">
                                                <th class="text-left col-1">#</th>
                                                <th class="text-left col-6">Title</th>
                                                <th class="text-left col-3">Writer</th>
                                                <th class="text-left col-2">Create At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="d-flex" v-for="(item, index) in boards"
                                                @click="linkBoardDetailPage(item.id)">
                                                <td class="col-1">{{ renderIndexNumber(index) }}</td>
                                                <td class="col-6">{{ item.title }}</td>
                                                <td class="col-3">{{ item.writer }}</td>
                                                <td class="col-2">{{ lastestDate(item) }}</td>
                                            </tr>
                                        </tbody>
                                    </template>
                                </v-simple-table>
                            </v-col>
                        </v-row>
                    </v-card>
                    <v-row>
                        <v-col class="d-flex justify-end">
                            <v-btn large elevation="2" color="secondary" @click="linkCreatePage">
                                create
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-container>
                <div class="d-flex justify-center" id="paging-data">
                    <p v-html="pager"></p>
                </div>
            </v-app>
        </template>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
    <script>
        new Vue({
            el: '#app',
            vuetify: new Vuetify(),
            data: {
                BASE_URL: 'http://localhost/version4/public/index.php',
                boards: [

                ],
                pager: '',
                pageNumber: 1,
            },
            created: function () {
                const SEARCH_DATA = location.search;
                fetch(`${this.BASE_URL}/data${SEARCH_DATA}`)
                    .then(res => {
                        if (res.ok) {
                            return res.json();
                        }
                        throw new Error("Network reponse was not ok");
                    })
                    .then(json => {
                        this.boards = json.boards;
                        this.pager = json.pager;
                        if (json.pageNumber) {
                            this.pageNumber = json.pageNumber;
                            console.log(this.pageNumber);
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            methods: {
                lastestDate(item) {
                    if (item.updated_at != null) {
                        return item.updated_at;
                    } else {
                        return item.created_at;
                    }
                },
                linkCreatePage() {
                    window.location.href = `${this.BASE_URL}/home/board`;
                },
                linkBoardDetailPage(id) {
                    window.location.href = `${this.BASE_URL}/home/board/${id}`;
                },
                renderIndexNumber(index) {
                    return 10 * (this.pageNumber - 1) + index + 1;
                }
            },
        });
    </script>

</body>

</html>
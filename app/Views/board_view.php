<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta charset="utf-8" />
    <title>view board</title>
</head>

<body>

    <div id="app">
        <template>
            <v-app>
                <v-container>
                    <v-row>
                        <v-col>
                            <v-card class="elevation-0" outlined height="300">
                                <v-toolbar dark>
                                    <v-toolbar-title>{{ board['title'] }}</v-toolbar-title>
                                    <v-spacer></v-spacer>
                                    <v-subheader>{{ lastestDate() }}</v-subheader>
                                </v-toolbar>
                                <v-card-subtitle class="d-flex justify-end">
                                    writer : {{ board['writer'] }}
                                </v-card-subtitle>
                                <v-card-text>
                                    {{ board['description'] }}
                                </v-card-text>
                            </v-card>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col class="d-flex justify-end">
                            <v-btn class="white--text" color="error" large @click="overlay = !overlay">
                                Delete
                            </v-btn>
                            <v-btn large color="primary" elevation="2" @click="linkEditPage">
                                edit
                            </v-btn>
                        </v-col>
                    </v-row>
                    <div>
                        <v-overlay :z-index="zIndex" :value="overlay" :light="true" :dark="false">
                            <v-container>
                                <v-form v-model="valid">
                                    <v-toolbar>
                                        Are you Sure for Deleting this??
                                    </v-toolbar>
                                    <v-toolbar>
                                        <v-row>
                                            <v-text-field class="ma-2" v-model="board.pw"
                                                :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                                :rules="[inputRules.minLenth, inputRules.validateMaxLengthOfPW, inputRules.validatePWData]"
                                                :type="show1 ? 'text' : 'password'" name="pw" label="Password"
                                                counter="60" @click:append="show1 = !show1"></v-text-field>
                                        </v-row>
                                    </v-toolbar>
                                    <v-toolbar>
                                        <v-row>
                                            <v-btn class="ml-5" large elevation="2" color="error" :disabled="!valid"
                                                @click="deleteBoardDataAfterCheck">
                                                Delete
                                            </v-btn>
                                            <v-btn large elevation="2" color="primary" @click="overlay = false">
                                                Canceal
                                            </v-btn>
                                        </v-row>
                                    </v-toolbar>
                                </v-form>
                                </v-conatiner>
                        </v-overlay>
                    </div>
                </v-container>
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
                overlay: false,
                zIndex: 0,
                show1: false,
                valid: false,
                board: {
                    pw: '',
                    id: location.search,
                    title: '',
                    description: '',
                    writer: '',
                    created_at: '',
                    updated_at: null
                },
                inputRules: {
                    minLenth: v => v.length >= 3 || 'Minimum length is 3 character',
                    validateMaxLengthOfPW: v => v.length <= 60 || 'Maximum len is 60 characters',
                    validatePWData: v => /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]+$/.test(
                            v) ||
                        'insert char/number/extra'
                },
                BASE_URL: 'http://localhost/version4/public/index.php'
            },
            created: function () {
                const data = location.pathname.split('/');
                const id = data[data.length - 1];
                fetch(`http://localhost/version4/public/index.php/data/board/${id}`)
                    .then(res => {
                        if (res.ok) {
                            return res.json();
                        }
                        throw new Error("Network reponse was not ok");
                    })
                    .then(json => {
                        this.board = json.board;
                        const newBoard = {
                            pw: '',
                            id: json.board.id,
                            title: json.board.title,
                            description: json.board.description,
                            writer: json.board.writer,
                            created_at: json.board.created_at,
                            updated_at: json.board.updated_at
                        }
                        this.board = newBoard;
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            methods: {
                lastestDate() {
                    if (this.board.updated_at != null) {
                        return this.board.updated_at;
                    } else {
                        return this.board.created_at;
                    }
                },
                deleteBoardDataAfterCheck() {
                    this.linkDelete(this.board.pw);
                },
                linkDelete(pw) {
                    const formData = new FormData();
                    formData.append("pw", pw);
                    formData.append("id", this.board.id);
                    axios.post(`${this.BASE_URL}/data/removal`, formData)
                        .then(res => {
                            window.location.href = `${this.BASE_URL}/home`;
                        })
                        .catch(error => {
                            alert("password is wrong!!!");
                            this.overlay = false;
                        });
                },
                linkEditPage() {
                    window.location.href = `${this.BASE_URL}/home/modification/${this.board.id}`;
                }
            }
        })
    </script>
</body>

</html>
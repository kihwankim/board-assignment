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
    <title>edit page</title>
</head>

<body>

    <div id="app">
        <template>
            <v-app>
                <v-container class="col-md-11 col-sm-12 col-lg-7 col-xl-7">
                    <v-card class="elevation-0" outlined>
                        <v-row>
                            <v-col class="d-flex justify-center">
                                <v-card-title>
                                    <h2>Fix the Board Data</h2>
                                </v-card-title>
                            </v-col>
                        </v-row>
                        <v-card-text class="ma-3">
                            <v-form class="px-3" v-model="valid" ref="form">
                                <v-text-field v-model="board.writer" label="Writer" required name="writer" counter='30'
                                    :rules="[inputRules.minLenth, inputRules.validateMaxLengthOfWriter]">
                                </v-text-field>

                                <v-text-field v-model="board.title" label="Title" required name="title" counter='45'
                                    :rules="[inputRules.minLenth, inputRules.validateMaxLengthOfTitle]">
                                </v-text-field>

                                <v-textarea label="Description" v-model="board.description" required counter='1000'
                                    name="description" :rules="[inputRules.minLenth, inputRules.validateMaxLenth]">
                                </v-textarea>
                                <v-text-field v-model="board.pw" :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                    :rules="[inputRules.minLenth, inputRules.validateMaxLengthOfPW, inputRules.validatePWData]"
                                    :type="show1 ? 'text' : 'password'" name="pw" label="password"
                                    hint="At least 8 characters" counter=60 @click:append="show1 = !show1">
                                </v-text-field>
                                <v-row>
                                    <v-col class="d-flex justify-end mt-4">
                                        <v-btn class="mr-4" @click="editBoardData" :disabled="!valid">
                                            submit
                                        </v-btn>
                                    </v-col>
                                </v-row>
                            </v-form>
                        </v-card-text>
                    </v-card>
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
                valid: false,
                show1: false,
                board: {
                    pw: '',
                    id: '',
                    writer: '',
                    title: '',
                    description: '',
                },
                inputRules: {
                    minLenth: v => v.length >= 3 || 'Minimum length is 3 character',
                    validateMaxLenth: v => v.length <= 1000 || 'exceed length more than 1000 characters',
                    validateMaxLengthOfTitle: v => v.length <= 45 || 'exceed length more than 45 characters',
                    validateMaxLengthOfWriter: v => v.length <= 30 || 'exceed length more than 30 characters',
                    validateMaxLengthOfPW: v => v.length <= 60 || 'exceed length more than 60 characters',
                    validatePWData: v => /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]+$/.test(
                        v) || 'inseret more than 1 character/number/extra data'
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
                        const respondData = {
                            pw: '',
                            id: json.board.id,
                            writer: json.board.writer,
                            title: json.board.title,
                            description: json.board.description,
                        }
                        this.board = respondData;
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            methods: {
                editBoardData() {
                    const form = new FormData();
                    form.append("id", this.board.id);
                    form.append("pw", this.board.pw);
                    form.append("writer", this.board.writer);
                    form.append("title", this.board.title);
                    form.append("description", this.board.description);
                    console.log(form);
                    axios.post(`${this.BASE_URL}/data/edit`, form)
                        .then(res => {
                            window.location.href = `${this.BASE_URL}/home`;
                        })
                        .catch(error => {
                            alert("password is not correct");
                        });
                }
            }
        })
    </script>

</body>

</html>
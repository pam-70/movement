<template>
<div class="container">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Добавить</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Новый ученик</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input type="text" placeholder="Фамилия" class="form-control" id="recipient-name" v-model.trim="lastname">
                            <input type="text" placeholder="Имя" class="form-control" id="recipient-name" v-model.trim="firstname">
                            <input type="text" placeholder="Отчество" class="form-control" id="recipient-name" v-model.trim="patronymic">
                        </div>
                        <div class="form-check form-check-inline"> Пол

                            <input type="radio" id="one" value="М" v-model.trim="gender">
                            <label for="one"> М</label>

                            <input type="radio" id="two" value="Ж" v-model.trim="gender">
                            <label for="two"> Ж</label>

                        </div>
                        <div class="form-group">
                            Дата рождения
                            <input type="date" class="form-control" placeholder="date naissance" id="recipient-name" v-model="born">
                            <select v-model="f_klasse">
                                <option v-for="(klasse,index) in url_klasse" value="" v-if="index == 4">{{ klasse.name}}</option>
                                <option v-else>{{ klasse.name}}</option>
                            </select>
                            <span>Класс: </span>
                            <select v-model="f_prefikse">
                                <option v-for="(prefikse,index) in url_prefikse" value="" v-if="index == 0">{{ prefikse.name}}</option>
                                <option v-else>{{ prefikse.name}}</option>
                            </select>
                            <span>Буква класса </span>
                            <br />

                            Номер личного дела
                            <input type="text" class="form-control" id="recipient-name" v-model.trim="casse">
                            Дата прибытия
                            <input type="date" class="form-control" placeholder="date naissance" id="recipient-name" v-model="arrival">
                            Номер и дата приказа
                            <input type="text" class="form-control" id="recipient-name" v-model.trim="order_pr">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button @click="clearform" type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button @click="add_student" type="button" class="btn btn-primary" data-dismiss="modal">Добавить</button>
                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>
import axios from "axios";
export default {
    data: function () {
        return {
            lastname: "",
            firstname: "",
            patronymic: "",
            casse: "",
            gender: "",
            arrival: "01.01.2020",
            order_pr: "",
            gender: "М",
            born: "",
            f_klasse: '',
            f_prefikse: '',
            url_klasse: [],
            url_prefikse: [],

            subject: [],
            klassform: [],
            url_year: "",
            url_user: [],

            url_subject: [],
            url_user: "",
            filtr_subject: "",
            filtr_klass: ""
        };
    },
    mounted() {
        this.update();

    },
    methods: {
        add: function () {
            //console.log(this.gender)

        },
        clearform: function () {

            this.lastname = "";
            this.firstname = "";
            this.patronymic = "";
            this.casse = "";
            this.gender = "";
            this.arrival = "";
            this.order_pr = "";
            this.gender = "М";

        },
        update: function () {
            axios.post("/studentshow").then(response => {
                this.url_klasse = response.data.url_klasse;
                this.url_prefikse = response.data.url_prefikse;
                //this.url_genders = response.data.url_genders;                
            });
        },
        add_student: function () {
            console.log(this.f_klasse);
            // добавляем участников соревнований
            const data_form = {
                lastname: this.lastname,

            };

            axios.post("/addstudent", data_form).then(response => {
                //console.log(response.data.url_klasse);
                // this.url_user = response.data.url_user;
                //this.url_categorie[]="";
                //this.clearform();
            });
        },

    }
}
</script>

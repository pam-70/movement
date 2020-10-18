<script>
import axios from "axios";
export default {
    //props: ["id"],
    data: function () {
        return {
            lastname: "",

        };
    },
    validators: {
        dob: {}
    },
    mounted() {
        this.update();
        // this.add_form();
    },
    methods: {

        update: function () {
            //обновляем форму открываем
            this.is_refresh = false;
            axios.post("/trenershow").then(response => {
                // при get
                //console.log(response);
                this.url_categorie = response.data.url_categorie;
                this.url_genders = response.data.url_genders;
                this.url_ages = response.data.url_ages;
                this.url_degrees = response.data.url_degrees;
                this.url_user = response.data.url_user;
                this.url_data = response.data.url_datas;
                this.v_degrees = response.data.v_degrees;
                this.is_refresh = false;
                this.id++;
            });
        },
        add_form: function () {
            // добавляем участников соревнований
            const data_form = {
                lastname: this.lastname,
                firstname: this.firstname,
                patronymic: this.patronymic,
                dob: this.dob,
                gender: this.gender,
                categorie: this.categorie,
                degree: this.degree,
                command: this.command,
                club: this.club,
                addUser: "addUser", // отправляем данные на сервер
                name: this.probname
            };

            axios.post("/addparticipant", data_form).then(response => {
                this.url_user = response.data.url_user;
                //this.url_categorie[]="";
                this.clearform();
            });
        },
        edit_user: function (id) {
            //вызываем строку редактирования в форму

            const data_id = {
                id: id //id строки
            };
            axios.post("/edituser", data_id).then(response => {
                //То что вернется

                //this.probname = response.data.name;
                // this.msg = response.data.dob;
                this.user_id = response.data.id;
                this.lastname = response.data.lastname;
                this.firstname = response.data.firstname;
                this.patronymic = response.data.patronymic;
                this.dob = response.data.dob;
                this.gender = response.data.gender;
                this.degree = response.data.degree;
                this.command = response.data.command;
                this.club = response.data.club;
                this.categorie_all = response.data.competition;
                //console.log(this.probname);
                //this.url_categorie[]="";
            });
        },
        updateuser: function () {
            // сохранение редактируемой строки

            const data_upd = {
                user_id: this.user_id,
                lastname: this.lastname,
                firstname: this.firstname,
                patronymic: this.patronymic,
                dob: this.dob,
                gender: this.gender,
                categorie: this.categorie,
                degree: this.degree,
                command: this.command,
                club: this.club,
                updUser: "UpdUser" // отправляем данные на сервер
            };
            //  If(valdatsoob==""){
            axios.post("/updatuser", data_upd).then(response => {
                this.url_user = response.data.url_user;

                this.clearform();
            });
            // }
        },

        clearform: function () {
            // очищаем заполненные данные формы
            this.lastname = "";
            this.firstname = "";
            this.patronymic = "";
            this.dob = "";
            this.gender = "";
            this.degree = "";
            this.command = 1;
            this.club = "";
            this.categorie = [];
        },
        filtercategori: function (id) {
            const data_upd = {
                categori: id
            };
            this.filterPost(data_upd);
        },
        filtergender: function (name) {
            const data_upd = {
                gender: name
            };
            this.filterPost(data_upd);
        },
        filterage: function (id) {
            const data_upd = {
                age: id
            };
            this.filterPost(data_upd);
        },
        filterdegree: function (id) {
            const data_upd = {
                degree: id
            };
            this.filterPost(data_upd);
        },
        filterlast: function (lastin) {
            const data_upd = {
                filterlast: lastin
            };
            this.filterPost(data_upd);
        },
        filterclub: function (clubin) {
            const data_upd = {
                filterclub: clubin
            };
            this.filterPost(data_upd);
        },

        filterPost: function (data_upd) {
            axios.post("/filtertrener", data_upd).then(response => {
                this.url_user = response.data.url_user;
            });
        },
        validatdat: function (dob) {
            let date = new Date(dob);
            if (date.getFullYear() > 3000) {
                this.valdatsoob = "Неверно записана дата.";
            } else {
                this.valdatsoob = "";
            }
        }
    }
};
</script>

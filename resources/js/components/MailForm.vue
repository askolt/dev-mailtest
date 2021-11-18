<template>
    <div class="send">
        <form action="">
            <div class="input">
                <label>Name</label>
                <input v-model="form.name" type="text">
            </div>
            <div class="input">
                <label>E-mail</label>
                <input v-model="form.email" type="text">
            </div>
            <div class="input">
                <label>Text</label>
                <input v-model="form.text" type="text">
            </div>

            <input type="button" value="Send" v-on:click="createMail">
        </form>
        <div class="errors">
            <div v-for="errorField in errors">
                <p v-for="errorType in errorField">
                    {{ errorType }}
                </p>
            </div>
        </div>
        <div v-if="status == true">
            <p><strong>Sended!</strong></p>
        </div>
    </div>

</template>

<script>
export default {
    name: "MailForm",
    data() {
        return {
            form: {
                name: "",
                email: "",
                text: ""
            },
            errors: [],
            status: false
        }
    },
    methods: {
        createMail: function ()
        {
            let _this = this;
            axios.post('/api/mail/create', {
                email: this.form.email,
                name: this.form.name,
                text: this.form.text,
            }).then(function (response) {
                if (response.data.status === true) {
                    _this.errors = [];
                    _this.status = true;
                }
            }).catch(function (error) {
                _this.errors = error.response.data.errors;
                _this.status = false;
            })
        }
    },
}
</script>

<style scoped>
.send {
    border: 1px solid black;
    margin: 5px;
    padding: 5px;
}
.send .input {
    margin: 5px;
}

</style>

<template>
    <div class="mt-4 col-12 col-md-6 offset-md-3">
        <h1 class="mb-2 text-center">Форма обратной связи</h1>
        <form class="form" @submit.prevent="send">
            <div v-if="succes" class="alert alert-success" role="alert">Заявка успешно отправлена</div>
            <div v-if="errorMessage" class="alert alert-danger" role="alert">{{errorMessage}}</div>
            <div class="form-group mb-3">
                <label for="name">Имя: </label>
                <input v-model="form.name" type="text" class="form-control" id="name" placeholder="Ваше имя" name="name">
                <div v-if="errors.name" class="alert alert-danger" role="alert">{{errors.name}}</div>
            </div>

            <div class="form-group mb-3">
                <label for="email">Телефон: </label>
                <input v-model="form.phone" type="text" class="form-control" id="phone" placeholder="Ваш телефон" name="phone">
                <div v-if="errors.phone" class="alert alert-danger" role="alert">{{errors.phone}}</div>
            </div>

            <div class="form-group mb-3">
                <label for="message">Сообщение: </label>
                <textarea v-model="form.message" type="text" class="form-control" id="message" placeholder="Текст сообщения" name="message"></textarea>
                <div v-if="errors.message" class="alert alert-danger" role="alert">{{errors.message}}</div>
            </div>

            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Form",

        data() {
            return {
                form: {
                    name: null,
                    phone: null,
                    message: null
                },
                errors: { 
                    name: null,
                    phone: null,
                    message: null
                },
                errorMessage: null,
                succes: false,
            }
        },

        methods: {
            async send() {
                this.resetErrors();
                axios.post('/order', this.form)
                    .then(response => {
                        this.succes = response.data.succes;

                        if (!this.succes) {
                            this.errorMessage = 'Ошибка сервера';
                        }
                    })
                    .catch(error => {
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors;
                            this.errorMessage = error.response.data.message;
                        } else {
                            this.errorMessage = 'Ошибка сервера';
                        }
                    })
            },

            resetErrors() {
                this.errorMessage = null;
                this.succes = false;
                this.errors.name = null;
                this.errors.phone = null;
                this.errors.message = null;
            }
        },
    }
</script>

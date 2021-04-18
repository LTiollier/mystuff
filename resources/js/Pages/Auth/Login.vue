<template>
    <section class="hero is-primary is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                        <form class="box" @submit="login">
                            <b-field label="Email">
                                <b-input v-model="form.email" />
                            </b-field>
                            <b-field label="Password">
                                <b-input
                                    v-model="form.password"
                                    type="password"
                                    password-reveal />
                            </b-field>
                            <b-field>
                                <b-checkbox v-model="form.remember">
                                    Se souvenir
                                </b-checkbox>
                            </b-field>
                            <div class="field">
                                <button class="button is-success" type="submit">
                                    Se connecter
                                </button>
                            </div>
                            <div class="field">
                                <div class="button is-primary" @click="forgetPassword">
                                    Mot de passe oublié
                                </div>
                            </div>
                            <div class="field">
                                <div class="button is-info" @click="createAccount">
                                    Créer un compte
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
                remember: false,
            }),
        }
    },
    methods: {
        login() {
            this.form
                .transform(data => ({
                    ...data,
                    remember: data.remember ? 'on' : '',
                }))
                .post(this.route('login.attempt'));
        },
        forgetPassword() {
            this.$inertia.visit(this.route('password.request'));
        },
        createAccount() {
            this.$inertia.visit(this.route('register'));
        }
    }
}
</script>

<style scoped>

</style>

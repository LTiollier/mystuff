<template>
    <section class="hero is-primary is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                        <form class="box" @submit.prevent="register">
                            <b-field
                                :type="isError(form.errors.name)"
                                :message="form.errors.name"
                                label="Nom">
                                <b-input v-model="form.name" />
                            </b-field>
                            <b-field
                                :type="isError(form.errors.email)"
                                :message="form.errors.email"
                                label="Email">
                                <b-input v-model="form.email" />
                            </b-field>
                            <b-field
                                :type="isError(form.errors.password)"
                                :message="form.errors.password"
                                label="Password">
                                <b-input
                                    v-model="form.password"
                                    type="password"
                                    password-reveal />
                            </b-field>
                            <b-field
                                :type="isError(form.errors.password_confirmation)"
                                :message="form.errors.password_confirmation"
                                label="Confirmation">
                                <b-input
                                    v-model="form.password_confirmation"
                                    type="password"
                                    password-reveal />
                            </b-field>
                            <div class="field">
                                <button class="button is-success" type="submit">
                                    Créer compte
                                </button>
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
    name: "Register",
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            }),
        }
    },
    methods: {
        register() {
            this.form.post(this.route('register.attempt'))
        },
    }
}
</script>

<style scoped>

</style>

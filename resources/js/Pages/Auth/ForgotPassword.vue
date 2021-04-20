<template>
    <section class="hero is-primary is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                        <form class="box" @submit.prevent="forgotPassword">
                            <b-field
                                :type="isError(form.errors.email)"
                                :message="form.errors.email"
                                label="Email">
                                <b-input v-model="form.email" />
                            </b-field>
                            <div class="field">
                                <button class="button is-success" type="submit">
                                    Réinitialiser
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
    name: "ForgotPassword",
    data() {
        return {
            form: this.$inertia.form({
                email: '',
            }),
        }
    },
    methods: {
        forgotPassword() {
            this.form.post(this.route('password.email'));
        },
    }
}
</script>

<style scoped>

</style>

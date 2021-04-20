<template>
    <div>
        <b-navbar class="has-background-primary">
            <template #brand>
                <b-navbar-item>
                    <img
                        src="https://raw.githubusercontent.com/buefy/buefy/dev/static/img/buefy-logo.png"
                        alt="Lightweight UI components for Vue.js based on Bulma">
                </b-navbar-item>
            </template>
            <template #start>
                <b-navbar-item href="#" class="has-text-white">
                    Home
                </b-navbar-item>
                <b-navbar-item href="#" class="has-text-white">
                    Documentation
                </b-navbar-item>
            </template>

            <template #end>
                <b-navbar-item tag="div">
                    <div class="button is-info" @click="logout">
                        <strong>Déconnexion</strong>
                    </div>
                </b-navbar-item>
            </template>
        </b-navbar>
        <div class="container">
            <slot />
        </div>
    </div>
</template>

<script>
export default {
    name: "BaseLayout",
    data() {
        return {}
    },
    methods: {
        logout() {
            this.$inertia.post(this.route('logout'));
        }
    }
}
</script>

<style scoped>

</style>

<template>
    <section>
        <b-sidebar
            v-model="open"
            type="is-light"
            fullheight
            overlay
            right
            @close="$emit('close')">
            <div class="p-1">
                <img
                    src="https://raw.githubusercontent.com/buefy/buefy/dev/static/img/buefy-logo.png"
                    alt="Lightweight UI components for Vue.js based on Bulma">
                <b-menu>
                    <b-menu-list label="Menu">
                        <b-menu-item icon="information-outline" label="Info" />
                        <b-menu-item icon="settings">
                            <template #label="props">
                                Administrator
                                <b-icon class="is-pulled-right" :icon="props.expanded ? 'menu-down' : 'menu-up'" />
                            </template>
                            <b-menu-item icon="account" label="Users" />
                            <b-menu-item icon="cellphone-link">
                                <template #label>
                                    Devices
                                    <b-dropdown aria-role="list" class="is-pulled-right" position="is-bottom-left">
                                        <template #trigger>
                                            <b-icon icon="dots-vertical" />
                                        </template>
                                        <b-dropdown-item aria-role="listitem">
                                            Action
                                        </b-dropdown-item>
                                        <b-dropdown-item aria-role="listitem">
                                            Another action
                                        </b-dropdown-item>
                                        <b-dropdown-item aria-role="listitem">
                                            Something else
                                        </b-dropdown-item>
                                    </b-dropdown>
                                </template>
                            </b-menu-item>
                            <b-menu-item icon="cash-multiple" label="Payments" disabled />
                        </b-menu-item>
                        <b-menu-item icon="account" label="My Account">
                            <b-menu-item label="Account data" />
                            <b-menu-item label="Addresses" />
                        </b-menu-item>
                    </b-menu-list>
                    <b-menu-list>
                        <b-menu-item label="Expo" icon="link" target="_blank" />
                    </b-menu-list>
                    <b-menu-list label="Actions">
                        <b-menu-item label="Logout" />
                    </b-menu-list>
                </b-menu>
            </div>
        </b-sidebar>
    </section>
</template>

<script>
export default {
    name: "ProductSidebar",
    props: {
        product: {
            type: Object,
            required: false,
            default: () => { return {}; }
        }
    },
    data() {
        return {
            open: false
        }
    },
    watch: {
        product: function (product) {
            if (product) {
                this.open = true;
            }
        }
    }
}
</script>

<template>
    <base-layout>
        <section class="hero">
            <div class="hero-body">
                <p class="title">
                    Votre coffre
                </p>
                <p class="subtitle">
                    Pour voir/modifier vos idées/achats.
                </p>
            </div>
        </section>
        <nav class="breadcrumb" aria-label="breadcrumbs">
            <ul>
                <li :class="{'is-active': parents.length === 0}">
                    <a v-if="parents.length === 0">Root</a>
                    <a v-else @click="visitFolder()">Root</a>
                </li>
                <li v-for="(folder, index) in parents" :key="folder.id" :class="{'is-active': parents.length === index + 1}">
                    <a @click="visitFolder(folder.id)">{{ folder.name }}</a>
                </li>
            </ul>
        </nav>
        <div class="box is-flex is-mobile is-flex-wrap-wrap is-flex-direction-row">
            <Folder v-for="folder in folders" :key="'folder' + folder.id" :folder="folder" class="mx-3" @click="visitFolder(folder.id)" />
            <Product v-for="product in products" :key="'product' + product.id" :product="product" class="mx-3" @click="setSelectedProduct(product)" />
        </div>
        <product-sidebar :product="selectedProduct" @close="setSelectedProduct()" />
    </base-layout>
</template>

<script>
import BaseLayout from "../Layouts/BaseLayout";
import Folder from "../Components/Folder";
import Product from "../Components/Product";
import ProductSidebar from "../Components/ProductSidebar";

export default {
    name: "Dashboard",
    components: {ProductSidebar, Product, Folder, BaseLayout},
    props: {
        folders: {
            type: Array,
            required: true
        },
        products: {
            type: Array,
            required: true
        },
        parents: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            selectedProduct: null
        }
    },
    methods: {
        visitFolder(folderId = null) {
            this.$inertia.visit(route('dashboard', {folder: folderId}));
        },
        setSelectedProduct(product = null) {
            this.selectedProduct = product;
        }
    }
}
</script>

<style scoped>

</style>

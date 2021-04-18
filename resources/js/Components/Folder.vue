<template>
    <div class="folder folder--durga" ref="folder">
        <div class="folder__icon folder__icon--perspective">
            <div class="folder__icon-img folder__icon-img--back">
                <svg
                    class="folder__icon-svg"
                    version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 20 16" style="enable-background:new 0 0 200 270;" xml:space="preserve">
                    <path d="M7.5,0C7.4,0,2,0,2,0C0.9,0,0,0.9,0,2l0,12c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V4c0-1.1-0.9-2-2-2c0,0-7.5,0-8,0C9,2,9.9,0,7.5,0z"/>
                </svg>
            </div>
            <div class="folder__icon-deco"></div>
            <div class="folder__icon-img folder__icon-img--cover">
                <svg
                    class="folder__icon-svg"
                    version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 20 16" style="enable-background:new 0 0 200 270;" xml:space="preserve">
                    <path d="M2,2h16c1.1,0,2,0.9,2,2v10c0,1.1-0.9,2-2,2H2c-1.1,0-2-0.9-2-2V4C0,2.9,0.9,2,2,2z"/>
                </svg>
            </div>
        </div>
        <h3 class="folder__caption">{{ folder.name }}</h3>
    </div>
</template>

<script>
export default {
    name: "Folder",
    props: {
        folder: {
            type: Object,
            required: true,
        },
    },
    mounted() {
        new DurgaFx(this.$refs.folder);
    },
}
</script>

<style scoped>

</style>

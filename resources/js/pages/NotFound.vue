<template>
    <div class="dashboard-content">
        <!-- Content -->
        <div class="row">
            <!-- Profile -->
            <h1 class="title">404</h1>
            <p class="sub-title">Page introuvable</p>
        </div>

    </div>
    <!-- Content / End -->
</template>

<script>
    export default {
        name: "Dashboard",
        data: function () {
            return {
                message: "Mounted",
            }
        },
        mounted() {
            this.onMounted()
        },
        methods: {
            onMounted: function () {
                console.log(this.message)
            }
        }
    }
</script>

<style scoped>
    .title {
        font-size:80px;
        font-weight:bold;
        text-align:center;
        margin-top:100px;
        letter-spacing:5px;
    }
    .sub-title {
        text-align:center;
        margin-top:10px;
        letter-spacing:2px;
    }
</style>

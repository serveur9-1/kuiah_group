<template>
    <div id="wrapper">
        <NavbarComponent v-if="currentUser"/>

        <div id="dashboard">
            <SidebarComponent v-if="currentUser"/>
            <router-view></router-view>
        </div>

    </div>
</template>

<script>
    import SidebarComponent from "./layouts/SidebarComponent";
    import NavbarComponent from "./layouts/NavbarComponent";
    export default {
        components: {NavbarComponent, SidebarComponent},
        computed: {
            currentUser() {
                return this.$store.state.auth.user;
            },
        },
    }
</script>

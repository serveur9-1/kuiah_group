<template>
    <div id="wrapper">

        <NavbarComponent/>

        <div id="dashboard">
            <SidebarComponent/>
            <router-view></router-view>
        </div>

    </div>
</template>

<script>
    import SidebarComponent from "./layouts/SidebarComponent";
    import NavbarComponent from "./layouts/NavbarComponent";
    export default {
        components: {NavbarComponent, SidebarComponent},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

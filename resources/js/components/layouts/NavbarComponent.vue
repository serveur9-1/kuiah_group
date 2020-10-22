<template>
    <div>
        <header class="dashboard-header">
            <div class="container">
                <div class="sixteen columns">
                    <!-- Logo -->
                    <div id="logo">
                        <h1>
                            <router-link to="/dashboard">
                                <img src="images/logo.png" alt="Work Scout" />
                            </router-link>
                        </h1>
                    </div>
                    <!-- Menu -->
                    <nav id="navigation" class="menu">
                        <ul class="responsive float-right">
                            <li>
                                <router-link to="/account">
                                    <i class="fa fa-user"></i> Mon compte
                                </router-link>
                            </li>
                            <li><a href="index.html"><i class="fa fa-sign-out"></i> Se deconnecter</a></li>
                        </ul>
                    </nav>

                    <!-- Navigation -->
                    <div id="mobile-navigation">
                        <a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i></a>
                    </div>

                </div>
            </div>
        </header>
    </div>
</template>

<script>
    export default {
        name: "NavbarComponent"
    }
</script>

<style scoped>

</style>

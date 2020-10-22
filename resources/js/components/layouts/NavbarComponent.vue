<template>
    <div>
        <header class="dashboard-header">
            <div class="container">
                <div class="sixteen columns">
                    <!-- Logo -->
                    <div id="logo">
                        <h1><a href="index.html"><img src="images/logo.png" alt="Work Scout" /></a></h1>
                    </div>
                    <!-- Menu -->
                    <nav id="navigation" class="menu">
                        <ul class="responsive float-right">
                            <li><a href="dashboard.html"><i class="fa fa-cog"></i> Dashboard</a></li>
                            <li><a href="index.html"><i class="fa fa-lock"></i> Log Out</a></li>
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

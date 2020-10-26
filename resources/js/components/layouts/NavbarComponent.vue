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
                                <router-link to="/notification/list" class="notif-wrapper">
                                    <i class="fa  fa-bell" style="font-size:29px;">
                                    </i>
                                     <span class="badge"><center><sup style="font-size:10px;font-weight: bold;">99+</sup></center></span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/account">
                                    <i class="fa fa-user"></i> Mon compte
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/login">
                                    <i class="fa fa-sign-out"></i> Se deconnecter
                                </router-link>
                            </li>
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
.badge {
  position: absolute;
  top: 6px;
  right: 10px;
  height:20px;
  width: 20px;
  border-radius: 50%;
  background: red;
  color: white;
}
.notif-wrapper {
    background: white !important;
}

</style>

<template>
    <div>
        <header class="dashboard-header">
            <div class="container">
                <div class="sixteen columns">
                    <!-- Logo -->
                    <div id="logo">
                        <h1>
                            <router-link to="/">
                                <img src="/images/logo.jpeg" alt="kuiah group" class="logo" />
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
                                    <!-- /account -->
                                    <i class="fa fa-user"></i> Mon compte
                                </router-link>
                            </li>
                            <li>
                                <a class="nav-link" href @click.prevent="logOut">
                                    <i class="fa fa-sign-out"></i> Se deconnecter
                                </a>
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
  computed: {
    currentUser() {
      return this.$store.state.auth.user;
    },
  },
  methods: {
    logOut() {
      this.$store.dispatch('auth/logout');
    //   this.$router.push('/login');
        location.reload();
    }
  }
};
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
.logo{
    height:auto;
    width: 100px;
}

</style>

<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>


        <!-- Content -->
        <div class="row">
            <!-- Profile -->
            <div class="col-lg-6 col-md-12">
                <div class="dashboard-list-box margin-top-0">
                    <h4 class="gray">Change Information {{currentUser.access_token}}</h4>
                    <div class="dashboard-list-box-static">

                        <!-- Change Password -->
                        <div class="my-profile">
                            <label class="margin-top-0">Fullname</label>
                            <input type="text">

                            <label>New E-mail</label>
                            <input type="email">

                            <button class="button margin-top-15">Save Information</button>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Change Password -->
            <div class="col-lg-6 col-md-12">
                <div class="dashboard-list-box margin-top-0">
                    <h4 class="gray">Change Password</h4>
                    <div class="dashboard-list-box-static">

                        <!-- Change Password -->
                        <div class="my-profile">
                            <label class="margin-top-0">Current Password</label>
                            <input type="password">

                            <label>New Password</label>
                            <input type="password">

                            <label>Confirm New Password</label>
                            <input type="password">

                            <button class="button margin-top-15">Change Password</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- Content / End -->
</template>

<script>
    import TitlebarComponent from "../components/layouts/TitlebarComponent";
    export default {
        name: "Dashboard",
        components: {TitlebarComponent},
        computed: {
            currentUser() {
                return this.$store.state.auth.user;
            }
        },
        mounted() {
            if (!this.currentUser) {

                this.$router.push('/login');
            }
        },
        methods: {
            onMounted: function () {
                console.log(this.message)
            }
        }
    }
</script>

<style scoped>

</style>

<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>


        <!-- Content -->
        <div class="row">
            <!-- Profile -->
            <div class="col-lg-6 col-md-12">
                <div class="dashboard-list-box margin-top-0">
                    <h4 class="gray">Change Information </h4>
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
                <div class="notification notice" v-if="savingSuccessful">
                    Modification éffectué avec succès.
                </div>
                <div class="dashboard-list-box margin-top-0">
                    <h4 class="gray">Change Password</h4>
                    <div class="dashboard-list-box-static">
                        <form @submit.prevent="oldPassword">

                            <!-- Change Password -->
                            <div class="my-profile">
                                <label class="margin-top-0">Current Password</label>
                                <input type="password" v-model="old_password">
                                <span class="notification" v-if="message">
                                    Mot de passe incorrect
                                </span>

                                <label>New Password</label>
                                <input type="password" v-model="password">

                                <label>Confirm New Password</label>
                                <input type="password" v-model="password_confirmation   ">

                                <button class="button margin-top-15" type="submit">Change Password</button>
                            </div>
                            <div class="notification notice" v-if="message">
                                Mot de passe incorrect
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- Content / End -->
</template>

<script>
    import axios from 'axios'
    import { API_BASE_URL } from './src/config'
    import TitlebarComponent from "./../components/layouts/TitlebarComponent";
    export default {
        name: "Dashboard",
        components: {TitlebarComponent},
        data: function () {
            return {
                message: '',
                old_password: '',
                password: '',
                password_confirmation: '',
                errors: '',
                savingSuccessful:false,
                isLoading: false
            }
        },
        computed: {
            currentUser() {
                return this.$store.state.auth.user;
            }
        },
        mounted() {
            if (!this.currentUser) {

                location.reload();
            }
        },
        methods: {
            onMounted: function () {
                console.log(this.message)
            },
            onSubmit() {
            this.isLoading = true
            this.oldPassword()
            },
            async oldPassword() {

                await axios.post(API_BASE_URL + '/users/oldPassword', this.$data)
                    .then(response => {
                        this.old_password = ''
                        this.password = ''
                        this.password_confirmation = ''
                        this.isLoading = false
                        this.savingSuccessful=true
                        this.$emit('completed', response.data.data)
                    })
                    .catch(error => {
                    this.loading = false;
                    this.message =
                        (error.response && error.response.data && error.response.data.message) ||
                        error.message ||
                        error.toString();

                    })
            }
        }
    }
</script>

<style scoped>

</style>

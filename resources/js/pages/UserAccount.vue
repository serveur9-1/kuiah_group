<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="font-weight:bold">{{ title}}</h2>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="row">
            <!-- Profile -->
            <div class="col-lg-6 col-md-12">
                <div class="dashboard-list-box margin-top-0">
                    <h4 class="gray">Change Information</h4>
                    <div class="dashboard-list-box-static">
                        <form @submit.prevent="updateInfo">
                            <!-- Change Password -->
                            <div class="my-profile">
                                <label class="margin-top-0">Nom</label>
                                <input type="text"  v-model="users.firstname">

                                <label class="margin-top-0">Prénoms</label>
                                <input type="text"  v-model="users.lastname">

                                <label>E-mail</label>
                                <input type="email"  v-model="users.email">

                                <button class="button margin-top-15" type="submit">Enregistrer</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!-- Change Password -->
            <div class="col-lg-6 col-md-12">
                <div class="dashboard-list-box margin-top-0">
                    <h4 class="gray">Change Password</h4>
                    <div class="dashboard-list-box-static">
                        <form @submit.prevent="oldPassword">

                            <!-- Change Password -->
                            <div class="my-profile">
                                <label class="margin-top-0">Current Password</label>
                                <input type="password" v-model="old_password">

                                <label>Mot de passe</label>
                                <input type="password" v-model="password">

                                <label>Rétapez le mot de passe</label>
                                <input type="password" v-model="password_confirmation   ">

                                <button class="button margin-top-15" type="submit">Changer mot de passe</button>
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
    import authHeader from '../services/auth-header';
    export default {
        name: "Dashboard",
        components: {TitlebarComponent},
        data: function () {
            return {
                users: {},
                title : 'Modification du compte',
                message: '',
                id : '',
                old_password: '',
                password: '',
                password_confirmation: '',
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
            else{
                this.id = this.$store.state.auth.user.user_id;
                axios.get(API_BASE_URL+'/users/'+this.id, { headers: authHeader() }).then((response) => {
                    this.users = response.data;
                });
            }
        },
        methods: {
            onMounted: function () {
                console.log(this.message)
            },

            updateInfo() {
                this.id = this.$store.state.auth.user.user_id;
                axios.put(API_BASE_URL+`/users/${this.id}`, this.users, { headers: authHeader() })
                .then((response) => {
                    Vue.$toast.success('Modification éffectuée avec succès.', {
                        // override the global option
                        type: "success",
                        duration: 5000,
                        position: 'top-right',
                        dismissible: true
                     })
                });
            },

            onSubmit() {
            this.isLoading = true
            this.oldPassword()
            },
            async oldPassword() {

                await axios.post(API_BASE_URL + `/users/oldPassword/${this.id}`, this.$data, { headers: authHeader() })
                    .then(response => {
                        this.old_password = ''
                        this.password = ''
                        this.password_confirmation = ''
                        this.isLoading = false
                        this.$emit('completed', response.data.data)
                        Vue.$toast.success('Mot de passe modifié avec succès.', {
                            // override the global option
                            type: "success",
                            duration: 5000,
                            position: 'top-right',
                            dismissible: true
                        })
                    })
                    .catch(error => {
                    this.loading = false;
                    this.message =
                        (error.response && error.response.data && error.response.data.message) ||
                        error.message ||
                        error.toString();
                        Vue.$toast.error('Mot de passe incorrect.', {
                            // override the global option
                            type: "error",
                            duration: 5000,
                            position: 'top-right',
                            dismissible: true
                        })

                    })
            }
        }
    }
</script>

<style scoped>

</style>

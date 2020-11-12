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

            <div v-if="isLoading" class="loader">
            </div>
            <div v-else>
                <!-- Table-->
                <div class="col-lg-12 col-md-12" style="margin-bottom:50px">
                    <div class="col-md-6" style="float:left; bottom:20px">
                        <input type="text" id="myInput"  onkeyup="myFunction()" placeholder="Recherche">
                    </div>
                    <div class="dashboard-list-box margin-top-30">
                        <div class="dashboard-list-box-content">

                            <!-- Table -->
                                <table class="manage-table resumes responsive-table" id="myTable">

                                    <tr>
                                        <th style="width: 10%;">Nom</th>
                                        <th style="width: 30%;">Prénom</th>
                                        <th style="width: 20%;">Email</th>
                                        <th style="width: 20%;">Type</th>
                                        <th style="width: 15%;">Date de demande</th>
                                        <th style="width: 10%;">Actions</th>
                                    </tr>

                                    <!-- Item #1 -->
                                    <tr v-for="account in accounts" :key="account.id">
                                        <template v-if="account.is_first_activation == 1">
                                            <td>{{ account.firstname }}</td>
                                            <td>{{ account.lastname }}</td>
                                            <td class="centered">{{ account.email }}</td>
                                            <td class="centered">
                                                <span class="badge2" v-if="account.extension.is_investor">Investisseur</span>
                                                <span class="badge1" v-else>Entrépreneur</span>
                                            </td>
                                            <td>{{ account.created_at }}</td>
                                            <td class="action">
                                                <a href="#" v-bind:class="{ 'is-loading' : isDeleting(account.id) }" @click="deleteAccount(account.id)">
                                                    <i class="ln ln-icon-Checked-User"></i>Confirmer
                                                </a>
                                            </td>
                                        </template >
                                    </tr>

                                </table>

                        </div>
                    </div>
                </div>
            </div>
		</div>
    </div>
    <!-- Content / End -->
</template>

<script>
    import axios from 'axios'
    import { API_BASE_URL } from '../src/config'
    import TitlebarComponent from "../../components/layouts/TitlebarComponent";
    export default {
        name: "Dashboard",
        components: {TitlebarComponent},
        data: function () {
            return {
                accounts: {},
                title : 'Compte en attente de validation',
                isLoading : true,
                deleteSuccessful: false

            }
        },
        mounted() {
            this.onMounted()
        },

        methods: {
            onMounted: function () {
                axios.get(API_BASE_URL+"/users/").then((data) => {
                    this.accounts = data.data;
                    this.isLoading = false;
                    // console.log(response.data);
                });
            },

            isDeleting(id) {
                let index = this.accounts.findIndex(account => account.id === id)
                return this.accounts[index].isDeleting
            },
            async deleteAccount(id) {
                let index = this.accounts.findIndex(account => account.id === id)
                Vue.set(this.accounts[index], 'isDeleting', true)

                if(confirm("Voulez vous vraiment confirmer ce compte ?")){

                    await axios.post(API_BASE_URL + '/users/'+id+'/status')
                    this.accounts.splice(index, 1)
                    Vue.$toast.success('Confirmation éffectuée avec succès.', {
                        // override the global option
                        type: "success",
                        duration: 5000,
                        position: 'top-right',
                        dismissible: true
                    })

                }

            }

        }
    }
</script>

<style scoped>

.badge1 {
    display: inline-block;
    padding: .3em; /* em unit */
    border-radius: 5%;
    text-align: center;
    background: #1779ba;
    color: #fefefe;
}
.badge2 {
    display: inline-block;
    padding: .3em; /* em unit */
    border-radius: 5%;
    text-align: center;
    background: #4CAF50;
    color: #fefefe;
}
</style>

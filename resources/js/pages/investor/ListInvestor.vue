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
                    <div class="col-md-6" style="float:left; bottom:20px; left:0px">
                        <input type="text" id="myInput"  onkeyup="myFunction()" placeholder="Recherche">
                    </div>
                    <div class="dashboard-list-box margin-top-30">
                        <div class="dashboard-list-box-content">

                            <!-- Table -->
                                <table class="manage-table resumes responsive-table" id="myTable">

                                    <tr>
                                        <th style="width: 10%;">Nom</th>
                                        <th style="width: 20%;">Prénom</th>
                                        <th style="width: 20%;">Email</th>
                                        <th style="width: 15%;">Date de création</th>
                                        <th style="width: 10%;">Actions</th>
                                    </tr>

                                    <!-- Item #1 -->
                                    <tr v-for="investor in investors" :key="investor.id">
                                        <template v-if="investor.is_archived == 0 && investor.is_first_activation == 0">
                                            <td>{{ investor.firstname }}</td>
                                            <td>{{ investor.lastname }}</td>
                                            <td class="centered">{{ investor.email }}</td>
                                            <td>{{ investor.created_at }}</td>
                                            <td class="action">
                                                <router-link :to="{name: 'investorView', params: { id: investor.id }}">
                                                <i class="fa  fa-eye"></i>Voir
                                                </router-link>
                                                <a href ="#" class="delete" v-bind:class="{ 'is-loading' : isDeleting(investor.id) }" @click="deleteInvestor(investor.id)"><i class="fa fa-remove"></i>Supprimer</a>
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
                investors: {},
                title: "Liste d'investisseurs" ,
                isLoading : true,

            }
        },
        mounted() {
            this.onMounted()
        },

        methods: {
            onMounted: function () {
                axios.get(API_BASE_URL+"/users?investor=true").then((data) => {
                    this.investors = data.data;
                    this.isLoading = false;
                    // console.log(response.data);
                });
            },

            isDeleting(id) {
                let index = this.investors.findIndex(investor => investor.id === id)
                return this.investors[index].isDeleting
            },
            async deleteInvestor(id) {
                let index = this.investors.findIndex(investor => investor.id === id)
                Vue.set(this.investors[index], 'isDeleting', true)

                if(confirm("Voulez vous vraiment supprimer cet investisseur?")){

                    await axios.delete(API_BASE_URL + '/users/' + id)
                    this.investors.splice(index, 1)

                    Vue.$toast.success('Suppression éffectuée avec succès.', {
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

</style>

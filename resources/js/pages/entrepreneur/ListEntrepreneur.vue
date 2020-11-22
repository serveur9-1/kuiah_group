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
                    <div class="dashboard-list-box margin-top-30">
                        <div class="dashboard-list-box-content">

                            <!-- Table -->
                                <table class="manage-table resumes responsive-table" id="myTable">
                                     <tr>
                                         <th colspan="6">
                                             <div  style="float:right;  left:0px">
                                          <input type="text" id="myInput"  onkeyup="myFunction()" placeholder="Recherche">
                                        </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="width: 10%;background: #7b7272;">Nom</th>
                                        <th style="width: 20%;background: #7b7272;">Prénom</th>
                                        <th style="width: 20%;background: #7b7272;">Email</th>
                                        <th style="width: 15%;background: #7b7272;">Date de création</th>
                                        <th style="width: 10%;background: #7b7272;">Actions</th>
                                    </tr>

                                    <!-- Item #1 -->
                                    <tr v-for="entrepreneur in entrepreneurs" :key="entrepreneur.id">
                                        <template v-if="entrepreneur.is_archived == 0 && entrepreneur.is_first_activation == 0">
                                            <td>{{ entrepreneur.firstname }}</td>
                                            <td>{{ entrepreneur.lastname }}</td>
                                            <td class="centered">{{ entrepreneur.email }}</td>
                                            <td>{{ entrepreneur.created_at }}</td>
                                            <td class="action">
                                                <router-link :to="{name: 'entrepreneurView', params: { id: entrepreneur.id }}">
                                                <i class="fa  fa-eye"></i>Voir
                                                </router-link>
                                                <a href ="#" class="delete" v-bind:class="{ 'is-loading' : isDeleting(entrepreneur.id) }" @click="deleteEntrepreneur(entrepreneur.id)"><i class="fa fa-remove"></i>Supprimer</a>
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
                entrepreneurs: {},
                title : 'Liste des entrepreneurs' ,
                isLoading : true,

            }
        },
        mounted() {
            this.onMounted()
        },

        methods: {
            onMounted: function () {
                axios.get(API_BASE_URL+"/users?investor=false").then((data) => {
                    this.entrepreneurs = data.data;
                    this.isLoading = false;
                    // console.log(response.data);
                });
            },

            isDeleting(id) {
                let index = this.entrepreneurs.findIndex(entrepreneur => entrepreneur.id === id)
                return this.entrepreneurs[index].isDeleting
            },
            async deleteEntrepreneur(id) {
                let index = this.entrepreneurs.findIndex(entrepreneur => entrepreneur.id === id)
                Vue.set(this.entrepreneurs[index], 'isDeleting', true)

                if(confirm("Voulez vous vraiment supprimer cet entreprise ?")){

                    await axios.delete(API_BASE_URL + '/users/' + id)
                    this.entrepreneurs.splice(index, 1)

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

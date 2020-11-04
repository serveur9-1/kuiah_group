<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>

        <!-- Content -->
        <div class="row">

            <div v-if="isLoading" class="loader">
            </div>
            <div v-else>
                <!-- Table-->
                <div class="col-lg-12 col-md-12">
                    <div class="notification notice" v-if="deleteSuccessful">
                        suppression effectué avec succès.
                    </div>

                    <div class="dashboard-list-box margin-top-30">
                        <div class="dashboard-list-box-content">

                            <!-- Table -->
                                <table class="manage-table resumes responsive-table">

                                    <tr>
                                        <th style="width: 10%;">Nom</th>
                                        <th style="width: 20%;">Prénom</th>
                                        <th style="width: 20%;">Email</th>
                                        <th style="width: 15%;">Date de création</th>
                                        <th style="width: 10%;">Actions</th>
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
                isLoading : true,
                deleteSuccessful: false

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
                    this.deleteSuccessful=true

                }

            }

        }
    }
</script>

<style scoped>

</style>

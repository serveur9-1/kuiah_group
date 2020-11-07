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
                <div class="col-lg-12 col-md-12" style="margin-bottom:50px">
                    <div class="notification notice" v-if="deleteSuccessful">
                        suppression effectué avec succès.
                    </div>
                    <div class="dashboard-list-box margin-top-30">
                        <div class="dashboard-list-box-content">

                            <!-- Table -->
                                <table class="manage-table resumes responsive-table">
                                    <tr>
                                        <th>Nom du pays (Fr)</th>
                                        <th>Nom du pays (En)</th>
                                        <th> Date de l'ajout</th>
                                        <th>Actions</th>
                                    </tr>
                                    <!-- Item #1 -->
                                    <tr v-for="country in countries" :key="country.id">
                                        <td>{{ country.name_fr }}</td>
                                        <td>{{ country.name_en }}</td>
                                        <td>{{ country.created_at}}</td>
                                        <td class="action">
                                            <router-link :to="{name: 'editCountry', params: { id: country.id }}">
                                            <i class="fa  fa-edit"></i>Modifier
                                            </router-link>
                                            <a href ="#" class="delete" v-bind:class="{ 'is-loading' : isDeleting(country.id) }" @click="deleteCountry(country.id)"><i class="fa fa-remove"></i>Supprimer</a>
                                        </td>
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
                countries: {},
                isLoading : true,
                deleteSuccessful: false

            }
        },
        mounted() {
            this.onMounted()
        },

        methods: {
            onMounted: function () {
                axios.get(API_BASE_URL+"/countries").then((data) => {
                    this.countries = data.data;
                    this.isLoading = false;
                    // console.log(response.data);
                });
            },

            isDeleting(id) {
                let index = this.countries.findIndex(country => country.id === id)
                return this.countries[index].isDeleting
            },
            async deleteCountry(id) {
                let index = this.countries.findIndex(country => country.id === id)
                Vue.set(this.countries[index], 'isDeleting', true)

                if(confirm("Voulez vous vraiment supprimer ce pays?")){

                    await axios.delete(API_BASE_URL + '/countries/' + id)
                    this.countries.splice(index, 1)
                    this.deleteSuccessful=true

                }

            }

        }
    }
</script>

<style scoped>

</style>

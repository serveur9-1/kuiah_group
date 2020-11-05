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
                                        <th>Logo</th>
                                        <th>Nom </th>
                                        <th> Date de l'ajout</th>
                                        <th>Actions</th>
                                    </tr>

                                    <!-- Item #1 -->
                                    <tr v-for="partner in partners" :key="partner.id">
                                        <td><img :src="partner.img_url" alt=""></td>
                                        <td>{{ partner.name }}</td>
                                        <td>{{ partner.created_at}}</td>
                                        <td class="action">
                                            <a href ="#" class="delete" v-bind:class="{ 'is-loading' : isDeleting(partner.id) }" @click="deletePartner(partner.id)"><i class="fa fa-remove"></i>Supprimer</a>
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
                partners: {},
                isLoading : true,
                deleteSuccessful: false

            }
        },
        mounted() {
            this.onMounted()
        },

        methods: {
            onMounted: function () {
                axios.get(API_BASE_URL+"/partners").then((data) => {
                    this.partners = data.data;
                    this.isLoading = false;
                    // console.log(response.data);
                });
            },

            isDeleting(id) {
                let index = this.partners.findIndex(partner => partner.id === id)
                return this.partners[index].isDeleting
            },
            async deletePartner(id) {
                let index = this.partners.findIndex(partner => partner.id === id)
                Vue.set(this.partners[index], 'isDeleting', true)

                if(confirm("Voulez vous vraiment supprimer ce partenaire?")){

                    await axios.delete(API_BASE_URL + '/partners/' + id)
                    this.partners.splice(index, 1)
                    this.deleteSuccessful=true

                }

            }

        }
    }
</script>

<style scoped>

</style>

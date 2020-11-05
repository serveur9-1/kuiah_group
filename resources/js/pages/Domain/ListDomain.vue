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
                <router-link :to="{name: 'addDomain', params: { id: id}}" class="button margin-top-30" style="float:right; margin-bottom:15px;">
                     <i class="fa  fa-plus"></i>Ajouter un domaine
                </router-link>
                <div class="col-lg-12 col-md-12" style="margin-bottom:50px">
                    <div class="notification notice" v-if="deleteSuccessful">
                        suppression effectué avec succès.
                    </div>
                    <div class="dashboard-list-box margin-top-30">
                        <div class="dashboard-list-box-content">

                            <!-- Table -->
                                <table class="manage-table resumes responsive-table">

                                    <tr style="text-align:center">
                                        <th>Nom du domaine (Fr)</th>
                                        <th>Nom du domaine (En)</th>
                                        <th> Date de l'ajout</th>
                                        <th>Actions</th>
                                    </tr>

                                    <!-- Item #1 -->
                                    <tr v-for="domain in industries.domains" :key="domain.id">
                                        <td>{{ domain.name_fr }}</td>
                                        <td>{{ domain.name_en }}</td>
                                        <td>{{ domain.created_at}}</td>
                                        <td class="action">
                                            <router-link :to="{name: 'editDomain', params: { id: domain.id }}">
                                            <i class="fa  fa-edit"></i>Modifier
                                            </router-link>
                                            <a href ="#" class="delete" ><i class="fa fa-remove"></i>Supprimer</a>
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
                industries: {},
                isLoading : true,
                deleteSuccessful: false,
                id : '',

            }
        },
        mounted() {
            this.onMounted()
        },

        methods: {
            onMounted: function () {
                let id = this.$router.currentRoute.params.id;
                this.id=this.$route.params.id;
                axios.get(API_BASE_URL+"/industries/"+this.id).then((data) => {
                    this.industries = data.data;
                    this.isLoading = false;
                });
            },

            // isDeleting(id) {
            //     let index = this.industries.findIndex(industry => industry.id === id)
            //     return this.industries[index].isDeleting
            // },
            // async deleteDomain(id) {
            //     let index = this.industries.findIndex(industry => industry.id === id)
            //     Vue.set(this.industries[index], 'isDeleting', true)

            //     if(confirm("Voulez vous vraiment supprimer ce domain?")){

            //         await axios.delete(API_BASE_URL + '/domains/' + id)
            //         this.industries.splice(index, 1)
            //         this.deleteSuccessful=true

            //     }

            // }

        }
    }
</script>

<style scoped>

</style>

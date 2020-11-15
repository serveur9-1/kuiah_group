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
                <div class="col-lg-12 col-md-12" style="margin-bottom:50px">
                    <div class="col-md-4" style="float:right; bottom:25px;">
                        <router-link  :to="{name: 'addDomain', params: { id: id}}" class="button col-md-12" style="float:right; margin-bottom:15px;">
                            <i class="fa  fa-plus"></i>Ajouter un domaine
                        </router-link>
                    </div>
                    <div class="dashboard-list-box margin-top-30">
                        <div class="dashboard-list-box-content">
                            <!-- Table -->
                                <table class="manage-table resumes responsive-table" id="myTable">
                                    <tr>
                                         <th colspan="4">
                                             <div  style="float:right;  left:0px">
                                          <input type="text" id="myInput"  onkeyup="myFunction()" placeholder="Recherche">
                                        </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="background: #7b7272;">Nom du domaine(Fr)</th>
                                        <th style="background: #7b7272;">Nom du domaine (En)</th>
                                        <th style="background: #7b7272;"> Date de l'ajout</th>
                                        <th style="background: #7b7272;">Actions</th>
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
                                            <a v-bind:class="{ 'is-loading' : isDeleting(domain.id) }" @click="deleteDomain(domain.id)" class="delete" href="#" ><i class="fa fa-remove"></i>Supprimer</a>
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
                title: 'Liste des domaines' ,
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

            isDeleting(id) {
                let index = this.industries.domains.findIndex(domain => domain.id === id)
                return this.industries.domains[index].isDeleting
            },
            async deleteDomain(id) {
                let index = this.industries.domains.findIndex(domain => domain.id === id)
                Vue.set(this.industries.domains[index], 'isDeleting', true)

                if(confirm("Voulez vous vraiment supprimer ce domain?")){

                    await axios.delete(API_BASE_URL + '/domains/' + id)
                    this.industries.domains.splice(index, 1)
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

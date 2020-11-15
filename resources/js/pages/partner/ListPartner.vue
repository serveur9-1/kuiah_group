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
                                         <th colspan="4">
                                             <div  style="float:right;  left:0px">
                                          <input type="text" id="myInput"  onkeyup="myFunction()" placeholder="Recherche">
                                        </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="background: #7b7272;">Logo</th>
                                        <th style="background: #7b7272;">Nom du partenaire</th>
                                        <th style="background: #7b7272;"> Date de l'ajout</th>
                                        <th style="background: #7b7272;">Actions</th>
                                    </tr>

                                    <!-- Item #1 -->
                                    <tr v-for="partner in partners" :key="partner.id">
                                        <td> <div style="width: 80px;"><img :src="partner.img_url" alt=""></div></td>
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
                title: "Liste des partenaires" ,
                isLoading : true,

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

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
                                        <th style="background: #7b7272;">Nom du Niveau(Fr)</th>
                                        <th style="background: #7b7272;">Nom du Niveau (En)</th>
                                        <th style="background: #7b7272;"> Date de l'ajout</th>
                                        <th style="background: #7b7272;">Actions</th>
                                    </tr>

                                    <!-- Item #1 -->
                                    <tr v-for="level in levels" :key="level.id">
                                        <td>{{ level.name_fr }}</td>
                                        <td>{{ level.name_en }}</td>
                                        <td>{{ level.created_at}}</td>
                                        <td class="action">
                                            <router-link :to="{name: 'editLevel', params: { id: level.id }}">
                                            <i class="fa  fa-edit"></i>Modifier
                                            </router-link>
                                            <a href ="#" class="delete" v-bind:class="{ 'is-loading' : isDeleting(level.id) }" @click="deleteLevel(level.id)"><i class="fa fa-remove"></i>Supprimer</a>
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
                levels: {},
                title : "Liste de niveau" ,
                isLoading : true,

            }
        },
        mounted() {
            this.onMounted()
        },

        methods: {
            onMounted: function () {
                axios.get(API_BASE_URL+"/stades").then((data) => {
                    this.levels = data.data;
                    this.isLoading = false;
                    // console.log(response.data);
                });
            },

            isDeleting(id) {
                let index = this.levels.findIndex(level => level.id === id)
                return this.levels[index].isDeleting
            },
            async deleteLevel(id) {
                let index = this.levels.findIndex(level => level.id === id)
                Vue.set(this.levels[index], 'isDeleting', true)

                if(confirm("Voulez vous vraiment supprimer ce niveau?")){

                    await axios.delete(API_BASE_URL + '/stades/' + id)
                    this.levels.splice(index, 1)
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

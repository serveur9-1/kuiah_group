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
			<!-- Table-->
			<div class="col-lg-12 col-md-12"  style="margin-bottom:50px">
				<div class="dashboard-list-box margin-top-30">
					<div class="dashboard-list-box-content">

						<!-- Table -->
							<table class="manage-table resumes responsive-table" id="myTable">
								<tr>
                                         <th colspan="5">
                                             <div  style="float:right;  left:0px">
                                          <input type="text" id="myInput"  onkeyup="myFunction()" placeholder="Recherche">
                                        </div>
                                        </th>
                                </tr>
                                <tr>
									<th style="width: 15%;background: #7b7272;">Titre</th>
									<th style="width: 40%;background: #7b7272;"> Description</th>
									<th style="width: 15%;background: #7b7272;"> Montant total</th>
                                    <th style="width: 20%;background: #7b7272;"> Domaine</th>
									<th style="width: 10%;background: #7b7272;">Actions</th>
								</tr>

								<!-- Item #1 -->
								<tr v-for="project in projects" :key="project.id">
                                    <template v-if="project.is_first_activation == 0">
                                        <td>{{ project.title}}</td>
                                        <td>{{ project.company_description}}</td>
                                        <td class="centered">{{ project.total_amount_format}}</td>
                                        <td>{{ project.domain.name}}</td>
                                        <td class="action">
                                            <router-link :to="{name: 'viewPublication', params: { id: project.id }}">
                                                <i class="fa  fa-eye"></i>Voir
                                            </router-link>
                                            <a href ="#" class="delete" v-bind:class="{ 'is-loading' : isDeleting(project.id) }" @click="deleteProject(project.id)"><i class="fa fa-remove"></i>Supprimer</a>
                                        </td>
                                    </template>
								</tr>
							</table>
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
                projects: {},
                title: "Liste des projets" ,
                isLoading : true,

            }
        },
        mounted() {
            this.onMounted()
        },

        methods: {
            onMounted: function () {
                axios.get(API_BASE_URL+"/projects").then((data) => {
                    this.projects = data.data.data;
                    this.isLoading = false;
                    // console.log(response.data);
                });
            },

            isDeleting(id) {
                let index = this.projects.findIndex(project => project.id === id)
                return this.projects[index].isDeleting
            },
            async deleteProject(id) {
                let index = this.projects.findIndex(project => project.id === id)
                Vue.set(this.projects[index], 'isDeleting', true)

                if(confirm("Voulez vous vraiment supprimer ce projet ?")){
                    console.log('id',id)
                    await axios.delete(API_BASE_URL + '/projects/' + id)
                    this.projects.splice(index, 1)
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

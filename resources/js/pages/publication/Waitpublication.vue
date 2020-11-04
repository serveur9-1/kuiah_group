<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>

        <!-- Content -->
        <div class="row">
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
									<th style="width: 15%;">Titre</th>
									<th style="width: 40%;"> Description</th>
									<th style="width: 15%;"> Montant total</th>
                                    <th style="width: 20%;"> Domaine</th>
									<th style="width: 10%;">Actions</th>
								</tr>

								<!-- Item #1 -->
								<tr v-for="project in projects" :key="project.id">
                                    <template v-if="project.is_first_activation">
                                        <td>{{ project.title}}</td>
                                        <td>{{ project.company_description}}</td>
                                        <td class="centered">{{ project.total_amount_format}}</td>
                                        <td>{{ project.domain}}</td>
                                        <td class="action">
                                            <router-link :to="{name: 'newPublication', params: { id: project.id }}">
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
                isLoading : true,
                deleteSuccessful: false

            }
        },
        mounted() {
            this.onMounted()
        },

        methods: {
            onMounted: function () {
                axios.get(API_BASE_URL+"/projects").then((data) => {
                    this.projects = data.data;
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
                    this.deleteSuccessful=true

                }

            }

        }
    }
</script>

<style scoped>

</style>

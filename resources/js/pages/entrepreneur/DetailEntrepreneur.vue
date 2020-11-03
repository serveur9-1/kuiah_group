<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>
        <!-- Content -->
        <div class="row">
			<!-- Profile -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Entrepreneur</h4>
					<div class="dashboard-list-box-static">
						<!-- Avatar -->
						<!-- Details -->
						<div class="my-profile">
							<label>Nom</label>
							<dd><p>{{ entrepreneur.firstname }} </p></dd>

							<label>Prénom</label>
							<dd><p>{{ entrepreneur.lastname }} </p></dd>

							<label>Email</label>
							<dd><p>{{ entrepreneur.email }} </p></dd>

                            <label>Date de création</label>
							<dd><p>{{ entrepreneur.created_at }} </p></dd>

							<label>Téléphone (Mobile)</label>
							<dd><p>{{ entrepreneur.extension.p_number }} </p></dd>

							<label>Téléphone (Fixe)</label>
							<dd><p>{{ entrepreneur.extension.f_number}}</p></dd>

							<label>Biographie</label>
							<dd><p>{{ entrepreneur.extension.biography}} </p></dd>

							<label><i class="fa fa-twitter"></i> Twitter</label>
							<dd><p>{{ entrepreneur.extension.twitter}}</p></dd>

							<label><i class="fa fa-facebook-square"></i> Facebook</label>
							<dd><p>{{ entrepreneur.extension.facebook}}</p></dd>

							<label><i class="fa fa-linkedin"></i>Linkedin</label>
								<dd><p>{{ entrepreneur.extension.linkedin}}</p></dd>
						</div>
					</div>
				</div>
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Mes projets</h4>
                    <div class="notification notice" v-if="deleteSuccessful">
                        Status modifié avec succès.
                    </div>
					<div class="dashboard-list-box-static">
							<table class="manage-table resumes responsive-table">
								<tr>
									<th style="width: 30%;">Titre</th>
									<th style="width: 45%;"> Description</th>
									<th style="width: 15%;"> Besoin total</th>
									<th style="width: 10%;">Actions</th>
								</tr>
								<tr v-for="project in entrepreneur.projects" :key="project.id">
									<td>{{ project.title}}</td>
									<td>{{ project.company_description}}
									</td>
									<td class="centered">{{ project.total_amount}}</td>
									<td class="action">
										<router-link :to="{name: 'viewPublication', params: { id: project.id }}">
                                           <i class="fa  fa-eye"></i>Voir
                                        </router-link>
										<a href="#" v-if="project.is_actived " @click="stateEntrepreneur(project.id)" class="delete" ><i class="fa fa-remove"></i>désactiver</a>
                                            <a href="#" v-else @click="stateEntrepreneur(project.id)" class="success" ><i class="fa fa-check"></i>activer</a>
									</td>
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
                message: "Mounted",
                entrepreneur: {},
                id : "",
                errors: '',
                isLoading: false,

            }
        },
        mounted() {
            this.onMounted()
        },
        methods: {
            onMounted: function () {
                let id = this.$router.currentRoute.params.id;
                this.id=this.$route.params.id;
                axios.get(API_BASE_URL+'/users/'+this.id).then((response) => {
                    this.entrepreneur = response.data;
                });
            },
            stateEntrepreneur(id) {

                axios.post(API_BASE_URL + '/projects/'+id+'/status')
                this.deleteSuccessful=true

            }
        }
    }
</script>

<style scoped>

</style>

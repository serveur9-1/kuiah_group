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
			<!-- Profile -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Investisseur</h4>
					<div class="">
						<!-- Avatar -->
						<!-- Details -->
						<div class="submit-page col-md-12"  style="background-color:white">
                            <div class="form col-md-6">
                                <div class="select">
                                    <h5><strong>Nom</strong></h5>
							        <dd><p>{{ investor.firstname }} </p></dd>
                                </div>
                            </div>

                            <div class="form col-md-6">
                                <div class="select">
                                    <h5><strong>Prénom</strong></h5>
							        <dd><p>{{ investor.lastname }} </p></dd>
                                </div>
                            </div>

                            <div class="form col-md-6">
                                <div class="select">
                                    <h5><strong>Email</strong></h5>
							        <dd><p>{{ investor.email }} </p></dd>
                                </div>
                            </div>

                            <div class="form col-md-6">
                                <div class="select">
                                    <h5><strong>Date de création</strong></h5>
							        <dd><p>{{ investor.created_at }} </p></dd>
                                </div>
                            </div>

                            <div class="form col-md-6">
                                <div class="select">
                                    <h5><strong>Téléphone (Mobile)</strong></h5>
							        <dd><p>{{ investor.extension.p_number }} </p></dd>
                                </div>
                            </div>

                            <div class="form col-md-6">
                                <div class="select">
                                    <h5><strong>Téléphone (Fixe)</strong></h5>
							        <dd><p>{{ investor.extension.f_number}} </p></dd>
                                </div>
                            </div>

                            <div class="form col-md-6">
                                <div class="select">
                                    <h5><strong>Investissement Minimal</strong></h5>
                                    <dd><p>{{ investor.extension.min_format}}</p></dd>
                                </div>
                            </div>

                            <div class="form col-md-6">
                                <div class="select">
                                    <h5><strong>Investissement Maximal</strong></h5>
							        <dd><p>{{ investor.extension.max_format}} </p></dd>
                                </div>
                            </div>

                            <div class="form col-md-6">
                                <div class="select">
                                    <h5><strong>Pays</strong></h5>
						        	<dd><p>{{ investor.extension.country}}</p></dd>
                                </div>
                            </div>

                            <div class="form col-md-6">
                                <div class="select">
                                    <h5><strong>Ville</strong></h5>
							        <dd><p>{{ investor.extension.city}}</p></dd>
                                </div>
                            </div>

                            <div class="form col-md-6">
                                <div class="select">
                                    <h5><strong>Domaine d'activité</strong></h5>
							        <dd><p>{{ investor.extension.domain}}</p></dd>
                                </div>
                            </div>

                            <div class="form col-md-6">
                                <div class="select">
                                    <h5><strong>Poste</strong></h5>
								    <dd><p>{{ investor.extension.role}}</p></dd>
                                </div>
                            </div>

                            <div class="form col-md-6">
                                <div class="select">
                                    <h5><strong>Twitter</strong></h5>
						        	<dd><p>{{ investor.extension.twitter}}</p></dd>
                                </div>
                            </div>

                            <div class="form col-md-6">
                                <div class="select">
                                    <h5><strong>Facebook</strong></h5>
							        <dd><p>{{ investor.extension.facebook}}</p></dd>
                                </div>
                            </div>

                            <div class="form col-md-6">
                                <div class="select">
                                    <h5><strong>Linkedin</strong></h5>
								    <dd><p>{{ investor.extension.linkedin}}</p></dd>
                                </div>
                            </div>

                            <div class="form col-md-12">
                                <div class="select">
                                    <h5><strong>Biographie</strong></h5>
                                    <dd><p>{{ investor.extension.biography}} </p></dd>
                                </div>
                            </div>
						</div>
					</div>
				</div>
                <div class="dashboard-list-box margin-top-30"  v-if="investor.projects[0]">
                        <h4 class="gray">projets</h4>
                        <div class="dashboard-list-box-static">
                                <table class="manage-table resumes responsive-table">
                                    <tr>
                                        <th style="width: 30%;">Titre</th>
                                        <th style="width: 45%;"> Description</th>
                                        <th style="width: 15%;"> Besoin total</th>
                                        <th style="width: 10%;">Actions</th>
                                    </tr>
                                    <tr v-for="project in investor.projects" :key="project.id">
                                        <td>{{ project.title}}</td>
                                        <td>{{ project.company_description}}
                                        </td>
                                        <td class="centered">{{ project.total_amount}}</td>
                                        <td class="action">
                                            <router-link :to="{name: 'viewPublication', params: { id: project.id }}">
                                            <i class="fa  fa-eye"></i>Voir
                                            </router-link>
                                            <a href="#" v-if="project.is_actived " @click="stateProject(project.id)" class="delete" ><i class="fa fa-remove"></i>désactiver</a>
                                                <a href="#" v-else @click="stateProject(project.id)" class="success" ><i class="fa fa-check"></i>activer</a>
                                        </td>
                                    </tr>
                                </table>
                        </div>
                </div>
                <div class="dashboard-list-box margin-top-30" v-if="investor.real_estates[0]">
                    <h4 class="gray">Biens immobiliers</h4>
                    <div class="dashboard-list-box-static">

                            <table class="manage-table resumes responsive-table">
                                <tr>
                                    <th style="width: 35%;">Titre</th>
                                    <th style="width: 35%;"> Description</th>
                                    <th style="width: 20%;"> Prix</th>
                                    <th style="width: 10%;">Actions</th>
                                </tr>
                                <tr  v-for="realstate in investor.real_estates" :key="realstate.id">
                                    <td>{{ realstate.title}}</td>
                                    <td>{{ realstate.description}}</td>
                                    <td class="centered">{{ realstate.price_format}}</td>
                                    <td class="action">
                                        <router-link :to="{name: 'viewRealstates', params: { id: realstate.id }}">
                                        <i class="fa  fa-eye"></i>Voir
                                        </router-link>
                                        <a href="#" v-if="realstate.is_actived " @click="stateRealstate(realstate.id)" class="delete" ><i class="fa fa-remove"></i>désactiver</a>
                                        <a href="#" v-else @click="stateRealstate(realstate.id)" class="success" ><i class="fa fa-check"></i>activer</a>
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
                title: "Détail de l'investisseur" ,
                investor: {},
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
                    this.investor = response.data;
                });
            },
            stateProject(id) {

                axios.post(API_BASE_URL + '/projects/'+id+'/status')

                Vue.$toast.success('Statut du projet modifié avec succès.', {
                    // override the global option
                    type: "success",
                    duration: 5000,
                    position: 'top-right',
                    dismissible: true
                })

            },
            stateRealstate(id) {

                axios.post(API_BASE_URL + '/real_estates/'+id+'/status')

                Vue.$toast.success('Statut du bien immobilier modifié avec succès.', {
                        // override the global option
                        type: "success",
                        duration: 5000,
                        position: 'top-right',
                        dismissible: true
                    })

            }
        }
    }
</script>

<style scoped>

</style>

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
		<div class="row" style="margin-bottom:20px;">
			<div class="col-md-4" v-if="project.logo != null">
			  <img :src="project.logo_url">
		   </div>
           <div class="col-md-4" v-else>
			    <div class="img-big-wrap" style="padding-left:20%;padding-top:20%">
                    <div ><i style="font-size:50px;margin:auto" class="fa  fa-file"></i></div>
                </div>
		   </div>

		    <div class="col-md-8">
				<p>
					{{ project.company_description }}
				</p>
		   </div>
		</div>
        <div class="row">
			<!-- Table-->
			<div class="col-lg-12 col-md-12"  style="margin-bottom:50px">

				<div class="dashboard-list-box margin-top-0">
					<h4>La société</h4>
					<div class="dashboard-list-box-content">

					<div class="submit-page">

						<!-- Email -->
						<div class="form">
							<h5> <strong>Intitulé du projet</strong></h5>
							<dd><p>{{ project.title }}</p></dd>
						</div>

						<!-- Title -->
						<div class="form">
							<h5> <strong>Site web</strong></h5>
							<dd><p>{{ project.website }} </p></dd>
						</div>
						<div class="form">
							<h5> <strong> Nom de l'entreprise</strong></h5>
							<dd><p>{{ project.company_name }}</p></dd>
						</div>

						<!-- Job Type -->
						<div class="form">
							<h5><strong>Localisation de l'entreprise</strong></h5>
							<dd><p>{{ project.country.name }} </p></dd>
						</div>

                        <!-- Email -->
						<div class="form">
							<h5> <strong>Montant total</strong></h5>
							<dd><p>{{ project.total_amount_format }}</p></dd>
						</div>

						<!-- Title -->
						<div class="form">
							<h5> <strong>Montant minimum</strong></h5>
							<dd><p>{{ project.min_amount_format }} </p></dd>
						</div>

                        <!-- Title -->
						<div class="form">
							<h5> <strong>Montant assuré</strong></h5>
							<dd><p>{{ project.amount_insured_format }} </p></dd>
						</div>

						<div class="form">
							<div class="select">
								<h5><strong>Domaine</strong></h5>
								<dd><p>{{ project.domain.name }} </p></dd>
							</div>
						</div>
						<div class="form">
							<h5><strong>Rôle de l'investisseur</strong></h5>
							<dd><p>{{ project.investor_role }} </p></dd>
						</div>

						<div class="form">
							<h5><strong>Stade de développement</strong></h5>
							<dd><p>{{ project.stade.name }} </p></dd>
						</div>

						<!-- Tags -->
						<div class="form">
							<h5><strong>sommaire exécutif</strong></h5>
							<dd><p>{{ project.executive_summary }} </p></dd>
						</div>
                        <!-- Tags -->
						<div class="form">
							<h5><strong>Description de l'équipe</strong></h5>
							<dd><p>{{ project.team_description }} </p></dd>
						</div>
					</div>

					</div>
				</div>
				<div class="dashboard-list-box margin-top-30">
					<h4>Présentation de l'offre</h4>
					<div class="dashboard-list-box-content">

					<div class="submit-page">

						<!-- Company Name -->
						<div class="form" style="width: 100%;">
							<h5><strong>Description du projet</strong> </h5>
							<dd><p>{{ project.executive_summary }}</p></dd>
						</div>

						<!-- Website -->
						<div class="form" style="width: 100%;">
							<h5><strong>Le marché</strong></h5>
							<dd><p>{{ project.market }} </p></dd>
						</div>
						<div class="form" style="width: 100%;">
							<h5><strong>Offre</strong></h5>
							<dd><p>{{ project.offer }} </p></dd>
						</div>
						<div class="form" style="width: 100%;">
							<h5><strong>Objectif</strong></h5>
							<dd><p>{{ project.objective }} </p></dd>
						</div>
                        <div class="form" style="width: 100%;">
							<h5><strong>Tags</strong></h5>
							<dd>
                                <span class="success mr-4" v-for=" tag in project.tags" :key="tag.id"><a href="">{{ tag.title }} </a></span>
                            </dd>
						</div>
					</div>

					</div>
				</div>

                <div class="dashboard-list-box margin-top-30">
					<h4 class="gray">Données financières</h4>
					<div class="dashboard-list-box-static">
							<table class="manage-table resumes responsive-table">
								<tr>
									<th style="width: 30%;">Année</th>
									<th style="width: 45%;"> chiffre d'affaires</th>
									<th style="width: 15%;"> Profit</th>
								</tr>
								<tr v-for="financial in project.financial_data" :key="financial.id">
									<td>{{ financial.year}}</td>
									<td>{{ financial.turnover_format}}</td>
									<td class="centered">{{ financial.profit_format}}</td>
								</tr>
							</table>
					</div>
				</div>

				<div class="dashboard-list-box margin-top-30">
					<h4>Documents</h4>
					<div class="dashboard-list-box-content">

					<div class="submit-page">

						<!-- Company Name -->
						<div class="form">
							<h5>Business plan<span>(optional)</span></h5>
							<a :href="project.business_plan_doc" download>
								<label class="upload-btn">
							    <i class="fa fa-upload"></i>Télécharger
							   </label>
                            </a>
						</div>

						<!-- Website -->
						<div class="form">
							<h5>Données financières<span>(optional)</span></h5>
							<a :href="project.financial_data_doc" download>
								<label class="upload-btn">
							    <i class="fa fa-upload"></i>Télécharger
							   </label>
                            </a>
						</div>
						<div class="form">
							<h5>Sommaire exécutif<span>(optional)</span></h5>
							<a :href="project.executive_summary_doc" download>
								<label class="upload-btn">
							    <i class="fa fa-upload"></i>Télécharger
							   </label>
                            </a>
						</div>
						<div class="form">
							<h5>Diaporama<span>(optional)</span></h5>
							 <a href="/images/myw3schoolsimage.jpg" download>
								<label class="upload-btn">
							    <i class="fa fa-upload"></i>Télécharger
							   </label>
                            </a>
						</div>
	 				</div>
					</div>
				</div>
				<div class="dashboard-list-box margin-top-30">
					<h4>Equipe</h4>
					<div class="dashboard-list-box-content">
                        <div class="padding-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="resumes-list alternative">
                                        <li v-for=" team in project.teams" :key="team.id" class="col-md-6 mb-4" style="margin-bottom:20px">
                                            <a>
                                                <img src="https://store.playstation.com/store/api/chihiro/00_09_000/container/CA/fr/999/UP1415-CUSA03724_00-AV00000000000192/1601172562000/image?w=240&h=240&bg_color=000000&opacity=100&_version=00_09_000" :title="team.picture">
                                                <div class="resumes-list-content">
                                                    <h4>{{ team.name }} <span>{{ team.role }} </span></h4>
                                                    <span><a :href="team.link_twitter" target="_blank"><i class="fa fa-twitter"></i></a></span>
                                                    <span><a :href="team.link_linkedin"><i class="fa fa-linkedin"></i></a></span>
                                                    <span><a :href="team.link_facebook"><i class="fa fa-facebook"></i></a></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                            <div class="clearfix">
												<p>{{ team.biography }}
												</p>
											</div>
                                        </li>
                                     </ul>
                                </div>
                            </div>
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
                props: ['vue projet'],
                title: "Détail du projet" ,
                project: {},
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
                axios.get(API_BASE_URL+'/projects/'+this.id).then((response) => {
                    this.project = response.data;
                });
            }
        }
    }
</script>

<style scoped>

</style>

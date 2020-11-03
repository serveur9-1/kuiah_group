<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>
        <!-- Content -->
        <div class="row">
			<!-- Profile -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Investisseur</h4>
					<div class="dashboard-list-box-static">
						<!-- Avatar -->
						<!-- Details -->
						<div class="my-profile">
							<label>Nom</label>
							<dd><p>{{ investor.firstname }} </p></dd>

							<label>Prénom</label>
							<dd><p>{{ investor.lastname }} </p></dd>

							<label>Email</label>
							<dd><p>{{ investor.email }} </p></dd>

                            <label>Date de création</label>
							<dd><p>{{ investor.created_at }} </p></dd>

							<label>Téléphone (Mobile)</label>
							<dd><p>{{ investor.extension.p_number }} </p></dd>

							<label>Téléphone (Fixe)</label>
							<dd><p>{{ investor.extension.f_number}}</p></dd>

							<label>Biographie</label>
							<dd><p>{{ investor.extension.biography}} </p></dd>

							<label>Investissement Minimal</label>
							<dd><p>{{ investor.extension.min}}</p></dd>

							<label>Investissement Maximal</label>
							<dd><p>{{ investor.extension.max}} </p></dd>


							<label><i class="fa fa-twitter"></i> Twitter</label>
							<dd><p>{{ investor.extension.twitter}}</p></dd>

							<label><i class="fa fa-facebook-square"></i> Facebook</label>
							<dd><p>{{ investor.extension.facebook}}</p></dd>

							<label><i class="fa fa-linkedin"></i>Linkedin</label>
								<dd><p>{{ investor.extension.linkedin}}</p></dd>
						</div>
					</div>
                    <div class="dashboard-list-box margin-top-0">
                        <h4 class="gray">Biens immobiliers</h4>
                        <div class="notification notice" v-if="deleteSuccessful">
                            Status modifié avec succès.
                        </div>
                        <div class="dashboard-list-box-static">

                                <table class="manage-table resumes responsive-table">
                                    <tr>
                                        <th style="width: 30%;">Titre</th>
                                        <th style="width: 45%;"> Description</th>
                                        <th style="width: 15%;"> Prix</th>
                                        <th style="width: 10%;">Actions</th>
                                    </tr>
                                    <tr  v-for="realstate in investor.real_estates" :key="realstate.id">
                                        <td>{{ realstate.title}}</td>
                                        <td>{{ realstate.description}}</td>
                                        <td class="centered">{{ realstate.price}}</td>
                                        <td class="action">
                                            <router-link :to="{name: 'viewRealstates', params: { id: realstate.id }}">
                                            <i class="fa  fa-eye"></i>Voir
                                            </router-link>
                                            <a href="#" v-if="realstate.is_actived " @click="stateInvestor(realstate.id)" class="delete" ><i class="fa fa-remove"></i>désactiver</a>
                                            <a href="#" v-else @click="stateInvestor(realstate.id)" class="success" ><i class="fa fa-check"></i>activer</a>
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
                message: "Mounted",
                investor: {},
                id : "",
                errors: '',
                isLoading: false,
                deleteSuccessful: false,

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
            stateInvestor(id) {

                axios.post(API_BASE_URL + '/real_estates/'+id+'/status')
                this.deleteSuccessful=true

            }
        }
    }
</script>

<style scoped>

</style>

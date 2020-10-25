<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>

        <!-- Content -->
        <div class="row">
			<!-- Table-->
			<div class="col-lg-12 col-md-12">
				<div class="notification notice">
					Your resume can be viewed, edited or removed below.
				</div>
				<div class="dashboard-list-box margin-top-30">
					<div class="dashboard-list-box-content">

						<!-- Table -->
							<table class="manage-table resumes responsive-table">

								<tr>
									<th>Nom du pays</th>
									<th> Date de l'ajout</th>
									<th>Actions</th>
								</tr>

								<!-- Item #1 -->
								<tr v-for="country in countries">
									<td>{{ country.name }}</td>
									<td>23-09-2020</td>
									<td class="action">
										<router-link to="/country/edit">
                                           <i class="fa  fa-edit"></i>Modifier
                                        </router-link>
										<a href="#" class="delete"><i class="fa fa-remove"></i>Supprimer</a>
									</td>
								</tr>

<<<<<<< HEAD
								<!-- Item #1 -->
								<tr>
									
									<td>Front End Web Developer</td>
									<td>23-09-2020</td>
									<td class="action">
										<router-link to="/country/edit">
                                           <i class="fa  fa-edit"></i>Modifier
                                        </router-link>
										<a href="#" class="delete"><i class="fa fa-remove"></i>Supprimer</a>
									</td>
								</tr>	

=======
>>>>>>> 0417fe9680e6a4b5111b43d15e5f0d5a77e04584
							</table>
					</div>
				</div>
			</div>
		</div>


    </div>
    <!-- Content / End -->
</template>

<script>
    import TitlebarComponent from "../../components/layouts/TitlebarComponent";
    import { mapGetters, mapState, mapActions } from 'vuex'

    export default {
        name: "Dashboard",
        components: {TitlebarComponent},
        data: function () {
            return {
                message: "Mounted",
            }
        },
        computed: {
            ...mapState({
                countries: state => state.country.items,
                status: state => state.country.requestStatus,
            })
        },
        mounted() {
            this.onMounted()
            this.fetchCountries()
        },
        methods: {
            ...mapActions('country',{
                fetchCountries: "GET_COUNTRIES",
            }),
            onMounted: function () {
                console.log(this.message)
            }
        }
    }
</script>

<style scoped>

</style>

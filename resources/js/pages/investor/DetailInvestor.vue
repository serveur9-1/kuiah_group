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
							<dd><p>Here goes description consectetur </p></dd>

							<label>Téléphone (Fixe)</label>
							<dd><p>Here goes description consectetur </p></dd>

							<label>Biographie</label>
							<dd><p>Here goes description consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco </p></dd>
							<label>Investissement Minimal</label>
							<dd><p>Here goes description consectetur </p></dd>

							<label>Investissement Maximal</label>
							<dd><p>Here goes description consectetur </p></dd>


							<label><i class="fa fa-twitter"></i> Twitter</label>
							<dd><p>https://www.twitter.com/</p></dd>

							<label><i class="fa fa-facebook-square"></i> Facebook</label>
							<dd><p>https://www.twitter.com/</p></dd>

							<label><i class="fa fa-linkedin"></i>Linkedin</label>
								<dd><p>https://www.twitter.com/</p></dd>
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
        }
    }
</script>

<style scoped>

</style>

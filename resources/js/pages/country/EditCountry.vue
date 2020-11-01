<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>

        <!-- Content -->
        <div class="row">
			<!-- Table-->
			<div class="col-lg-12 col-md-12">
                <div class="notification notice" v-if="updateSuccessful">
                    Modification effectuée avec succès.
                </div>
				<div class="dashboard-list-box margin-top-0">
					<h4>Modifier le pays</h4>
					<div class="dashboard-list-box-content">
					<div class="submit-page">
						<!-- Email -->
						<div class="form">
							<h5>Nom du pays(Fr)</h5>
							<input class="search-field" type="text" value=""/>
						</div>
						<!-- Email -->
						<div class="form">
							<h5>Nom du pays(En)</h5>
							<input class="search-field" type="text" value=""/>
						</div>
                        <a href="#" class="button margin-top-30 margin-bottom-20">Enregistrer</a>
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
                country: {},
                id : "",
                name: '',
                name_en: '',
                name_fr: '',
                errors: '',
                isLoading: false,
                updateSuccessful: false,

            }
        },
        mounted() {
            this.onMounted()
        },
        methods: {
            onMounted: function () {
                let id = this.$router.currentRoute.params.id;
                this.id=this.$route.params.id;
                axios.get(API_BASE_URL+'/countries/'+this.id).then((response) => {
                    this.country = response.data;
                });
            },

           updateCountry() {
                    axios.put(API_BASE_URL+`/countries/${this.id}`, this.country)
                    .then((response) => {
                        this.updateSuccessful = true
                    });
            }
        }
    }
</script>

<style scoped>

</style>

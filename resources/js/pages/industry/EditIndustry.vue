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
					<h4>Modifier l'industrie</h4>


                    <div class="dashboard-list-box-content">
                        <form @submit.prevent="updateIndustry">

                            <div class="submit-page">
                                <!-- Email -->
                                <div class="form">
                                    <h5>Industrie (Fr)</h5>
                                    <input class="search-field" type="text" v-model="industry.name_fr" />
                                </div>

                                <!-- Email -->
                                <div class="form">
                                    <h5>Industrie (En)</h5>
                                    <input class="search-field" type="text" v-model="industry.name_en" />
                                </div>
                                <button type="submit" class="button margin-top-30 margin-top-20">Modifier</button>
                            </div>
                        </form>
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
                industry: {},
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
                axios.get(API_BASE_URL+'/industries/'+this.id).then((response) => {
                    this.industry = response.data;
                });
            },

           updateIndustry() {
                    axios.put(API_BASE_URL+`/industries/${this.id}`, this.industry)
                    .then((response) => {
                        this.updateSuccessful = true
                    });
            }
        }
    }
</script>

<style scoped>

</style>

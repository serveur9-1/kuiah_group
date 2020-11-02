<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>

        <!-- Content -->
        <div class="row">
			<!-- Table-->
			<div class="col-lg-12 col-md-12">
                <div class="notification notice" v-if="savingSuccessful">
                    Vous avez ajouté {{ name }} avec succès.
                </div>
				<div class="dashboard-list-box margin-top-0">
					<h4>Ajouter un pays</h4>
					<div class="dashboard-list-box-content">

                        <form @submit.prevent="addCountry">

                            <div class="submit-page">
                                <!-- Email -->
                                <div class="form">
                                    <h5>Nom de l'industrie (Fr)</h5>
                                    <input class="search-field" type="text" v-model="name_fr"/>
                                </div>

                                <!-- Email -->
                                <div class="form">
                                    <h5>Nom de l'industrie (En)</h5>
                                    <input class="search-field" type="text" v-model="name_en"/>
                                </div>
                                <button v-bind:class="{ 'is-loading' : isLoading }" class="button margin-top-30 margin-bottom-20">Enregistrer</button>
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
                name: '',
                name_en: '',
                name_fr: '',
                errors: '',
                savingSuccessful:false,
                isLoading: false
            }
        },
        mounted() {
            this.onMounted()
        },
        methods: {
            onMounted: function () {
                console.log(this.message)
            },
            onSubmit() {
            this.isLoading = true
            this.addCountry()
            },
            async addCountry() {

                await axios.post(API_BASE_URL + '/countries', this.$data)
                    .then(response => {
                        this.name = this.name_fr
                        this.name_fr = ''
                        this.name_en = ''
                        this.isLoading = false
                        this.savingSuccessful=true
                        this.$emit('completed', response.data.data)
                    })
                    .catch(error => {
                        // handle authentication and validation errors here
                        this.errors = error.response.data.errors
                        this.isLoading = false
                    })
            }
        }
    }
</script>

<style scoped>

</style>

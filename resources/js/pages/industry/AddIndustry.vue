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
			<!-- Table-->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>Ajouter une industrie</h4>
					<div class="dashboard-list-box-content">

                        <form @submit.prevent="addIndustry">

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
                title: "Ajout d'industrie" ,
                name: '',
                name_en: '',
                name_fr: '',
                errors: '',
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
            this.addIndustry()
            },
            async addIndustry() {

                await axios.post(API_BASE_URL + '/industries', this.$data)
                    .then(response => {
                        this.name = this.name_fr
                        this.name_fr = ''
                        this.name_en = ''
                        this.isLoading = false
                        this.savingSuccessful=true
                        this.$emit('completed', response.data.data)

                        Vue.$toast.success('Vous avez crée '+this.name+' avec succès.', {
                            // override the global option
                            type: "success",
                            duration: 5000,
                            position: 'top-right',
                            dismissible: true
                        })
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

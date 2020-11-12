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
					<h4>Ajouter un témoignage</h4>
					<div class="dashboard-list-box-content">
                        <form @submit.prevent="addTestimonial">

                                <div class="submit-page">
                                    <div class="form">
                                        <h5>Nom</h5>
                                        <input class="search-field" type="text" v-model="name"/>
                                    </div>
                                    <!-- Email -->
                                    <div class="form">
                                        <h5>Entreprise</h5>
                                        <input class="search-field" type="text" v-model="company"/>
                                    </div>
                                    <div class="form" style="width: 100%;">
                                        <h5>Message</h5>
                                        <textarea class="" name="summary" v-model="content"  rows="3" id="summary" spellcheck="true"></textarea>
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
                title: "Ajout de témoignage" ,
                name: '',
                name_old: '',
                company: '',
                content: '',
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
                this.addTestimonial()
            },
            async addTestimonial() {

                await axios.post(API_BASE_URL + '/testimonials', this.$data)
                    .then(response => {
                        this.name_old = this.name
                        this.name = ''
                        this.company = ''
                        this.content = ''
                        this.isLoading = false
                        this.$emit('completed', response.data.data)

                        Vue.$toast.success('Vous avez crée '+this.name_old+' avec succès.', {
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

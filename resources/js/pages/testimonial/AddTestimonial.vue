<template>
    <div class="dashboard-content">
        <!-- Titlebar -->
        <TitlebarComponent/>
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
                                        <input class="search-field" type="text" v-model="name"/>
                                    </div>
                                    <div class="form" style="width: 100%;">
                                        <h5>Message</h5>
                                        <textarea class="" name="summary"  rows="3" id="summary" spellcheck="true"></textarea>
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
    import TitlebarComponent from "../../components/layouts/TitlebarComponent";
    export default {
        name: "Dashboard",
        components: {TitlebarComponent},
        data: function () {
            return {
                message: "Mounted",
            }
        },
        mounted() {
            this.onMounted()
        },
        methods: {
            onMounted: function () {
                console.log(this.message)
            }
        }
    }
</script>

<style scoped>

</style>

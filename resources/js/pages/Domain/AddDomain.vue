<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>

        <!-- Content -->
        <div class="row">
			<!-- Table-->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>Ajouter un domaine</h4>
					<div class="dashboard-list-box-content">
                        <form @submit.prevent="addDomain">
                                <div class="submit-page">
                                    <!-- Email -->
                                    <div class="form">
                                        <h5>Sélectionner une industrie</h5>
                                        <select data-placeholder="Full-Time" class="chosen-select-no-single">
                                            <option value="1">Full-Time</option>
                                            <option value="2">Part-Time</option>
                                            <option value="2">Internship</option>
                                            <option value="2">Freelance</option>
                                        </select>
                                    </div>
                                    <div class="form">
                                        <h5>Image domaine</h5>
                                        <label class="upload-btn">
                                            <input type="file" />
                                            <i class="fa fa-upload"></i> Browse
                                        </label>
                                        <span class="fake-input">No file selected</span>
                                    </div>
                                    <div class="form">
                                        <h5>Nom du domaine (Fr)</h5>
                                        <input class="search-field" type="text" v-model="name_fr"/>
                                    </div>
                                    <!-- Email -->
                                    <div class="form">
                                        <h5>Nom du domaine (En)</h5>
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

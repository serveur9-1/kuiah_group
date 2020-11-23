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
					<h4>Ajouter un domaine</h4>
					<div class="dashboard-list-box-content">
                        <form @submit.prevent="addDomain" enctype="multipart/form-data">
                                <div class="submit-page">
                                    <!-- Email -->

                                    <div class="form">
                                        <h5>Nom du domaine (Fr)</h5>
                                        <input class="search-field" type="text" v-model="name_fr"/>
                                    </div>
                                    <!-- Email -->
                                    <div class="form">
                                        <h5>Nom du domaine (En)</h5>
                                        <input class="search-field" type="text" v-model="name_en"/>
                                    </div>

                                    <div class="form">
                                        <h5>Image domaine</h5>
                                        <label class="upload-btn" width="10" height="10">
                                            <input type="file" v-on:change="onImageChange" />
                                            <i class="fa fa-upload"></i> Parcourir
                                            <img v-bind:src="imagePreview" width="40" height="10" v-show="showPreview"/>
                                        </label>
                                    </div>
                                    <div class="form">
                                        <button type="submit" v-bind:class="{ 'is-loading' : isLoading }" class="button margin-top-30 margin-bottom-20">Enregistrer</button>
                                    </div>
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
                industries: {},
                isLoading : true,
                savingSuccessful:false,
                title : 'Ajout de domaine',
                name: '',
                name_fr: '',
                name_en: '',
                img: '',
                imagePreview: null,
                showPreview: false,
                id : '',

            }
        },
        mounted() {
            this.onMounted()
        },

        methods: {
            onMounted: function () {
                let id = this.$router.currentRoute.params.id;
                this.id=this.$route.params.id;
            },
            onImageChange(e){

                this.img = e.target.files[0];
                let reader  = new FileReader();
                reader.addEventListener("load", function () {
                    this.showPreview = true;
                    this.imagePreview = reader.result;
                }.bind(this), false);

                reader.readAsDataURL( this.img );
            },
            addDomain(e) {

                e.preventDefault();

                let currentObj = this;

                const config = {

                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();

                formData.append("name_fr", this.name_fr);
                formData.append("name_en", this.name_en);
                formData.append("img", this.img);
                formData.append("industry_id", this.id);

                axios.post(API_BASE_URL + '/domains', formData, config)
                .then(function (response) {
                    currentObj.success = response.data.success;
                    currentObj.name = currentObj.name_fr;
                    currentObj.name_fr = '';
                    currentObj.name_en = '';
                    currentObj.img = '';
                    currentObj.imagePreview = ''
                    Vue.$toast.success('Vous avez crée '+currentObj.name+' avec succès.', {
                        // override the global option
                        type: "success",
                        duration: 5000,
                        position: 'top-right',
                        dismissible: true
                    })
                })

                .catch(function (error) {
                    currentObj.output = error;
                });

            }

        }
    }
</script>

<style scoped>

</style>

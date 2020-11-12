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
					<h4>Ajouter un partenaire</h4>
					<div class="dashboard-list-box-content">
                        <form @submit="formSubmit" enctype="multipart/form-data">

                            <div class="submit-page">
                                <!-- Email -->
                                <div class="form">
                                    <h5>Nom du partenaire</h5>
                                    <input class="search-field" type="text" v-model="name"/>
                                </div>

                                <div class="form" style="display:inline-block">
                                    <h5>Logo</h5>
                                    <div>
                                        <label class="upload-btn" width="10" height="10">
                                            <input type="file" v-on:change="onImageChange" />
                                            <i class="fa fa-upload"></i> Parcourir
                                            <img v-bind:src="imagePreview" width="40" height="10" v-show="showPreview"/>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="button margin-top-30 margin-bottom-30">Enregistrer</button>
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
                title: "Ajout de partenaire" ,
                isLoading: false,
                name: '',
                name1: '',
                img: '',
                imagePreview: null,
                showPreview: false,
            }
        },
        mounted() {
            this.onMounted()
        },
        methods: {
            onMounted: function () {
                console.log(this.message)
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
            formSubmit(e) {

                e.preventDefault();

                let currentObj = this;

                const config = {

                    headers: { 'content-type': 'multipart/form-data' }
                }

                let formData = new FormData();

                formData.append("name", this.name);
                formData.append("img", this.img);

                axios.post(API_BASE_URL + '/partners/', formData, config)
                .then(function (response) {
                    currentObj.success = response.data.success;
                    currentObj.name1 = currentObj.name;
                    currentObj.name = '';
                    currentObj.img = '';
                    currentObj.imagePreview = ''
                    Vue.$toast.success('Vous avez crée '+currentObj.name1+' avec succès.', {
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

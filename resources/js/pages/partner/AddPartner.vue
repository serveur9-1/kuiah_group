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
					<h4>Ajouter un partenaire</h4>
					<div class="dashboard-list-box-content">
                        <form @submit.prevent="formSubmit">

                            <div class="submit-page">
                                <!-- Email -->
                                <div class="form">
                                    <h5>Nom du partenaire</h5>
                                    <input class="search-field" name="name" type="text" v-model="form.name"/>
                                </div>

                                <div class="form" style="display:inline-block">
                                    <h5>Logo</h5>
                                    <div >
                                        <label class="upload-btn">
                                            <input name="img" type="file" @change="onFileChange" />
                                            <i class="fa fa-upload"></i> Parcourir
                                        </label>
                                        <span class="fake-input">Aucun fichier</span>
                                    </div>
                                    <div>
                                        <img :src="get_img()"/>
                                    </div>
                                </div>
                                <button type="submit" class="button margin-top-30">Enregistrer</button>
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
                form: new Form({
                name: '',
                img: '',
                 }),
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
            formSubmit () {
                this.form.post(API_BASE_URL + '/partners')
                    .then(( response ) => {

                        var attr = document.getElementById("text");
                        attr.innerHTML = response.data.message;

                        this.form.reset();

                     })
            },
            onFileChange(e){
                let file = e.target.files[0];
                let reader = new FileReader();

                if(file['size'] < 2111775)
                {
                    reader.onloadend = (file) => {
                    //console.log('RESULT', reader.result)
                     this.form.img = reader.result;
                    }
                     reader.readAsDataURL(file);
                }else{
                    alert('File size can not be bigger than 2 MB')
                }
            },
             //For getting Instant Uploaded Photo
            get_img(){
               let photo = (this.form.img.length > 100) ? this.form.img : this.form.img;
               return photo;
            },

        }
    }
</script>

<style scoped>

</style>

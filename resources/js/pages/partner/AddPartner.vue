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
                        <form>

                            <div class="submit-page">
                                <!-- Email -->
                                <div class="form">
                                    <h5>Nom du partenaire</h5>
                                    <input class="search-field" name="name" type="text" v-model="form.name"/>
                                </div>

                                <div class="form" style="display:inline-block">
                                    <h5>Logo</h5>
                                    <div  v-if="!isUpload">
                                        <label class="upload-btn">
                                            <input type="file" @change='uploadPhoto' name="img" />
                                            <i class="fa fa-upload"></i> Parcourir
                                        </label>
                                        <span class="fake-input">Aucun fichier</span>
                                    </div>
                                    <div v-else>
                                        <button @click="removePhoto()" style="background-color:red; float:right">X</button>
                                        <img :src="getPhoto()"/>
                                    </div>
                                </div>
                                <button type="submit" @click.prevent="SubmitPhoto" class="button margin-top-30 margin-bottom-30">Enregistrer</button>
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
                isUpload : false,
                form: new Form({
                    name : '',
                    img: ''
                }),
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
            uploadPhoto(e){
                let file = e.target.files[0];
                let reader = new FileReader();

                if(file['size'] < 2111775)
                {
                    reader.onloadend = (file) => {
                     //console.log('RESULT', reader.result)
                     this.form.img = reader.result;
                    }
                     reader.readAsDataURL(file);
                     this.isUpload = true;
                }else{
                    alert('File size can not be bigger than 2 MB')
                }
            },
            //For getting Instant Uploaded Photo
            getPhoto(){
               let img = (this.form.img.length > 100) ? this.form.img : "img/profile/"+ this.form.img;
                return img;
            },
            //Insert Photo
            SubmitPhoto(){
            console.log(this.form)
            this.form.post(API_BASE_URL + '/partners/')
               .then(()=>{

                   console.log("success.....")
               })
               .catch(()=>{
                  console.log("Error.....")
               })

            },
            removePhoto(){
               this.img = '';
            },
        }
    }
</script>

<style scoped>

</style>

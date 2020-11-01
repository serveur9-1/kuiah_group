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
					<h4>Modifier ce niveau</h4>


                    <div class="dashboard-list-box-content">
                        <form @submit.prevent="updateLevel">

<<<<<<< HEAD
						<!-- Email -->
						<div class="form">
							<h5>Nom du niveau (En)</h5>
							<input class="search-field" type="text" value=""/>
						</div>
                        <a href="#" class="button margin-top-30 margin-bottom-15 ">Enregistrer</a>
					</div>
=======
                            <div class="submit-page">
                                <!-- Email -->
                                <div class="form">
                                    <h5>Niveau (Fr)</h5>
                                    <input class="search-field" type="text" v-model="level.name_fr" />
                                </div>
>>>>>>> 4cd620bc44142d7a98f360a7d42c53e13e2e5c06

                                <!-- Email -->
                                <div class="form">
                                    <h5>Niveau (En)</h5>
                                    <input class="search-field" type="text" v-model="level.name_en" />
                                </div>
                                <button type="submit" class="button margin-top-30">Modifier</button>
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
                level: {},
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
                axios.get(API_BASE_URL+'/stades/'+this.id).then((response) => {
                    this.level = response.data;
                });
            },

           updateLevel() {
                    axios.put(API_BASE_URL+`/stades/${this.id}`, this.level)
                    .then((response) => {
                        this.updateSuccessful = true
                    });
            }
        }
    }
</script>

<style scoped>

</style>

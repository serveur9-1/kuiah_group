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
                <div class="notification notice" v-if="updateSuccessful">
                    Modification effectuée avec succès.
                </div>
				<div class="dashboard-list-box margin-top-0">
					<h4>Modifier ce niveau</h4>


                    <div class="dashboard-list-box-content">
                        <form @submit.prevent="updateLevel">

                            <div class="submit-page">
                                <!-- Email -->
                                <div class="form">
                                    <h5>Niveau (Fr)</h5>
                                    <input class="search-field" type="text" v-model="level.name_fr" />
                                </div>

                                <!-- Email -->
                                <div class="form">
                                    <h5>Niveau (En)</h5>
                                    <input class="search-field" type="text" v-model="level.name_en" />
                                </div>
                                <button type="submit" class="button margin-top-30 margin-bottom-20">Modifier</button>
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
                title : "Modification de niveau",
                level: {},
                id : "",
                name: '',
                name_en: '',
                name_fr: '',
                errors: '',
                isLoading: false,

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
                       Vue.$toast.success('Modification éffectuée avec succès.', {
                            // override the global option
                            type: "success",
                            duration: 5000,
                            position: 'top-right',
                            dismissible: true
                        })
                    });
            }
        }
    }
</script>

<style scoped>

</style>

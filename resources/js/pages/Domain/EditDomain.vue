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
					<h4>Modifier l'industrie</h4>


                    <div class="dashboard-list-box-content">
                        <form @submit.prevent="updateDomain">

                            <div class="submit-page">
                                <!-- Email -->
                                <div class="form">
                                    <h5>Domaine (Fr)</h5>
                                    <input class="search-field" type="text" v-model="domain.name_fr" />
                                </div>

                                <!-- Email -->
                                <div class="form">
                                    <h5>Domaine (En)</h5>
                                    <input class="search-field" type="text" v-model="domain.name_en" />
                                </div>

                                <!-- Email -->
                                <div class="form col-md-6">
                                    <h5>Image</h5>
                                    <img v-bind:src="domain.img_url" width="40" height="10" style="width:100px;height:100px"/>
                                </div>
                                <div class="form col-md-6">
                                    <button type="submit" class="button margin-top-30 margin-top-20">Modifier</button>
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
                message: "Mounted",
                domain: {},
                title: 'Modification de domaine' ,
                id : "",
                name_en: '',
                name_fr: '',
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
                axios.get(API_BASE_URL+'/domains/'+this.id).then((response) => {
                    this.domain = response.data;
                });
            },

           updateDomain() {
                axios.put(API_BASE_URL+`/domains/${this.id}`, this.domain)
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

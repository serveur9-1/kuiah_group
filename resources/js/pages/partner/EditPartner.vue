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
					<h4>Modifier le  partenaire</h4>
                    <div class="dashboard-list-box-content">
                        <form @submit.prevent="updateIndustry">

                            <div class="submit-page">

                                <!-- Email -->
                                <div class="form">
                                    <h5>Nom du partenaire</h5>
                                    <input class="search-field" type="text" v-model="partner.name" />
                                </div>

                                <div class="form">
                                    <h5>Logo</h5>
                                    <label class="upload-btn">
                                        <input type="file" multiple />
                                        <i class="fa fa-upload"></i> Parcourir
                                    </label>
                                </div>
                                <button type="submit" class="button margin-top-30 margin-top-20">Modifier</button>
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
                partner: {},
                title: "Modification du partenaire" ,
                id : "",
                name: '',
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
                axios.get(API_BASE_URL+'/partners/'+this.id).then((response) => {
                    this.partner = response.data;
                });
            },

           updateIndustry() {
                    axios.put(API_BASE_URL+`/partners/${this.id}`, this.partner)
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

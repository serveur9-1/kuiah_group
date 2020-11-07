<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>

        <!-- Content -->
        <div class="row">
			<!-- Table-->
            <div v-if="isLoading" class="loader">
            </div>
            <div v-else>
                <!-- Table-->
                <div class="col-lg-12 col-md-12" style="margin-bottom:50px">
                    <div class="notification notice" v-if="updateSuccessful">
                        Modification effectuée avec succès.
                    </div>
                    <div class="notification notice" v-else-if="deleteSuccessful">
                        suppression effectué avec succès.
                    </div>
                    <div class="dashboard-list-box margin-top-30">
                        <div class="dashboard-list-box-content">

                            <!-- Table -->
                                <table class="manage-table resumes responsive-table">

                                    <tr>
                                        <th style="width: 20%;">Nom</th>
                                        <th style="width: 55%;"> Contenu</th>
                                        <th style="width: 15%;"> Entreprise</th>
                                        <th style="width: 15%;"> Status</th>
                                        <th style="width: 10%;">Actions</th>
                                    </tr>

                                    <!-- Item #1 -->
                                    <tr v-for="testimonial in testimonials" :key="testimonial.id">
                                        <td class="centered">{{ testimonial.name }}</td>
                                        <td class="centered">{{ testimonial.content }}</td>
                                        <td class="centered">{{ testimonial.company}}</td>
                                        <td class="centered">
                                            <span class="badge2" v-if="testimonial.is_show">Actif</span>
                                            <span class="badge1" v-else> Inactif</span>
                                        </td>
                                        <td class="action">
                                            <a href="#" v-if="testimonial.is_show" class="delete" v-bind:class="{ 'is-loading' : isDeleting(testimonial.id) }" @click="deleteTestimonial(testimonial.id)"><i class="fa fa-eye-slash"></i>Désactiver</a>
                                            <a href="#" v-else  v-bind:class="{ 'is-loading' : isDeleting(testimonial.id) }" @click="deleteTestimonial(testimonial.id)"><i class="fa  fa-eye"></i>Activer</a>
                                             <a href ="#" class="delete" v-bind:class="{ 'is-loading' : isDel(testimonial.id) }" @click="delTesti(testimonial.id)"><i class="fa fa-remove"></i>Supprimer</a>
                                        </td>
                                    </tr>

                                </table>

                        </div>
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
                testimonials: {},
                isLoading : true,
                deleteSuccessful: false,
                updateSuccessful : false

            }
        },
        mounted() {
            this.onMounted()
        },
        methods: {
            onMounted: function () {
                axios.get(API_BASE_URL+"/testimonials").then((data) => {
                    this.testimonials = data.data;
                    this.isLoading = false;
                    // console.log(response.data);
                });
            },

            isDeleting(id) {
                let index = this.testimonials.findIndex(testimonial => testimonial.id === id)
                return this.testimonials[index].isDeleting
            },
            async deleteTestimonial(id) {
                let index = this.testimonials.findIndex(testimonial => testimonial.id === id)
                Vue.set(this.testimonials[index], 'isDeleting', true)

                if(confirm("Voulez vous vraiment changer ce statut ?")){

                    await axios.post(API_BASE_URL + '/testimonials/'+id+'/status')
                    this.testimonials[index].is_show = !this.testimonials[index].is_show
                    this.updateSuccessful=true

                }

            },
            isDel(id) {
                let index = this.testimonials.findIndex(testimonial => testimonial.id === id)
                return this.testimonials[index].isDel
            },
            async delTesti(id) {
                let index = this.testimonials.findIndex(testimonial => testimonial.id === id)
                Vue.set(this.testimonials[index], 'isDel', true)

                if(confirm("Voulez vous vraiment supprimer ce témoignage?")){

                    await axios.delete(API_BASE_URL + '/testimonials/' + id)
                    this.testimonials.splice(index, 1)
                    this.deleteSuccessful=true

                }

            }

        }
    }
</script>

<style scoped>
    .badge1 {
        display: inline-block;
        padding: .3em; /* em unit */
        border-radius: 5%;
        text-align: center;
        background: #1779ba;
        color: #fefefe;
    }
    .badge2 {
        display: inline-block;
        padding: .3em; /* em unit */
        border-radius: 5%;
        text-align: center;
        background: #4CAF50;
        color: #fefefe;
    }
</style>

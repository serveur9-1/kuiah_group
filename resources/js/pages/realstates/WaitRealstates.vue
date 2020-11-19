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
			<div class="col-lg-12 col-md-12" style="margin-bottom:50px">
				<div class="dashboard-list-box margin-top-30">
					<div class="dashboard-list-box-content">

						<!-- Table -->
							<table class="manage-table resumes responsive-table" id="myTable">
								 <tr>
                                         <th colspan="5">
                                             <div  style="float:right;  left:0px">
                                          <input type="text" id="myInput"  onkeyup="myFunction()" placeholder="Recherche">
                                        </div>
                                        </th>
                                    </tr>
                                <tr>
									<th style="width: 15%;background: #7b7272;">Titre</th>
									<th style="width: 40%;background: #7b7272;"> Description</th>
									<th style="width: 15%;background: #7b7272;"> Prix</th>
                                    <th style="width: 20%;background: #7b7272;"> Contact</th>
									<th style="width: 10%;background: #7b7272;">Actions</th>
								</tr>

								<!-- Item #1 -->
								<tr v-for="realstate in realstates" :key="realstate.id">
                                    <template v-if="realstate.is_first_activation == 1 && realstate.is_archived == 0">
                                        <td>{{ realstate.title}}</td>
                                        <td>{{ realstate.description}}</td>
                                        <td class="centered">{{ realstate.price_format}}</td>
                                        <td>{{ realstate.contact}}</td>
                                        <td class="action">
                                            <a href="#" v-bind:class="{ 'is-loading' : isConfirmed(realstate.id) }" @click="confirmeRealstate(realstate.id)">
                                                <i class="fa fa-check"></i>Confirmer
                                            </a>
                                            <router-link :to="{name: 'newRealstates', params: { id: realstate.id }}">
                                                <i class="fa  fa-eye"></i>Voir
                                            </router-link>
                                            <a href ="#" class="delete" v-bind:class="{ 'is-loading' : isDeleting(realstate.id) }" @click="deleteRealstate(realstate.id)"><i class="fa fa-remove"></i>Supprimer</a>
                                        </td>
                                    </template>
								</tr>
							</table>
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
                realstates: {},
                title: "Bien en attente de validation" ,
                isLoading : true,

            }
        },
        mounted() {
            this.onMounted()
        },

        methods: {
            onMounted: function () {
                axios.get(API_BASE_URL+"/real_estates").then((data) => {
                    this.realstates = data.data.data;
                    this.isLoading = false;
                    // console.log(response.data);
                });
            },

            isDeleting(id) {
                let index = this.realstates.findIndex(realstate => realstate.id === id)
                return this.realstates[index].isDeleting
            },
            async deleteRealstate(id) {
                let index = this.realstates.findIndex(realstate => realstate.id === id)
                Vue.set(this.realstates[index], 'isDeleting', true)

                if(confirm("Voulez vous vraiment supprimer ce bien immobilier ?")){

                    await axios.delete(API_BASE_URL + '/real_estates/' + id)
                    this.realstates.splice(index, 1)

                    Vue.$toast.success('Suppression éffectuée avec succès.', {
                        // override the global option
                        type: "success",
                        duration: 5000,
                        position: 'top-right',
                        dismissible: true
                    })

                }

            },
            isConfirmed(id) {
                let index = this.realstates.findIndex(realstate => realstate.id === id)
                return this.realstates[index].isConfirmed
            },
            async confirmeRealstate(id) {
                let index = this.realstates.findIndex(realstate => realstate.id === id)
                Vue.set(this.realstates[index], 'isConfirmed', true)

                if(confirm("Voulez vous vraiment confirmer ce bien immobilier ?")){
                    console.log('id',id)
                    await axios.post(API_BASE_URL + '/real_estates/' + id+'/status')
                    this.realstates.splice(index, 1)

                    Vue.$toast.success('Confirmation éffectuée avec succès.', {
                        // override the global option
                        type: "success",
                        duration: 5000,
                        position: 'top-right',
                        dismissible: true
                    })

                }

            }

        }
    }
</script>

<style scoped>

</style>

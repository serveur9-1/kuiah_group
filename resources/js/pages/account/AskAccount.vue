<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>

        <!-- Content -->
        <div class="row">
			<!-- Table-->
			<div class="col-lg-12 col-md-12">
				<div class="notification notice">
					liste des entrepreneurs
				</div>
				<div class="dashboard-list-box margin-top-30">
					<div class="dashboard-list-box-content">

						<!-- Table -->
							<table class="manage-table resumes responsive-table">

								<tr>
									<th style="width: 10%;">Nom</th>
									<th style="width: 30%;"> Prénom</th>
									<th style="width: 20%;">Email</th>
                                    <th style="width: 15%;">Ville</th>
                                    <th style="width: 15%;">Date de demande</th>
									<th style="width: 10%;">Actions</th>
								</tr>

								<!-- Item #1 -->
								<tr>
									<td>Doumbia</td>
									<td>Aboudramane</td>
									<td class="centered">Aboudramanedoumbia7@gmail.com</td>
                                    <td>Grand-lahou</td>
                                    <td>+225 48 99 01 50</td>
									<td class="action">
									    <router-link to="/entrepreneur/View">
                                           <i class="ln ln-icon-Checked-User"></i>Confirmer
                                        </router-link>
										<router-link to="/entrepreneur/View">
                                           <i class="ln ln-icon-Lock-User"></i>Rejetter
                                        </router-link>
									</td>
								</tr>

								<!-- Item #1 -->
								<tr>
									<td>Doumbia</td>
									<td>Aboudramane</td>
									<td class="centered">Aboudramanedoumbia7@gmail.com</td>
                                    <td>Grand-lahou</td>
                                    <td>+225 48 99 01 50</td>
									<td class="action">
										<router-link to="/entrepreneur/View">
                                           <i class="ln ln-icon-Checked-User"></i>Confirmer
                                        </router-link>
										<router-link to="/entrepreneur/View">
                                           <i class="ln ln-icon-Lock-User"></i>Rejetter
                                        </router-link>
									</td>
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
    import TitlebarComponent from "../../components/layouts/TitlebarComponent";
    export default {
        name: "Dashboard",
        components: {TitlebarComponent},
        data: function () {
            return {
                message: "Mounted",
            }
        },
        mounted() {
            this.onMounted()
        },
        methods: {
            onMounted: function () {
                console.log(this.message)
            }
        }
    }
</script>

<style scoped>

</style>

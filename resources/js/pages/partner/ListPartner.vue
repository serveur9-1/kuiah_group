<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>

        <!-- Content -->
        <div class="row">
			<!-- Table-->
			<div class="col-lg-12 col-md-12">
				<div class="notification notice">
					Your resume can be viewed, edited or removed below.
				</div>
				<div class="dashboard-list-box margin-top-30">
					<div class="dashboard-list-box-content">

						<!-- Table -->
							<table class="manage-table resumes responsive-table">

								<tr>
									<th>Logo</th>
									<th>Nom </th>
									<th> Date de l'ajout</th>
									<th>Actions</th>
								</tr>

								<!-- Item #1 -->
								<tr>
									<td> image </td>
                                    <td>Front End Web Developer</td>
									<td>23-09-2020</td>
									<td class="action">
										<router-link to="/partner/edit">
                                           <i class="fa  fa-edit"></i>Modifier
                                        </router-link>
										<a href="#" class="delete"><i class="fa fa-remove"></i>Supprimer</a>
									</td>
								</tr>

								<!-- Item #1 -->
								<tr>
									<td> image </td>
									<td>Front End Web Developer</td>
									<td>23-09-2020</td>
									<td class="action">
										<router-link to="/partner/edit">
                                           <i class="fa  fa-edit"></i>Modifier
                                        </router-link>
										<a href="#" class="delete"><i class="fa fa-remove"></i>Supprimer</a>
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

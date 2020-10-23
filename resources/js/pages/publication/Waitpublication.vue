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
									
									<th style="width: 30%;">Titre</th>
									<th style="width: 45%;"> Description</th>
									<th style="width: 15%;"> Min-Max</th>
									<th style="width: 10%;">Actions</th>
								</tr>

								<!-- Item #1 -->
								<tr>
									<td>Front End Web Developer</td>
									<td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
										 Suscipit architecto, ut, veniam mollitia voluptates ad vitae sunt quae ipsa
										  sed tempora dolores iusto eveniet praesentium corporis quibusdam veritatis 
									</td>
									<td class="centered">1,000 - 2,000$</td>
									<td class="action">
										<router-link to="/publication/waiting/View">
                                           <i class="fa  fa-eye"></i>Voir
                                        </router-link>
										<a href="#" class="delete"><i class="fa fa-remove"></i>Supprimer</a>
									</td>
								</tr>

								<!-- Item #1 -->
								<tr>
									
									<td>Logo Designer</td>
									<td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
										Suscipit architecto, ut, veniam mollitia voluptates ad vitae sunt quae ipsa
										 sed tempora dolores iusto eveniet praesentium corporis quibusdam veritatis 
								   </td>
								   <td class="centered">1,000 - 2,000$</td>
									<td class="action">
										<router-link to="/publication/waiting/View">
                                           <i class="fa  fa-eye"></i>Voir
                                        </router-link>
										<a href="#" class="delete"><i class="fa fa-remove"></i>Supprimer</a>
									</td>
								</tr>	

							</table>
					</div>
				</div>
			</div>
			<!-- Copyrights -->
			<div class="col-md-12">
				<div class="copyrights">© 2019 WorkScout. All Rights Reserved.</div>
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

<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>
        <!-- Content -->
        <div class="row">
			<!-- Profile -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Entrepreneur</h4>
					<div class="dashboard-list-box-static">
						<!-- Avatar -->
						<!-- Details -->
						<div class="my-profile">
							<label>Nom</label>
							<dd><p>Here goes description consectetur </p></dd>

							<label>Prénom</label>
							<dd><p>Here goes description consectetur </p></dd>

							<label>Email</label>
							<dd><p>Here goes description consectetur </p></dd>

							<label>Téléphone (Mobile)</label>
							<dd><p>Here goes description consectetur </p></dd>

							<label>Téléphone (Fixe)</label>
							<dd><p>Here goes description consectetur </p></dd>

							<label>Biographie</label>
							<dd><p>Here goes description consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco </p></dd>
							<label><i class="fa fa-twitter"></i> Twitter</label>
							<dd><p>https://www.twitter.com/</p></dd>

							<label><i class="fa fa-facebook-square"></i> Facebook</label>
							<dd><p>https://www.twitter.com/</p></dd>

							<label><i class="fa fa-linkedin"></i>Linkedin</label>
								<dd><p>https://www.twitter.com/</p></dd>
						</div>
					</div>
				</div>
				<div class="dashboard-list-box margin-top-0">
					<h4 class="gray">Mes projets</h4>
					<div class="dashboard-list-box-static">
							<table class="manage-table resumes responsive-table">
								<tr>
									<th style="width: 30%;">Titre</th>
									<th style="width: 45%;"> Description</th>
									<th style="width: 15%;"> Min-Max</th>
									<th style="width: 10%;">Actions</th>
								</tr>
								<tr>
									<td>Front End Web Developer</td>
									<td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
										 Suscipit architecto, ut, veniam mollitia voluptates ad vitae sunt quae ipsa
										  sed tempora dolores iusto eveniet praesentium corporis quibusdam veritatis 
									</td>
									<td class="centered">1,000 - 2,000$</td>
									<td class="action">
										<router-link to="/publication/View">
                                           <i class="fa  fa-eye"></i>Voir
                                        </router-link>
										<a href="#" class="delete"><i class="fa fa-remove"></i>Supprimer</a>
									</td>
								</tr>
								<tr>
									<td>Logo Designer</td>
									<td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
										Suscipit architecto, ut, veniam mollitia voluptates ad vitae sunt quae ipsa
										 sed tempora dolores iusto eveniet praesentium corporis quibusdam veritatis 
								   </td>
								   <td class="centered">1,000 - 2,000$</td>
									<td class="action">
										<a href="#"><i class="fa  fa-eye"></i>Voir</a>
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

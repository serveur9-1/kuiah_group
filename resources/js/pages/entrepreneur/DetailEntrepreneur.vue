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
						<div class="edit-profile-photo">
							<img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=300" alt="">
							<div class="change-photo-btn">
								<div class="photoUpload">
								    <span><i class="fa fa-upload"></i> Upload Photo</span>
								    <input type="file" class="upload" />
								</div>
							</div>
						</div>
						<!-- Details -->
						<div class="my-profile">

							<label>Nom</label>
							<input  type="text">

							<label>Prénom</label>
							<input  type="text">

							<label>Email</label>
							<input  type="text">

							<label>Téléphone (Mobile)</label>
							<input  type="text">

							<label>Téléphone (Fixe)</label>
							<input  type="text">

							<label>Biographie</label>
							<textarea name="notes" id="notes" cols="30" rows="10">Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper</textarea>


							<label><i class="fa fa-twitter"></i> Twitter</label>
							<input placeholder="https://www.twitter.com/" type="text">

							<label><i class="fa fa-facebook-square"></i> Facebook</label>
							<input placeholder="https://www.facebook.com/" type="text">

							<label><i class="fa fa-linkedin"></i>Linkedin</label>
							<input placeholder="https://www.google.com/" type="text">
						</div>
	
						<button class="button margin-top-15">Save Changes</button>

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

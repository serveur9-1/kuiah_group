<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>

        <!-- Content -->
        <div class="row">
			<!-- Table-->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>Ajouter un domaine</h4>
					<div class="dashboard-list-box-content">

					<div class="submit-page">

						<!-- Email -->
						<div class="form">
							<h5>Nom du domaine (Fr)</h5>
							<input class="search-field" type="text" value=""/>
						</div>

						<!-- Email -->
						<div class="form">
							<h5>Nom du domain(En)</h5>
							<input class="search-field" type="text" value=""/>
						</div>
					</div>

					</div>
				</div>
				<a href="#" class="button margin-top-30">Enregistrer</a>
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

<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>
            <div class="row">
			
			<!-- Table-->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>Biens immobiliers</h4>
					<div class="dashboard-list-box-content">
					<div class="submit-page">
						<!-- Email -->
						<div class="form">
							<h5>Intitulé du projet</h5>
							<input class="search-field" type="text" placeholder="mail@example.com" value=""/>
						</div>

						<!-- Title -->
						<div class="form">
							<h5>Site web</h5>
							<input class="search-field" type="text" placeholder="" value=""/>
						</div>
						<div class="form">
							<h5>Nom de l'entreprise</h5>
							<input class="search-field" type="text" placeholder="" value=""/>
						</div>

						<!-- Job Type -->
						<div class="form">
							<h5>Localisation de l'entreprise</h5>
							<select data-placeholder="Full-Time" class="chosen-select-no-single">
								<option value="1">Full-Time</option>
								<option value="2">Part-Time</option>
								<option value="2">Internship</option>
								<option value="2">Freelance</option>
							</select>
						</div>
						<div class="form">
							<h5>Numéro de téléphone</h5>
							<input class="search-field" type="text" placeholder="" value=""/>
						</div>
						<!-- Choose Category -->
						<div class="form">
							<div class="select">
								<h5>Industrie</h5>
								<select data-placeholder="Choose Categories" class="chosen-select" multiple>
									<option value="1">Web Developers</option>
									<option value="2">Mobile Developers</option>
									<option value="3">Designers & Creatives</option>
									<option value="4">Writers</option>
									<option value="5">Virtual Assistants</option>
									<option value="6">Customer Service Agents</option>
									<option value="7">Sales & Marketing Experts</option>
									<option value="8">Accountants & Consultants</option>
								</select>
							</div>
						</div>

						<div class="form">
							<div class="select">
								<h5>Domaine</h5>
								<select data-placeholder="Choose Categories" class="chosen-select" multiple>
									<option value="1">Web Developers</option>
									<option value="2">Mobile Developers</option>
									<option value="3">Designers & Creatives</option>
									<option value="4">Writers</option>
									<option value="5">Virtual Assistants</option>
									<option value="6">Customer Service Agents</option>
									<option value="7">Sales & Marketing Experts</option>
									<option value="8">Accountants & Consultants</option>
								</select>
							</div>
						</div>
						<div class="form">
							<h5>Rôle de l'investisseur</h5>
							<select data-placeholder="Full-Time" class="chosen-select-no-single">
								<option value="1">Full-Time</option>
								<option value="2">Part-Time</option>
								<option value="2">Internship</option>
								<option value="2">Freelance</option>
							</select>
						</div>

						<div class="form">
							<h5>Stade de développement</h5>
							<select data-placeholder="Full-Time" class="chosen-select-no-single">
								<option value="1">Full-Time</option>
								<option value="2">Part-Time</option>
								<option value="2">Internship</option>
								<option value="2">Freelance</option>
							</select>
						</div>

						<!-- Tags -->
						<div class="form">
							<h5>Logo <span>(optional)</span></h5>
							<label class="upload-btn">
							    <input type="file" multiple />
							    <i class="fa fa-upload"></i> Browse
							</label>
							<span class="fake-input">No file selected</span>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
        <!-- Content -->
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

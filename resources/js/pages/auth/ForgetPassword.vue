<template>
    <div class="dashboard-content" style="margin:auto !important;margin-top:0px !important">

	<div class="my-account">
        <!-- Logo -->
        <div>
            <h1 style="font-weight:bold; font-size:35px;">Mot de passe oublié</h1>
        </div>
		<div class="tabs-container">

			<!-- Login -->
			<div class="tab-content">

				<form method="post" class="login" @submit.prevent="forget">
					<p class="form-row form-row-wide">
						<label for="username">E-mail:
							<i class="ln ln-icon-Male"></i>
							<input type="email" class="input-text" id="username" v-validate="'required'" v-model="email" />
						</label>
					</p>
                    <p class="form-row " :disabled="loading" v-if="loading">
                        <span v-show="loading" class="spinner-border spinner-border-sm"></span>
						<input type="submit" class="button border fw margin-top-10" disabled value="loading ..." />
					</p>
					<p class="form-row " :disabled="loading" v-else>
                        <span v-show="loading" class="spinner-border spinner-border-sm"></span>
						<input type="submit" class="button border fw margin-top-10" name="login" value="Réinitialiser" />
					</p>
                    <p class="lost_password">
                        <router-link :to="{name: 'Login'}">
                            Retourner à la page de connexion
                        </router-link>
					</p>
				</form>
			</div>
		</div>
	</div>
    </div>
    <!-- Content / End -->
</template>

<script>
    import axios from 'axios'
    import { API_BASE_URL } from '../src/config'
    export default {
        name: "forget",
        data: function () {
            return {
                email: '',
                errors: '',
                loading: false,
                isLoading: false

            }
        },
        methods: {

            onSubmit() {

            },
            async forget() {

                this.loading = true

                await axios.post(API_BASE_URL + '/users/generatecode', this.$data)
                    .then(response => {
                        this.email = ''
                        this.$emit('completed', response.data.data)
                        Vue.$toast.success(response.data.message, {
                            // override the global option
                            type: "success",
                            duration: 5000,
                            position: 'top-right',
                            dismissible: true
                        })
                        this.loading = false
                    })
                    .catch(error => {
                        // handle authentication and validation errors here

                        Vue.$toast.error("adresse email introuvable.", {
                            // override the global option
                            type: "error",
                            duration: 5000,
                            position: 'top-right',
                            dismissible: true
                        })
                        this.loading = false
                    })
            }

        }
    }
</script>

<style scoped>
    .loader1 {
    border: 2px solid #f3f3f3; /* Light grey */
    border-top: 2px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 5px;
    height: 5px;
    margin:auto;
    padding:auto;
    animation: spin 2s linear infinite;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
</style>

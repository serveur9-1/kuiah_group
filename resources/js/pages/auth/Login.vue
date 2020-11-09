<template>
    <div class="dashboard-content">
	<div class="my-account">
		<div class="tabs-container">
			<!-- Login -->
			<div class="tab-content" id="tab1" style="display: none;">
				<form method="post" class="login" @submit.prevent="login">
					<p class="form-row form-row-wide">
						<label for="username">E-mail:
							<i class="ln ln-icon-Male"></i>
							<input type="email" class="input-text" id="username" v-validate="'required'" v-model="user.email" />
						</label>
					</p>
                    <div
                        v-if="errors.has('email')"
                        class="alert alert-danger"
                        role="alert"
                         >email is required!</div>
					<p class="form-row form-row-wide">
						<label for="password">Password:
							<i class="ln ln-icon-Lock-2"></i>
							<input class="input-text" type="password" v-model="user.password" id="password" v-validate="'required'"/>
						</label>
					</p>
                    <div
                        v-if="errors.has('password')"
                        class="alert alert-danger"
                        role="alert"
                    >Password is required!</div>
					<p class="form-row">
						<input type="submit" class="button border fw margin-top-10" name="login" value="Login" />
					</p>
                    <div class="form-group">
                        <div v-if="message" class="alert alert-danger" role="alert">Vos identifiants sont incorrects</div>
                    </div>
				</form>
			</div>
		</div>
	</div>
    </div>
    <!-- Content / End -->
</template>

<script>
import User from '../../models/user';

export default {
  name: 'Login',
  data() {
    return {
      user: new User('', ''),
      loading: false,
      message: ''
    };
  },
  computed: {
    loggedIn() {
      return this.$store.state.auth.status.loggedIn;
    }
  },
  created() {
    if (this.loggedIn) {
      this.$router.push('/');
    }
  },
  methods: {
    login() {
      this.loading = true;
      this.$validator.validateAll().then(isValid => {
        if (!isValid) {
          this.loading = false;
          return;
        }

        if (this.user.email && this.user.password) {
          this.$store.dispatch('auth/login', this.user).then(
            () => {
              this.$router.push('/');
            },
            error => {
              this.loading = false;
              this.message =
                (error.response && error.response.data && error.response.data.message) ||
                error.message ||
                error.toString();
            }
          );
        }
      });
    }
  }
};
</script>

<style scoped>

</style>

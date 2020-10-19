<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="text-center">
              <span class="d-ib">Ajouter un gestionnaire</span>
            </h1>
          </div>
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div class="demo-form-wrapper">
                <form data-toggle="validator">
                  <div class="form-group">
                    <label for="name-1" class="control-label">Nom</label>
                    <input id="name-1" class="form-control" type="text" name="name_1" required>
                  </div>
                  <div class="form-group">
                    <label for="name-1" class="control-label">Prénom</label>
                    <input id="name-1" class="form-control" type="text" name="name_1" required>
                  </div>
                  <div class="form-group">
                    <label for="email-1" class="control-label">Date de naissance</label>
                    <input id="email-1" class="form-control" type="date" name="email_1" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                    <label for="email-1" class="control-label">Email</label>
                    <input id="email-1" class="form-control" type="email" name="email_1" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                    <label for="name-1" class="control-label">Numéro de téléphone</label>
                    <input id="name-1" class="form-control" type="text" name="name_1" required>
                  </div>
                  <div class="form-group">
                    <label for="name-1" class="control-label">Numéro de fixe</label>
                    <input id="name-1" class="form-control" type="text" name="name_1" required>
                  </div>
                  <div class="form-group">
                    <label for="email-1" class="control-label">Pays d'origine</label>
                    <div>
                      <select id="form-control-6" class="form-control">
                        <option value="c-plus-plus">Gabon</option>
                        <option value="css">Nigeria</option>
                        <option value="java">NIger</option>
                        <option value="javascript">JavaScript</option>
                        <option value="php">PHP</option>
                        <option value="python">Python</option>
                        <option value="ruby">Ruby</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email-1" class="control-label">Ville d'origine</label>
                    <div>
                      <select id="form-control-6" class="form-control">
                        <option value="c-plus-plus">Abidjan</option>
                        <option value="css">Lomé</option>
                        <option value="java">Accra</option>
                        <option value="javascript">Abuja</option>
                        <option value="php">PHP</option>
                        <option value="python">Python</option>
                        <option value="ruby">Ruby</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name-1" class="control-label">web site</label>
                    <input id="name-1" class="form-control" type="text" name="name_1" required>
                  </div>
                  <div class="form-group">
                    <label for="name-1" class="control-label">Company name</label>
                    <input id="name-1" class="form-control" type="text" name="name_1" required>
                  </div>
                  <div class="form-group">
                    <label for="name-1" class="control-label">Domaine d'activité</label>
                    <input id="name-1" class="form-control" type="text" name="name_1" required>
                  </div>
                  <div class="form-group">
                    <label for="name-1" class="control-label">Nombre d'investissement réalisé</label>
                    <input id="name-1" class="form-control" type="text" name="name_1" required>
                  </div>
                  <div class="form-group">
                    <label for="name-1" class="control-label">Fonction</label>
                    <input id="name-1" class="form-control" type="text" name="name_1" required>
                  </div>
                  <div class="form-group">
                    <label for="biography-1" class="control-label">Biographie</label>
                    <textarea id="biography-1" class="form-control" name="biography_1" rows="3" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="email-1" class="control-label">Charger la pièce d'identité</label>
                    <input id="form-control-9" type="file" accept="image/*" multiple="multiple">
                      <p class="help-block">
                        <small>Types de fichiers autorisés: png gif jpg jpeg.</small>
                      </p>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Enregister</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
</div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
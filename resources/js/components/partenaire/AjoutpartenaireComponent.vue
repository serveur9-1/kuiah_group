<template>
 <div class="layout-content-body">
          <h1 class="title-bar-title">
                <span class="d-ib">Ajouter un partenaire</span>
                <router-link to="/listpartenaire" class="btn btn-danger btn-sm btn-labeled" type="button" style="float: right;"><span class="btn-label">
                      <span class="icon icon-list icon-lg icon-fw"></span>
                    </span>
                    Liste des partenaires
                  </router-link>
              </h1>
          <div class="row">
            <div class="col-sm-12">
              <div class="demo-form-wrapper">
                <form class="form form-horizontal">
                  <div class="form-group">
                    <label for="email-2" class="col-sm-3 col-md-4 control-label">Nom du partenaire</label>
                    <div class="col-sm-6 col-md-4">
                      <input id="email-2" class="form-control" type="email">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-3 col-md-4 control-label" for="form-control-9">Logo</label>
                    <div class="col-sm-6 col-md-4">
                      <input id="form-control-9" type="file" accept="image/*" multiple="multiple">
                      <p class="help-block">
                        <small>Unlimited number of files can be uploaded to this field. Allowed types: png gif jpg jpeg.</small>
                      </p>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">
                      <button class="btn btn-primary " type="submit">Enregistrer</button>
                    </div>
                  </div>
                </form>
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

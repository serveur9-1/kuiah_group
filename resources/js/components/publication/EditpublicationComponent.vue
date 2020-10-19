<template>
        <div class="layout-content-body">
    <div class="title-bar mr-3">
            <h1 class="title-bar-title">
              <span class="d-ib"> Modifier une publication</span>
                <router-link to="/listpublication" class="btn btn-danger btn-sm btn-labeled" type="button" style="float: right;"><span class="btn-label">
                    <span class="icon icon-list icon-lg icon-fw"></span>
                  </span>
                  Liste des publications
                </router-link>
            </h1>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="card text-center">
        <div class="card-image">
          <div class="overlay">
            <div class="overlay-gradient">
              <img class="card-img-top img-responsive" src="img/8335744038.jpg" alt="Instagram App">
            </div>
          </div>
        </div>
        <div class="card-avatar">
        </div>
        <div class="card-body">
          <h3 class="card-title">Teddy Wilson</h3>
          <h6 class="card-subtitle">CEO at Elephant</h6>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel harum sequi, rem ullam veritatis facilis Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel harum  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel harum  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel harum Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel harum Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel harum Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel harum </p>
        </div>
      </div>
    </div>
    <div class="col-md-2"></div>
    <div class="row">
              <div class="col-lg-12">
                <div class="demo-form-wrapper">
                  <form id="demo-form-wizard-1" novalidate>
                    <ul class="steps">
                      <li class="step col-xs-2 active">
                        <a class="step-segment" href="#tab-1" data-toggle="tab">
                          <span class="step-icon icon icon-building-o"></span>
                        </a>
                        <div class="step-content">
                          <strong class="hidden-xs">La société</strong>
                        </div>
                      </li>
                      <li class="step col-xs-2">
                        <a class="step-segment" href="#tab-2" data-toggle="tab">
                          <span class="step-icon icon icon-cubes"></span>
                        </a>
                        <div class="step-content">
                          <strong class="hidden-xs">Présentation de l'offre</strong>
                        </div>
                      </li>
                      <li class="step col-xs-2">
                        <a class="step-segment" href="#tab-3" data-toggle="tab">
                          <span class="step-icon icon icon-users"></span>
                        </a>
                        <div class="step-content">
                          <strong class="hidden-xs">L'équipe</strong>
                        </div>
                      </li>
                      <li class="step col-xs-2">
                        <a class="step-segment" href="#tab-4" data-toggle="tab">
                          <span class="step-icon icon icon-file-picture-o"></span>
                        </a>
                        <div class="step-content">
                          <strong class="hidden-xs">Documents</strong>
                        </div>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div id="tab-1" class="tab-pane active">
                        <h4 class="text-center m-y-md">
                          <span>Donner des informations sur la société</span>
                        </h4>
                        <div class="row">
                          <div class="col-sm-8 col-sm-offset-2">
                            <div class="form-group">
                              <label for="email-1" class="control-label">Titre</label>
                              <input id="email-1" class="form-control" type="email" name="email_1" spellcheck="false" autocomplete="off" data-rule-required="true" data-rule-email="true" data-msg-required="Please enter your email address.">
                            </div>
                            <div class="form-group">
                              <label for="username-1" class="control-label">Site</label>
                              <input id="username-1" class="form-control" type="text" name="username_1" spellcheck="false" autocomplete="off" data-rule-required="true" data-rule-alphanumeric="true" data-msg-required="Please enter your username." data-msg-alphanumeric="Username must be alpha-numeric characters, and underscores.">
                            </div>
                            <div class="form-group">
                              <label for="username-1" class="control-label">Nom de l'entreprise</label>
                              <input id="username-1" class="form-control" type="text" name="username_1" spellcheck="false" autocomplete="off" data-rule-required="true" data-rule-alphanumeric="true" data-msg-required="Please enter your username." data-msg-alphanumeric="Username must be alpha-numeric characters, and underscores.">
                            </div>
                            <div class="form-group">
                              <label for="password-1" class="control-label">Localisation de l'entreprise</label>
                              <div class="input-group col-md-12">
                                 <select id="form-control-6" class="form-control">
                                    <option value="c-plus-plus">Côte d'Ivoire</option>
                                    <option value="css">Nigeria</option>
                                    <option value="java">Ghana</option>
                                    <option value="javascript">Togo</option>
                                    <option value="php">Cameroun</option>
                                    <option value="python">Mali</option>
                                    <option value="ruby">Burkina Faso</option>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="username-1" class="control-label">Numéro de téléphone</label>
                              <input id="username-1" class="form-control" type="text" name="username_1" spellcheck="false" autocomplete="off" data-rule-required="true" data-rule-alphanumeric="true" data-msg-required="Please enter your username." data-msg-alphanumeric="Username must be alpha-numeric characters, and underscores.">
                            </div>
                            <div class="form-group">
                              <label for="password-1" class="control-label">Catégorie</label>
                              <div class="input-group col-md-12">
                                 <select id="form-control-6" class="form-control">
                                    <option value="c-plus-plus">Transport</option>
                                    <option value="css">Agriculture</option>
                                    <option value="java">Elevage</option>
                                    <option value="javascript">Togo</option>
                                    <option value="php">Cameroun</option>
                                    <option value="python">Mali</option>
                                    <option value="ruby">Burkina Faso</option>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="password-1" class="control-label">Sous-Catégorie</label>
                              <div class="input-group col-md-12">
                                 <select id="form-control-6" class="form-control">
                                    <option value="c-plus-plus">Transport</option>
                                    <option value="css">Agriculture</option>
                                    <option value="java">Elevage</option>
                                    <option value="javascript">Togo</option>
                                    <option value="php">Cameroun</option>
                                    <option value="python">Mali</option>
                                    <option value="ruby">Burkina Faso</option>
                                  </select>
                              </div>
                            </div>
                             <div class="form-group">
                              <label for="password-1" class="control-label">Rôle idéal de l'investisseur</label>
                              <div class="input-group col-md-12">
                                 <select id="form-control-6" class="form-control">
                                    <option value="c-plus-plus">Passif</option>
                                    <option value="css">Participation quotidienne</option>
                                    <option value="java">Participation hebdomadaire</option>
                                    <option value="javascript">Togo</option>
                                    <option value="php">Cameroun</option>
                                    <option value="python">Mali</option>
                                    <option value="ruby">Burkina Faso</option>
                                  </select>
                              </div>
                            </div>
                             <div class="form-group">
                              <label for="password-1" class="control-label">Stade de développement</label>
                              <div class="input-group col-md-12">
                                 <select id="form-control-6" class="form-control">
                                    <option value="c-plus-plus">Pré-Démarrage</option>
                                    <option value="css">Produit fini</option>
                                    <option value="java">Elevage</option>
                                    <option value="javascript">Togo</option>
                                    <option value="php">Cameroun</option>
                                    <option value="python">Mali</option>
                                    <option value="ruby">Burkina Faso</option>
                                  </select>
                              </div>
                              </div>
                            <div class="form-group">
                            <label for="email-1" class="control-label">Logo de l'entreprise</label>
                            <input id="form-control-9" type="file" accept="image/*" multiple="multiple">
                              <p class="help-block">
                                <small>Types de fichiers autorisés: png gif jpg jpeg.</small>
                               </p>
                              </div>
                            <div class="form-group">
                              <button class="btn btn-primary btn-block btn-next" type="button">Sauvegarder et continuer</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="tab-2" class="tab-pane">
                        <h4 class="text-center m-y-md">
                          <span>Donner tous les aspects de l'offre</span>
                        </h4>
                        <div class="row">
                          <div class="col-sm-8 col-sm-offset-2">
                              <div class="form-group">
                            <label for="biography-1" class="control-label">Description</label>
                            <textarea id="biography-1" class="form-control" name="biography_1" rows="3" required></textarea>
                            <small class="help-block">Write some details about yourself to fill out your profile.</small>
                          </div>
                           <div class="form-group">
                            <label for="biography-1" class="control-label">Le marché</label>
                            <textarea id="biography-1" class="form-control" name="biography_1" rows="3" required></textarea>
                            <small class="help-block">Write some details about yourself to fill out your profile.</small>
                          </div>
                          <div class="form-group">
                            <label for="biography-1" class="control-label">Progrès</label>
                            <textarea id="biography-1" class="form-control" name="biography_1" rows="3" required></textarea>
                            <small class="help-block">Write some details about yourself to fill out your profile.</small>
                          </div>
                          <div class="form-group">
                            <label for="biography-1" class="control-label">Objectif</label>
                            <textarea id="biography-1" class="form-control" name="biography_1" rows="3" required></textarea>
                            <small class="help-block">Write some details about yourself to fill out your profile.</small>
                          </div>
                            <div class="form-group">
                              <button class="btn btn-primary btn-block btn-next" type="button">Sauvegarder et continuer</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="tab-3" class="tab-pane">
                        <h4 class="text-center m-y-md">
                          <span>Ajouter un membre d'équipe</span>
                        </h4>
                        <div class="row">
                          <div class="col-sm-8 col-sm-offset-2">
                            <div class="form-group">
                          <label for="name-1" class="control-label">Nom</label>
                          <input id="name-1" class="form-control" type="text" name="name_1" required>
                        </div>
                            <div class="form-group">
                          <label for="name-1" class="control-label">Fonction</label>
                          <input id="name-1" class="form-control" type="text" name="name_1" required>
                        </div>
                        <div class="form-group">
                          <label for="name-1" class="control-label">Facebook</label>
                          <input id="name-1" class="form-control" type="text" name="name_1" required>
                        </div>
                        <div class="form-group">
                          <label for="name-1" class="control-label">Linkedin</label>
                          <input id="name-1" class="form-control" type="text" name="name_1" required>
                        </div>
                        <div class="form-group">
                          <label for="name-1" class="control-label">Twetter</label>
                          <input id="name-1" class="form-control" type="text" name="name_1" required>
                        </div>
                        <div class="form-group">
                          <label for="biography-1" class="control-label">Biographie</label>
                          <textarea id="biography-1" class="form-control" name="biography_1" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                          <label for="email-1" class="control-label">Charger une photo</label>
                          <input id="form-control-9" type="file" accept="image/*" multiple="multiple">
                            <p class="help-block">
                              <small>Types de fichiers autorisés: png gif jpg jpeg.</small>
                            </p>
                        </div>
                            <div class="form-group">
                              <button class="btn btn-primary btn-block" type="submit">Sauvegarder et continuer</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="tab-4" class="tab-pane">
                        <h4 class="text-center m-y-md">
                          <span>Ajouter des documents relatifs au projet</span>
                        </h4>
                        <div class="row">
                          <div class="col-sm-8 col-sm-offset-2">
                            <div class="form-group">
                          <label for="email-1" class="control-label">Charger votre business plan</label>
                          <input id="form-control-9" type="file" accept="image/*" multiple="multiple">
                        </div>
                            <div class="form-group">
                          <label for="email-1" class="control-label">Charger votre sommaire exécutif</label>
                          <input id="form-control-9" type="file" accept="image/*" multiple="multiple">
                        </div>
                            <div class="form-group">
                              <button class="btn btn-primary btn-block btn-next" type="button">Create an account</button>
                            </div>
                          </div>
                        </div>
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

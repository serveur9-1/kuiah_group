<template>
      <div class="layout-content-body">
          <div class="title-bar">
            <h1 class="title-bar-title">
              <span class="d-ib">Liste des entrepreneurs</span>
               <router-link to="/ajoutentrepreneur" class="btn btn-danger btn-sm btn-labeled" type="button" style="float: right;"><span class="btn-label">
                    <span class="icon icon-plus icon-lg icon-fw"></span>
                  </span>
                  Ajouter un entrepreneur
               </router-link>
            </h1>
          </div>
          <div class="row gutter-xs">
            <div class="col-xs-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-actions">
                    <button type="button" class="card-action card-toggler" title="Collapse"></button>
                    <button type="button" class="card-action card-reload" title="Reload"></button>
                    <button type="button" class="card-action card-remove" title="Remove"></button>
                  </div>
                  <strong>Janvier</strong>
                </div>
                <div class="card-body">
                  <table id="demo-datatables-buttons-1" class="table table-striped table-nowrap dataTable" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Ville</th>
                        <th>Numéro</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Yves</td>
                        <td>Moussouba</td>
                        <td>yjmj@hgmail.com</td>
                        <td>Abidjan</td>
                        <td>09 00 49 30</td>
                        <td>
                          <router-link to="/editentrepreneur">
                            <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-edit icon-lg icon-fw"></span>
                          </button>
                        </router-link>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-trash icon-lg icon-fw"></span>
                            </span>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>Sandé</td>
                        <td>Franck</td>
                        <td>francksande@gmail.com</td>
                        <td>Daloa</td>
                        <td>77 83 29 82</td>
                        <td>
                          <router-link to="/editentrepreneur">
                            <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-edit icon-lg icon-fw"></span>
                          </button>
                        </router-link>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-trash icon-lg icon-fw"></span>
                            </span>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>Doumbia</td>
                        <td>Aboudramane</td>
                        <td>aboudramanedoumbia@gmail.com</td>
                        <td>Douala</td>
                        <td>48 99 01 50</td>
                        <td>
                          <router-link to="/editentrepreneur">
                            <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-edit icon-lg icon-fw"></span>
                          </button>
                        </router-link>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-trash icon-lg icon-fw"></span>
                            </span>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>Yves</td>
                        <td>Moussouba</td>
                        <td>yjmj@hgmail.com</td>
                        <td>Abidjan</td>
                        <td>09 00 49 30</td>
                        <td>
                          <router-link to="/editentrepreneur">
                            <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-edit icon-lg icon-fw"></span>
                          </button>
                        </router-link>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-trash icon-lg icon-fw"></span>
                            </span>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>Sandé</td>
                        <td>Franck</td>
                        <td>francksande@gmail.com</td>
                        <td>Daloa</td>
                        <td>77 83 29 82</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-edit icon-lg icon-fw"></span>
                            </span>
                          </button>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-trash icon-lg icon-fw"></span>
                            </span>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>Doumbia</td>
                        <td>Aboudramane</td>
                        <td>aboudramanedoumbia@gmail.com</td>
                        <td>Douala</td>
                        <td>48 99 01 50</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-edit icon-lg icon-fw"></span>
                            </span>
                          </button>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-trash icon-lg icon-fw"></span>
                            </span>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>Yves</td>
                        <td>Moussouba</td>
                        <td>yjmj@hgmail.com</td>
                        <td>Abidjan</td>
                        <td>09 00 49 30</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-edit icon-lg icon-fw"></span>
                            </span>
                          </button>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-trash icon-lg icon-fw"></span>
                            </span>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>Sandé</td>
                        <td>Franck</td>
                        <td>francksande@gmail.com</td>
                        <td>Daloa</td>
                        <td>77 83 29 82</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-edit icon-lg icon-fw"></span>
                            </span>
                          </button>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-trash icon-lg icon-fw"></span>
                            </span>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>Doumbia</td>
                        <td>Aboudramane</td>
                        <td>aboudramanedoumbia@gmail.com</td>
                        <td>Douala</td>
                        <td>48 99 01 50</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-edit icon-lg icon-fw"></span>
                            </span>
                          </button>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-trash icon-lg icon-fw"></span>
                            </span>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>Yves</td>
                        <td>Moussouba</td>
                        <td>yjmj@hgmail.com</td>
                        <td>Abidjan</td>
                        <td>09 00 49 30</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-edit icon-lg icon-fw"></span>
                            </span>
                          </button>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-trash icon-lg icon-fw"></span>
                            </span>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>Sandé</td>
                        <td>Franck</td>
                        <td>francksande@gmail.com</td>
                        <td>Daloa</td>
                        <td>77 83 29 82</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-edit icon-lg icon-fw"></span>
                            </span>
                          </button>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-trash icon-lg icon-fw"></span>
                            </span>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>Doumbia</td>
                        <td>Aboudramane</td>
                        <td>aboudramanedoumbia@gmail.com</td>
                        <td>Douala</td>
                        <td>48 99 01 50</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-edit icon-lg icon-fw"></span>
                            </span>
                          </button>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-trash icon-lg icon-fw"></span>
                            </span>
                          </button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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

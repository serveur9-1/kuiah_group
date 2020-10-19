<template>
<div class="layout-content-body">
          <h1 class="title-bar-title">
              <span class="d-ib">Liste des clients</span>
               <router-link to="/demandeclient" class="btn btn-danger btn-sm btn-labeled" type="button" style="float: right;"><span class="btn-label">
                    <span class="icon icon-list icon-lg icon-fw"></span>
                  </span>
                    Liste des demandes
                </router-link>
            </h1>
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
                        <th>Statut</th>
                        <th>Numéro</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Yves</td>
                        <td>Moussouba</td>
                        <td>yjmj@hgmail.com</td>
                        <td>Abidjan</td>
                       <td><span class="badge badge-primary">Investisseur</span></td>
                        <td>09 00 49 30</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-eye icon-lg icon-fw"></span>
                            </span>
                          </button>
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
                        <td><span class="badge badge-success">Entrepreneur</span></td>
                        <td>77 83 29 82</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-eye icon-lg icon-fw"></span>
                            </span>
                          </button>
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
                        <td><span class="badge badge-success">Entrepreneur</span></td>
                        <td>48 99 01 50</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-eye icon-lg icon-fw"></span>
                            </span>
                          </button>
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
                        <td><span class="badge badge-primary">Investisseur</span></td>
                        <td>09 00 49 30</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-eye icon-lg icon-fw"></span>
                            </span>
                          </button>
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
                        <td><span class="badge badge-success">Entrepreneur</span></td>
                        <td>77 83 29 82</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-eye icon-lg icon-fw"></span>
                            </span>
                          </button>
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
                        <td><span class="badge badge-success">Entrepreneur</span></td>
                        <td>48 99 01 50</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-eye icon-lg icon-fw"></span>
                            </span>
                          </button>
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
                        <td><span class="badge badge-success">Entrepreneur</span></td>
                        <td>09 00 49 30</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-eye icon-lg icon-fw"></span>
                            </span>
                          </button>
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
                        <td><span class="badge badge-primary">Investisseur</span></td>
                        <td>77 83 29 82</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-eye icon-lg icon-fw"></span>
                            </span>
                          </button>
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
                        <td><span class="badge badge-primary">Investisseur</span></td>
                        <td>48 99 01 50</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-eye icon-lg icon-fw"></span>
                            </span>
                          </button>
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
                        <td><span class="badge badge-success">Entrepreneur</span></td>
                        <td>09 00 49 30</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-eye icon-lg icon-fw"></span>
                            </span>
                          </button>
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
                        <td><span class="badge badge-success">Entrepreneur</span></td>
                        <td>77 83 29 82</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-eye icon-lg icon-fw"></span>
                            </span>
                          </button>
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
                        <td><span class="badge badge-success">Entrepreneur</span></td>
                        <td>48 99 01 50</td>
                        <td>
                          <button class="btn btn-danger btn-sm btn-labeled" type="button">
                            <span class="icon icon-eye icon-lg icon-fw"></span>
                            </span>
                          </button>
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

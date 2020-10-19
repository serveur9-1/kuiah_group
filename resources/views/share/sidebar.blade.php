<div class="layout-sidebar">
        <div class="layout-sidebar-backdrop"></div>
        <div class="layout-sidebar-body">
          <div class="custom-scrollbar">
            <nav id="sidenav" class="sidenav-collapse collapse">
              <ul class="sidenav">
                <li class="sidenav-search hidden-md hidden-lg">
                  <form class="sidenav-form" action="http://demo.madebytilde.com/">
                    <div class="form-group form-group-sm">
                      <div class="input-with-icon">
                        <input class="form-control" type="text" placeholder="Search…">
                        <span class="icon icon-search input-icon"></span>
                      </div>
                    </div>
                  </form>
                </li>
                <li class="sidenav-item">
                <router-link to="/home"><span class="sidenav-icon icon icon-dashboard"></span>TABLEAU DE BOARD</router-link>
                </li>
                 <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-bullhorn"></span>
                    <span class="sidenav-label">PUBLICATIONS</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                    <li><router-link to="/listpublication">Liste des publications</router-link></li>
                    <li><router-link to="/ajoutpublication">Ajouter une publication</router-link></li>
                    <li><router-link to="/confirmpublication">En attente de publication</router-link></li>
                  </ul>
                </li>
                <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-dollar"></span>
                    <span class="sidenav-label">INVESTISSEURS</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                  <li><router-link to="/listinvestisseur">Liste des investisseurs</router-link></li>
                  <li><router-link to="/ajoutinvestisseur">Ajouter investisseur</router-link></li>
                  </ul>
                </li>
                <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-suitcase"></span>
                    <span class="sidenav-label">ENTREPRENEURS</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                  <li><router-link to="/listentrepreneur">Liste des entrepreneurs</router-link></li>
                  <li><router-link to="/ajoutentrepreneur">Ajouter un entrepreneur</router-link></li>
                  </ul>
                </li>
                <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-copy"></span>
                    <span class="sidenav-label">CATEGORIES</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                  <li><router-link to="/listcategorie">Liste des categories</router-link></li>
                  <li><router-link to="/ajoutcategorie">Ajouter une categorie</router-link></li>
                  </ul>
                </li>
                
                 <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-globe"></span>
                    <span class="sidenav-label">PAYS</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                  <li><router-link to="/listpays">Liste des pays</router-link></li>
                  <li><router-link to="/ajoutpays">Ajouter un pays</router-link></li>
                  </ul>
                </li>
                 <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-hourglass-half"></span>
                    <span class="sidenav-label">NIVEAU PEOJET</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                  <li><router-link to="/listniveau">Liste des niveaux</router-link></li>
                  <li><router-link to="/ajoutniveau">Ajouter un niveau</router-link></li>
                  </ul>
                </li>
                 <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-angellist"></span>
                    <span class="sidenav-label">PARTENAIRES</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                  <li><router-link to="/listpartenaire">Liste des partenaire</router-link></li>
                  <li><router-link to="/ajoutpartenaire">Ajouter un partenaire</router-link></li>
                  </ul>
                </li>
                <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-users"></span>
                    <span class="sidenav-label">COMPTE CLIENT</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                  <li><router-link to="/listclient">Liste des compte</router-link></li>
                  <li><router-link to="/demandeclient">Demande de compte</router-link></li>
                  </ul>
                </li>
                <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-user"></span>
                    <span class="sidenav-label">COMPTE GESTIONNAIRE</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                  <li><router-link to="/listgestionnaire">Liste des gestionnaires</router-link></li>
                  <li><router-link to="/ajoutgestionnaire">Ajouter un gestionnaire</router-link></li>
                  </ul>
                </li>
                <li class="sidenav-item">
                  <a href="contacts.html">
                    <span class="sidenav-icon icon icon-cog"></span>
                    <span class="sidenav-label">PARAMETRE</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
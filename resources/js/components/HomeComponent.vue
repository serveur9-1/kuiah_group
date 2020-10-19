<template>
    <div class="container">
        <div class="row justify-content-center">
           <div class="layout-content-body">
          <div class="title-bar">
            <div class="title-bar-actions">
              <select class="selectpicker dropdown" name="period" data-dropdown-align-right="true" data-style="btn-default btn-sm" data-width="fit">
                <option value="today">Today</option>
                <option value="yesterday">Yesterday</option>
                <option value="last_7d" selected="selected">Last 7 days</option>
                <option value="last_1m">Last 30 days</option>
                <option value="last_3m">Last 90 days</option>
              </select>
            </div>
            <h1 class="title-bar-title">
              <span class="d-ib">Tableau de bord</span>
              <span class="d-ib">
                <a class="title-bar-shortcut" href="#" title="Add to shortcut list" data-container="body" data-toggle-text="Remove from shortcut list" data-trigger="hover" data-placement="right" data-toggle="tooltip">
                  <span class="sr-only">Add to shortcut list</span>
                </a>
              </span>
            </h1>
            <p class="title-bar-description">
              <small>You can personalize your dashboard by using <a href="widgets.html">widgets</a>.</small>
            </p>
          </div>
          <div class="row gutter-xs">
            <div class="col-md-6 col-lg-3 col-lg-push-0">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-primary circle sq-48">
                        <span class="icon icon-user"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Visiteurs</h6>
                      <h3 class="media-heading">
                        <span class="fw-l">1,031,760</span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 col-lg-push-3">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-danger circle sq-48">
                        <span class="icon icon-bullhorn"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Publications</h6>
                      <h3 class="media-heading">
                        <span class="fw-l">1,256 Items</span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 col-lg-pull-3">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-primary circle sq-48">
                        <span class="icon icon-dollar"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Investisseurs</h6>
                      <h3 class="media-heading">
                        <span class="fw-l">00:07:56</span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 col-lg-pull-0">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-danger circle sq-48">
                        <span class="icon icon-suitcase"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h6 class="media-heading">Entrepreneurs</h6>
                      <h3 class="media-heading">
                        <span class="fw-l">$155,352.47</span>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row gutter-xs">
            <div class="col-xs-12 col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Statistique de projet investis</h4>
                </div>
                <div class="card-body">
                  <div class="card-chart">
                    <canvas data-chart="line" data-animation="false" data-labels='["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"]' data-values='[{"label": "This week", "backgroundColor": "transparent", "borderColor": "#d9230f", "pointBackgroundColor": "#d9230f", "data": [29432, 20314, 17665, 22162, 31194, 35053, 29298]}, {"label": "Last week", "backgroundColor": "transparent", "borderColor": "#d9831f", "pointBackgroundColor": "#d9831f", "data": [9956, 22607, 30963, 22668, 16338, 22222, 39238]}]' data-tooltips='{"mode": "label"}' data-hide='["gridLinesX", "legend"]' height="150"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row gutter-xs">
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <span class="bg-gray sq-64 circle">
                        <span class="icon icon-flag"></span>
                      </span>
                    </div>
                    <div class="media-middle media-body">
                      <h3 class="media-heading">
                        <span class="fw-l">1,256 Issues</span>
                        <span class="fw-b fz-sm text-danger">
                          <span class="icon icon-caret-up"></span>
                          15%
                        </span>
                      </h3>
                      <small>6 issues are unassigned</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <div class="media-chart">
                        <canvas data-chart="doughnut" data-animation="false" data-labels='["Resolved", "Unresolved"]' data-values='[{"backgroundColor": ["#d9230f", "#777"], "data": [879, 377]}]' data-hide='["legend", "scalesX", "scalesY", "tooltips"]' height="64" width="64"></canvas>
                      </div>
                    </div>
                    <div class="media-middle media-body">
                      <h2 class="media-heading">
                        <span class="fw-l">879</span>
                        <small>Resolved</small>
                      </h2>
                      <small>More than 70% resolved issues</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <div class="media">
                    <div class="media-middle media-left">
                      <div class="media-chart">
                        <canvas data-chart="doughnut" data-animation="false" data-labels='["Resolved", "Unresolved"]' data-values='[{"backgroundColor": ["#777", "#d9230f"], "data": [879, 377]}]' data-hide='["legend", "scalesX", "scalesY", "tooltips"]' height="64" width="64"></canvas>
                      </div>
                    </div>
                    <div class="media-middle media-body">
                      <h2 class="media-heading">
                        <span class="fw-l">377</span>
                        <small>Unresolved</small>
                      </h2>
                      <small>Less than 30% unresolved issues</small>
                    </div>
                  </div>
                </div>
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

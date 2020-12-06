<template>
    <div v-if="isLoading" class="loader">
    </div>
    <div class="dashboard-content" v-else>

        <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="font-weight:bold">{{ title}}</h2>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="row">

            <!-- Item -->
            <div class="col-lg-3 col-md-6">
                <div class="dashboard-stat color-1">
                    <div class="dashboard-stat-content"><h4 class="counter">{{ projects.length}}</h4> <span>Projets</span></div>
                    <div class="dashboard-stat-icon"><i class="ln ln-icon-File-Link"></i></div>
                </div>
            </div>

            <!-- Item -->
            <div class="col-lg-3 col-md-6">
                <div class="dashboard-stat color-2">
                    <div class="dashboard-stat-content"><h4 class="counter">{{ real_estates.length}}</h4> <span>Biens immobiliers</span></div>
                    <div class="dashboard-stat-icon"><i class="ln ln-icon-Bar-Chart"></i></div>
                </div>
            </div>


            <!-- Item -->
            <div class="col-lg-3 col-md-6">
                <div class="dashboard-stat color-3">
                    <div class="dashboard-stat-content"><h4 class="counter">{{ entrepreneurs.length}}</h4> <span>Entrepreneurs</span></div>
                    <div class="dashboard-stat-icon"><i class="ln ln-icon-Business-ManWoman"></i></div>
                </div>
            </div>


            <!-- Item -->
            <div class="col-lg-3 col-md-6">
                <div class="dashboard-stat color-4">
                    <div class="dashboard-stat-content"><h4 class="counter">{{ investors.length}}</h4> <span>Investisseurs</span></div>
                    <div class="dashboard-stat-icon"><i class="ln ln-icon-Add-UserStar "></i></div>
                </div>
            </div>

        </div>

        <div class="row">
            <!-- Recent Activity -->
            <div class="col-lg-12 col-md-12">
                <div class="dashboard-list-box margin-top-20">

                    <chart-line
                        :chartdata = "chartData"
                        :height="150"
                    />
                    <!-- <chart-bar
                        :chartdata = "chartData"
                    /> -->
                </div>
            </div>
        </div>

    </div>
    <!-- Content / End -->
</template>

<script>
    import axios from 'axios'
    import { API_BASE_URL } from './src/config';
    import TitlebarComponent from "../components/layouts/TitlebarComponent";
    import ChartLine from "../components/ChartLine";
    import ChartBar from "../components/ChartBar";
    import authHeader from '../services/auth-header';
    export default {
        name: "Dashboard",
        components: {TitlebarComponent, ChartLine, ChartBar},
        data: function () {
            return {
                projects: '',
                title: "Tableau de bord",
                real_estates: '',
                investors: '',
                entrepreneurs: '',
                domains: '',
                isLoading : true,
                chartData: {
                    labels: [],
                    height:100,
                    datasets: [
                        {
                            label: 'Projets',
                            height:'100px',
                            backgroundColor: '#f87979',
                            data: []
                        }
                    ]
                },

            }
        },
        mounted() {
            this.onMounted()
        },

        methods: {
            onMounted: function () {
                axios.get(API_BASE_URL+"/projects/").then((data) => {
                    this.projects = data.data.data;
                });
                axios.get(API_BASE_URL+"/real_estates/").then((data) => {
                    this.real_estates = data.data.data;
                });
                axios.get(API_BASE_URL+"/users?investor=true", { headers: authHeader() }).then((data) => {
                    this.investors = data.data;
                });
                axios.get(API_BASE_URL+"/users?investor=false", { headers: authHeader() }).then((data) => {
                    this.entrepreneurs = data.data;
                });

                axios.get(API_BASE_URL+"/domains").then((data) => {
                    this.domains = data.data;
                    this.domains.data.forEach(element => {
                        this.chartData.labels.push(element.name );
                        this.chartData.datasets[0].data.push(element.projects.length );
                    });
                    this.isLoading=false;
                });

            },
        }
    }
</script>

<style scoped>

</style>

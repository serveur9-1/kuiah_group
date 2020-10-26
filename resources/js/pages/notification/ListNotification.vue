<template>
<div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>

        <!-- Content -->
     <div class="container">
	    <!-- Recent Jobs -->
        <div class="col-md-12">
            <div class="padding-right">
                <div class="listings-container">
                    <!-- Listing -->
                    <a href="job-page-alt.html" class="listing full-time">
                        <div class="listing-logo">
                            <img src="images/job-list-logo-01.png" alt="">
                        </div>
                        <div class="listing-title">
                            <h4>Marketing Coordinator - SEO / SEM Experience</h4>
                            <ul class="listing-icons">
                                <li><i class="ln ln-icon-Eye-Visible"></i> 20</li>
                                <li><i class="ln ln-icon-Map2"></i> Yamoussoukro</li>
                                <li><i class="ln ln-icon-Male"></i> 17</li>
                                <li><div class="listing-date new">new</div></li>
                            </ul>
                        </div>
                    </a>
                    <!-- Listing -->
                    <a href="job-page.html" class="listing part-time">
                        <div class="listing-logo">
                            <img src="images/job-list-logo-02.png" alt="">
                        </div>
                        <div class="listing-title">
                            <h4>Core PHP Developer for Site Maintenance </h4>
                            <ul class="listing-icons">
                                <li><i class="ln ln-icon-Eye-Visible"></i> 20</li>
                                <li><i class="ln ln-icon-Map2"></i> Yamoussoukro</li>
                                <li><i class="ln ln-icon-Male"></i> 17</li>
                                <li><div class="listing-date">3d ago</div></li>
                            </ul>
                        </div>
                    </a>
                    <!-- Listing -->
                    <a href="job-page-alt.html" class="listing full-time">
                        <div class="listing-logo">
                            <img src="images/job-list-logo-01.png" alt="">
                        </div>
                        <div class="listing-title">
                            <h4>Restaurant Team Member - Crew </h4>
                            <ul class="listing-icons">
                                <li><i class="ln ln-icon-Eye-Visible"></i> 20</li>
                                <li><i class="ln ln-icon-Map2"></i> Yamoussoukro</li>
                                <li><i class="ln ln-icon-Male"></i> 17</li>
                                <li><div class="listing-date">3d ago</div></li>
                            </ul>
                        </div>
                    </a>
                    <!-- Listing -->
                    <a href="job-page.html" class="listing full-time">
                        <div class="listing-logo">
                            <img src="images/job-list-logo-04.png" alt="">
                        </div>
                        <div class="listing-title">
                            <h4>Power Systems User Experience Designer</h4>
                            <ul class="listing-icons">
                                <li><i class="ln ln-icon-Management"></i> Hexagon</li>
                                <li><i class="ln ln-icon-Map2"></i> London</li>
                                <li><i class="ln ln-icon-Money-2"></i> $55 / hour</li>
                                <li><div class="listing-date">4d ago</div></li>
                            </ul>
                        </div>
                    </a>
                    <!-- Listing -->
                    <a href="job-page.html" class="listing part-time">
                        <div class="listing-logo">
                            <img src="images/job-list-logo-05.png" alt="">
                        </div>
                        <div class="listing-title">
                            <h4>iPhone / Android Music App Development </h4>
                            <ul class="listing-icons">
                                <li><i class="ln ln-icon-Eye-Visible"></i> 20</li>
                                <li><i class="ln ln-icon-Map2"></i> Yamoussoukro</li>
                                <li><i class="ln ln-icon-Male"></i> 17</li>
                                <li><div class="listing-date">4d ago</div></li>
                            </ul>
                        </div>
                    </a>
                    <!-- Listing -->
                    <a href="job-page.html" class="listing part-time">
                        <div class="listing-logo">
                            <img src="images/job-list-logo-02.png" alt="">
                        </div>
                        <div class="listing-title">
                            <h4>Core PHP Developer for Site Maintenance </h4>
                            <ul class="listing-icons">
                                <li><i class="ln ln-icon-Eye-Visible"></i> 20</li>
                                <li><i class="ln ln-icon-Map2"></i> Yamoussoukro</li>
                                <li><i class="ln ln-icon-Male"></i> 17</li>
                                <li><div class="listing-date">3d ago</div></li>
                            </ul>
                        </div>
                    </a>
                    <!-- Listing -->
                    <a href="job-page.html" class="listing full-time">
                        <div class="listing-logo">
                            <img src="images/job-list-logo-01.png" alt="">
                        </div>
                        <div class="listing-title">
                            <h4>Assistant de direction</h4>
                            <ul class="listing-icons">
                                <li><i class="ln ln-icon-Eye-Visible"></i> 20</li>
                                <li><i class="ln ln-icon-Map2"></i> Yamoussoukro</li>
                                <li><i class="ln ln-icon-Male"></i> 17</li>
                                <li><div class="listing-date">3d ago</div></li>
                            </ul>
                        </div>
                    </a>
                    <!-- Listing -->
                    <a href="job-page.html" class="listing full-time">
                        <div class="listing-logo">
                            <img src="images/job-list-logo-04.png" alt="">
                        </div>
                        <div class="listing-title">
                            <h4>Administrateur système </h4>
                            <ul class="listing-icons">
                                <li><i class="ln ln-icon-Eye-Visible"></i> 20</li>
                                <li><i class="ln ln-icon-Map2"></i> Yamoussoukro</li>
                                <li><i class="ln ln-icon-Male"></i> 17</li>
                                <li><div class="listing-date">3d ago</div></li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div> 
    </div>
</div>
    <!-- Content / End -->
</template>

<script>
    import TitlebarComponent from "../../components/layouts/TitlebarComponent";
    export default {
        name: "Dashboard",
        components: {TitlebarComponent},
        data: function () {
            return {
                message: "Mounted",
            }
        },
        mounted() {
            this.onMounted()
        },
        methods: {
            onMounted: function () {
                console.log(this.message)
            }
        }
    }
</script>

<style scoped>

</style>

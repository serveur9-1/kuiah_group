<template>
<div class="dashboard-content">

        <!-- Titlebar -->
       <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="font-weight:bold">{{ title}}</h2>
                </div>
            </div>
        </div>

        <!-- Content -->
     <div class="container">
	    <!-- Recent Jobs -->
        <div class="col-md-12" style="margin-bottom:50px">
            <div class="padding-right">
                <div class="listings-container">
                    <!-- Listing -->
                    <router-link to="/publication/waiting/View" class="listing">
                        <div class="listing-title">
                            <h4>Assistant de direction</h4>
                            <ul class="listing-icons">
                                <li> <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, cumque eos? Natus ullam,
                                     quibusdam quae harum praesentium nam odio sed veritatis nihi
                                     </p>
                                </li>
                                <li><div class="listing-date">3d ago</div></li>
                            </ul>
                        </div>
                    </router-link>
                    <!-- Listing -->
                     <router-link to="/publication/waiting/View" class="listing">
                        <div class="listing-title">
                            <h4>Core PHP Developer for Site Maintenance </h4>
                            <ul class="listing-icons">
                                <li> <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, cumque eos? Natus ullam,
                                     quibusdam quae harum praesentium nam odio sed veritatis nihi
                                     </p>
                                </li>
                                <li><div class="listing-date">3d ago</div></li>
                            </ul>
                        </div>
                    </router-link>
                    <!-- Listing -->
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
                title : "Notification" ,
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

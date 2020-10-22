<template>
    <div>
        <!-- Responsive Navigation Trigger -->
        <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

        <div class="dashboard-nav">
            <div class="dashboard-nav-inner">

                <ul v-for="(item, index) in navItem" :data-submenu-title="item.section_name">
                    <li :class="{'active':index==0}" v-for="lv1 in item.section_items" v-if="lv1.child.length > 0">
                        <a href="dashboard.html">{{ lv1.item_parent }}</a>
                        <ul>
                            <li v-for="lv2 in lv1.child">
                                <a href="dashboard-manage-jobs.html">{{ lv2.title }}</a>
                            </li>
                        </ul>
                    </li>
                    <li v-else>
                        <a href="dashboard-messages.html">{{ lv1.item_parent }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Navigation / End -->
    </div>
</template>

<script>

    import navItems from './../../sidebar-item'

    export default {
        name: "SidebarComponent",
        data: function () {
            return {
                navItem: navItems
            }
        },
        mounted() {
            console.log(this.navItem)
        }
    }
</script>

<style scoped>

</style>

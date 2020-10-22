<template>
    <div>
        <!-- Responsive Navigation Trigger -->
        <a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

        <div class="dashboard-nav">
            <div class="dashboard-nav-inner">

                <ul v-for="(item, index) in navItem" :data-submenu-title="item.section_name">
                    <li :class="{'active':index==0}" v-for="lv1 in item.section_items" v-if="lv1.child.length > 0">
                        <a href="#">{{ lv1.item_parent }}</a>
                        <ul>
                            <li v-for="lv2 in lv1.child">
                                <router-link :to="lv2.path">
                                    {{ lv2.title }}
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li v-else>
                        <router-link :to="lv1.path">
                            {{ lv1.item_parent }}
                        </router-link>
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

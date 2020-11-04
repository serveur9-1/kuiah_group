<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>
            <div class="container">
                <div class="card">
                    <div class="row">
                        <aside class="col-sm-5 border-right">
                            <article class="gallery-wrap" v-if="realstate.medias[0]">
                                    <div class="img-big-wrap">
                                    <div> <a href="#"><img src="https://stehroniope.com/onewebstatic/7ba48f251a.jpg">{{ realstate.medias[0].name}}</a></div>
                                    </div> <!-- slider-product.// -->
                                    <div class="img-small-wrap">
                                        <div class="item-gallery" v-for="image in realstate.medias" :key="image.id">
                                            <img :src="image.name" :title="image.name">
                                        </div>
                                    </div> <!-- slider-nav.// -->
                            </article> <!-- gallery-wrap .end// -->
                            <article class="gallery-wrap" v-else>
                                    <div class="img-big-wrap" style="padding-left:20%;padding-top:20%">
                                         <div ><i style="font-size:200px;margin:auto" class="fa  fa-file"></i></div>
                                    </div>
                            </article>
                        </aside>
                         <aside class="col-sm-7">
                            <article class="card-body p-5">
                                <h3 class="title mb-3">Titre : {{ realstate.title}}</h3>
                                <p class="price-detail-wrap">
                                    <span class="price h3 text-warning">
                                        <span class="num">Prix : {{ realstate.price_format}}</span>
                                    </span>
                                </p> <!-- price-detail-wrap .// -->
                                <dl class="item-property">
                                <dt><strong>Description</strong></dt>
                                <dd><p class="mr-3"> {{ realstate.description}} </p></dd>
                                </dl>

                                <dl class="param param-feature">
                                <dt><strong>Contact</strong></dt>
                                <dd>{{ realstate.contact}}</dd>
                                <dd>{{ realstate.email}}</dd>
                                </dl>  <!-- item-property-hor .// -->
                                <dl class="param param-feature">
                                <dt><strong>Localisation</strong></dt>
                                <dd>{{ realstate.location}}</dd>
                                </dl>  <!-- item-property-hor .// -->
                                <dl class="param param-feature">
                                <dt><strong>Date de création</strong></dt>
                                <dd>{{ realstate.created_at}}</dd>
                                </dl>
                                <hr>
                            </article> <!-- card-body.// -->
                        </aside> <!-- col.// -->
                    </div> <!-- row.// -->
                </div> <!-- card.// -->
            </div>
        <!-- Content -->
    </div>
    <!-- Content / End -->

</template>

<script>
    import axios from 'axios'
    import { API_BASE_URL } from '../src/config'
    import TitlebarComponent from "../../components/layouts/TitlebarComponent";
    export default {
        name: "Dashboard",
        components: {TitlebarComponent},
        data: function () {
            return {
                realstate: {},
                id : "",
                errors: '',
                isLoading: false,
            }
        },
        mounted() {
            this.onMounted()
        },
        methods: {
            onMounted: function () {
                let id = this.$router.currentRoute.params.id;
                this.id=this.$route.params.id;
                axios.get(API_BASE_URL+'/real_estates/'+this.id).then((response) => {
                    this.realstate = response.data;
                });
            }
        }
    }
</script>

<style scoped>
.gallery-wrap .img-big-wrap img {
    height: 450px;
    width: auto;
    display: inline-block;
    cursor: zoom-in;
}


.gallery-wrap .img-small-wrap .item-gallery {
    width: 60px;
    height: 60px;
    border: 1px solid #ddd;
    margin: 7px 2px;
    display: inline-block;
    overflow: hidden;
}

.gallery-wrap .img-small-wrap {
    text-align: center;
}
.gallery-wrap .img-small-wrap img {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
    border-radius: 4px;
    cursor: zoom-in;
}
</style>

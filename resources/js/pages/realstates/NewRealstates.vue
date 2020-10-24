<template>
    <div class="dashboard-content">

        <!-- Titlebar -->
        <TitlebarComponent/>
            <div class="container">
                <div class="card">
                    <div class="row">
                        <aside class="col-sm-5 border-right">
                            <article class="gallery-wrap"> 
                                    <div class="img-big-wrap">
                                    <div> <a href="#"><img src="https://s9.postimg.org/tupxkvfj3/image.jpg"></a></div>
                                    </div> <!-- slider-product.// -->
                                    <div class="img-small-wrap">
                                    <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
                                    <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
                                    <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
                                    <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
                                    </div> <!-- slider-nav.// -->
                            </article> <!-- gallery-wrap .end// -->
                        </aside>
                         <aside class="col-sm-7">
                            <article class="card-body p-5">
                                <h3 class="title mb-3">Maison blanche avec piscine</h3>
                                <p class="price-detail-wrap"> 
                                    <span class="price h3 text-warning"> 
                                        <span class="currency">US $</span><span class="num">200000</span>
                                    </span> 
                                </p> <!-- price-detail-wrap .// -->
                                <dl class="item-property">
                                <dt><strong>Description</strong></dt>
                                <dd><p>Here goes description consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco </p></dd>
                                </dl>
                                
                                <dl class="param param-feature">
                                <dt><strong>Contact</strong></dt>
                                <dd>+225 48 99 01 50</dd>
                                <dd>Aboudramanedoumbia@gmail.com</dd>
                                </dl>  <!-- item-property-hor .// -->
                                <dl class="param param-feature">
                                <dt><strong>Localisation</strong></dt>
                                <dd>Abidjan, Côte d'Ivoire</dd>
                                </dl>  <!-- item-property-hor .// -->
                                <hr>
                            </article> <!-- card-body.// -->
                        </aside> <!-- col.// -->
                        <a href="#" class="button margin-top-30">Activer</a>
                    </div> <!-- row.// -->
                </div> <!-- card.// -->
            </div>
        <!-- Content -->
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

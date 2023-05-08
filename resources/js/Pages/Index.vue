<script setup>
import { VueperSlides, VueperSlide } from "vueperslides";
import "vueperslides/dist/vueperslides.css";
import { Link } from "@inertiajs/vue3"
defineProps({
    spaces: Array
})

</script>

<template>
    <section class="p-5 mt-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">ADart</h1>
            <p class="fs-4">portal web multilingüe (català, castellà i anglès) per a la promoció
                cultural del patrimoni arquitectònic balear, amb l’objectiu de donar a conèixer els
                edificis més representatius, moviments arquitectònics i arquitectes més
                rellevants a les Illes Balears.</p>
            <button class="btn btn-primary btn-lg" type="button">Example button</button>
        </div>
    </section>
    <h1 class="my-5">Espais destacats</h1>
    <vueper-slides autoplay progress v-if="spaces">
        <vueper-slide v-for="(slide, i) in spaces" :key="i" :image="slide.images[0].url">
            <template #content>
                <div class="container">
                    <h1 style="color: white;">{{ slide.name }}</h1>
                    <p style="color: white;">
                        {{ slide.images[0].name }}
                    </p>
                </div>
            </template>
        </vueper-slide>
    </vueper-slides>
    <div class="row">
        <template v-for="space in spaces">
            <div class="col-lg-4 p-3">
                <div class="card">
                    <img :src="space.images[0].url" class="card-img-top" :alt="space.images[0].name">
                    <div class="card-body">
                        <h3 class="card-title">{{ space.name }}</h3>
                        <p class="card-text">{{ space.images[0].name }}</p>
                        <!-- <Link :href="space.url">
                            <button type="button" class="btn btn-primary">Ver</button>
                        </Link> -->
                    </div>
                </div>
            </div>
        </template>
    </div>
    <pre>
        {{ spaces }}
    </pre>
</template>

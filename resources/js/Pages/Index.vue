<script setup>
import { VueperSlides, VueperSlide } from "vueperslides";
import "vueperslides/dist/vueperslides.css";
import { Link, usePage } from "@inertiajs/vue3"
import { ref } from "vue";
defineProps({
    spaces: Array
})

const viewDebug = ref(false)
const page = usePage()
</script>

<template>
    <section class="p-5 mt-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">ADart</h1>
            <p class="fs-4">Portal web multilingue (catalán, castellano y inglés) para la promoción
                cultural del patrimonio arquitectonico balear, con el objetivo de dar a conocer los
                edificios mas representativos, movimientos arquitectonicos y arquitectos mas
                relevantes de las Islas Baleares.</p>
        </div>
    </section>
    <h1 class="my-5">Espacios destacados</h1>
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
                        <p class="card-text">Tipo: {{ space.type.name  }}</p>
                        <p class="card-text">Accesibilidad: {{ space.accessibility  }}</p>
                        <p class="card-text">Zona: {{ space.zone  }}</p>
                        <Link :href="`/spaces/${space.id}`">
                            <button type="button" class="btn btn-primary">Ver</button>
                        </Link>
                    </div>
                </div>
            </div>
        </template>
    </div>
    <template v-if="page.props.auth && page.props.auth.admin">
        <button class="btn btn-primary" @click="viewDebug = !viewDebug">Debug</button>
        <pre v-if="viewDebug" class="p-5 bg-black text-color text-white">
            {{ spaces }}
        </pre>
    </template>
</template>

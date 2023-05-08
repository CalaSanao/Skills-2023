<script setup>
import { Link, usePage } from "@inertiajs/vue3"
import { ref } from "vue";
defineProps({
    spaces: Array
})

const viewDebug = ref(false)
const page = usePage()
</script>

<template>
    <div>
        <div class="row">
            <template v-for="space in spaces">
            <div class="col-lg-4 p-3">
                <div class="card">
                    <img v-if="space.images.length > 0" :src="space.images[0].url" class="card-img-top" :alt="space.images[0].name">
                    <div class="card-body">
                        <h3 class="card-title">{{ space.name }}</h3>
                        <p class="card-text" v-if="space.images.length > 0">{{ space.images[0].name }}</p>
                        <Link :href="`/spaces/${space.id}`">
                            <button type="button" class="btn btn-primary">Ver</button>
                        </Link>
                    </div>
                </div>
            </div>
        </template>
        </div>
    </div>
    <template v-if="page.props.auth && page.props.auth.admin">
        <button class="btn btn-primary" @click="viewDebug = !viewDebug">Debug</button>
        <pre v-if="viewDebug" class="p-5 bg-black text-color text-white">
            {{ spaces }}
        </pre>
    </template>
</template>

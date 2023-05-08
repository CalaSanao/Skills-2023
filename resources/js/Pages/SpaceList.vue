<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    spaces: Array
})
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
    <pre>
        {{ spaces }}
    </pre>
</template>

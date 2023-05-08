<script setup>
import {Link, usePage} from '@inertiajs/vue3'
import { ref } from 'vue';

const props = defineProps({
    user: Object
})
const viewDebug = ref(false)
const page = usePage()
</script>

<template>
    <div class="p-5 mb-4 bg-light mt-4 rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">{{ user.name }}</h1>
            <p class="fs-4">
                <span class="fw-bold">
                    Dni:
                </span>
                {{ user.dni }}
            </p>
            <p class="fs-4">
                <span class="fw-bold">
                    Email:
                </span>
                {{ user.email }}
            </p>
            <p class="fs-4">
                <span class="fw-bold">
                    Rol:
                </span>
                {{ user.is_admin ? 'Administrador' : 'Usuario' }}
            </p>
        </div>
    </div>
    <h1>Comentarios y valoraciones</h1>
    <template v-if="user.comments.length > 0">
        <template v-for="comment in user.comments">
            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid">
                    <h1 class="fs-4"><span class="fw-bold">{{ comment.space.name}}</span> <Link :href="`/spaces/${comment.space.id}`">Ver</Link></h1>
                    <h1 class="fs-4"><span class="fw-bold">{{ comment.valoration }} / 5</span></h1>
                    <p class="fs-5">{{ comment.message }}</p>
                    <p class="fs-5">{{ new Date(comment.created_at).toLocaleString() }}</p>
                    <p class="fs-5">Validado: {{ comment.is_validated ? 'Si' : 'No' }}</p>
                </div>
            </div>
        </template>
    </template>
    <template v-else>
        <p class="fs-3">
            No hay comentarios
        </p>
    </template>
    <template v-if="page.props.auth && page.props.auth.admin">
        <button class="btn btn-primary" @click="viewDebug = !viewDebug">Debug</button>
        <pre v-if="viewDebug" class="p-5 bg-black text-color text-white">
            {{ user }}
        </pre>
    </template>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    data: Object
})

const interestPoint = ref(null);
const viewDebug = ref(false)
const page = usePage()
</script>

<template>
    <h1 class="display-5 fw-bold py-5">Visitas de {{ data.name }}</h1>
    <template v-if="data.visits.length > 0" v-for="visit in data.visits">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
              <h1 class="display-5 fw-bold">{{ visit.title }}</h1>
              <p class="fs-4">{{ visit.description }}</p>
              <p class="fs-4">
                <span class="fw-bold">
                    Plazas:
                </span>
                {{ visit.num_places }}
            </p>
            <p class="fs-4">
                <span class="fw-bold">
                    Se necesita inscripción:
                </span>
                {{ visit.is_incription_needed ? 'Si' : 'No' }}
            </p>

            <p class="fs-4">
                <span class="fw-bold">
                    Empieza:
                </span>
                {{ new Date(visit.start_date).toLocaleString() }}
            </p>

            <p class="fs-4">
                <span class="fw-bold">
                    Acaba:
                </span>
                {{ new Date(visit.end_date).toLocaleString() }}
            </p>

              <button class="btn btn-primary btn-lg" type="button" @click="() => interestPoint == visit.id ? interestPoint = null : interestPoint = visit.id">Punto de interés</button>

              <template v-if="interestPoint == visit.id">
                <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid py-5">
                  <h1 class="display-5 fw-bold">Título: {{ visit.interest_point.title }}</h1>
                  <p class="fs-4">Descripción: {{ visit.interest_point.description_es }}</p>
                  <img :src="visit.interest_point.image.url" class="img-fluid rounded-top" :alt="visit.interest_point.image.name" width="500">
                </div>
                </div>
            </template>


            </div>
          </div>
    </template>
    <template v-else>
        <h1 class="display-5 py-5">No hay visitas para este espacio</h1>
    </template>
<template v-if="page.props.auth && page.props.auth.admin">
        <button class="btn btn-primary" @click="viewDebug = !viewDebug">Debug</button>
        <pre v-if="viewDebug" class="p-5 bg-black text-color text-white">
            {{ data }}
        </pre>
    </template>
</template>

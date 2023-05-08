<script setup>
import { VueperSlides, VueperSlide } from "vueperslides";
import "vueperslides/dist/vueperslides.css";
import { usePage, useForm, Link } from '@inertiajs/vue3'
import { computed, ref } from "vue";
const props = defineProps({
    space: Object
})

const page = usePage()
const currentUser = computed(() => page.props.auth)
const viewDebug = ref(false)

const form = useForm({
    valoration: 1,
    message: null,
    space_id: props.space.id
})

const submit = () => {
    form.post('/comment')
}

</script>

<template>
    <h1 class="py-5">Detalles de {{ space.name }}</h1>
    <vueper-slides autoplay progress v-if="space.images.length > 0">
        <vueper-slide v-for="(slide, i) in space.images" :key="i" :image="slide.url">
            <template #content>
                <div class="container">
                    <h1 style="color: white;">{{ space.name }}</h1>
                    <p style="color: white;">
                        {{ slide.name }}
                    </p>
                </div>
            </template>
        </vueper-slide>
    </vueper-slides>
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Detalles</h1>
            <p class="fs-4">
                <span class="fw-bold">
                    Descripción
                </span>
                <br />
                {{ space.description_es }}
            </p>
            <p class="fs-4">
                <span class="fw-bold">
                    Ciudad:
                </span>
                {{ space.city.name }}
            </p>
            <p class="fs-4">
                <span class="fw-bold">
                    Dirección:
                </span>
                {{ space.address }}
            </p>
            <p class="fs-4">
                <span class="fw-bold">
                    Accesibilidad:
                </span>
                {{ space.accessibility }}
            </p>
            <p class="fs-4">
                <span class="fw-bold">
                    Zona:
                </span>
                {{ space.zone }}
            </p>
            <p class="fs-4">
                <span class="fw-bold">
                    Año construcción:
                </span>
                {{ space.construction_year }}
            </p>
            <p class="fs-4">
                <span class="fw-bold">
                    Tipo:
                </span>
                {{ space.type.name }}
            </p>
            <p class="fs-4">
                <span class="fw-bold">
                    Email contacto:
                </span>
                {{ space.email }}
            </p>
            <p class="fs-4">
                <span class="fw-bold">
                    Telefono contacto:
                </span>
                {{ space.phone }}
            </p>
            <Link :href="`/spaces/${space.id}/visits`" class="btn btn-primary btn-lg" as="button">Ver Visitas</Link>
        </div>
    </div>

    <h1>Comentarios y valoraciones</h1>
    <template v-if="currentUser">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
            Nuevo comentario
        </button>
    </template>
    <template v-if="space.comments.length > 0">
        <template v-for="comment in space.comments">
            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="container-fluid">
                    <h1 class="fs-4">{{ comment.user.name }} <span class="fw-bold">{{ comment.valoration }} / 5</span></h1>
                    <p class="fs-5">{{ comment.message }}</p>
                    <p class="fs-5">{{ new Date(comment.created_at).toLocaleString() }}</p>

                </div>
            </div>
        </template>
    </template>
    <template v-else>
        <p class="fs-3">
            No hay comentarios
        </p>
    </template>

    <!-- Modal -->
    <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Comentario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form @submit.prevent="submit">

                            <div class="form-outline mb-4">
                                <label class="form-label" for="typeEmailX-2">Valoración</label>
                                <input v-model="form.valoration" type="number" id="typeEmailX-2"
                                    class="form-control form-control-lg" min="1" max="5" required placeholder="Valoración" />
                                <span style="color: red;">{{ form.errors.valoration }}</span>
                            </div>

                            <div class="form-outline mb-4">
                                <div class="mb-3">
                                  <label for="message" class="form-label">Mensaje</label>
                                  <textarea class="form-control" id="message" rows="3" v-model="form.message"></textarea>
                                </div>
                                <span style="color: red;">{{ form.errors.message }}</span>

                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit"
                                :disabled="form.processing">Enviar</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <template v-if="page.props.auth && page.props.auth.admin">
        <button class="btn btn-primary" @click="viewDebug = !viewDebug">Debug</button>
        <pre v-if="viewDebug" class="p-5 bg-black text-color text-white">
            {{ space }}
        </pre>
    </template>
</template>

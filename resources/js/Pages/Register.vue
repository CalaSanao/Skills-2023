<script setup>
import { useForm } from "@inertiajs/vue3"

const form = useForm({
    name: null,
    dni: null,
    email: null,
    password: null,
})
</script>

<template>
    <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5">
                                <h3 class="mb-5">Login</h3>
                                <form @submit.prevent="submit">

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="typeEmailX-2">Email</label>
                                        <input v-model="form.email" type="email" id="typeEmailX-2"
                                            class="form-control form-control-lg" required />
                                        <span style="color: red;">{{ form.errors.email }}</span>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="typePasswordX-2">Password</label>
                                        <input v-model="form.password" type="password" id="typePasswordX-2"
                                            class="form-control form-control-lg" required/>
                                        <span style="color: red;">{{ form.errors.password }}</span>

                                    </div>

                                    <button class="btn btn-primary btn-lg btn-block" type="submit"
                                        :disabled="form.processing">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</template>

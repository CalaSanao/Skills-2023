<script setup>
import { usePage, Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage()

const currentUser = computed(() => page.props.auth)
</script>

<template>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../Img/logo.png" class="img" alt="logo" width="70">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <Link class="nav-link" :class="page.component == 'Index' ? 'active' : ''" href="/">
                            Inicio
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link  class="nav-link" :class="page.component == 'SpaceList' ? 'active' : ''" href="/spaces">
                            Espacios
                        </Link>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Action 1</a>
                            <a class="dropdown-item" href="#">Action 2</a>
                        </div>
                    </li> -->
                </ul>
                <form class="d-flex my-2 my-lg-0">
                    <template v-if="currentUser">
                        <p class="pr-2">{{ currentUser.user }}</p>
                        <Link href='/logout' method="post" class="btn btn-outline-primary my-2 my-sm-0" as="button">
                            Logout
                        </Link>
                    </template>
                    <template v-else>
                        <Link href='/logout' method="post" class="btn btn-outline-primary my-2 my-sm-0" as="button">
                            Sign-in
                        </Link>
                        <Link href='/login' class="btn btn-outline-success my-2 my-sm-0" as="button">
                            Log-in
                        </Link>
                    </template>
                </form>
            </div>
        </div>
    </nav>
    <main class="container">
        <slot ></slot>
    </main>

    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
        </ul>
        <p class="text-center text-body-secondary">© 2023 Company, Inc</p>
    </footer>
</template>

<template>
    <div>
        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-dark bg-dark sticky-top shadow-sm">
            <div class="container d-flex justify-content-between align-items-center">
                <Link class="navbar-brand fw-bold d-flex align-items-center gap-2" href="/">
                    <i class="bi bi-grid-fill text-primary"></i>
                    <span>Kotabaru Apps</span>
                </Link>

                <div class="d-flex align-items-center gap-3">
                    <Link href="/" class="btn btn-sm btn-outline-light rounded-pill px-3"
                        :class="{ 'active': $page.url === '/' }">
                        Directory
                    </Link>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            <slot />
        </main>

        <!-- Footer -->
        <footer class="bg-light text-center text-muted py-4 mt-5">
            <div class="container">
                <p class="mb-0">© {{ new Date().getFullYear() }} Kotabaru App Directory. Promoting Digital Excellence.
                </p>
            </div>
        </footer>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<style scoped>
/* Custom tweaks if necessary, but relying mostly on Bootstrap */
</style>

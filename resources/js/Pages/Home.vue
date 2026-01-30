<template>
    <MainLayout>

        <Head title="Directory" />

        <!-- Hero Section -->
        <header class="hero-section text-white py-5 mb-5 text-center position-relative overflow-hidden">
            <div class="container position-relative z-1 py-5">
                <h1 class="display-3 fw-bold mb-3 animate-fade-in-up">Kotabaru App Directory</h1>
                <p class="lead mb-4 opacity-75 animate-fade-in-up delay-100 mx-auto" style="max-width: 700px;">
                    Pusat inovasi digital dan layanan publik untuk kemajuan masyarakat Kabupaten Kotabaru.
                </p>
                <div class="animate-fade-in-up delay-200">
                    <a href="#apps"
                        class="btn btn-light btn-lg px-5 fw-bold text-primary shadow-sm hover-lift rounded-pill">
                        Jelajahi Aplikasi
                    </a>
                </div>
            </div>
            <!-- Decorative background shape -->
            <div class="position-absolute bottom-0 start-0 w-100 overflow-hidden"
                style="line-height:0; transform: rotate(180deg);">
                <svg viewBox="0 0 1200 120" preserveAspectRatio="none"
                    style="width: 100%; height: 60px; fill: #ffffff;">
                    <path
                        d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z">
                    </path>
                </svg>
            </div>
        </header>

        <div class="container py-4" id="apps">

            <div class="d-flex align-items-center justify-content-between mb-5 animate-fade-in">
                <div>
                    <h2 class="h3 fw-bold mb-1 border-start border-4 border-primary ps-3">Semua Aplikasi</h2>
                    <p class="text-muted mb-0 ps-3">Temukan solusi digital yang Anda butuhkan.</p>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-5">
                <div class="col animate-fade-in index-stagger" v-for="(app, index) in apps" :key="app.id"
                    :style="`--delay: ${index * 0.1}s`">
                    <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden hover-card h-100">
                        <div class="position-relative overflow-hidden">
                            <img :src="app.image" class="card-img-top zoom-img" :alt="app.name"
                                style="height: 220px; object-fit: cover;">
                            <div
                                class="card-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50 opacity-0 transition-all">
                                <Link :href="`/app/${app.id}`"
                                    class="btn btn-light fw-bold rounded-pill px-4 transform-up">
                                    Lihat Detail
                                </Link>
                            </div>
                        </div>
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="mb-2">
                                <span class="badge bg-primary-subtle text-primary rounded-pill px-2 py-1"
                                    style="font-size: 0.7rem;" v-if="app.tech_stack && app.tech_stack.length > 0">
                                    {{ app.tech_stack[0] }}
                                </span>
                            </div>
                            <h5 class="card-title fw-bold mb-2 text-dark">{{ app.name }}</h5>
                            <p class="card-text text-muted small flex-grow-1 line-clamp-3">{{ app.short_desc }}</p>

                            <hr class="border-secondary opacity-10 my-3">

                            <Link :href="`/app/${app.id}`"
                                class="btn btn-link text-decoration-none p-0 fw-bold text-primary stretched-link d-inline-flex align-items-center">
                                Selengkapnya <i class="bi bi-arrow-right ms-1 transition-icon"></i>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Link, Head } from '@inertiajs/vue3';

defineProps({
    apps: Array,
});
</script>

<style scoped>
/* Hero & Gradient */
.hero-section {
    background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
    /* Kotabaru Blue variations */
}

/* Animations */
.animate-fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
    opacity: 0;
    transform: translateY(20px);
}

.delay-100 {
    animation-delay: 0.1s;
}

.delay-200 {
    animation-delay: 0.2s;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fadeIn 0.8s ease-out forwards;
    opacity: 0;
}

.index-stagger {
    animation-delay: var(--delay);
}

@keyframes fadeIn {
    to {
        opacity: 1;
    }
}

/* Card Hover Effects */
.hover-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.1) !important;
}

.zoom-img {
    transition: transform 0.5s ease;
}

.hover-card:hover .zoom-img {
    transform: scale(1.05);
}

.card-overlay {
    transition: opacity 0.3s ease;
}

.hover-card:hover .card-overlay {
    opacity: 1 !important;
}

.transform-up {
    transform: translateY(20px);
    transition: transform 0.3s ease;
}

.hover-card:hover .transform-up {
    transform: translateY(0);
}

.transition-icon {
    transition: transform 0.2s ease;
}

.btn-link:hover .transition-icon {
    transform: translateX(4px);
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

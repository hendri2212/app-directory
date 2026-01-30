<template>
    <MainLayout>

        <Head :title="app.name" />

        <!-- Hero Section -->
        <header class="hero-section text-white py-5 mb-5 position-relative overflow-hidden">
            <div class="container position-relative z-1">
                <div class="row align-items-center min-vh-50 py-5">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <h1 class="display-3 fw-bold mb-3 animate-fade-in-up">{{ app.name }}</h1>
                        <p class="lead mb-4 opacity-90 animate-fade-in-up delay-100">{{ app.description }}</p>
                        <div class="d-flex gap-3 animate-fade-in-up delay-200">
                            <a href="#contact"
                                class="btn btn-light btn-lg px-4 fw-bold text-primary shadow-sm hover-lift">
                                <i class="bi bi-whatsapp me-2"></i>
                                Pesan Sekarang <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                            <a href="#features" class="btn btn-outline-light btn-lg px-4 fw-bold hover-lift">
                                Fitur
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block animate-fade-in-right">
                        <img :src="app.image"
                            class="img-fluid rounded-4 shadow-lg border border-white border-opacity-25" alt="Preview">
                    </div>
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

        <div class="container">

            <!-- Features Showcase -->
            <section id="features" class="mb-5 py-5">
                <div class="text-center mb-5">
                    <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-2 rounded-pill fw-bold">FITUR
                        UNGGULAN</span>
                    <h2 class="display-6 fw-bold">Apa yang bisa dilakukan?</h2>
                </div>

                <div class="row g-5 align-items-center mb-5 feature-row" v-for="(feature, index) in app.features"
                    :key="index">
                    <div class="col-lg-6 position-relative" :class="{ 'order-lg-2': index % 2 !== 0 }">
                        <div
                            class="position-absolute top-50 start-50 translate-middle w-75 h-75 bg-primary opacity-10 rounded-circle blur-bg">
                        </div>
                        <img :src="feature.screenshot"
                            class="img-fluid rounded-4 shadow hover-scale position-relative z-1" :alt="feature.title">
                    </div>
                    <div class="col-lg-6" :class="{ 'order-lg-1': index % 2 !== 0 }">
                        <div class="d-flex align-items-center mb-3">
                            <div
                                class="icon-square bg-primary text-white rounded-3 me-3 d-flex align-items-center justify-content-center shadow-sm">
                                <i class="bi bi-check-lg fs-4"></i>
                            </div>
                            <h3 class="h3 fw-bold mb-0">{{ feature.title }}</h3>
                        </div>
                        <p class="lead text-muted">{{ feature.description }}</p>
                    </div>
                </div>
            </section>

            <!-- Impact & Tech Grid -->
            <section class="mb-5 py-4">
                <div class="row g-4">
                    <!-- Business Impact -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm hover-lift card-impact">
                            <div class="card-body p-4 text-center">
                                <div class="mb-3 text-success">
                                    <i class="bi bi-graph-up-arrow display-4"></i>
                                </div>
                                <h4 class="fw-bold mb-3">Dampak Bisnis</h4>
                                <p class="text-muted mb-0">{{ app.business_impact }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Local Integration -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm hover-lift card-integration">
                            <div class="card-body p-4 text-center">
                                <div class="mb-3 text-info">
                                    <i class="bi bi-building display-4"></i>
                                </div>
                                <h4 class="fw-bold mb-3">Integrasi Lokal</h4>
                                <p class="text-muted mb-0">{{ app.local_integration }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Tech Stack -->
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm hover-lift card-tech">
                            <div class="card-body p-4 text-center">
                                <div class="mb-3 text-dark">
                                    <i class="bi bi-code-slash display-4"></i>
                                </div>
                                <h4 class="fw-bold mb-3">Teknologi</h4>
                                <div class="d-flex flex-wrap gap-2 justify-content-center">
                                    <span v-for="tech in app.tech_stack" :key="tech"
                                        class="badge bg-dark px-3 py-2 rounded-pill">{{ tech }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Inquiry / CTA -->
            <section id="contact" class="py-5 mb-5">
                <div class="cta-card rounded-5 p-5 text-white text-center shadow-lg position-relative overflow-hidden">
                    <div class="position-relative z-1">
                        <h2 class="display-5 fw-bold mb-3">Siap untuk Implementasi?</h2>
                        <p class="lead mb-4 opacity-90 mx-auto" style="max-width: 600px;">
                            Jangan lewatkan kesempatan untuk meningkatkan efisiensi dan layanan Anda dengan {{ app.name
                            }}.
                        </p>
                        <a href="https://wa.me/6285746080544" target="_blank"
                            class="btn btn-light btn-lg px-5 py-3 fw-bold text-success shadow hover-lift">
                            <i class="bi bi-whatsapp me-2"></i> Chat Sekarang
                        </a>
                    </div>
                    <!-- Decorative circles -->
                    <div class="decorative-circle circle-1"></div>
                    <div class="decorative-circle circle-2"></div>
                </div>
            </section>

        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    app: Object,
});
</script>

<style scoped>
/* Gradient Backgrounds */
.hero-section {
    background: linear-gradient(135deg, #4f46e5 0%, #0ea5e9 100%);
}

.cta-card {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
}

/* Animations */
.animate-fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
    opacity: 0;
    transform: translateY(20px);
}

.animate-fade-in-right {
    animation: fadeInRight 0.8s ease-out forwards;
    opacity: 0;
    transform: translateX(20px);
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

@keyframes fadeInRight {
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Hover Effects */
.hover-lift {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}

.hover-scale {
    transition: transform 0.3s ease;
}

.hover-scale:hover {
    transform: scale(1.02);
}

/* Decorative Elements */
.blur-bg {
    filter: blur(60px);
    z-index: 0;
}

.icon-square {
    width: 48px;
    height: 48px;
}

.decorative-circle {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    z-index: 0;
}

.circle-1 {
    width: 300px;
    height: 300px;
    top: -100px;
    left: -100px;
}

.circle-2 {
    width: 200px;
    height: 200px;
    bottom: -50px;
    right: -50px;
}

/* Cards Border Accents */
.card-impact {
    border-top: 4px solid #198754 !important;
}

.card-integration {
    border-top: 4px solid #0dcaf0 !important;
}

.card-tech {
    border-top: 4px solid #212529 !important;
}
</style>

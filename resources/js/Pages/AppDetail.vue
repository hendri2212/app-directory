<template>
  <MainLayout>
    <Head :title="app.name" />
    <!-- Hero Section -->
    <header class="bg-primary text-white py-5 mb-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h1 class="display-4 fw-bold">{{ app.name }}</h1>
            <p class="lead mb-4">{{ app.description }}</p>
            <a href="#contact" class="btn btn-light btn-lg px-4 me-md-2 fw-bold text-primary">Get Started</a>
          </div>
          <div class="col-lg-6 d-none d-lg-block">
             <img :src="app.image" class="img-fluid rounded shadow-lg" alt="Preview">
          </div>
        </div>
      </div>
    </header>

    <div class="container">
      
      <!-- Features Showcase -->
      <section class="mb-5">
        <h2 class="h3 fw-bold text-center mb-5">Key Features</h2>
        <div class="row g-5 align-items-center mb-5" v-for="(feature, index) in app.features" :key="index">
          <div class="col-lg-6" :class="{ 'order-lg-2': index % 2 !== 0 }">
            <img :src="feature.screenshot" class="img-fluid rounded shadow" :alt="feature.title">
          </div>
          <div class="col-lg-6" :class="{ 'order-lg-1': index % 2 !== 0 }">
            <h3 class="h4 fw-bold text-primary">{{ feature.title }}</h3>
            <p class="lead text-muted">{{ feature.description }}</p>
          </div>
        </div>
      </section>

      <!-- Business Impact -->
      <section class="mb-5">
        <div class="card border-0 shadow-sm bg-light">
          <div class="card-body p-4 text-center">
            <h2 class="h4 text-primary fw-bold mb-3">Business Impact</h2>
            <p class="lead mb-0">{{ app.business_impact }}</p>
          </div>
        </div>
      </section>

      <div class="row g-5 mb-5">
        <!-- Local Integration -->
        <div class="col-md-6">
          <div class="h-100 p-4 border rounded-3 shadow-sm">
            <h2 class="h4 text-success fw-bold mb-3">Local Integration</h2>
            <p>{{ app.local_integration }}</p>
            <p class="text-muted">Designed specifically to comply with Kotabaru regional policies and data standards.</p>
          </div>
        </div>

        <!-- Tech Stack -->
        <div class="col-md-6">
          <div class="h-100 p-4 border rounded-3 shadow-sm">
            <h2 class="h4 text-dark fw-bold mb-3">Tech Stack</h2>
            <p>Built with industry-standard technologies for high performance and reliability.</p>
            <div class="d-flex gap-2">
              <span v-for="tech in app.tech_stack" :key="tech" class="badge bg-secondary fs-6">{{ tech }}</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Inquiry / CTA -->
      <section id="contact" class="text-center py-5 mb-5">
        <div class="card border-primary mb-3 mx-auto" style="max-width: 600px;">
          <div class="card-header bg-primary text-white">Ready to Implement?</div>
          <div class="card-body">
            <h5 class="card-title">Hubungi Kami Sekarang</h5>
            <p class="card-text">Dapatkan konsultasi gratis untuk implementasi {{ app.name }} di instansi atau perusahaan Anda.</p>
            <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-success btn-lg">
              <i class="bi bi-whatsapp me-2"></i> Hubungi via WhatsApp
            </a>
          </div>
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

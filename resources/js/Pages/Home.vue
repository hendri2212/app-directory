<template>
  <MainLayout>
    <Head title="Directory" />
    <div class="container py-5">
      <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Kotabaru App Directory</h1>
        <p class="lead text-muted">Inovasi digital yang akan mendorong kemajuan wilayah kita</p>
      </div>
      
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
        <div class="col" v-for="app in apps" :key="app.id">
          <div class="card h-100 shadow-sm border-0 transition-hover">
            <img :src="app.image" class="card-img-top" :alt="app.name" style="height: 200px; object-fit: cover;">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title text-primary fw-bold">{{ app.name }}</h5>
              <p class="card-text text-muted small flex-grow-1">{{ app.short_desc }}</p>
              <Link :href="`/app/${app.id}`" class="btn btn-outline-primary btn-sm w-100 mt-3">
                Lihat Detail Fitur
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
.transition-hover {
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.transition-hover:hover {
  transform: translateY(-5px);
  box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
}
</style>

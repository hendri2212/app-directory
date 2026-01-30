<template>
  <div>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
      <div class="container">
        <a class="navbar-brand fw-bold" href="/">Kotabaru App Directory</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="/">Home</a>
            </li>
            <!-- Placeholder for future links -->
          </ul>
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
        <p class="mb-0">© {{ new Date().getFullYear() }} Kotabaru App Directory. Promoting Digital Excellence.</p>
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

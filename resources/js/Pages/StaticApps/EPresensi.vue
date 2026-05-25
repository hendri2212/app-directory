<template>
    <MainLayout>
        <Head title="E-Presensi (RFID)" />

        <div class="epresensi-wrapper text-light">
            <!-- Hero Section -->
            <header class="epresensi-hero position-relative overflow-hidden py-5">
                <!-- Background Gradients & Glows -->
                <div class="glow-orb top-left"></div>
                <div class="glow-orb bottom-right"></div>
                
                <div class="container position-relative z-1 py-5">
                    <div class="row align-items-center mb-5 pb-4">
                        <div class="col-lg-6 animate-slide-right">
                            <div class="badge bg-cyan-subtle text-cyan rounded-pill px-3 py-2 mb-4 border border-cyan-glow">
                                <i class="bi bi-cpu me-2"></i> Sistem Inovasi Terpadu
                            </div>
                            <h1 class="display-3 fw-bold mb-4 text-white">E-Presensi <span class="text-cyan-glow">RFID</span></h1>
                            <p class="lead mb-4 text-light opacity-75 pe-lg-5">
                                Solusi presensi elektronik modern dengan teknologi Radio Frequency Identification (RFID) yang terintegrasi langsung dengan database kepegawaian maupun sistem akademik sekolah. Pantau absensi pegawai dan siswa secara real-time dengan akurasi tinggi.
                            </p>
                            <div class="d-flex gap-3">
                                <a href="#features" class="btn btn-cyan btn-lg px-4 rounded-pill fw-bold shadow-cyan">
                                    Pelajari Fitur
                                </a>
                                <Link href="/" class="btn btn-outline-light btn-lg px-4 rounded-pill fw-bold">
                                    Kembali ke Direktori
                                </Link>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-5 mt-lg-0 animate-slide-left">
                            <div class="hero-image-wrapper rounded-4 shadow-lg overflow-hidden border border-secondary">
                                <img src="/images/static/e-presensi-hero.png" class="img-fluid" alt="E-Presensi Dashboard">
                                <div class="scanner-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Features Section -->
            <section id="features" class="py-5 position-relative">
                <div class="container py-5">
                    <div class="text-center mb-5 pb-3">
                        <h2 class="display-5 fw-bold text-white mb-3">Keunggulan Sistem</h2>
                        <p class="text-light opacity-75 mx-auto" style="max-width: 600px;">
                            Dirancang khusus untuk memenuhi kebutuhan instansi pemerintahan dan institusi pendidikan (sekolah) dengan keamanan dan akurasi tinggi.
                        </p>
                    </div>

                    <div class="row g-4 justify-content-center">
                        <div class="col-md-4" v-for="(feature, index) in features" :key="index">
                            <div class="feature-card h-100 p-4 rounded-4 border border-secondary bg-dark-subtle hover-glow transition-all"
                                :style="`--delay: ${index * 0.15}s`">
                                <div class="icon-box bg-cyan-glow rounded-3 d-inline-flex align-items-center justify-content-center mb-4" style="width: 60px; height: 60px;">
                                    <i :class="['bi', feature.icon, 'fs-3 text-white']"></i>
                                </div>
                                <h4 class="fw-bold mb-3 text-white">{{ feature.title }}</h4>
                                <p class="text-light opacity-75 mb-0">{{ feature.desc }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Tech Stack Section -->
            <section class="py-5 tech-stack-section">
                <div class="container py-5">
                    <div class="row align-items-center border border-secondary rounded-5 p-5 bg-gradient-dark shadow-lg">
                        <div class="col-lg-5 mb-4 mb-lg-0">
                            <h3 class="fw-bold text-white mb-3">Teknologi di Balik E-Presensi</h3>
                            <p class="text-light opacity-75">
                                Kami menggunakan kombinasi hardware RFID mutakhir dan stack software modern untuk memastikan keandalan, kecepatan, dan keamanan data presensi.
                            </p>
                        </div>
                        <div class="col-lg-7">
                            <div class="d-flex flex-wrap gap-3 justify-content-lg-end">
                                <div class="tech-badge">
                                    <i class="bi bi-sim me-2"></i> RFID Mifare 13.56 MHz
                                </div>
                                <div class="tech-badge">
                                    <i class="bi bi-server me-2"></i> Laravel Framework
                                </div>
                                <div class="tech-badge">
                                    <i class="bi bi-filetype-vue me-2"></i> Vue.js
                                </div>
                                <div class="tech-badge">
                                    <i class="bi bi-database me-2"></i> PostgreSQL
                                </div>
                                <div class="tech-badge">
                                    <i class="bi bi-wifi me-2"></i> WebSocket
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="py-5 text-center position-relative overflow-hidden mb-5">
                <div class="container py-5 position-relative z-1">
                    <h2 class="display-6 fw-bold text-white mb-4">Siap Mengimplementasikan E-Presensi?</h2>
                    <p class="text-light opacity-75 mb-5 mx-auto" style="max-width: 600px;">
                        Tingkatkan kedisiplinan dan akurasi data absensi instansi Anda dengan sistem E-Presensi berbasis RFID.
                    </p>
                    <Link href="/" class="btn btn-cyan btn-lg px-5 py-3 rounded-pill fw-bold shadow-cyan">
                        Eksplorasi Aplikasi Lainnya
                    </Link>
                </div>
                <!-- Abstract glowing lines -->
                <div class="position-absolute top-50 start-50 translate-middle w-100 h-100 z-0 pointer-events-none" style="background: radial-gradient(circle, rgba(6,182,212,0.15) 0%, rgba(0,0,0,0) 70%);"></div>
            </section>

        </div>
    </MainLayout>
</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const features = [
    {
        title: 'Real-time Tracking',
        desc: 'Data presensi langsung tersinkronisasi dengan server pusat detik itu juga setelah kartu di-tap pada mesin scanner.',
        icon: 'bi-stopwatch'
    },
    {
        title: 'Notifikasi WhatsApp',
        desc: 'Sistem mengirim pesan otomatis ke orang tua saat siswa masuk atau pulang, lengkap dengan status kehadiran (tepat waktu/terlambat).',
        icon: 'bi-whatsapp'
    },
    {
        title: 'Visualisasi Grafik Laporan',
        desc: 'Laporan kehadiran disajikan komprehensif, tidak hanya berupa data mentah tetapi juga aneka ragam grafik interaktif yang mudah dipahami.',
        icon: 'bi-pie-chart'
    },
    {
        title: 'Sistem Peringatan (Konseling)',
        desc: 'Fitur khusus yang secara otomatis menyoroti siswa yang sering terlambat/alfa, mempermudah manajemen konseling bagi Wali Kelas dan Guru BK.',
        icon: 'bi-person-exclamation'
    },
    {
        title: 'Manajemen Data Terpadu',
        desc: 'Sistem dirancang agar data siswa, guru, pegawai, serta kontak orang tua dapat dimanajemen, diimpor, dan diekspor dengan sangat baik.',
        icon: 'bi-folder-check'
    },
    {
        title: 'Anti-Kecurangan RFID',
        desc: 'Dilengkapi sistem validasi unik pada setiap kartu RFID dan perlindungan enkripsi berlapis untuk mencegah manipulasi absensi.',
        icon: 'bi-shield-check'
    }
];
</script>

<style scoped>
/* Base Dark Theme Colors */
:root {
    --ep-bg: #0a0e17;
    --ep-cyan: #06b6d4;
    --ep-cyan-glow: #22d3ee;
    --ep-dark-subtle: #161b22;
}

.epresensi-wrapper {
    background-color: #0a0e17;
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
    min-height: 100vh;
}

/* Typography & Colors */
.text-cyan {
    color: #06b6d4 !important;
}

.text-cyan-glow {
    color: #22d3ee;
    text-shadow: 0 0 20px rgba(34, 211, 238, 0.4);
}

.bg-cyan-subtle {
    background-color: rgba(6, 182, 212, 0.1) !important;
}

.bg-cyan-glow {
    background: linear-gradient(135deg, #06b6d4 0%, #3b82f6 100%);
    box-shadow: 0 0 15px rgba(6, 182, 212, 0.5);
}

.border-cyan-glow {
    border-color: rgba(34, 211, 238, 0.3) !important;
}

.bg-dark-subtle {
    background-color: #161b22 !important;
}

.bg-gradient-dark {
    background: linear-gradient(145deg, #161b22 0%, #0a0e17 100%);
}

/* Buttons */
.btn-cyan {
    background-color: #06b6d4;
    color: #fff;
    border: none;
    transition: all 0.3s ease;
}

.btn-cyan:hover {
    background-color: #22d3ee;
    color: #0a0e17;
    transform: translateY(-2px);
}

.shadow-cyan {
    box-shadow: 0 10px 25px -5px rgba(6, 182, 212, 0.4);
}

.btn-outline-light {
    border-width: 2px;
}
.btn-outline-light:hover {
    background-color: rgba(255, 255, 255, 0.1);
    color: #fff;
}

/* Orbs & Glows */
.glow-orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(100px);
    z-index: 0;
    opacity: 0.5;
    pointer-events: none;
}

.glow-orb.top-left {
    top: -10%;
    left: -10%;
    width: 50vw;
    height: 50vw;
    background: radial-gradient(circle, rgba(6,182,212,0.15) 0%, rgba(0,0,0,0) 70%);
}

.glow-orb.bottom-right {
    bottom: -20%;
    right: -10%;
    width: 60vw;
    height: 60vw;
    background: radial-gradient(circle, rgba(59,130,246,0.15) 0%, rgba(0,0,0,0) 70%);
}

/* Hero Image & Scanner effect */
.hero-image-wrapper {
    position: relative;
    border-color: rgba(255,255,255,0.1) !important;
}

.scanner-line {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: #22d3ee;
    box-shadow: 0 0 20px #22d3ee, 0 0 40px #22d3ee;
    opacity: 0.8;
    animation: scan 3s infinite linear;
}

@keyframes scan {
    0% { top: 0; opacity: 0; }
    10% { opacity: 1; }
    90% { opacity: 1; }
    100% { top: 100%; opacity: 0; }
}

/* Cards & Hover */
.feature-card {
    border-color: rgba(255, 255, 255, 0.05) !important;
    animation: fadeInUp 0.8s ease-out forwards;
    animation-delay: var(--delay);
    opacity: 0;
    transform: translateY(20px);
}

.hover-glow:hover {
    border-color: rgba(6, 182, 212, 0.3) !important;
    box-shadow: 0 10px 30px -10px rgba(6, 182, 212, 0.2);
    transform: translateY(-5px);
}

.transition-all {
    transition: all 0.3s ease;
}

/* Tech Badges */
.tech-badge {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: #e2e8f0;
    padding: 0.75rem 1.25rem;
    border-radius: 50px;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.tech-badge:hover {
    background: rgba(6, 182, 212, 0.1);
    border-color: rgba(6, 182, 212, 0.3);
    color: #22d3ee;
    transform: translateY(-2px);
}

/* Animations */
.animate-slide-right {
    animation: slideRight 0.8s ease-out forwards;
}

.animate-slide-left {
    animation: slideLeft 0.8s ease-out forwards;
}

@keyframes slideRight {
    from { opacity: 0; transform: translateX(-30px); }
    to { opacity: 1; transform: translateX(0); }
}

@keyframes slideLeft {
    from { opacity: 0; transform: translateX(30px); }
    to { opacity: 1; transform: translateX(0); }
}

@keyframes fadeInUp {
    to { opacity: 1; transform: translateY(0); }
}
</style>

<template>
    <div class="min-vh-100 bg-light">

        <Head title="Dashboard" />

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">Admin Dashboard</a>
                <div class="d-flex">
                    <Link :href="route('logout')" method="post" as="button" class="btn btn-outline-light btn-sm">
                        Log Out
                    </Link>
                </div>
            </div>
        </nav>

        <div class="container py-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h4 fw-bold text-secondary">Manage Applications</h2>
                <Link :href="route('apps.create')" class="btn btn-success">
                    <i class="bi bi-plus-lg me-1"></i> Add New App
                </Link>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Tech Stack</th>
                                    <th class="text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="app in apps" :key="app.id">
                                    <td class="ps-4">#{{ app.id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img :src="app.image" class="rounded me-2"
                                                style="width: 40px; height: 30px; object-fit: cover;">
                                            <span class="fw-medium">{{ app.name }}</span>
                                        </div>
                                    </td>
                                    <td class="text-muted small text-truncate" style="max-width: 200px;">
                                        {{ app.short_desc }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1 flex-wrap">
                                            <span v-for="tech in app.tech_stack" :key="tech"
                                                class="badge bg-secondary-subtle text-secondary-emphasis"
                                                style="font-size: 0.7em;">
                                                {{ tech }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="btn-group" role="group">
                                            <Link :href="route('apps.edit', app.id)"
                                                class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="bi bi-pencil-square me-1"></i> Edit
                                            </Link>
                                            <button @click="deleteApp(app.id)" class="btn btn-sm btn-outline-danger"
                                                title="Delete">
                                                <i class="bi bi-trash me-1"></i> Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-if="apps.length === 0">
                                    <td colspan="5" class="text-center py-5 text-muted">No applications found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3';

defineProps({
    apps: Array,
});

const deleteApp = (id) => {
    if (confirm('Are you sure you want to delete this application? This action cannot be undone.')) {
        router.delete(route('apps.destroy', id));
    }
};
</script>

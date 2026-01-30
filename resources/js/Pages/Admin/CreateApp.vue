<template>
    <div class="min-vh-100 bg-light">

        <Head title="Create Application" />

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">Admin Dashboard</a>
                <div class="d-flex">
                    <Link :href="route('dashboard')" class="btn btn-outline-light btn-sm">
                        Back to Dashboard
                    </Link>
                </div>
            </div>
        </nav>

        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white py-3">
                            <h4 class="h5 mb-0 fw-bold text-primary">Add New Application</h4>
                        </div>
                        <div class="card-body p-4">
                            <form @submit.prevent="submit">
                                <!-- App Details -->
                                <h5 class="mb-3 text-secondary border-bottom pb-2">Basic Information</h5>

                                <div class="mb-3">
                                    <label class="form-label">Application Name</label>
                                    <input type="text" v-model="form.name" class="form-control" required>
                                    <div v-if="form.errors.name" class="text-danger small">{{ form.errors.name }}</div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Short Description</label>
                                    <input type="text" v-model="form.short_desc" class="form-control" required>
                                    <div v-if="form.errors.short_desc" class="text-danger small">{{
                                        form.errors.short_desc }}</div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Main Image</label>
                                    <input type="file" @change="e => form.image = e.target.files[0]"
                                        class="form-control" accept="image/*" required>
                                    <div v-if="form.errors.image" class="text-danger small">{{ form.errors.image }}
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Full Description</label>
                                    <textarea v-model="form.description" class="form-control" rows="4"
                                        required></textarea>
                                    <div v-if="form.errors.description" class="text-danger small">{{
                                        form.errors.description }}</div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Business Impact</label>
                                    <textarea v-model="form.business_impact" class="form-control" rows="2"
                                        required></textarea>
                                    <div v-if="form.errors.business_impact" class="text-danger small">{{
                                        form.errors.business_impact }}</div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Local Integration</label>
                                    <textarea v-model="form.local_integration" class="form-control" rows="2"
                                        required></textarea>
                                    <div v-if="form.errors.local_integration" class="text-danger small">{{
                                        form.errors.local_integration }}</div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Tech Stack (comma separated)</label>
                                    <input type="text" v-model="form.tech_stack" class="form-control"
                                        placeholder="Laravel, Vue, MySQL" required>
                                    <div v-if="form.errors.tech_stack" class="text-danger small">{{
                                        form.errors.tech_stack }}</div>
                                </div>

                                <!-- Dynamic Features -->
                                <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                                    <h5 class="mb-0 text-secondary">Features</h5>
                                    <button type="button" @click="addFeature" class="btn btn-sm btn-outline-success">
                                        <i class="bi bi-plus-lg"></i> Add Feature
                                    </button>
                                </div>

                                <div v-for="(feature, index) in form.features" :key="index" class="card bg-light mb-3">
                                    <div class="card-body position-relative">
                                        <button type="button" @click="removeFeature(index)"
                                            class="btn-close position-absolute top-0 end-0 m-2"
                                            aria-label="Close"></button>

                                        <div class="mb-2">
                                            <label class="form-label small fw-bold">Feature Title</label>
                                            <input type="text" v-model="feature.title"
                                                class="form-control form-control-sm" required>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label small fw-bold">Description</label>
                                            <textarea v-model="feature.description" class="form-control form-control-sm"
                                                rows="2" required></textarea>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label small fw-bold">Screenshot</label>
                                            <input type="file" @change="e => feature.screenshot = e.target.files[0]"
                                                class="form-control form-control-sm" accept="image/*" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-primary" :disabled="form.processing">
                                        Create Application
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    short_desc: '',
    image: null,
    description: '',
    business_impact: '',
    local_integration: '',
    tech_stack: '',
    features: [],
});

const addFeature = () => {
    form.features.push({
        title: '',
        description: '',
        screenshot: null,
    });
};

const removeFeature = (index) => {
    form.features.splice(index, 1);
};

const submit = () => {
    form.post(route('apps.store'), {
        forceFormData: true,
    });
};
</script>

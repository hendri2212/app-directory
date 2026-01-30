<template>
    <div class="min-vh-100 bg-light">

        <Head title="Edit Application" />

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
                            <h4 class="h5 mb-0 fw-bold text-primary">Edit Application</h4>
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
                                    <div v-if="app.image && !imagePreview" class="mb-2">
                                        <img :src="app.image" alt="Current Image" class="img-thumbnail"
                                            style="max-height: 150px;">
                                        <div class="small text-muted">Current Image</div>
                                    </div>
                                    <div v-if="imagePreview" class="mb-2">
                                        <img :src="imagePreview" alt="New Image Preview" class="img-thumbnail"
                                            style="max-height: 150px;">
                                        <div class="small text-muted">New Image Preview</div>
                                    </div>
                                    <input type="file" @change="handleImageChange" class="form-control"
                                        accept="image/*">
                                    <div class="form-text text-muted">Leave empty to keep current image.</div>
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
                                            <div v-if="feature.screenshot && typeof feature.screenshot === 'string'"
                                                class="mb-1">
                                                <img :src="feature.screenshot" class="img-thumbnail"
                                                    style="height: 60px;">
                                                <span class="ms-2 small text-muted">Current</span>
                                            </div>
                                            <input type="file" @change="e => handleFeatureScreenshotChange(e, index)"
                                                class="form-control form-control-sm" accept="image/*">
                                            <div class="form-text small text-muted"
                                                v-if="feature.screenshot && typeof feature.screenshot === 'string'">
                                                Upload to replace, or leave empty to keep current.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-primary" :disabled="form.processing">
                                        Update Application
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
import { ref } from 'vue';

const props = defineProps({
    app: Object,
});

const imagePreview = ref(null);

const form = useForm({
    _method: 'put', // Spoof PUT for file upload
    name: props.app.name,
    short_desc: props.app.short_desc,
    image: null, // Only populated if changed
    description: props.app.description,
    business_impact: props.app.business_impact,
    local_integration: props.app.local_integration,
    tech_stack: Array.isArray(props.app.tech_stack) ? props.app.tech_stack.join(', ') : props.app.tech_stack,
    features: props.app.features.map(f => ({
        title: f.title,
        description: f.description,
        screenshot: f.screenshot, // Keep URL string initially
    })),
});

const handleImageChange = (e) => {
    const file = e.target.files[0];
    if (file) {
        form.image = file;
        imagePreview.value = URL.createObjectURL(file);
    }
};

const handleFeatureScreenshotChange = (e, index) => {
    const file = e.target.files[0];
    if (file) {
        form.features[index].screenshot = file;
    }
};

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
    form.post(route('apps.update', props.app.id), {
        forceFormData: true,
    });
};
</script>

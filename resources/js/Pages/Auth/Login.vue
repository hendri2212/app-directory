<template>
    <div class="d-flex align-items-center justify-content-center min-vh-100 bg-light">

        <Head title="Log in" />

        <div class="card shadow border-0" style="width: 100%; max-width: 400px;">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-primary">Admin Login</h3>
                    <p class="text-muted">Kotabaru App Directory</p>
                </div>

                <form @submit.prevent="submit">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" v-model="form.email" required autofocus
                            autocomplete="username">
                        <div v-if="form.errors.email" class="text-danger small mt-1">{{ form.errors.email }}</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" v-model="form.password" required
                            autocomplete="current-password">
                        <div v-if="form.errors.password" class="text-danger small mt-1">{{ form.errors.password }}</div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" :disabled="form.processing">
                            Log in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

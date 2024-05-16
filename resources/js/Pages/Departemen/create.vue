<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
const form = useForm({
    nama: '',
    manager: '',
    deskripsi: ''
});

const submit = () => {
    form.post(route('departemen.store'), {
        onSuccess: () => {
            form.reset();
        }
    });
};
//buat variabel untuk menampung data departemen
//nama departemen, manager dan deskripsi
const nama = ref('');
const manager = ref('');
const deskripsi = ref('');
</script>

<template>
    <Head title="Create Departemen" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Departemen</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <div class="mb-4">
                                <label for="nama" class="block text-gray-700">Nama</label>
                                <input v-model="form.nama" type="text" id="nama" class="mt-1 block w-full" />
                                <div v-if="form.errors.nama" class="text-red-600 mt-2">{{ form.errors.nama }}</div>
                            </div>
                            <div class="mb-4">
                                <label for="manager" class="block text-gray-700">Manager</label>
                                <input v-model="form.manager" type="text" id="manager" class="mt-1 block w-full" />
                                <div v-if="form.errors.manager" class="text-red-600 mt-2">{{ form.errors.manager }}</div>
                            </div>
                            <div class="mb-4">
                                <label for="deskripsi" class="block text-gray-700">Deskripsi</label>
                                <input v-model="form.deskripsi" type="text" id="deskripsi" class="mt-1 block w-full" />
                                <div v-if="form.errors.deskripsi" class="text-red-600 mt-2">{{ form.errors.deskripsi }}</div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { defineProps } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

// Definisikan props untuk menerima data departemen
const props = defineProps({
    departemen: Array,
    flash: String,
});
</script>

<template>
    <Head title="Departemen" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Departemen</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Link href="/departemen/create" class="btn btn-sm btn-warning mb-5">
                            <i class="fa fa-archive"></i> Tambah Departemen
                        </Link>
                        <!--Buatkan Table-->
                        <div v-if="flash" class="alert alert-success">
                            {{ flash }}
                        </div>
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Departemen</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Iterasi data departemen dan tampilkan dalam tabel -->
                                <tr v-for="(dept, index) in departemen" :key="dept.id">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ dept.nama_departemen }}</td>
                                    <td>{{ dept.deskripsi }}</td>
                                    <td>
                                        <!--link utk edit-->
                                        <Link :href="`/departemen/edit/${dept.id}`" class="btn btn-sm btn-warning mr-1">
                                            <i class="fa fa-edit"></i></Link>

                                        <button class="btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

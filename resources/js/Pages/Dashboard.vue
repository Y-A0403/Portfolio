<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head} from '@inertiajs/inertia-vue3';
import { usePage } from '@inertiajs/inertia-vue3';

const props = defineProps({
    auth: Object,
    admin: Boolean,
})

    const page = usePage()

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">HOME</h2>
        </template>

        <div class="py-12">
            <!-- <FlashMessage /> -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">ようこそ{{ auth.user.name }}さん</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

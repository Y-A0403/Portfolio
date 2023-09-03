<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head} from '@inertiajs/inertia-vue3';
// import FlashMessage from '@/Components/FlashMessage.vue';
// import { onMounted } from 'vue';

defineProps({
    auth: Object
})

// onMounted(() => {
//   console.log(props.auth)
// })


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

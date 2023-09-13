<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
  records: Array
})

</script>

<template>
    <Head title="お知らせ" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">お知らせ一覧</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                      <section class="text-gray-600 body-font">
                        <div class="container px-5 py-8 mx-auto">
                          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <template v-if="records.length > 0" >
                              <p class="text-red-500 text-center py-4">
                                納期日が近いまたは過ぎています。確認してください。
                              </p>
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                              <thead>
                                <tr>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Id</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">製品名</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">客先名</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">注文数</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">納期日</th>
                                  <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                </tr>
                              </thead>
                              <tbody>
                                <!-- v-forの時は:key=をつける決まり -->
                                <tr v-for="record in records" :key="record.id">
                                  <td class="border-b-2 border-gray-200 px-4 py-3">
                                    <Link class="text-purple-400" :href="route('prodacts.show', {prodact: record.id})">
                                    {{ record.id }}
                                    </Link>
                                  </td>
                                  <td class="border-b-2 border-gray-200 px-4 py-3">{{ record.name }}</td>
                                  <td class="border-b-2 border-gray-200 px-4 py-3">{{ record.customer }}</td>
                                  <td class="border-b-2 border-gray-200 px-4 py-3">{{ record.order_by }}</td>
                                  <td class="border-b-2 border-gray-200 px-4 py-3">{{ record.deadline }}</td>
                                </tr>
                              </tbody>
                            </table>
                          </template>
                          <template v-else>
                            <p class="text-blue-500 text-center py-4">現在お知らせはありません</p>
                          </template>
                          </div>
                         
                        </div>
                      </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

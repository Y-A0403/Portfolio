<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import FlashMessage from '@/Components/FlashMessage.vue';
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import Pagination from '@/Components/Pagination.vue';

defineProps({
  prodacts: Object
})

const search = ref('')

const searchOrders = () => {
  Inertia.get(route('managements.index',{search: search.value }))
}

</script>

<template>
    <Head title="注残管理" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">注残管理</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                      <section class="text-gray-600 body-font">
                        <div class="container px-5 py-8 mx-auto">
                          <FlashMessage />
                          <div class="flex pl-4 my-4 lg:w-2/3 w-full mx-auto">
                            <div>
                              <input type="text" name="search" v-model="search">
                              <button class="bg-blue-300 text-white py-2 px-2" @click="searchOrders">検索</button>
                              </div>
                            <Link as="button" :href="route('managements.create')" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">注文登録</Link>
                          </div>
                          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                              <thead>
                                <tr>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Id</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">製品名</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">注文数</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">納期日</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ステータス</th>
                                  <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                </tr>
                              </thead>
                              <tbody>
                                <!-- v-forの時は:key=をつける決まり -->
                                <tr v-for="prodact in prodacts.data" :key="prodact.id">
                                  <td class="border-b-2 border-gray-200 px-4 py-3">
                                    <Link class="text-purple-400" :href="route('managements.show', {management: prodact.id})">
                                    {{ prodact.id }}
                                    </Link>
                                  </td>
                                  <td class="border-b-2 border-gray-200 px-4 py-3">{{ prodact.itemname }}</td>
                                  <td class="border-b-2 border-gray-200 px-4 py-3">{{ prodact.order_by }}</td>
                                  <td class="border-b-2 border-gray-200 px-4 py-3">{{ prodact.deadline }}</td>
                                  <td class="border-b-2 border-gray-200 px-4 py-3">
                                  <span v-if="prodact.is_selling === 1">未完成</span>
                                  <span v-if="prodact.is_selling === 0">完成 出荷待ち</span>  
                                  </td>
                                </tr>
                                
                              </tbody>
                            </table>
                          </div>
                         
                        </div>
                        <Pagination class="mt-6" :links="prodacts.links"></Pagination>
                      </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

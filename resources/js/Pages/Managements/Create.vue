<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
defineProps({
  errors: Object,
  items: Array,
  customers: Array,
})
const form = reactive({
  item_id: null,
  customer_id: null,
  order_by: null,
  deadline: null,
  manager: null,
  memo: null

})

const storeProdact = () => {
  Inertia.post('/managements',form)
}
</script>

<template>
    <Head title="注文登録" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">注文登録</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                      <BreezeValidationErrors :errors="errors" />
                      <section class="text-gray-600 body-font relative">
                        <form @submit.prevent="storeProdact">
                          <div class="container px-5 py-8 mx-auto">
                          
                          <div class="lg:w-1/2 md:w-2/3 mx-auto">
                            <div class="flex flex-wrap -m-2">
                              <div class="p-2 w-full">
                                <div class="relative">
                                  <label for="item" class="leading-7 text-sm text-gray-600">製品名</label>
                                  <select name="item" v-model="form.item_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <option v-for="item in items" :value="item.id" :key="item.id">
                                    {{ item.itemname }}
                                    </option>
                                  </select>
                                </div>
                              </div>
                              
                              <div class="p-2 w-full">
                                <div class="relative">
                                  <label for="customer" class="leading-7 text-sm text-gray-600">客先名</label>
                                  <select name="customer" v-model="form.customer_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <option v-for="customer in customers" :value="customer.id" :key="customer.id">
                                    {{ customer.customername }}
                                    </option>
                                  </select>
                                </div>
                              </div>
                    
                              <div class="p-2 w-full">
                                <div class="relative">
                                  <label for="order_by" class="leading-7 text-sm text-gray-600">注文数</label>
                                  <input type="number" id="order_by" name="order_by" v-model="form.order_by" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>

                              <div class="p-2 w-full">
                                <div class="relative">
                                  <label for="deadline" class="leading-7 text-sm text-gray-600">納期日</label>
                                  <input type="date" id="deadline" name="deadline" v-model="form.deadline" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>

                              <div class="p-2 w-full">
                                <div class="relative">
                                  <label for="manager" class="leading-7 text-sm text-gray-600">担当者</label>
                                  <input type="text" id="manager" name="manager" v-model="form.manager" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>

                              <div class="p-2 w-full">
                                <div class="relative">
                                  <label for="memo" class="leading-7 text-sm text-gray-600">メモ</label>
                                  <textarea id="memo" name="memo" v-model="form.memo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                </div>
                              </div>

                              <div class="p-2 w-full">
                                <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録</button>
                              </div>
                             
                            </div>
                          </div>
                        </div>
                      </form>
                      </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

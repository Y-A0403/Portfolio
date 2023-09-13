<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
const props = defineProps({
  prodact: Object,
  errors: Object
})
const form = reactive({
  id: props.prodact.id,
  name: props.prodact.name,
  customer: props.prodact.customer,
  order_by: props.prodact.order_by,
  deadline: props.prodact.deadline,
  manager: props.prodact.manager,
  memo: props.prodact.memo,
  is_selling: props.prodact.is_selling

})
// ルート側で指定してるメソッドと合わせるためputにする
const updateProdact = id => {
  Inertia.put(route('managements.update',{management: id}),form)
}
</script>

<template>
    <Head title="製品編集" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">製品編集</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                      <BreezeValidationErrors :errors="errors" />
                      <section class="text-gray-600 body-font relative">
                        <form @submit.prevent="updateProdact(form.id)">
                          <div class="container px-5 py-8 mx-auto">
                          
                          <div class="lg:w-1/2 md:w-2/3 mx-auto">
                            <div class="flex flex-wrap -m-2">
                              <div class="p-2 w-full">
                                <div class="relative">
                                  <label for="name" class="leading-7 text-sm text-gray-600">製品名</label>
                                  <input type="text" id="name" name="name" v-model="form.name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                              
                              <div class="p-2 w-full">
                                <div class="relative">
                                  <label for="customer" class="leading-7 text-sm text-gray-600">客先名</label>
                                  <input type="text" id="customer" name="customer" v-model="form.customer" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                                <div class="relative">
                                  <label for="is_selling" class="leading-7 text-sm text-gray-600">ステータス</label>
                                  <input type="radio" id="is_selling" name="is_selling" v-model="form.is_selling" value="1" >
                                  <lavel class="ml-1 mr-4">未完成</lavel>
                                  <input type="radio" id="is_selling" name="is_selling" v-model="form.is_selling" value="0" >
                                  <lavel class="ml-1 mr-4">完成 出荷待ち</lavel>
                                </div>
                              </div>

                              <div class="p-2 w-full">
                                <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
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

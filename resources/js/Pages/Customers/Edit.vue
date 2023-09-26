<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { reactive } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Core as YubinBangoCore } from "yubinbango-core2";
const props = defineProps({
  customer: Object,
  errors: Object
})
const form = reactive({
  id: props.customer.id,
  customername: props.customer.customername,
  tel: props.customer.tel,
  postcode: props.customer.postcode,
  address: props.customer.address,
})
const updateCustomer = id => {
  Inertia.put(route('customers.update',{customer: id}),form)
}

const fetchAddress = () => {
  new YubinBangoCore(String(form.postcode),(value) => {
    form.address = value.region + value.locality + value.street
  })
}
</script>

<template>
<Head title="顧客編集" />

<AuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">顧客編集</h2>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <BreezeValidationErrors :errors="errors" />
                  <section class="text-gray-600 body-font relative">
                    <form @submit.prevent="updateCustomer(form.id)">
                      <div class="container px-5 py-8 mx-auto">
                      <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="flex flex-wrap -m-2">
                          
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="customername" class="leading-7 text-sm text-gray-600">顧客名</label>
                              <input type="text" id="customername" name="customername" v-model="form.customername" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>
                          
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="tel" class="leading-7 text-sm text-gray-600">電話番号</label>
                              <input type="tel" id="tel" name="tel" v-model="form.tel" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>
                
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="postcode" class="leading-7 text-sm text-gray-600">郵便番号</label>
                              <input type="number" id="postcode" name="postcode" @change="fetchAddress" v-model="form.postcode" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="address" class="leading-7 text-sm text-gray-600">住所</label>
                              <input type="text" id="address" name="address" v-model="form.address" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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

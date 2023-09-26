<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link} from '@inertiajs/inertia-vue3';

defineProps({
  customer: Object
})

const deleteCustomer = id => {
  Inertia.delete(route('customers.destroy',{customer: id}),{
    onBefore: () =>confirm('本当に削除しますか?')
  })
}
</script>
<template>
    <Head title="顧客詳細" />

    <AuthenticatedLayout>
      <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">顧客詳細</h2>
        </template>

      <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
          <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
            <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=%C4%B0zmir+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe>
          </div>
          
          <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
            
            <div class="relative mb-4">
              <label for="customername" class="leading-7 text-sm ml-2 text-gray-600">会社名</label>
              <div id="tel" class="w-5/6 mx-auto bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                {{ customer. customername }}
              </div>
            </div>

            <div class="relative mb-4">
              <label for="tel" class="leading-7 text-sm ml-2 text-gray-600">電話番号</label>
              <div id="tel" class="w-5/6 mx-auto bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                {{ customer. tel }}
              </div>
            </div>

            <div class="relative mb-4">
              <label for="email" class="leading-7 text-sm ml-2 text-gray-600">郵便番号</label>
              <div id="tel" class="w-5/6 mx-auto bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                {{ customer. postcode }}
              </div>
            </div>

            <div class="relative mb-4">
              <label for="email" class="leading-7 text-sm ml-2 text-gray-600">住所</label>
              <div id="tel" class="w-5/6 mx-auto bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                {{ customer. address }}
              </div>
            </div>

            <div class="flex">
              <div class="p-2 w-full">
              <Link as="button" :href="route('customers.edit',{customer: customer.id})" class="flex mx-auto text-white bg-sky-500 border-0 py-2 px-8 focus:outline-none hover:bg-sky-600 rounded text-lg">編集</Link>
              </div>

              <div class="p-2 w-full">
              <button @click="deleteCustomer(customer.id) " class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除</button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </AuthenticatedLayout>
</template>

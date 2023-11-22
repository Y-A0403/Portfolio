<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';

defineProps({
  item: Object
})


const deleteItem = id => {
  Inertia.delete(route('items.destroy', { item: id }), {
    onBefore: () => confirm('本当に削除します?')
  })
}
</script>

<template>
  <Head title="製品詳細" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">製品詳細</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            <section class="text-gray-600 body-font overflow-hidden">
              <div class="container px-5 py-24 mx-auto">
                <div class="lg:w-4/5 mx-auto flex flex-wrap">
                  <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                   
                    <div class="relative">
                      <label for="itemname" class="leading-7 text-sm text-gray-600">製品名</label>
                      <div id="itemname" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        {{ item.itemname }}
                      </div>
                    </div>

                    <div class="relative">
                      <label for="memo" class="leading-7 text-sm text-gray-600">備考</label>
                      <div id="memo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                        {{ item.memo }}
                      </div>
                    </div>

                    <div class="flex">
                      <Link as="button" :href="route('items.edit', { item: item.id })" class="flex mt-5 mr-auto text-white bg-sky-500 border-0 py-2 px-6 focus:outline-none hover:bg-sky-600 rounded">編集</Link>
                      <button @click="deleteItem(item.id)" class="flex mt-5 ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">削除</button>
                    </div>

                  </div>
                  <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
                    src="https://dummyimage.com/400x400">
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<template>
    <div
        class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 xl:gap-x-8">

        <div v-for="request in requests" :key="request.id"
            class="group border-2 p-5 flex flex-col rounded-2xl md:hover:-translate-y-3 hover:border-gray-700 md:hover:shadow-xl transition-all duration-300">
            <!-- subject -->
            <p class="subject line-clamp-1 text-sm font-medium text-blue-600 uppercase">
                {{ request.subject }}
            </p>
            <!-- title  -->
            <h2
                class="title mt-3 text-xl  line-clamp-2 font-semibold leading-tight capitalize group-hover:underline underline-offset-2">
                {{ request.title }}
            </h2>
            <!-- request-details -->
            <p class="my-6 border-l-2 border-gray-300 pl-5 line-clamp-4">
                {{ request.description }}
            </p>
            <!-- document need ( notes, lab reports, question)  -->
            <div class="mb-3 text-sm flex items-center justify-between gap-3 bg-gray-100 px-2.5 py-2 rounded-xl">
                <p class="font-semibold ">Document Need</p>
                <p class="rounded-full bg-white border border-gray-300 px-2.5 py-1 text-xs font-bold "> {{
            request.category }}
                </p>
            </div>
            <!-- education-level  -->
            <div class="text-sm flex flex-wrap gap-3 bg-gray-100 px-2.5 py-2 rounded-xl">
                <span class="rounded-full bg-white border border-gray-300 px-2.5 py-1 text-xs font-bold ">{{
            request.class_faculty }}
                </span>
                <span class="rounded-full bg-white border border-gray-300 px-2.5 py-1 text-xs font-bold ">
                    {{ request.education_level }}
                </span>
                <span class="rounded-full bg-white border border-gray-300 px-2.5 py-1 text-xs font-bold ">
                    {{ request.semester }}
                </span>
            </div>
            <div class="mt-4 font-medium flex items-center gap-x-1 leading-tight text-sm w-fit max-w-[80%]">
                <!-- at icon @  -->
                <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" fill="#000" style="flex-shrink: 0;"
                    viewBox="0 0 512 512">
                    <path
                        d="M256 64C150 64 64 150 64 256s86 192 192 192c17.7 0 32 14.3 32 32s-14.3 32-32 32C114.6 512 0 397.4 0 256S114.6 0 256 0S512 114.6 512 256v32c0 53-43 96-96 96c-29.3 0-55.6-13.2-73.2-33.9C320 371.1 289.5 384 256 384c-70.7 0-128-57.3-128-128s57.3-128 128-128c27.9 0 53.7 8.9 74.7 24.1c5.7-5 13.1-8.1 21.3-8.1c17.7 0 32 14.3 32 32v80 32c0 17.7 14.3 32 32 32s32-14.3 32-32V256c0-106-86-192-192-192zm64 192a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z">
                    </path>
                </svg>
                <!-- username  -->
                <h3 class="truncate tracking-tight">
                    {{ request.name }}
                </h3>
            </div>
            <!-- time  -->
            <div class="time flex items-center justify-between indent-5 text-xs">
                <p class="w-fit text-gray-800 ">
                    {{ request.created_at }}
                </p>
                <svg class="-mt-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 5 24" width="16" height="16">
                    <path fill="#000"
                        d="M5.217 12a2.608 2.608 0 1 1-5.216 0a2.608 2.608 0 0 1 5.216 0m0-9.392a2.608 2.608 0 1 1-5.216 0a2.608 2.608 0 0 1 5.216 0m0 18.783a2.608 2.608 0 1 1-5.216 0a2.608 2.608 0 0 1 5.216 0" />
                </svg>
            </div>
            <!-- respond button, see details  -->
            <div class="mt-4 text-sm font-medium whitespace-nowrap flex items-center justify-end gap-1.5">
                <!-- respond button  -->
                <button
                    class="flex items-center justify-center gap-1.5 rounded-full px-3 py-1.5 border-2 border-black hover:bg-black hover:text-white transition-all duration-200">
                    <span>Respond</span>
                    <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none'
                        stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'>
                        <path d='M5 12h13M12 5l7 7-7 7' />
                    </svg>
                </button>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    props: {
        requests: Array,
    },
};
</script>

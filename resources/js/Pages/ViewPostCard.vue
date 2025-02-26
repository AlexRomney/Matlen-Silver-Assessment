<template>

    <Head title="View Post Card" />

    <div class="min-h-screen bg-blue-400 flex flex-col justify-between">
        <header class="flex justify-end items-center px-10 py-4">
            <a href="/" class="bg-white text-gray-700 text-xs font-bold px-3 py-1 rounded shadow">
                Create Your Own
            </a>
        </header>

        <div class="flex-grow flex justify-center items-center">
            <div class="bg-white shadow-xl rounded p-8 relative w-[600px] h-[350px]">
                <div v-if="selected === 'front'" class="absolute inset-0 flex">
                    <div class="w-1/2 flex items-center justify-center px-4 overflow-auto">
                        <p class="text-gray-700 whitespace-pre-line break-words">
                            {{ postCard.message }}
                        </p>
                    </div>
                    <div class="border-l border-gray-400 h-full"></div>
                    <div class="absolute top-6 right-6 bg-gray-200 w-12 h-16 border border-gray-300 rounded-sm"></div>
                </div>

                <div v-else>
                    <img v-if="postCard.image" :src="'/storage/' + postCard.image" alt="Uploaded image"
                        class="absolute inset-0 object-cover w-full h-full" />

                    <div v-if="postCard.cover_text"
                        class="absolute bottom-2 right-2 text-white font-bold px-3 py-1 text-3xl max-w-[90%] break-words">
                        {{ postCard.cover_text }}
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-center pb-10">
            <button @click="flipCard"
                class="px-6 py-2 bg-white text-gray-800 rounded shadow hover:bg-gray-100 transition">
                🔄 Flip
            </button>
        </div>
    </div>
</template>

<script setup>
    import { Head } from '@inertiajs/vue3'
    import { ref } from 'vue'

    defineProps({ postCard: Object })

    const selected = ref('front')

    function flipCard() {
        selected.value = selected.value === 'front' ? 'back' : 'front';
    }
</script>
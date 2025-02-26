<template>

    <Head title="Post Card" />

    <div class="bg-gray-100 min-h-screen">
        <div class="flex flex-col">
            <form @submit.prevent="form.post('post-card/create')"
                class="max-w-6xl w-full mx-auto shadow-lg rounded-lg overflow-hidden bg-white mt-10">
                <div class="flex flex-grow">
                    <div v-if="selected === 'front'" class="w-1/2 p-10 space-y-4">
                        <div>
                            <InputLabel for="recipient_name" value="Recipient Name" />
                            <TextInput id="recipient_name" v-model="form.recipient_name" class="mt-1 block w-full"
                                autofocus />
                            <InputError :message="form.errors.recipient_name" class="mt-1" />
                        </div>

                        <div>
                            <InputLabel for="address1" value="Street 1" />
                            <TextInput id="address1" v-model="form.address1" class="mt-1 block w-full" />
                            <InputError :message="form.errors.address1" class="mt-1" />
                        </div>

                        <div class="flex gap-2">
                            <div class="w-1/2 relative">
                                <InputLabel for="address2" value="Street 2" />
                                <TextInput id="address2" v-model="form.address2" class="mt-1 block w-full pr-20" />
                                <span
                                    class="absolute top-9 right-2 text-xs text-gray-400 uppercase font-bold">Optional</span>
                            </div>

                            <div class="w-1/2">
                                <InputLabel for="city" value="City" />
                                <TextInput id="city" v-model="form.city" class="mt-1 block w-full" />
                                <InputError :message="form.errors.city" class="mt-1" />
                            </div>
                        </div>

                        <div class="flex gap-2">
                            <div class="w-1/2">
                                <InputLabel for="state" value="State" />
                                <TextInput id="state" v-model="form.state" class="mt-1 block w-full" />
                                <InputError :message="form.errors.state" class="mt-1" />
                            </div>

                            <div class="w-1/2">
                                <InputLabel for="postal_code" value="ZipCode" />
                                <TextInput id="postal_code" v-model="form.postal_code" class="mt-1 block w-full" />
                                <InputError :message="form.errors.postal_code" class="mt-1" />
                            </div>
                        </div>

                        <div>
                            <InputLabel for="message" value="Message" />
                            <textarea id="message" v-model="form.message"
                                class="w-full p-2 border border-gray-300 shadow rounded h-32"></textarea>
                            <InputError :message="form.errors.message" class="mt-1" />
                        </div>
                    </div>

                    <div v-else class="w-1/2 p-10 space-y-2 flex flex-col justify-center items-center">
                        <div class="w-full max-w-md relative">
                            <InputLabel for="cover_text" value="Cover Text" />
                            <TextInput id="cover_text" v-model="form.cover_text" class="mt-1 block w-full" />
                            <span
                                class="absolute top-9 right-2 text-xs text-gray-400 uppercase font-bold">Optional</span>
                        </div>

                        <div class="w-full max-w-md">
                            <InputLabel for="image" value="Cover Image" />
                            <input type="file" id="image" @change="handleImageChange" class="mt-1 block w-full" />
                            <button v-if="imagePreview" type="button" @click="removeImage"
                                class="mt-2 text-sm text-red-500 hover:text-red-700">
                                Remove Image
                            </button>
                            <InputError :message="form.errors.image" class="mt-2" />
                        </div>
                    </div>

                    <div class="w-1/2 bg-blue-400 p-10 flex flex-col justify-center">
                        <h3 class="text-white text-opacity-60 text-center mb-5 text-2xl font-bold"> Preview </h3>
                        <div class="relative bg-white rounded shadow p-8 w-[500px] h-[300px] overflow-hidden">
                            <div v-if="selected === 'front'" class="absolute inset-0 flex">
                                <div class="w-1/2 flex items-center justify-center px-4 overflow-hidden">
                                    <p
                                        class="text-gray-700 whitespace-pre-line break-words overflow-hidden overflow-ellipsis">
                                        {{ form.message }}
                                    </p>
                                </div>
                                <div class="border-l border-gray-400 h-full"></div>
                                <div
                                    class="absolute top-6 right-6 bg-gray-200 w-12 h-16 border border-gray-300 rounded-sm">
                                </div>
                            </div>
                            <div v-else class="absolute inset-0 flex items-center justify-center">
                                <img v-if="imagePreview" :src="imagePreview" alt="Uploaded image"
                                    class="object-cover w-full h-full" />
                                <span v-else class="text-gray-400">Upload image</span>

                                <div v-if="form.cover_text"
                                    class="absolute bottom-2 right-2 text-white font-bold px-3 py-1 text-3xl max-w-[90%] break-words">
                                    {{ form.cover_text }}
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center gap-4 mt-6">
                            <div class="inline-flex bg-white rounded p-1">
                                <button type="button" @click="selected = 'front'"
                                    :class="selected === 'front' ? 'bg-gray-600 text-white' : 'text-gray-700'"
                                    class="text-xs font-bold rounded-2xl px-6 py-2 uppercase focus:outline-none">
                                    Front
                                </button>

                                <button type="button" @click="selected = 'back'"
                                    :class="selected === 'back' ? 'bg-gray-600 text-white' : 'text-gray-700'"
                                    class="text-xs font-bold rounded-2xl px-6 py-2 uppercase focus:outline-none">
                                    Back
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sticky bg-gray-100 w-full py-4 px-6 flex justify-end gap-4">
                    <button type="submit"
                        class="px-6 py-1 uppercase text-sm font-semibold bg-blue-400 text-white rounded">
                        Save
                    </button>

                    <button type="button"
                        class="px-6 py-1 bg-white uppercase text-sm font-semibold border rounded text-gray-700">
                        Copy Link
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
    import TextInput from '@/Components/TextInput.vue'
    import InputLabel from '@/Components/InputLabel.vue'
    import InputError from '@/Components/InputError.vue'
    import PrimaryButton from '@/Components/PrimaryButton.vue'

    import { Head, useForm } from '@inertiajs/vue3';
    import { ref } from 'vue';

    const form = useForm({
        recipient_name: '',
        address1: '',
        address2: null,
        city: '',
        state: '',
        postal_code: '',
        cover_text: '',
        image: null,
        message: `Hey Babs,

    Check out this crazy photo from New York! I hope to see you soon!`
    });

    const selected = ref('front');

    const imagePreview = ref(null)

    function handleImageChange(event) {
        const file = event.target.files[0]

        if (file) {
            form.image = file
            imagePreview.value = URL.createObjectURL(file)
        } else {
            form.image = null
            imagePreview.value = null
        }
    }

    function removeImage() {
        form.image = null
        imagePreview.value = null
        document.getElementById('image').value = null
    }
</script>
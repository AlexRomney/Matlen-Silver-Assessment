<template>

    <Head title="Post Card" />

    <div class="bg-gray-100 min-h-screen">
        <div class="flex flex-col">
            <form @submit.prevent="form.post('post-card/create')"
                class="max-w-6xl w-full mx-auto shadow-lg rounded-lg overflow-hidden bg-white mt-10">
                <div class="flex flex-grow">

                    <div class="w-1/2 p-10 space-y-4">
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

                    <!-- Preview section -->
                    <div class="w-1/2 bg-blue-400 p-10 flex flex-col justify-center">
                        <div class="bg-white rounded shadow p-8">
                            <p class="text-lg whitespace-pre-line">{{ form.message }}</p>
                        </div>
                        <div class="flex justify-center gap-4 mt-6">
                            <button class="px-4 py-1 bg-gray-700 text-white rounded">Front</button>
                            <button class="px-4 py-1 bg-white rounded">Back</button>
                        </div>
                    </div>
                </div>
                <div class="sticky bg-gray-100 w-full py-4 px-6 flex justify-end gap-4">
                    <button type="submit" class="px-6 py-1 uppercase text-sm font-semibold bg-blue-400 text-white rounded">
                        Save
                    </button>

                    <button type="button" class="px-6 py-1 bg-white uppercase text-sm font-semibold border rounded text-gray-700">
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

const form = useForm({
  recipient_name: '',
  address1: '',
  address2: '',
  city: '',
  state: '',
  postal_code: '',
  message: ''
});

</script>
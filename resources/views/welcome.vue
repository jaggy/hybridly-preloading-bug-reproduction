<script setup lang="ts">
useHead({
	title: 'Welcome'
})

const updatePreloadUser = useForm({
    method: 'PUT',
    url: route('preload.users.update', { user: 1 }),
    fields: {},
})

const updateUser = useForm({
    method: 'PUT',
    url: route('users.update', { user: 1 }),
    fields: {},
})

const preloaded = ref(false)
</script>

<template layout>
    <div class="grid grid-cols-2">
        <div class="p-12">
            <h2 class="text-2xl font-bold">With Preloading</h2>
            <p>Once you hover on the link, when you submit the form, rather than sending a POST request to /users/1, it will instead redirect.</p>


            <div class="mt-4">
                <RouterLink href="/preload-users/1" preload  class="underline" @mouseover="preloaded = true">
                    Link to /preload/users/1
                </RouterLink>
            </div>

            <div class="mt-4">
                {{ preloaded ? 'Preloaded!': 'Hover on link to preload' }}
            </div>

            <div class="mt-4">
                <form action="/preload-users/1" method="POST" @submit.prevent="updatePreloadUser.submit">
                    <button type="submit" class="px-4 py-2 bg-black text-white">Update Preload User</button>
                </form>
            </div>
        </div>

        <div class="p-12">
            <h2 class="text-2xl font-bold">Without Preloading</h2>

            <div class="mt-4">
                <RouterLink href="/users/1" class="underline">
                    Link to /preload/users/1
                </RouterLink>
            </div>

            <div class="mt-4">
                <form action="/users/1" method="POST" @submit.prevent="updateUser.submit">
                    <button type="submit" class="px-4 py-2 bg-black text-white">Update Preload User</button>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>
</style>



<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import App from '../vue/app';


</script>

<template>
    <AppLayout title="Dashboard">
        <!--
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
         -->

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />
                    <!-- is this maybe where the router content will eventually go? -->
                    <!--<App />-->
                </div>
            </div>
        </div>
                <div id="app">
                    <app></app>
                </div>
    </AppLayout>
</template>

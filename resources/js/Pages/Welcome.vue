<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import TagAdmin from '../Tags/TagAdmin';
import ProductAdmin from '../Products/ProductAdmin';
import Test from './Test';
import BlackTopNav from '../Shared/BlackTopNav';
import WhiteSuperMenu from '../Shared/WhiteSuperMenu';
import ThreeProducts from '../Examples/ThreeProducts';
import FourSquare from '../Examples/FourSquare';
import Tabs from '../Examples/Tabs';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

</script>

<template>
    <Head title="Welcome" />

        <!--<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">-->
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
                Dashboard
            </Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 underline">
                    Log in
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                    Register
                </Link>
            </template>
        </div>

        <!--
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <img src="/img/canuck_logo_small.gif">
            </div>
        -->
        <div>

            

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <!-- create the div to hold the vue app - see resources\js\app.js and resources\js\vue\app.vue -->
                <div id="app"> <!-- cross reference to const app in resources\js\app.js -->
                    <BlackTopNav />
                    <WhiteSuperMenu />
                    <ThreeProducts />
                    <FourSquare />
                    <Tabs />
                    <TagAdmin /> <!-- instance of TagAdmin component  -->
                    <ProductAdmin /> <!-- instance of ProductAdmin component  -->
                </div>
                
            </div>

            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </div>
            </div>
        </div>
    <!--</div>-->
</template>

<style scoped>
</style>

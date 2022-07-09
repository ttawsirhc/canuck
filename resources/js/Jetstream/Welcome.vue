<script setup>
import TagAdmin from '../Tags/TagAdmin';
import ProductAdmin from '../Products/ProductAdmin';

</script>

<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <img src="/img/canuck_logo_small.gif">
            </div>

            <div id="app">
                <TagAdmin /> <!-- instance of TagAdmin component  -->
                <ProductAdmin /> <!-- instance of ProductAdmin component  -->
            </div>
        </div>
    </div>
</template>

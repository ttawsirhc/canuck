<template>
    <div>
        <div v-for="(product, index) in products" :key="index" >
            <product-list-item
                :product="product"
                class="product"
                v-on:itemchanged="$emit('reloadlist')" 
                />
        </div>
    </div>
</template>

<script>
import ProductListItem from "./ProductListItem"

export default {
    props: ['products'],
    components: {
        ProductListItem
    }
}
</script>

<style scoped>
.product {
    background: #e6e6e6;
    padding: 5px;
    margin-top: 5px;
}
</style>

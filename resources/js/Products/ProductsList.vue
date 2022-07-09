<template>
    <div>
        <!-- loop through products (v-bind to products from props: below) --> 
        <!-- create a product list item for each product, with list of associated tags -->
        <div v-for="(product, index) in products" :key="index" >
            <!-- product list item component tag - each product and associated tags -->
            <!-- note the v-bind: with the product and tag (:product, :tag), sending prop to ProductListItem-->
            <!-- after receiving productchanged, $emit reloadproductslist up to ProductAdmin component to execute getProductsList function -->
            <product-list-item
                :product="product"
                :tags="tags"
                class="product"
                v-on:productchanged="$emit('reloadproductlist')" 
            />
        </div>
    </div>
</template>

<script>
import ProductListItem from "./ProductListItem"
// import ProductTagsListItem from "./ProductTagsListItem"

export default {
    props: ['products', 'tags',], // props sent from ':products="products"' and ':tags="tags"' in the <products-list> component tag
    components: {  // include component(s) imported above
        ProductListItem,
        // ProductTagsListItem,
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

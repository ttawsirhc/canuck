<template>
    <div class="productsContainer">
        <div class="heading">
            <h2 id="title">Products List</h2>
            <product-form 
            v-on:reloadlist="getProductsList()" />
        </div>
        <products-list
            :products="products" 
            v-on:reloadlist="getProductsList()" />
    </div>
    <br />
</template>

<script>
import axios from "axios"
import ProductForm from "./ProductForm"
import ProductsList from "./ProductsList"

export default {
    components: {
        ProductForm,
        ProductsList
    },
    data: function () {
        return {
            products: []
        }
    },
    methods: {
        getProductsList () {
            axios.get( 'api/products' ) // use axios to call API endpoint to list items
            .then( response => {
                this.products = response.data
            })
            .catch( error => {
                console.log( error );
            })
        }
    },
    created() {
        this.getProductsList();
    }

    
}
</script>
<!-- scoped = for this file only - otherwise, style is global to whole -->
<style scoped>
/* container to hold the entire to do list */
.productsContainer {
    width: 95%; /* 350px; */
    margin: auto;
}

/* background to hold the title and add item form */
.heading {
    background: #e6e6e6;
    padding: 10px;
}
/* font for title in heading above */
#title {
    text-align: center;
    font-size: 24px;
}
</style>
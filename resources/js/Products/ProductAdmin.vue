<template>
    <div class="productsContainer"> <!-- container for products section -->
        <div class="heading"> <!-- product section title -->
            <h2 id="title">Products List</h2>
            <!-- product form component tag - form for creating a new product -->
            <!-- after reeiving the $emit for reloadproductslist, execute getProductsList function below -->
            <product-form 
            v-on:reloadproductslist="getProductsList()" />
        </div>
        <!-- products list component tag - pass v-bind products prop (from products data function below) for use in ProductsList component -->
        <!-- also pass v-bind tags prop -->
        <!-- after reeiving the $emit for reloadproductslist, execute getProductsList function below -->
        <products-list
            :products="products"
            :tags="tags"
            v-on:reloadproductslist="getProductsList()" />
    </div>
    <br />
</template>

<script>
import axios from "axios" // imported for axios commands below
import ProductForm from "./ProductForm" 
import ProductsList from "./ProductsList"

export default {
    components: {  // include the two components imported above
        ProductForm,
        ProductsList,
    },
    data: function () {
        return {
            products: [], // array of products, retrieved below
            tags: [], // array of tags, retrieved below
        }
    },
    methods: {
        getProductsList () {
            axios.get( 'api/productswithtags' ) // use axios to call API endpoint to list products and tags
            .then( response => {
                this.products = response.data // assign retrieved tags to products array in data function
            })
            .catch( error => {
                console.log( error ); // show error in console, if triggered
            })
        },
        getTags () {
            axios.get( 'api/tags' ) // use axios to call API endpoint (in TagController) to list tags
            .then( response => {
                this.tags = response.data // assign endpoint resopnse to tags array in data function
            })
            .catch( error => {
                console.log( error ); // show error in console, if triggered
            })
        },
    },
    created() { // lifecycle hook
        this.getProductsList();  
        this.getTags();
    }
    
}
</script>
<!-- scoped = this file only, doesn't apply globally -->
<style scoped>
.productsContainer { /* container to hold the entire products list */
    width: 95%; /* 350px; */
    margin: auto;
}

.heading { /* background to hold the title and add product form */
    background: #e6e6e6;
    padding: 10px;
}

#title { /* font for title in heading above */
    text-align: center;
    font-size: 24px;
}
</style>
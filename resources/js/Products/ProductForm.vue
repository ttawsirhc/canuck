<template>
    <div class="addProduct">
        <!-- associate product name textbox and product name in data function below -->
        <input type="text" placeholder="Product name" v-model="product.name" width="25" required />&nbsp;
        <!-- associate product price input and product price in data function below -->
        $&nbsp;<input type="number" placeholder="Product price" v-model="product.price" width="5" required />&nbsp;
        <!-- associate product image textbox and product image in data function below -->
        <input type="text" placeholder="Product image" v-model="product.img_src_path" width="25" required />
        <!-- associate product description textarea and product description in data function below -->
        <br /><textarea placeholder="Product description" v-model="product.description" required></textarea>&nbsp;
        <!-- note: @click is the same as v-on:click; when executed call addProduct function in "methods" below -->
        <button class="button" @click="addProduct()">Add</button>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            product: { // product data, initialize attributes
                name: "",
                description: "",
                price: 0,
                img_src_path: "",
            }
        }
    },
    methods: {
        addProduct() {
            // make sure fields are not empty before saving 
            if( this.product.name == '' ){ return; } 
            if( this.product.description == '' ){ return; } 
            if( this.product.img_src_path == '' ){ return; } 

            axios.post('api/product/store', { // use axios to call API endpoint to save product data from form above
                product: this.product
            })
            .then( response => {
                if( response.status == 201 ) { // successful execution, reset form elements to empty
                    this.product.name = "";
                    this.product.description = "";
                    this.product.price = 0;
                    this.product.img_src_path = "";
                    this.$emit('reloadproductslist'); // $emit reloadproductslist up to ProductAdmin component to execute getProductList function
                }
            })
            .catch( error => {
                console.log( error );  // show error in console, if triggered
            })
        }
    }
}
</script>

<style scoped>
.addProduct {
    display: flex;
    justify-content: center;
    align-items: center;
}

.button {
  border: 2px solid #555555;
  color: #000000;
  padding: 8px 32px;
  background-color: #ffffff;
  text-align: center;
  text-decoration: none;
  /* display: inline-block; */
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;
}

input {
    background: #f7f7f7;
    border: 0px;
    outline: none;
    padding: 5px;
    margin-right: 10px;
    width: 200px;
}
</style>
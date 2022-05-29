<template>
    <div class="addProduct">
        <!-- v-model - some sort of binding between the textbox and the item name in "data" below ... -->
        <input type="text" placeholder="Product name" v-model="product.name" width="25" required />&nbsp;
        $&nbsp;<input type="number" placeholder="Product price" v-model="product.price" width="5" required />&nbsp;
        <input type="text" placeholder="Product image" v-model="product.img_src_path" width="25" required />
        <!-- note: @click is the same as v-on:click; call addItem function in "methods" below -->
        <br /><textarea placeholder="Product description" v-model="product.description" required></textarea>&nbsp;
        <button class="button" @click="addProduct()">Add</button>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            product: {
                name: "",
                description: "",
                price: 0,
                image: "",
            }
        }
    },
    methods: {
        addProduct() {
            /*
            if( 
                this.product.name == '' || 
                this.product.description == '' ||
                this.product.image == '' 
            ) { return; }
            */
            axios.post('api/product/store', {
                product: this.product
            })
            .then( response => {
                if( response.status == 201 ) {
                    this.product.name = "";
                    this.product.description = "";
                    this.product.price = 0;
                    this.product.image = "";
                    this.$emit('reloadlist');
                }
            })
            .catch( error => {
                console.log( error );
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
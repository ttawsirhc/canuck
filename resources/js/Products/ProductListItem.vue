<template>
    <div class="product">
        <span class="productText">
            <input type="text" v-model="product.name" width="25" />
            $&nbsp;<input type="number" v-model="product.price" width="25" />
            <input type="text" v-model="product.img_src_path" width="25" /><br />
            <textarea v-model="product.description"></textarea>
        </span>
        <button @click="updateProduct()" class="trashcan">Update</button>&nbsp;&nbsp;
        <button @click="removeProduct()" class="trashcan">Delete</button>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['product'],
    methods: {
        updateProduct(){
            axios.put( 'api/product/' + this.product.id , {
                product: this.product
            })
            .then( response => {
                if( response.status == 200 ) {
                    this.$emit('itemchanged');
                }
            })
            .catch( error => {
                console.log( error );
            })
        },
        removeProduct() {
            axios.delete('api/product/' + this.product.id )
            .then( response => {
                if( response.status == 200 ) {
                    this.$emit('itemchanged')
                }
            })
            .catch ( error => {
                console.log( error );
            })
        }
    }
}
</script>

<style scoped>
.completed {
    text-decoration: line-through;
    color: #999999;
}
.productText {
    width: 100%;
    margin-left: 20px;
}
.product {
    display: flex;
    justify-content: center;
    align-items: center;
    background: #e6e6e6;

}
.trashcan {
    background: #e6e6e6;
    border: none;
    color: #FF0000;
    outline: none;
}
</style>
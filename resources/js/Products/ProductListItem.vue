<template>
    <div class="product">
        <span class="productText">
            <!-- associate product name textbox and product name of product in props below -->
            <input type="text" v-model="product.name" width="25" />
            <!-- associate product price number field and product price of product in props below -->
            $&nbsp;<input type="number" v-model="product.price" width="25" />
            <!-- associate product image source textbox and product image source of product in props below -->
            <input type="text" v-model="product.img_src_path" width="25" /><br />
            <!-- associate product description textarea and product description of product in props below -->
            <textarea v-model="product.description"></textarea>
        </span>
        <!-- note: @click = v-on:click; when clicked, execute updateProduct function in methods below -->
        <button @click="updateProduct()" class="trashcan">Update</button>&nbsp;&nbsp;
        <!-- note: @click = when clicked, execute removeProduct function in methods below -->
        <button @click="removeProduct()" class="trashcan">Delete</button>
    </div>
    <div class="product">
        <span class="productText">
            Tags:
            <span v-for="(tag, index ) in product.tags" :key="index">
                {{ tag.name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Add a tag:&nbsp;
            </span>
                <select>
                    <option :value="optiontag.id" v-for="optiontag in tags">{{ optiontag.name }}</option>
                </select>
            &nbsp;All Tags:
            <span v-for="( optiontag, index ) in tags" :key="index">
                {{ optiontag.name }} &nbsp;&nbsp;
            </span>
        </span>
    </div>
</template>

<script>
export default {
    inheritAttrs:false,
    props: ['product', 'tags',], // received from <products-list> in ProductAdmin <template> section?
    methods: {
        updateProduct(){
            axios.put( 'api/product/' + this.product.id , {
                product: this.product
            })
            .then( response => {
                if( response.status == 200 ) {
                    this.$emit('productchanged');
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
                    this.$emit('productchanged')
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
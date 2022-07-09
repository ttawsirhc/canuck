<template>
    <div class="product">
        <span class="productText">
            Tags:
            <!--
            <span v-for="tag in product.tags" >
                {{ tag.name }}
            </span>
            -->
        </span>
    </div>
    
</template>

<script>

export default {
    inheritAttrs:false,
    methods: {
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
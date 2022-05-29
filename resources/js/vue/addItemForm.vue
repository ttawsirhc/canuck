<template>
    <div class="addItem">
        <!-- v-model - some sort of binding between the textbox and the item name in "data" below ... -->
        <input type="text" v-model="item.name" width="25"/>
        <!-- note: @click is the same as v-on:click; call addItem function in "methods" below -->
        <button class="button" @click="addItem()">Add</button>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            item: {
                name: ""
            }
        }
    },
    methods: {
        addItem() {
            if( this.item.name == '' ) {
                return;
            }

            axios.post('api/item/store', {
                item: this.item
            })
            .then( response => {
                if( response.status == 201 ) {
                    this.item.name = "";
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
.addItem {
    display: flex;
    justify-content: center;
    align-items: center;
}

.button {
  border: 2px solid #555555;
  color: #000000;
  padding: 12px 32px;
  background-color: #ffffff;
  text-align: center;
  text-decoration: none;
  display: inline-block;
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
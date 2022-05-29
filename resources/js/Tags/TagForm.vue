<template>
    <div class="addTag">
        <!-- v-model - some sort of binding between the textbox and the item name in "data" below ... -->
        <input type="text" placeholder="Input tag name ..." v-model="tag.name" width="25"/>
        <!-- note: @click is the same as v-on:click; call addItem function in "methods" below -->
        <button class="button" @click="addTag()">Add</button>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            tag: {
                name: ""
            }
        }
    },
    methods: {
        addTag() {
            if( this.tag.name == '' ) {
                return;
            }

            axios.post('api/tag/store', {
                tag: this.tag
            })
            .then( response => {
                if( response.status == 201 ) {
                    this.tag.name = "";
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
.addTag {
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
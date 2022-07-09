<template>
    <div class="addTag">
        <!-- associate tag name textbox and tag name in data function below -->
        <input type="text" placeholder="Input tag name ..." v-model="tag.name" width="25"/>
        <!-- note: @click = v-on:click; when clicked, execute addTag function in methods below -->
        <button class="button" @click="addTag()">Add</button>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            tag: { // tag data
                name: "" // name attribute of tag data, initialize to empty string
            }
        }
    },
    methods: {
        addTag() {            
            if( this.tag.name == '' ) { return; } // make sure tag.name textbox not empty before saving

            axios.post('api/tag/store', { // use axios to call API endpoint to store tag data from form above
                tag: this.tag
            })
            .then( response => {
                if( response.status == 201 ) { // successful response data
                    this.tag.name = ""; // reset tag data (and textbox) to empty string after saving
                    this.$emit('reloadtagslist'); // $emit reloadtagslist up to TagAdmin component to execute getTagsList function 
                }
            })
            .catch( error => {
                console.log( error ); // print error to console
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
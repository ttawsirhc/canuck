<template>
    <div class="tag">
        <!-- associate tag name textbox and tag name in props below -->
        <span class="tagText"><input type="text" v-model="tag.name" width="25" /> </span>
        <!-- note: @click = v-on:click; when clicked, execute updateTag function in methods below -->
        <button @click="updateTag()" class="trashcan">Update</button>&nbsp;&nbsp;
        <!-- note: @click = when clicked, execute removeTag function in methods below -->
        <button @click="removeTag()" class="trashcan">Delete</button>
    </div>
</template>

<script>
export default {
    props: ['tag'],  // prop passed from ':tag="tag"' in the <tag-list-item> tag 
    methods: {
        updateTag(){
            axios.put( 'api/tag/' + this.tag.id , { // use axios to call API endpoint to update tag data from form above
                tag: this.tag
            })
            .then( response => {
                if( response.status == 200 ) { // successful response data
                    this.$emit('tagchanged'); // $emit tagchanged up to TagsList to trigger $emit('reloadtagslist') 
                }
            })
            .catch( error => {
                console.log( error ); // print error to console
            })
        },
        removeTag(){
            axios.delete('api/tag/' + this.tag.id ) // use axios to call API endpoint to delete tag from tags table
            .then( response => {
                if( response.status == 200 ) { // successful response data
                    this.$emit('tagchanged') // $emit tagchanged up to TagsList, to trigger $emit('reloadtagslist')
                }
            })
            .catch ( error => {
                console.log( error ); // print error to console
            })
        }
    }
}
</script>

<style scoped>
.tag {
    display: flex;
    justify-content: center;
    align-items: center;
    background: #e6e6e6;

}.tagText {
    width: 100%;
    margin-left: 20px;
}

.trashcan {
    background: #e6e6e6;
    border: none;
    color: #FF0000;
    outline: none;
}
</style>
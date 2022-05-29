<template>
    <div class="tag">
        <input
            type="checkbox"
            @change="updateCheck()"
            v-model="tag.completed"
            />
        <span class="tagText"><input type="text" v-model="tag.name" width="25" /> </span>
        <button @click="updateTag()" class="trashcan">Update</button>&nbsp;&nbsp;
        <button @click="removeTag()" class="trashcan">Delete</button>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    props: ['tag'],
    methods: {
        updateTag(){
            axios.put( 'api/tag/' + this.tag.id , {
                tag: this.tag
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
        removeTag() {
            axios.delete('api/tag/' + this.tag.id )
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
.tagText {
    width: 100%;
    margin-left: 20px;
}
.tag {
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
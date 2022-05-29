<template>
    <div class="tagsContainer">
        <div class="heading">
            <h2 id="title">Tags List</h2>
            <tag-form 
            v-on:reloadlist="getTagsList()" />
        </div>
        <tags-list 
            :tags="tags" 
            v-on:reloadlist="getTagsList()" />
    </div>
    <br />
</template>

<script>
import axios from "axios"
import TagForm from "./TagForm"
import TagsList from "./TagsList"

export default {
    components: {
        TagForm,
        TagsList
    },
    data: function () {
        return {
            tags: []
        }
    },
    methods: {
        getTagsList () {
            axios.get('api/tags') // use axios to call API endpoint to list items
            .then( response => {
                this.tags = response.data
            })
            .catch( error => {
                console.log( error );
            })
        }
    },
    created() {
        this.getTagsList();
    }

    
}
</script>
<!-- scoped = for this file only - otherwise, style is global to whole -->
<style scoped>
/* container to hold the entire to do list */
.tagsContainer {
    width: 95%; /* 350px; */
    margin: auto;
}

/* background to hold the title and add item form */
.heading {
    background: #e6e6e6;
    padding: 10px;
}
/* font for title in heading above */
#title {
    text-align: center;
    font-size: 24px;
}
</style>
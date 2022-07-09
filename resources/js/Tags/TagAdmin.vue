<template>
    <div class="tagsContainer"> <!-- container for tags section -->
        <div class="heading"> <!-- tag section title -->
            <h2 id="title">Tags List</h2>
            <!-- tag form component tag - form for creating a new tag -->
            <!-- after reeiving the $emit for reloadtagslist, execute getTagsList function below -->
            <tag-form 
            v-on:reloadtagslist="getTagsList()" />
        </div>
        <!-- tags list component tag - pass tags prop (from tags data function below) for use in TagsList component -->
        <!-- after reeiving the $emit for reloadtagslist, execute getTagsList function below -->
        <tags-list 
            :tags="tags" 
            v-on:reloadtagslist="getTagsList()" />
    </div>
    <br />
</template>

<script>
import axios from "axios" // imported for axios commands below
import TagForm from "./TagForm"
import TagsList from "./TagsList"

export default {
    components: { // include the two components imported above
        TagForm,
        TagsList,
    },
    data: function () {
        return {
            tags: [] // array of tags retrieved below 
        }
    },
    methods: {
        getTagsList () {
            axios.get('api/tags') // use axios to call API endpoint to list tags
            .then( response => {
                this.tags = response.data // assign retrieved tags to tags array in data function
            })
            .catch( error => {
                console.log( error ); // print error to console
            })
        }
    },
    created() { // lifecycle hook
        this.getTagsList(); // when created, execute getTagsList function above
    }

    
}
</script>
<!-- scoped = this file only, doesn't apply globally -->
<style scoped>
.tagsContainer { /* container to hold the entire tags section */
    width: 95%; /* 350px; */
    margin: auto;
}

.heading { /* background to hold the title and add tag form */
    background: #e6e6e6;
    padding: 10px;
}

#title { /* font for title in heading above */
    text-align: center;
    font-size: 24px;
}
</style>
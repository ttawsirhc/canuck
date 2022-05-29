<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title">Todo List</h2>
            <add-item-form 
            v-on:reloadlist="getList()" />
        </div>
        <list-view 
            :items="items" 
            v-on:reloadlist="getList()" />
    </div>
    <br />
</template>

<script>
import axios from "axios"
import addItemForm from "./addItemForm"
import listView from "./listView"

export default {
    components: {
        addItemForm,
        listView
    },
    data: function () {
        return {
            items: []
        }
    },
    methods: {
        getList () {
            axios.get('api/items') // use axios to call API endpoint to list items
            .then( response => {
                this.items = response.data
            })
            .catch( error => {
                console.log( error );
            })
        }
    },
    created() {
        this.getList();
    }

    
}
</script>
<!-- scoped = for this file only - otherwise, style is global to whole -->
<style scoped>
/* container to hold the entire to do list */
.todoListContainer {
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
<template>
    <div>
        <div v-for="(tag, index) in tags" :key="index" >
            <tag-list-item
                :tag="tag"
                class="tag"
                v-on:itemchanged="$emit('reloadlist')" 
                />
        </div>
    </div>
</template>

<script>
import TagListItem from "./TagListItem"

export default {
    props: ['tags'],
    components: {
        TagListItem
    }
}
</script>

<style scoped>
.tag {
    background: #e6e6e6;
    padding: 5px;
    margin-top: 5px;
}
</style>

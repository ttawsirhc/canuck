<template>
    <div>
        <!-- loop through (v-bind to tags from props: below), create a tag list item for each tag -->
        <div v-for="(tag, index) in tags" :key="index" >
            <!-- tag list item component tag - each tag in the tags list -->
            <!-- note the v-bind: with the tag (:tag), sending prop to TagListItem-->
            <!-- after receiving tagchanged, $emit reloadtagslist up to TagAdmin component to execute getTagsList function -->
            <tag-list-item
                :tag="tag"
                class="tag"
                v-on:tagchanged="$emit('reloadtagslist')" 
            />
        </div>
    </div>
</template>

<script>
import TagListItem from "./TagListItem"

export default {
    props: ['tags'], // prop sent from ':tags="tags"' in the <tags-list> component tag
    components: { // include TagListItem component(s) imported above
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

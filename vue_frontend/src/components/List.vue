<template>
    <div class="listContainer">
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: 'List'
}
</script>

<style scoped>
    .listContainer{
        display:flex;
        flex-direction: column;
    }
</style>
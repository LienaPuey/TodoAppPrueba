<template>
    <div class="todo-list">
        <slot></slot>
    </div>
</template>

<script>
export default {
    name: 'List'
}
</script>

<style scoped>
.todo-list {
    flex: 1;
}
</style>
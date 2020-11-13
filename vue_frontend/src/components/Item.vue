<template>
    <div class="itemContainer">
        <slot name="title"></slot>
        <slot name="description"></slot> <!--contenido entre slots=valor default revisar la doc de vue slots-->
        <slot name="newTime"></slot>
        <slot name="doneTime"></slot>
        <slot name="leftBtn"></slot>
        <slot name="rightBtn"></slot>
    </div>
</template>
<script>
export default {
    name: 'Item'
}
</script>
<style scoped>
    .itemContainer {
        display: flex;
        flex-direction: row;
    }
</style>
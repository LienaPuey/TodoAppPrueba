<template>
    <div class="item-container">
        <div class="item-container-block">
            <div class="item-container-block-title">
                <slot name="title"></slot>
            </div>
            <div class="item-container-block-description">
                <slot name="description"></slot> <!--contenido entre slots=valor default revisar la doc de vue slots-->
            </div>
            <div class="item-container-block-time">
                <slot name="newTime"></slot>
            </div>
            <div class="item-container-block-time">
                <slot name="doneTime"></slot>
            </div>
            <div class="item-buttons">
            <slot name="leftBtn"></slot>
            <slot name="rightBtn"></slot>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'Item'
}
</script>

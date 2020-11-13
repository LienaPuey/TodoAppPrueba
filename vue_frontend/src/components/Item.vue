<template>
    <div class="item-container">
        <div class="">
            <div class="">
                <slot name="title"></slot>
            </div>
            <div class="">
                <slot name="description"></slot> <!--contenido entre slots=valor default revisar la doc de vue slots-->
            </div>
            <div class="">
                <slot name="newTime"></slot>
            </div>
            <div class="">
                <slot name="doneTime"></slot>
            </div>
            
            <slot name="leftBtn"></slot>
            <slot name="rightBtn"></slot>
            
        </div>
    </div>
</template>
<script>
export default {
    name: 'Item'
}
</script>

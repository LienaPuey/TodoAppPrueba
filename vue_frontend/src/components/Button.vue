<template>
    
        <button v-bind="$attrs" v-on="$listeners"> <!-- https://es.vuejs.org/v2/guide/components-props.html deshabilitar herencia atributos a los demás botones-->
            <slot></slot>
        </button>
    
</template>

<script>
export default {
    name: 'Button',
    inheritAttrs: false //deshabilita la herencia de attrs check https://es.vuejs.org/v2/guide/components-props.html
}
</script>


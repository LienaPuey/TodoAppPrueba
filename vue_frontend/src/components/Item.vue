<template>
    <div class="todo-item">
        <div class="todo-item-content">
            <div class="todo-item-content-title">
                <slot name="title"></slot>
            </div>
            <div class="todo-item-content-description">
                <slot name="description"></slot> <!--contenido entre slots=valor default revisar la doc de vue slots-->
            </div>
            <div class="todo-item-content-addTime">
                <slot name="newTime"></slot>
            </div>
            <div class="todo-item-content-addTime">
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
<style scoped lang="scss">
    .app-button{
        font-size: 15px;
     &-is-warning{
        margin-right: 5px;
        }
    }
    .todo{
  &-item {
    background-color:white;
    min-height: 60px;
    margin: 10px;
    padding: 10px;
    color:rgb(131, 130, 130);
    border-radius: 25px;
    font-size: 23px;

    &-content {
      margin-bottom: 10px;
      &-tite{
        font-weight: bold;
      }
      &-description {
        font-size: 15px;
      }
      &-addTime {
        font-size: 8px;

      }
    }
  }
}
</style>
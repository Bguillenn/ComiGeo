<template>
    <div id="content">
        <div id="r-side">
            <map-component></map-component>
            <list-component></list-component>
        </div>
        <information-component></information-component>
    </div>
</template>

<style>
    #content{
        padding-left: 60px;
        padding-right: 60px;    
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
</style>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<template>
    <div>
        <div id="title-list">
            <span>Navega por el mapa para encontrar las comisarias</span>
        </div>
        <div id="list">

        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
    #title-list{
        width: 800px;
        height: 50px;
        background-color: #fff;
        border-radius: 10px;
        border: 1px solid #EAEAEA;
        padding-left: 20px;
        padding-right: 20px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    #title-list span{
        font-size: 16x;
        color: #484848;
        font-weight: bold;
    }

    #list{
        background-color: #fff;
        border: 1px solid #EAEAEA;
        width: 800px;
        height: 450px;
        box-shadow: 0 4px 4px rgba(143,143,143,.25);
    }
</style>
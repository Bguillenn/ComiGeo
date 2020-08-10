<template>
    <div id="search-box">
        <input type="text" placeholder="Busca una comisaria por su nombre" id="input-box" maxlength="70"/>
        <img src="https://res.cloudinary.com/dtg90uzhc/image/upload/v1597091198/comigeo/v9wdfud5nmko2b1az1ak.svg" alt="search-icon" id="icon-search"/>
        <!-- Cuadro de sugerencias component -->
    </div>
</template>

<style>
    #search-box{
        width: 600px;
        height: 40px;
        background-color: #fff;
        border-radius: 30px;
        border: 1px solid #EAEAEA;
        padding-left: 20px;
        padding-right: 20px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }
    #input-box{
        width: 95%;
        height: 100%;
        border: none;
    }

    #input-box:focus{
        border: none;
        outline: none;
    }
</style>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>


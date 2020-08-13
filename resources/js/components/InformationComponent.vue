<template>
    <div>
        <div id="title-info">
            <span>Informacion de la comisaria</span>
        </div>
        <div id="info">
            <div id="images">
                 <carousel :data="data"></carousel>
            </div>
            <div id="title-data" class="data-content">
                <div>
                    <p id="nombre-comisaria">NINGUNA COMISARIA SELECCIONADA</p>
                    <span>No Select, No Select, No Select</span>
                </div>
                <div id="vote-info">
                    <span id="average-votes">5</span>
                    <img src="https://res.cloudinary.com/dtg90uzhc/image/upload/v1597119144/comigeo/mrpkxpjami8m0fdhzcog.png" alt="star-filled">
                </div>
            </div>
            <div id="body-data" class="data-content">

                <div class="body-info">
                    <span class="body-info-title">MACRO REGION POLICIAL</span>
                    <span class="body-info-data">---</span>
                </div>
                <div class="body-info">
                    <span class="body-info-title">REGION POLICIAL</span>
                    <span class="body-info-data">---</span>
                </div>
                <div class="body-info">
                    <span class="body-info-title">DIVISION POLICIAL</span>
                    <span class="body-info-data">---</span>
                </div>

            </div>
            <div id="distance-data" class="data-content">
                <span class="body-info-title">DISTANCIA DE LA COMISARIA A TU UBICACION</span>
                <span class="body-info-data">5 Km. Aprox.</span>
            </div>
            <div id="options" class="data-content">
                 <!-- AQUI IRA LO DE LOS VOTOS -->
                 <button>
                     <img src="https://res.cloudinary.com/dtg90uzhc/image/upload/v1597093411/comigeo/cqk8tktojg9jqrmjetw9.png" alt="map-icon">
                     Centrar en el mapa
                 </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                comdata: {

                },
                data: [
                '<img src="https://www.worldloppet.com/wp-content/uploads/2018/10/no-img-placeholder.png" alt="no-image" class="slide-image"/>',
                ],
            };
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>

    .slide-image{
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    
    #images > div{
        height: 100%;
    }
     #title-info{
        width: 400px;
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
    #title-info span{
        font-size: 16x;
        color: #484848;
        font-weight: bold;
    }

    #info{
        width: 400px;
        height: 450px;
        background-color: #fff;
        border: 1px solid #EAEAEA;
        box-shadow: 0 4px 4px rgba(143,143,143,.25);
    }
    #images{
        width: 100%;
        height: 200px;
        background-color: #c0c0c0;
    }

    .data-content{
        padding: 10px;
    }

    #title-data{
        height: 50px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #EAEAEA;
    }

    #vote-info{
        display: flex;
        justify-content: space-around;
        align-items: center;
        display: none;
    }

    #title-data #nombre-comisaria{
        font-size: 18px;
        font-weight: bold;
        color: #484848;
        text-overflow: "";
        text-transform: uppercase;
    }
    #title-data span{
        font-size:  12px;
        color: #484848;
        text-overflow: ellipsis;
    }

    #average-votes{
        font-size: 16px !important;
        font-weight: bold;
        color: #535353;
        margin-right: 5px;
    }

    #body-data{
        height: 80px;
        border-bottom: 1px solid #EAEAEA;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .body-info{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .body-info-title{
        font-size: 12px;
        font-weight: bold;
        color: #8f8f8f;
    }

    .body-info-data{
        font-size: 14px;
        color: #484848;
        font-weight: bold;
    }

    #distance-data{
        height: 65px;
        border-bottom: 1px solid #EAEAEA;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
    }

    #options{
       height: 53px;
       padding: 5px 10px;
       display: flex;
       justify-content: flex-end; 
       align-items: center;
    }
    #options button{
        color: #fff;
        font-size: 12px;
        font-weight: bold;
        background-color: #2E6FAB;
        height: 35px;
        width: 150px;
        border: none;
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
        border-radius: 30px;
        cursor: pointer;
        transition: .2s ease-in-out;
    }

    #options button:hover{
        background-color: #1C4D79;
    }

    #options button:active{
        box-shadow: 1px 1px 5px rgba(0,0,0,.3);
        background-color: #2E6FAB;
    }

    #options button:focus{
        outline: none;
    }
</style>
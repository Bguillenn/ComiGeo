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
                    <p id="nombre-comisaria">{{ this.comdata.nombre }}</p>
                    <span>{{this.comdata.dep}}, {{this.comdata.pro}}, {{this.comdata.dis}}</span>
                </div>
                <div id="vote-info">
                    <span id="average-votes">5</span>
                    <img src="https://res.cloudinary.com/dtg90uzhc/image/upload/v1597119144/comigeo/mrpkxpjami8m0fdhzcog.png" alt="star-filled">
                </div>
            </div>
            <div id="body-data" class="data-content">

                <div class="body-info">
                    <span class="body-info-title">MACRO REGION POLICIAL</span>
                    <span class="body-info-data">{{this.comdata.mp}}</span>
                </div>
                <div class="body-info">
                    <span class="body-info-title">REGION POLICIAL</span>
                    <span class="body-info-data">{{this.comdata.rp}}</span>
                </div>
                <div class="body-info">
                    <span class="body-info-title">DIVISION POLICIAL</span>
                    <span class="body-info-data">{{this.comdata.dp}}</span>
                </div>

            </div>
            <div id="distance-data" class="data-content">
                <span class="body-info-title">DISTANCIA DE LA COMISARIA A TU UBICACION</span>
                <span class="body-info-data">{{this.distancia}} Km Aprox.</span>
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
        props: {
            cominfo: {
                id: Number,
                nombre: String,
                dep: String,
                pro: String,
                dis: String,
                mp: String,
                rp: String,
                dp: String,
                lat: Number,
                lng: Number
            }
        },
        data() {
            return {
                comdata: {
                    id: 0,
                    nombre: "NINGUNA COMISARIA SELECCIONADA",
                    dep: "No select",
                    pro: "No select",
                    dis: "No select",
                    mp: "---",
                    rp: "---",
                    dp: "---",
                    lat: -1,
                    lng: -1,
                },
                distancia: 0,
                data: [
                '<img src="https://www.worldloppet.com/wp-content/uploads/2018/10/no-img-placeholder.png" alt="no-image" style="width: 400px;height: 200px !important;object-fit: cover;"/>',
                ],
            };
        },
        watch:{
            cominfo: function(newValue, oldValue){
                this.comdata = this.cominfo;
                this.obtenerImagenes();
                this.obtenerDistancia();
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            obtenerImagenes: function(){
                axios.
                get("https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/place/nearbysearch/json" ,{
                    params: {
                        location: this.comdata.lat+","+this.comdata.lng,
                        radius: 100,
                        keyword: this.comdata.nombre,
                        key: 'AIzaSyCKnBKQiMWepRPmxDEeGKlG_WMhtm3jQ6c'
                        //key: 'AIzaSyD-cej55YJwDg749MFqK6LTKjKk7k65fDE'
                    }
                }).then( response => {
                    if(response.status == 200){
                        let photos = response.data.results[0].photos;
                        let imageData = [];
                        for(var i = 0; i < photos.length; i++){
                            var urlImg = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference="
                                            +photos[i].photo_reference
                                            +"&key=AIzaSyD-cej55YJwDg749MFqK6LTKjKk7k65fDE";

                            imageData.push('<img src="'
                                            + urlImg
                                            +'" alt="comi-image" style="width: 400px;height: 200px !important;object-fit: cover;"/>');
                        }
                        this.data = imageData;
                    }
                }).catch( error => console.log(error));
            }, //obtenerImagenes

            obtenerDistancia: function(){

                 this.$getLocation({})
                .then(coordinates => {
                    let url = "https://35.203.21.243/comisarias/"+this.comdata.id+"/"+coordinates.lat+"/"+coordinates.lng;
                    axios.get(url)
                    .then( response => {
                        alert()
                        this.distancia = response.data.distancia.kms;
                    } )
                    .catch( error => {
                        console.log(error);
                    } );
                }).catch(error => {
                    alert("No se puede acceder a tu ubicacion");
                    this.coordinates = {
                        lat: 16.3989,
                        lng: 71.535
                    }
                });

            } //obtenerDistancia
        }
    }
</script>

<style scoped>


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
    
    .slide-image{
        width: 400px !important;
        height: 200px !important;
        object-fit: cover !important;
    }
</style>
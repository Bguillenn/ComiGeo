<template>
    <div class="list-item">
        <div class="list-item-info">
            <img class="list-item-img" :src="this.img" alt="comi-image">
            <div class="list-item-data">
                <h3 class="list-item-name">{{cominfo.nombre}}</h3>
                <span class="list-item-dir">{{cominfo.dep}}, {{cominfo.pro}}, {{cominfo.dis}}</span>
            </div>
        </div>
        <div class="list-item-options">
            <button>
                Ver en mapa
            </button>
            <button>
                Mostrar detalles
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            comdata: {
                id: Number,
                nombre: String,
                lat: Number,
                lng: Number,
                dep: String,
                pro: String,
                dis: String,
            }
        },
        data(){
            return{
                cominfo: this.comdata,
                img: "https://www.worldloppet.com/wp-content/uploads/2018/10/no-img-placeholder.png",
            }
        },
        mounted(){
            console.log('component mounted');
        },
        created(){
            this.obtenerImagenes();
        },
        methods: {
             obtenerImagenes: function(){
                axios.
                get("https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/place/nearbysearch/json" ,{
                    params: {
                        location: this.cominfo.lat+","+this.cominfo.lng,
                        radius: 100,
                        keyword: this.cominfo.nombre,
                        key: 'AIzaSyCKnBKQiMWepRPmxDEeGKlG_WMhtm3jQ6c'
                        //key: 'AIzaSyD-cej55YJwDg749MFqK6LTKjKk7k65fDE'
                    }
                }).then( response => {
                    if(response.status == 200){
                        let photos = response.data.results[0].photos;
                        var urlImg = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=200&photoreference="
                                        +photos[0].photo_reference
                                        +"&key=AIzaSyD-cej55YJwDg749MFqK6LTKjKk7k65fDE";

                        this.img = urlImg;
                    }
                }).catch( error => console.log(error));
            }, //obtenerImagenes
        }
    }
</script>

<style>
    .list-item{
        border: 1px solid #EAEAEA;
        width: 100%;
        height: 100px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .list-item-info{
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
    }

    .list-item-img{
        width: 200px;
        height: 100px;
        object-fit: cover;
        margin-right: 10px;
    }

    .list-item-name{
        font-size: 18px;
        font-weight: 18px;
        text-transform: uppercase;
        color: #484848;
    }

    .list-item-dir{
        font-size: 14px;
        color: #484848;
    }

    .list-item-options{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 5px;
    }

    .list-item-options button{
        color: #fff;
        background-color: #2E6FAB;
        font-weight: bold;
        width: 120px;
        height: 30px;
        margin: 5px;
        border: none;
        cursor: pointer;
        border-radius: 20px;
        transition: .3s ease;
    }

    .list-item-options button:hover{
        background-color: #1C4D79;
    }

    .list-item-options button:active{
        box-shadow: 0px 2px 5px rgba(0,0,0,.5);
        scale: 1.01;
    }

    .list-item-options button:focus{
        outline: none;
    }

</style>
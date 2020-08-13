<template>
    <div>
        <div id="title-map">
            <span>Navega por el mapa para encontrar las comisarias</span>
            <button v-on:click='searchNearby'>Ubicar la mas cercana</button>
        </div>
        <div id="map">
            <GmapMap
            :center="coordinates"
            :zoom="15"
            style="width: 100%; height: 100%"
            ref="mapRef"
            >
      
              <GmapMarker
                    :key="index"
                    v-for="(c, index) in comisarias"
                    :position="{lat: c.ComLat, lng: c.ComLgn}"
                    :clickable="true"
                    :draggable="true"
                    @click="cargarComisaria(c.ComNom)"
                /> 
            </GmapMap>
        </div>
    </div>
</template>

<style>
    #title-map{
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
    #title-map span{
        font-size: 16x;
        color: #484848;
        font-weight: bold;
    }

    #title-map button{
        font-size: 12px;
        background-color: #2E6FAB;
        color: #fff;
        font-weight: bold;
        width: 150px;
        height: 30px;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        transition: background-color .2s ease-in-out;
    }

    #title-map button:hover{
        background-color: #1C4D79;
    }

    #title-map button:active{
        background-color: #2E6FAB;
        box-shadow: 2px 2px 5px rgba(0,0,0,.3);
    }

    #title-map button:focus{
        outline: none;
    }

    #map{
        background-color: #fff;
        border: 1px solid #EAEAEA;
        width: 800px;
        height: 450px;
        box-shadow: 0 4px 4px rgba(143,143,143,.25);
    }

</style>

<script>
    export default {
        props: {
            coordinates: {
                lat: -1,
                lng: -1,
            }
        },
        data(){
            return {
                comisarias: [],
                positionNear: {
                    lat: 0,
                    lng: 0,
                }
            }
        },
        mounted() {
            
            let url = "https://35.203.21.243/comisarias";
            axios.get(url)
            .then( response => {
                this.comisarias = response.data.comisarias;
            })
            .catch( error => alert(error));

            

        },
        created(){
            if(this.coordinates.lat == -1 && this.coordinates.lng == -1){
                    this.$getLocation({})
                .then(coordinates => {
                    this.coordinates = coordinates;
                }).catch(error => {
                    alert("No se puede acceder a tu ubicacion");
                    this.coordinates = {
                        lat: 16.3989,
                        lng: 71.535
                    }
                });
            }

            console.log("Coordenadas "+coordinates.lat+" "+coordinats.lng);
            
        
        },
        methods: {
            cargarComisaria(nom){
                alert("Comisaria nom "+nom);
            },

            searchNearby(){

                axios.get('https://35.203.21.243/comisarias/'+this.coordinates.lat+'/'+this.coordinates.lng)
                .then( response => {
                    this.$refs.mapRef.$mapPromise.then((map) => {
                        let location = {
                            lat: response.data[0].ComLat,
                            lng: response.data[0].ComLgn,
                        };
                        map.panTo(location);
                    })
                }).catch( error => console.log(error))

                
            },
        }
    }
</script>
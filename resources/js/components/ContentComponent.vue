<template>
    <div id="content">
        <div id="r-side">
            <map-component ref="MapComponent" v-if="this.vista == 'map'" v-bind:coordinates="this.coords" v-on:cargarComisaria="cargarComisaria"></map-component>
            <list-component v-else></list-component>
        </div>
        <information-component v-bind:cominfo="this.comdata" v-on:centrarMapa="goToMap"></information-component>
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
        props: {
            vista: String,
            searchData: {
                lat: -1,
                lng: -1,
                id: 0,
            }
        },
        data(){
            return{
                coords: {
                    lat: -1,
                    lng: -1
                },
                id: 0,
                comdata: {

                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            if(this.coords.lat == -1 && this.coords.lng == -1){
                    this.$getLocation({})
                .then(coordinates => {
                    this.coords = coordinates;
                }).catch(error => {
                    alert("No se puede acceder a tu ubicacion");
                    this.coords = {
                        lat: 16.3989,
                        lng: 71.535
                    }
                });
            }
        },
        watch: {
            searchData: function(newVal, oldVal){
                this.coords = {
                    lat : newVal.lat,
                    lng : newVal.lng
                }
                this.id = newVal.id;
                this.obtenerComisaria();
            }
        },
        methods: {
            obtenerComisaria: function(){
                let url = "https://35.203.21.243/comisarias/"+this.searchData.id;
                axios.get(url)
                .then( response => {
                    this.comdata = {
                        id: response.data[0].ComId,
                        nombre: response.data[0].ComNom,
                        dep: response.data[0].DepNom,
                        pro: response.data[0].ProNom,
                        dis: response.data[0].DisNom,
                        mp: "MCRP "+response.data[0].ComMacRegPol,
                        rp: "RP "+response.data[0].ComMacRegPol,
                        dp: response.data[0].ComDivPol,
                        lat: response.data[0].ComLat,
                        lng: response.data[0].ComLgn
                    }
                } )
                .catch( error => console.log(error) );
            }, //obtenerComisaria

            goToMap: function(value){
                this.coords = {
                    lat: value.lat,
                    lng: value.lng
                }
            }, //goToMap
            cargarComisaria: function(value){
                this.comdata = {
                        id: value.ComId,
                        nombre: value.ComNom,
                        dep: value.DepNom,
                        pro: value.ProNom,
                        dis: value.DisNom,
                        mp: "MCRP "+value.ComMacRegPol,
                        rp: "RP "+value.ComMacRegPol,
                        dp: value.ComDivPol,
                        lat: value.ComLat,
                        lng: value.ComLgn
                    }
            } //cargarComisaria
        }
    }
</script>

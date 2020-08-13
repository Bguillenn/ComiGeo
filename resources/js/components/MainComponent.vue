<template>
    <div>
        <header-component v-on:itemSelect="goToMap" v-on:cambiarVista="cambiarVista" v-bind:viewProp="this.vista"></header-component>
        <content-component :key="this.key" v-bind:vista="this.vista" v-bind:searchData="this.searchData"></content-component>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                searchData: {
                    lat: -1,
                    lng: -1,
                    id: 0,
                },
                key: 1,
                vista: 'list',
            }
        },
        mounted(){
            console.log("main montado");
        },

        methods: {
            goToMap: function(value){
                console.log("Manejando desde el main "+value.lat+" "+value.lng+" "+value.id);
                this.searchData = value;
                //this.key = -this.key;
            }, //gottomap
            cambiarVista: function(value){
                this.vista = value;
            }
        }
    }
</script>
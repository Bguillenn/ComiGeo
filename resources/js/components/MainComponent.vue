<template>
    <div>
        <header-component v-on:itemSelect="goToMap" :searchData="this.searchData"></header-component>
        <content-component></content-component>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                searchData: {
                    lat: 0,
                    lng: 0,
                    id: 0,
                }
            }
        },
        mounted(){
            console.log("main montado");
        },
        methods: {
            goToMap: function(value){
                console.log("Manejando desde el main "+value.lat+" "+value.lng+" "+value.id);
            }
        }
    }
</script>
<template>
    <div>
        <header-component v-on:itemSelect="goToMap"></header-component>
        <content-component v-bind:searchData="this.searchData"></content-component>
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
                }
            }
        },
        mounted(){
            console.log("main montado");
        },
        methods: {
            goToMap: function(value){
                console.log("Manejando desde el main "+value.lat+" "+value.lng+" "+value.id);
                this.searchData = value;
            }
        }
    }
</script>
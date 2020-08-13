<template>
    <div id="content">
        <div id="r-side">
            <map-component ref="MapComponent" v-bind:coordinates="this.coords"></map-component>
            <list-component></list-component>
        </div>
        <information-component></information-component>
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
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            gotoxyMap : function(value){
                this.coords = {
                    lat : value.lat,
                    lng : value.lng
                }
                this.id = value.id;
            }
        }
    }
</script>

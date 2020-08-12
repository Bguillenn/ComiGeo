<template>
    <div id="results-box">
        <search-item-component v-bind:nombre="'CPNP ZAMACOLA'" v-bind:dep="'Arequipa'" v-bind:pro="'Arequipa'" v-bind:dis="'Cerro Colorado'"/>
    </div>
</template>

<script>
    export default {
        props: {
            query: String
        },
        data(){
            return{
                results: []
            }
        },
        mounted() {
            //console.log('Mounted List');

        },
        watch: {
            query: {
                // the callback will be called immediately after the start of the observation
                immediate: true, 
                handler (val, oldVal) {
                    console.log('nuevo cambio query'+val);
                }
            }
        },
        methods: {
            loadResults: function(){
                axios.get('https://35.203.21.243/comisarias/'+this.query).
                then(response => {

                }).catch(error => console.log(error));
            }
        }
    }
</script>

<style>
    #results-box{
        position: absolute;
        top: 38px;
        left: 20px;
        width: 560px;
        min-height: 60px;
        max-height: 360px;
        background-color: #fff;
        border: 1px solid #EAEAEA;
        display:flex;
        flex-direction: column;
        box-shadow: 0 4px 4px rgba(143,143,143,.25);
        z-index: 10;
    }
</style>
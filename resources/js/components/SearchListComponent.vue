<template>
    <div id="results-box">
        <search-item-component
        v-on:itemSelect="itemSelect" 
        :key="index"
        v-for="(r,index) in results"
        v-bind:nombre="r.ComNom"
        v-bind:dep="r.DepNom" 
        v-bind:pro="r.ProNom" 
        v-bind:dis="r.DisNom"
        v-bind:lat="r.ComLat"
        v-bind:lng="r.ComLgn"
        v-bind:id="r.ComId"/>
    </div>
</template>

<script>
    export default {
        props: {
            query: String
        },
        data(){
            return{
                results: [],
                timeoutController: ""
            }
        },
        mounted() {
            //console.log('Mounted List');
            this.loadResults();
        },
        watch: {
            query: {
                handler (val, oldVal) {
                    clearTimeout(timeoutController);
                    this.timeoutController = setTimeout(this.loadResults(), 250);
                }
            }
        },
        methods: {
            loadResults: function(){
                alert("el usuario termino de escribir");
                axios.get('https://35.203.21.243/comisarias/'+this.query).
                then(response => {
                    this.results = response.data.comisarias;
                }).catch(error => console.log(error));
            },
            itemSelect: function(value){
                console.log("Manejando evento SLC "+value.lat+" "+value.lng+" "+value.id);
                this.$emit('itemSelect', value);
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
        overflow: auto;
    }
</style>
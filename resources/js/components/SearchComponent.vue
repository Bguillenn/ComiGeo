<template>
    <div id="search-box">
        <input 
            type="text" 
            placeholder="Busca una comisaria por su nombre" 
            id="input-box" maxlength="70" 
            v-on:keyup="buscar"
            v-model="queryData"/>
        <img src="https://res.cloudinary.com/dtg90uzhc/image/upload/v1597091198/comigeo/v9wdfud5nmko2b1az1ak.svg" alt="search-icon" id="icon-search"/>
        <transition name="fade">
            <search-list-component v-if="show" v-bind:query="query" v-on:itemSelect="itemSelect"/>
        </transition>
    </div>
</template>

<style>
    #search-box{
        min-width: 600px;
        width: 600px;
        height: 40px;
        background-color: #fff;
        border-radius: 30px;
        border: 1px solid #EAEAEA;
        padding-left: 20px;
        padding-right: 20px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        position: relative;
    }
    #input-box{
        width: 95%;
        height: 100%;
        border: none;
    }

    #input-box:focus{
        border: none;
        outline: none;
    }

    fade-enter-active, .fade-leave-active {
    transition: opacity .5s
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0
    }
</style>

<script>
    export default {
        data(){
            return {
                show: false,
                query: "",
                timeout: ""
            }
        },
        mounted() {
            console.log('');
        },
        methods: {
            buscar: function(event){
                if(this.queryData.length > 0){
                    clearTimeout(this.timeout);
                    this.timeout = setTimeout(() => {
                        if(this.queryData.length > 0){
                            this.query = this.queryData;
                            this.show = true;
                        }
                        clearTimeout(this.timeout);
                    }, 1000);
                }else
                    this.show = false;
            },
            itemSelect: function(value){
                console.log("Manejando desde SC "+value.lat+" "+value.lng+" "+value.id);
                this.$emit('itemSelect', value);
                this.show = false;
                this.queryData = "";
            }
        }
    }
</script>


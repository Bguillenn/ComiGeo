<template>
    <div>
        <button class="btn-result" v-on:click="itemSelect()">
            <div class="item-info">
                <!--<img class="item-img" src="https://www.worldloppet.com/wp-content/uploads/2018/10/no-img-placeholder.png" alt="ComImg">-->
                <img class="item-img" :src="this.img" alt="ComImg">
                <div class="item-data">
                    <h5 class="item-data-title">{{ this.nombre }}</h5>
                    <p class="item-data-dir">{{this.dep}}, {{this.pro}}, {{this.dis}}</p>
                </div>
            </div>
            <img src="https://res.cloudinary.com/dtg90uzhc/image/upload/v1597250449/comigeo/lvibbqvhgyeseziiugyu.png" alt="icon-go">
        </button>
    </div>
</template>

<script>
    export default {
        props: {
            id: Number,
            nombre: String,
            dep: String,
            pro: String,
            dis: String,
            lat: 0,
            lng: 0 
        },
        data(){
            return {
                img: "https://www.worldloppet.com/wp-content/uploads/2018/10/no-img-placeholder.png"
            }
        },
        mounted(){
            console.log('componente montado');
            let coords = {
                    lat: this.lat,
                    lng: this.lng,
            }

          //  let url = "https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/place/nearbysearch/json" ;
          // ?location="+coords.lat+","+coords.lng+"&radius=100&keyword="+encodeURIComponent(this.nombre)+"&key=AIzaSyDnr-MHYWQ2v9MVJNok3vaEfr0-JB-Z1Bs"
                axios.
                get("https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/place/nearbysearch/json" ,{
                    params: {
                        location: coords.lat+","+coords.lng,
                        radius: 100,
                        keyword: this.nombre,
                        key: 'AIzaSyD-cej55YJwDg749MFqK6LTKjKk7k65fDE'
                    }
                }).then( response => {
                    if(response.status == 200){
                        this.img = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=80&photoreference="
                                    +response.data.results[0].photos[0].photo_reference;
                    }else{
                        this.img = "https://www.worldloppet.com/wp-content/uploads/2018/10/no-img-placeholder.png"
                    }
                }).catch( error => console.log(error));
        },
        methods: {
            itemSelect: function(){
                let value = {
                    lat : this.lat,
                    lng : this.lng,
                    id : this.id
                }

                console.log("Evento click SIC: "+value.lat+" "+value.lng+" "+value.id);
                this.$emit('itemSelect', value);
            }
        }
    }
</script>

<style scoped>
    .btn-result{
        width: 100%;
        padding :10px;
        border: none;
        border-bottom: 1px solid #EAEAEA;
        background-color: #FFF;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
    }

    .btn-result:hover{
        background-color: #FAFAFA;
    }

    .btn-result:focus{
        outline: none;
    }

    .item-info{
        display:flex;
        flex-direction: row;
        align-items: center;
        justify-content: flex-start;
    }

    .item-img{
        width: 80px;
        height: 40px;
        object-fit: cover;
    }

    .item-data{
        margin-left:10px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
    }
    .item-data-title{
        color: #484848;
        font-size: 14px;
    }
    .item-data-dir{
        color: #484848;
        font-size: 12px;
    }
</style>
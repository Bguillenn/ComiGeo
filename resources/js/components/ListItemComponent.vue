<template>
    <div class="list-item">
        <div class="list-item-info">
            <img class="list-item-img" src="https://www.worldloppet.com/wp-content/uploads/2018/10/no-img-placeholder.png" alt="comi-image">
            <div class="list-item-data">
                <h3 class="list-item-name">CPNP ZAMACOLA</h3>
                <span class="list-item-des">Arequia, Arequipa, Cerro Colorado</span>
            </div>
        </div>
        <div class="list-item-options">
            <button>
                Ver en mapa
            </button>
            <button>
                Mostrar detalles
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            comdata: {
                id: Number,
                nombre: String,
                lat: Number,
                lng: Number,
                dep: String,
                pro: String,
                dis: String,
            }
        },
        data(){
            return{
                cominfo: this.comdata,
                img: "https://www.worldloppet.com/wp-content/uploads/2018/10/no-img-placeholder.png",
            }
        },
        mounted(){
            console.log('component mounted');
        },
        methods: {

        }
    }
</script>
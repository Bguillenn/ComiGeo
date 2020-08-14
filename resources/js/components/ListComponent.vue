<template>
    <div>
        <div id="title-list">
            <!-- Primer combobox departamentos-->
            <div>
                <span class="cbx-label">Departamento: </span>
                <div class="custom-select">
                    <select name="departamentos" id="dep" v-model="cbxDepartamento" class="combobox">
                        <option :key="index" v-for="(d,index) in this.departamentos" :value="d.codigo">
                            {{d.nombre}}
                        </option>
                    </select>
                </div>
            </div>
            <!-- Segundo combobox provincias -->
            <div>
                <span class="cbx-label">Provincia: </span>
                <div class="custom-select">
                    <select name="provincias" id="pro" v-model="cbxProvincia" class="combobox">
                        <option value="">Cualquiera</option>
                        <option :key="index" v-for="(p,index) in this.provincias" :value="p.codigo">
                            {{p.nombre}}
                        </option>
                    </select>
                </div>
            </div>
            <!-- Tercer combobox distritos -->
            <div>
                <span class="cbx-label">Distrito: </span>
                <div class="custom-select">
                    <select name="distritos" id="dep" v-model="cbxDistrito" class="combobox">
                        <option value="" selected>Cualquiera</option>
                        <option :key="index" v-for="(d,index) in this.distritos" :value="d.codigo">
                            {{d.nombre}}
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div id="list">
            <list-item-component :key="index" v-for="(c,index) in comisarias"
                :comdata="c"/>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                departamentos: [],
                provincias: [],
                distritos: [],
                cbxDepartamento: "",
                cbxProvincia: "",
                cbxDistrito: "",
                comisarias: []
            }
        },
        watch:{
            cbxDepartamento: function(newVal, oldVal){
                this.obtenerProvincias(newVal);
                this.obtenerComisarias();
            },
            cbxProvincia: function(newVal, oldVal){
                this.obtenerDistritos(newVal);
                this.obtenerComisarias();
            },
            cbxDistrito: function(newVal, oldVal){
                this.obtenerComisarias();
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            //obtener departamentos y añadirlos
            let urlDep = "https://35.203.21.243/departamentos"
            axios.get(urlDep)
            .then( response => {
                let aux = [];
                let data = response.data.departamentos;
                for(var i = 0; i<data.length; i++){

                    aux.push({
                        nombre: data[i].DepNom,
                        codigo: data[i].DepCod,
                    });
                }

                this.departamentos = aux;
                this.cbxDepartamento = this.departamentos[0].codigo;
                this.obtenerProvincias(aux[0].codigo);
            })
            .catch( error => console.log(error));
        },
        methods: {
            obtenerProvincias: function(depId){
                let auxPro = [];
                let url = "https://35.203.21.243/departamentos/"+depId+"/provincias";
                axios.get(url)
                .then( response => {
                    let data = response.data.provincias;
                    for(var i=0; i<data.length;i++ ){
                        auxPro.push({
                            nombre: data[i].ProNom,
                            codigo: data[i].ProCod
                        });
                    }

                    this.provincias = auxPro;
                    this.cbxProvincia = this.provincias[0].codigo;
                    this.obtenerDistritos(auxPro[0].codigo);
                    this.obtenerComisarias();
                })
                .catch( error => console.log(error));
            },
            obtenerDistritos: function(proId){
                let auxDis = [];
                let url = "https://35.203.21.243/provincias/"+proId+"/distritos";
                axios.get(url)
                .then( response => {
                    let data = response.data.distritos;
                    for(var i=0; i<data.length;i++){
                        auxDis.push({
                            nombre: data[i].DisNom,
                            codigo: data[i].DisCod
                        });
                    }
                    this.distritos = auxDis;
                    this.cbxDistrito = this.distritos[0].codigo;
                })
                .catch( error => console.log(error))
            },
            obtenerComisarias: function(){
                alert("llamando comisarias");
                let url = "https://35.203.21.243/buscar/"+this.cbxDepartamento+"/"+this.cbxProvincia+"/"+this.cbxDistrito;
                axios.get(url)
                .then( response => {
                    let aux = []
                    let data = response.data.comisarias;
                    for(var i=0; i<data.length;i++){
                        aux.push({
                            id: data[i].ComId,
                            nombre: data[i].ComNom,
                            lat: data[i].ComLat,
                            lng: data[i].ComLgn,
                            dep: data[i].DepNom,
                            pro: data[i].ProNom,
                            dis: data[i].DisNom,
                        });
                    }

                    this.comisarias = aux;
                })
                .catch( error => console.log(error));
            }
        }
    }
</script>

<style>
    #title-list{
        width: 800px;
        height: 50px;
        background-color: #fff;
        border-radius: 10px;
        border: 1px solid #EAEAEA;
        padding-left: 20px;
        padding-right: 20px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    #title-list span{
        font-size: 14px;
        color: #8F8F8F;
        margin-right: 10px;
    }

    #title-list div{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    .combobox{
        width: 150px;
        height: 30px;
        max-width: 150px;
        border-radius: 10px !important;
        background-color: #2E6FAB !important;
        color: #fff !important;
        font-size: 14px;
        border: none;
        padding: 0 10px;
        font-weight: bold;
    }

    .combobox option{
        color : #8f8f8f;
        background-color: #fff;
        font-size: 14px;
        height: 30px;
        border-bottom: 1px solid #EAEAEA;
        width: 130px;
        text-overflow: ellipsis;
    }

    #list{
        background-color: #fff;
        border: 1px solid #EAEAEA;
        width: 800px;
        height: 450px;
        box-shadow: 0 4px 4px rgba(143,143,143,.25);
        padding: 20px;
        overflow: auto;
    }



</style>
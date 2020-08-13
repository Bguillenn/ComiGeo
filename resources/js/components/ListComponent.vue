<template>
    <div>
        <div id="title-list">
            <!-- Primer combobox departamentos-->
            <div>
                <span class="cbx-label">Departamento: </span>
                <div class="custom-select">
                    <select name="departamentos" id="dep" v-model="cbxDepartamento">
                        <option :key="index" v-for="(d,index) in this.departamentos" :value="d.DepCod">
                            {{d.DepNom}}
                        </option>
                    </select>
                </div>
            </div>
            <!-- Segundo combobox provincias -->
            <div>
                <span class="cbx-label">Provincia: </span>
                <div class="custom-select">
                    <select name="provincias" id="pro" v-model="cbxProvincia">
                        <option value="">Cualquiera</option>
                        <option :key="index" v-for="(p,index) in this.provincias" :value="p.ProCod">
                            {{p.ProNom}}
                        </option>
                    </select>
                </div>
            </div>
            <!-- Tercer combobox distritos -->
            <div>
                <span class="cbx-label">Departamento: </span>
                <div class="custom-select">
                    <select name="departamentos" id="dep" v-model="cbxDepartamento">
                        <option value="">Cualquiera</option>
                        <option :key="index" v-for="(d,index) in this.departamentos" :value="d.DepCod">
                            {{d.DepNom}}
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div id="list">

        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                departamentos: [],
                provincias: [],
                distritos: []
            }
        },
        mounted() {
            console.log('Component mounted.')
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
        font-size: 16x;
        color: #484848;
        font-weight: bold;
    }

    #list{
        background-color: #fff;
        border: 1px solid #EAEAEA;
        width: 800px;
        height: 450px;
        box-shadow: 0 4px 4px rgba(143,143,143,.25);
    }
</style>
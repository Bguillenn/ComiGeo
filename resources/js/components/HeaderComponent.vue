<template>
    <div id="header">
        <div id="logo">
            <img src="https://res.cloudinary.com/dtg90uzhc/image/upload/c_scale,w_210/v1594699993/comigeo/ugvpuhf3xu8o3rvgaeii.svg" alt="Comigeo-Logo" width="210px">
        </div>
        <div id="flex-between">
            <search-component v-on:itemSelect="itemSelect"> </search-component>
            <div id="view-toggler">
                <span>Cambiar de vista</span>
                <div id="radios-button">
                    <input type="radio" id="radioList" name="radioView">
                    <label for="radioList" id="labelRadioList">
                        <img src="https://res.cloudinary.com/dtg90uzhc/image/upload/v1597093411/comigeo/s0oqdiisndnltyprsasw.png" alt="list-icon">
                    </label>

                    <input type="radio" id="radioMap" name="radioView" checked>
                    <label for="radioMap" id="labelRadioMap">
                        <img src="https://res.cloudinary.com/dtg90uzhc/image/upload/v1597093411/comigeo/cqk8tktojg9jqrmjetw9.png" alt="map-icon">
                    </label>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            itemSelect: function(value){
                console.log("Manejando desde HC "+value.lat+" "+value.lng+" "+value.id);
                this.$emit('itemSelect', value);
            }
        }
    }
</script>

<style>
    #header{
        width: 100%;
        height: 80px;
        padding-left: 60px;
        padding-right: 60px;
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    #flex-between{
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        font-size: 14px;
    }

    #view-toggler{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    #radios-button{
        margin-left: 10px;
        display:flex;
    }

    #radios-button input[type="radio"] {
        opacity: 0;
        position: fixed;
        width: 0;
    }

    #radios-button label {
        background-color: #fff;
        border: 1px solid #EAEAEA;
        width: 70px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: .3s ease-in-out;
    }

    #radios-button input[type="radio"]:checked + label {
        background-color:#2E6FAB;
    }

    #labelRadioList{
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
        border-right: none;
    }
    #labelRadioMap{
        border-top-right-radius: 30px;
        border-bottom-right-radius: 30px;
        border-left: none;
    }
</style>



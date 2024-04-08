<template>
    <div class="card">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Ordre</th>
                <th scope="col">Descripcio</th>
                <th scope="col">Actiu</th>
              </tr>
            </thead>
            <tbody>
                <tr v-for="modul in moduls" v-if="modul.id === 7">
                    <td>{{modul.codi}}</td>
                    <td>{{modul.sigles}}</td>
                    <td>{{modul.nom}}</td>
                    <td>{{modul.actiu}}</td>
                    <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="ac" value="actiu" :checked="modul.actiu">
                        <label class="form-check-label" for="ac"></label>
                    </div>
                    </td>
                    <td>
                        <!-- <form class="float-right"> -->
                        <button  class="btn btn-sm btn-secondary" @click="confirmPuntuar(modul)">
                        <i class="fa fa-edit" aria-hidden="true">Puntuar</i></button>
                        <!-- </form> -->
                    </td>
                </tr>     
            </tbody>
            <!-- <a href="{{ url('/create')}}" class="btn btn-primary btn-float-afegir"><i class="fa fa-plus-circle" aria-hidden="true">Nou cicle</i></a> -->
        </table>
    </div>
    <div class="modal" tabindex="-1" id="puntuarModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Puntuar Modulo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Resultats Aprenentatge</th>
                        <th scope="col">Criteris Avaluacio</th>
                        <th scope="col">Rubriques</th>
                      </tr>
                    </thead>
                    <tbody>
                        <!-- Resultats Aprenentatge -->
                        <tr v-for="ra in ras">
                            <td>{{ra.descripcio}}</td>
                            <tr v-for="ca in cas">
                                <td>{{ca.descripcio}}</td>
                            </tr> 
                            <!-- <td v-for="ca in cas">{{ca.descripcio}}</td> -->
                            <!-- <td v-for="ru in rus">{{ru.descripcio}}</td> -->
                        </tr> 
                        <!-- Criteris Avaluacio -->
                        <tr v-for="ca in cas">
                            <td>{{ca.descripcio}}</td>
                        </tr> 
                        <!-- Rubriques -->
                        <!-- <tr v-for="ru in rus">
                            <td>{{ru.descripcio}}</td>
                        </tr>    -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" @click="puntuar()">Aceptar</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
</template>
<script>
import * as bootstrap from 'bootstrap'


export default {
    data(){
        return {
            moduls: [],
            myModal: {}, 
            modul: {},
            ras: [],
            cas: [],
            rus: [],
        }
    }, 
    methods: {
        selectModuls() {

        },
        confirmPuntuar(modul) {
            this.modul = modul
            this.myModal = new bootstrap.Modal('#puntuarModal')
            this.myModal.show()
            // this.selectModuls(this.modul)
        },
        puntuar() {
            const me = this
            axios
                .get('avaluacio')
                .then(response =>{
                    me.moduls = response.data
                })
        }
    },
    created() {
        const me = this
        axios
        // /' + this.modul.id
            .get('avaluacio')
            .then(response =>{
                me.moduls = response.data
            })
        axios 
            axios.get('resultApren')
            .then(response => {
                // const moduls = this.moduls
                me.ras = response.data
            })
        axios
            .get('criterisAval', {
                params: {
                    ras: this.ras.id
                }
            })
            .then(response => {
                const ras = this.ras

                this.cas = response.data
            })
        axios 
            .get('rubriques')
            .then(response => {
                me.rus = response.data
            })
    }
} 
</script>
<style>
    
</style>
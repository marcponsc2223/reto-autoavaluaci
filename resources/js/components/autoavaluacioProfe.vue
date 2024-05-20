<!-- Crear les vistes i components necessaris per a que els professors puguin consultar les autoavaluacions dels alumnes. -->
<template>
    <div class="card">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Nom user</th>
                <th scope="col">Ordre</th>
                <th scope="col">Sigles</th>
                <th scope="col">Descripcio</th>
              </tr>
            </thead>
            <tbody>
                <template v-for="usuari in usuaris">
                    <tr v-for="modul in usuari.modul">
                        <td>{{usuari.nom_usuari}}</td>
                        <td>{{modul.codi}}</td>
                        <td>{{modul.sigles}}</td>
                        <td>{{modul.nom}}</td>
                        <td>
                            <button  class="btn btn-sm btn-secondary">
                            <i class="fa fa-edit" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#exampleModal" @click="showForms(modul.id, usuari.id)">Modificar</i></button>
                        </td>
                    </tr>   
                </template>
                 
            </tbody>
        </table>
    </div>
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modulo del Alumno</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                        <div class="form"  v-for="rubrica in rubriques" :key="rubrica.id">
                            <div class="form-group" >
                                <h5 for="exampleFormControlInput1">{{rubrica.descripcio}}</h5>
                              </div>
                            
                              <div class="form-grup" v-for="criteri in rubrica.criteris_avaluacio" :key="criteri.id">
                                  <h6>{{ criteri.descripcio }}</h6>
                                   <select class="select" id="selectNotes" name="selects">
                                      <option v-for="rubrica in criteri.rubriques" :key="rubrica.id" :value="rubrica.nivell"  class="rubriquesNotes">{{ rubrica.descripcio}}</option> 
                                  </select> 
                              </div>
                              <div class="form-group">
                    
                              </div>
                        </div>
     
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary">Guardar cambios</button> -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { unset } from 'lodash';

export default {
    data(){
        return {
            moduls: {},
            myModal: {}, 
            modul: {},
            rubriques: {},
            criteris: {},
            usuaris: {},
            notas: []
        }
    }, 
    methods: {
        fetchData() {
        
                         
        },
        showForms(modulId, userId) {
            const me = this
            axios
                .get('avaluacioProfe')
                .then(response =>{
                    me.moduls = response.data
                    // console.log(me.moduls);
                    axios
                        .get('rubriques/' + modulId)
                        .then(response =>{
                            me.rubriques = response.data
                            console.log('rubrica' );

                            me.rubriques.map(rubrica => {
                                rubrica.criteris_avaluacio.map(criteri => {
                                    me.criteris = criteri.descripcio
                                    
                                })
                            })
                        })
                        me.notas = []

                        axios
                        .get('rubriquesUser/' + userId)
                        .then(response =>{
                             console.log(response.data);
                             response.data.forEach(nota => {
                                me.notas.push(nota.pivot.nota)
                                console.log('notas: ' + me.notas);
                             });
                        });
                });
                setTimeout(() => {
                    me.rellenarForm()
                }, 2500);
                
        },
        rellenarForm(){
            let selectedValues = document.getElementsByName('selects');
            let index = 0;

            selectedValues.forEach(selected => {
                selected.value = this.notas[index]
                var options = selected.querySelectorAll('option');
                options.forEach(function(option) {
                    if (option.value === selected.value) {
                        option.selected = true;
                    } else {
                        option.selected = false;
                    }
                });
                index++;
                selected.disabled = true
            });
        },
        showModuls() {
            const me = this
            axios
                .get('modulsAlumne')
                .then(response =>{
                    me.usuaris = response.data
                    console.log(response.data);
                })
        },
        

    },
    mounted() {
        // this.fetchData()
        this.showModuls()
        // this.rellenarForm()
    },
} 
</script>
<style>
    .valores {
        display: inline-flex;
    }
    .form-check {
        display: block;
        min-height: 1.5rem;
        padding-left: 5.5em;
        margin-bottom: 0.125rem;
    }
    .select {
        width: 100%;
    }
</style>
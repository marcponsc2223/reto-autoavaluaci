<template>
    <div class="card">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Ordre</th>
                <th scope="col">Sigles</th>
                <th scope="col">Descripcio</th>
              </tr>
            </thead>
            <tbody>
                <tr v-for="modul in moduls">
                    <td>{{modul.id}}</td>
                    <td>{{modul.codi}}</td>
                    <td>{{modul.sigles}}</td>
                    <td>{{modul.nom}}</td>
                    <td>
                        <button  class="btn btn-sm btn-secondary">
                        <i class="fa fa-edit" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#exampleModal">Modificar</i></button>
                    </td>
                </tr>     
            </tbody>
        </table>
    </div>
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Puntuar Modulo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form v-for="rubrica in rubriques" :key="rubrica.id">
                        <div class="form-group" >
                          <h5 for="exampleFormControlInput1">{{rubrica.descripcio}}</h5>
                        </div>
                        <div class="form-grup" v-for="criteri in rubrica.criteris_avaluacio" :key="criteri.id">
                            <h6>{{ criteri.descripcio }}</h6>
                             <!-- <select class="select"> -->
                                <table v-for="rubrica in criteri.rubriques" :key="rubrica.id">
                                    <tr>
                                        <td>{{ rubrica.descripcio}}</td>
                                    </tr>
                                    <tr>
                                        <td class="valores">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios"  value="1" checked>
                                                <label class="form-check-label" for="1">1</label>    
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" value="2" checked>
                                                <label class="form-check-label" for="2">2</label>    
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" value="3" checked>
                                                <label class="form-check-label" for="3">3</label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                
                                <!-- <option v-for="rubrica in criteri.rubriques" :key="rubrica.id">{{ rubrica.descripcio}}</option> -->
                            <!-- </select>  -->
                        </div>
                        <div class="form-group">
                          <!-- <select class="select">
                            <option v-for="criteri in rubrica.criteris_avaluacio" :key="criteri.id">{{ criteri.descripcio }}</option>
                        </select>                         -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" @click="puntuar()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            moduls: {},
            myModal: {}, 
            modul: {},
            rubriques: {},
            criteris: {},
        }
    }, 
    methods: {
        fetchData() {
            const me = this
            var userId = document.querySelector('meta[name="userId"]').content
            axios
                .get('http://localhost:8080/reto-autoavaluaci-/public/api/avaluacio/' + userId)
                .then(response =>{
                    me.moduls = response.data
                    me.moduls.forEach(id => {
                        axios
                            .get('http://localhost:8080/reto-autoavaluaci-/public/api/rubriques/' + id.id)
                            .then(response =>{
                                me.rubriques = response.data
                                console.log(response.data);

                                me.rubriques.map(rubrica => {
                                    rubrica.criteris_avaluacio.map(criteri => {
                                        me.criteris = criteri.descripcio
                                    })
                                })
                            })  
                    })
                });
                         
        },
        puntuar() {

        }

    },
    mounted() {
        this.fetchData()
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
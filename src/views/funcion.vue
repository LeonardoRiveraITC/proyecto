<template>
  <v-app>
    <div class="card">
      <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Varela"
      />
      <h1 class="title">Funcion</h1>

      <v-switch v-model="toggle" label="Programado" color="green"></v-switch>
      <div v-show="toggle">
        <v-card
          v-for="funcion in funciones"
          :key="funcion.id"
          max-width="550"
          max-height="250"
          outlined
        >
          <v-list-item>
            <v-list-item-content>
              <p>Función: {{ funcion.nombre }}</p>
              <p>Cine: {{ funcion.nombreCine }}</p>
              <p>Fecha: {{ funcion.fecha }}</p>
              <p>Duración: {{ funcion.duracion }}</p>
              <p>Hora de inicio: {{ funcion.horaInicio }}</p>
              <p>Fecha de inicio: {{ funcion.fechaInicio }}</p>
              <p>Fecha de fin:{{ funcion.fechaFin }}</p>
              <p>Clave: {{ funcion.clave }}</p>
            </v-list-item-content>
          </v-list-item>
        </v-card>
      </div>
      <div v-show="!toggle">
        <v-card
          v-for="funcion in funcionesnp"
          :key="funcion.id"
          max-width="550"
          max-height="250"
          outlined
        >
          <v-list-item>
            <v-list-item-content>
              <p>Función: {{ funcion.nombre }}</p>
              <p>Cine: {{ funcion.nombreCine }}</p>
              <p>Fecha: {{ funcion.fecha }}</p>
              <p>Duración: {{ funcion.duracion }}</p>
              <p>Hora de inicio: {{ funcion.horaInicio }}</p>
              <p>Fecha de inicio: {{ funcion.fechaInicio }}</p>
              <p>Fecha de fin:{{ funcion.fechaFin }}</p>
              <p>Clave: {{ funcion.clave }}</p>
            </v-list-item-content>
          </v-list-item>
          <v-card-actions>
            <v-btn
              class="btn-action"
              fab
              x-small
              color="red"
              @click="
                qdelete(
                  funcion.nombre,
                  funcion.nombreCine,
                  funcion.fecha,
                  funcion.duracion,
                  funcion.horaInicio,
                  funcion.fechaInicio,
                  funcion.fechaFin,
                  funcion.clave
                )
              "
            >
              <v-icon dark> mdi-delete </v-icon>
            </v-btn>
          </v-card-actions>
        </v-card>
      </div>
    </div>
  </v-app>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      enteredData:{      funcion: "",
      cine: "",
      fecha: "",
      duracion: "",
      horaInicio: "",
      fechaInicio: "",
      fechaFin: "",
      clave: ""},
      dialog: false,
      funciones: [],
      funcionesnp: [],
      toggle: true,
      clicked: "",
    };
  },
  created() {
    // Creado aquí es equivalente a inicializar los datos de la página de inicio
    axios.get("http://localhost:8000/funcionget.php").then((res) => {
      this.funciones = res.data; // Obtener datos
    });
    axios.get("http://localhost:8000/funcionnpget.php").then((res) => {
      this.funcionesnp = res.data; // Obtener datos
    });
  },
  methods: {
    toFormData(obj) {
      var form_data = new FormData()
      for(var key in obj) {
        form_data.append(key, obj[key])
      }
      return form_data
    },   
      onSubmit() {
      var formData = this.toFormData(this.enteredData)
      axios.post('funcionpost.php', formData)
      .then( response => {
        if (response.data.error) {
          console.log('danger', response.data.message)
        } else {
          console.log('info', response.data.message)
        }
      })
      .catch( error=> {
        console.log.noteMsg('danger', error)
      });
    },
    hide: function () {
      // now we can use the reference to Choices to perform clean up here
      // prior to removing the elements from the DOM
      this.dialog.destroy();
      this.dialog = false;
    },
    qupdate: function (
      nombre,
      nombreCine,
      fecha,
      duracion,
      horaInicio,
      fechaInicio,
      fechaFin,
      clave
    ) {
      console.log(
        nombre,
        nombreCine,
        fecha,
        duracion,
        horaInicio,
        fechaInicio,
        fechaFin,
        clave
      );
    },
    qdelete: function (
      nombre,
      nombreCine,
      fecha,
      duracion,
      horaInicio,
      fechaInicio,
      fechaFin,
      clave
    ) {
      console.log(
        nombre,
        nombreCine,
        fecha,
        duracion,
        horaInicio,
        fechaInicio,
        fechaFin,
        clave
      );
    },
    updatesql: function () {},
  },
};
</script>

<style>
.card {
  font-family: "Varela", sans-serif;
  padding: 0px;
}
.title {
  padding-left: 200px;
}
</style>
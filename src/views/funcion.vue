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
          <v-card-actions>
            <v-dialog v-if="!dialog" max-width="600px" loading>
              <template v-slot:activator="{ on, attrs }">
                <v-btn color="primary" dark v-bind="attrs" v-on="on">
                  Editar
                </v-btn>
              </template>
              <v-card>
                <v-card-title>
                  <span class="text-h5">Actualizar funcion</span>
                </v-card-title>
                <v-card-text>
                  <v-form>
                    <v-container>
                      <v-row>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field label="Funcion" required></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field label="Cine" required></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field label="Fecha"></v-text-field>
                        </v-col>
                        <v-col cols="12">
                          <v-text-field
                            label="Duracion"
                            required
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12">
                          <v-text-field
                            label="Hora de inicio"
                            required
                            hint="Formato HH-MM-SS"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6">
                          <v-text-field
                            label="Fecha de inicio"
                            required
                            hint="Formato YYYY-MM-DD"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6">
                          <v-text-field
                            label="Fecha de fin"
                            required
                            hint="Formato YYYY-MM-DD"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6">
                          <v-text-field label="Clave" required></v-text-field>
                        </v-col>
                      </v-row>
                    </v-container>
                  </v-form>
                  <small>*indicates required field</small>
                </v-card-text>
                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn color="blue darken-1" text @click="dialog = true">
                    Actualizar
                  </v-btn>
                </v-card-actions>
              </v-card>
            </v-dialog>
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
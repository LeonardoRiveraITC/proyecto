<template>
  <div class="card">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Varela"
    />
    <v-app>
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
              <p>{{ funcion.nombre }}</p>
              <p>{{ funcion.nombreCine }}</p>
              <p>{{ funcion.descripcion }}</p>
              <p>{{ funcion.fecha }}</p>
              <p>{{ funcion.duracion }}</p>
              <p>{{ funcion.horaInicio }}</p>
              <p>{{ funcion.fechaInicio }}</p>
              <p>{{ funcion.fechaFin }}</p>
              <p>{{ funcion.descripcion }}</p>
              <p>{{ funcion.clave }}</p>
            </v-list-item-content>
          </v-list-item>
          <v-card-actions>
            <v-btn class="btn-action" fab x-small color="cyan">
              <v-icon dark> mdi-pencil </v-icon>
            </v-btn>
            <v-btn class="btn-action" fab x-small color="red">
              <v-icon dark> mdi-delete </v-icon>
            </v-btn>
          </v-card-actions>
        </v-card>
      </div>
    </v-app>
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
            <p>{{ funcion.nombre }}</p>
            <p>{{ funcion.nombreCine }}</p>
            <p>{{ funcion.descripcion }}</p>
            <p>{{ funcion.fecha }}</p>
            <p>{{ funcion.duracion }}</p>
            <p>{{ funcion.horaInicio }}</p>
            <p>{{ funcion.descripcion }}</p>
            <p>{{ funcion.clave }}</p>
          </v-list-item-content>
        </v-list-item>
        <v-app>
          <v-card-actions>
            <v-btn class="btn-action" fab x-small color="cyan">
              <v-icon dark> mdi-pencil </v-icon>
            </v-btn>
            <v-btn class="btn-action" fab x-small color="red">
              <v-icon dark> mdi-delete </v-icon>
            </v-btn>
          </v-card-actions>
        </v-app>
      </v-card>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      funciones: [],
      funcionesnp: [],
      toggle: true,
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
  components: {},
};
</script>

<style>
.card {
  font-family: "Varela", sans-serif;
  padding: 0px;
}
</style>
<template>
  <div class="card">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Varela"
    />
    <h1 class=title>Horario</h1>
    <v-card
      v-for="horario in horarios"
      :key="horario.id"
      max-width="550"
      max-height="300"
      outlined
    >
      <v-list-item>
        <v-list-item-content>
          <p>Direccion: {{ horario.direccion }}</p>
          <p>Primer funcion:{{ horario.primeraFuncion }}</p>
          <p>Ultima funcion: {{ horario.ultimaFuncion }}</p>
          <p>Duracion de la publicidad: {{ horario.duracionPublicidad}} minutos </p>

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
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      horarios: [],
    };
  },
  created() {
    // Creado aquí es equivalente a inicializar los datos de la página de inicio
    axios.get("http://localhost:8000/horariosget.php").then((res) => {
      this.horarios = res.data; // Obtener datos
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
.title{
  padding-left:200px ;
  
}
</style>
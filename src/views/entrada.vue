<template>
  <div class="card">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Varela"
    />
    <h1 class="title">Entrada</h1>
    <v-card
      v-for="actor in actores"
      :key="actor.id"
      max-width="550"
      max-height="200"
      outlined
    >
      <v-list-item>
        <v-list-item-content>
          <p>Clave: {{ actor.numero }}</p>
          <p>Primer funcion: {{ actor.asiento }}</p>
          <p>Ultima funcion: {{ actor.claveFuncion }}</p>
          <p>Productora: {{ actor.claveTipoEntrada }}</p>
        </v-list-item-content>
      </v-list-item>
      <v-app>
        <v-card-actions>
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
      actores: [],
    };
  },
  created() {
    // Creado aquí es equivalente a inicializar los datos de la página de inicio
    axios.get("http://localhost:8000/admentrada.php").then((res) => {
      this.actores = res.data; // Obtener datos
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
.title {
  padding-left: 200px;
}
</style>
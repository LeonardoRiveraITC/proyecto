<template>
  <div class="card">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Varela"
    />
    <h1 class="title">Pelicula</h1>
    <v-card
      v-for="pelicula in peliculas"
      :key="pelicula.id"
      max-width="550"
      max-height="200"
      outlined
    >
      <v-list-item>
        <v-list-item-content>
          <p>Pelicula: {{ pelicula.nombre }}</p>
          <p>Fecha de estreno: {{ pelicula.fechaEstreno }}</p>
          <p>Productora: {{ pelicula.nombreProd }}</p>
          <p>Dirección: {{ pelicula.nombreDir }}</p>
          <p>Pais: {{ pelicula.nombrePais }}</p>
          <p>Descripcion: {{ pelicula.descripcion }}</p>
        </v-list-item-content>
      </v-list-item>
      <v-app>
      </v-app>
    </v-card>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      peliculas: [],
    };
  },
  created() {
    // Creado aquí es equivalente a inicializar los datos de la página de inicio
    axios.get("http://localhost:8000/peliculasget.php").then((res) => {
      this.peliculas = res.data; // Obtener datos
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
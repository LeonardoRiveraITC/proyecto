<template>
  <div class="card">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Varela"
    />

    <v-card
      v-for="actor in actores"
      :key="actor.id"
      max-width="550"
      max-height="200"
      outlined
    >
      <v-list-item>
        <v-list-item-content>
          <p>{{ actor.nombre }}</p>
          <p>{{ actor.nombrePel }}</p>
          <p>{{ actor.descripcion }}</p>
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
      actores: [],
    };
  },
  created() {
    // Creado aquí es equivalente a inicializar los datos de la página de inicio
    axios.get("http://localhost:8000/actoresget.php").then((res) => {
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
</style>
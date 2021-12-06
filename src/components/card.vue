<template>
  <div class="card">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Varela"
    />
    <h3>Nombre</h3>

    <v-card v-for="usuario in usuarios" :key="usuario.id" max-width="550" max-height="170" outlined>
      <v-list-item>
        <v-list-item-content>
            <p>Nombre: {{usuario.nombre}}</p>
                <p>Apellido: {{usuario.apellido}}</p>
            <p>edad: {{usuario.edad}}</p>
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
      usuarios: [],
    };
  },
  created() {
    // Creado aquí es equivalente a inicializar los datos de la página de inicio
    axios.get("http://localhost:8000/axios.php").then((res) => {
      this.usuarios= res.data; // Obtener datos
      console.log("success");
      console.log(this.usuarios);
    });
  },
  components: {}
};
</script>

<style scoped>
.card {
  font-family: "Varela", sans-serif;
  padding: 0px;
}
</style>
<template>
  <div class="card">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Varela"
    />
   <h1 class=title>Boletos</h1>
    <v-card
      v-for="boleto in boletos"
      :key="boleto.id"
      max-width="550"
      max-height="300"
      outlined
    >
      <v-list-item>
        <v-list-item-content>
          <p>Asiento: {{ boleto.asiento }}</p>
          <p>Boleto: {{ boleto.descripcion }}</p>
          <p>Precio: {{ boleto.precio }}</p>
          <p>Fecha: {{ boleto.fecha }}</p>
          <p>Hora de inicio: {{ boleto.horaInicio }}</p>
          <p>Nombre: {{ boleto.nombre }}</p>
          <p>Clave: {{ boleto.clave }}</p>
          <p>Cine: {{ boleto.nombreCine }}</p>
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
      boletos: [],
    };
  },
  created() {
    // Creado aquí es equivalente a inicializar los datos de la página de inicio
    axios.get("http://localhost:8000/boletosget.php").then((res) => {
      this.boletos = res.data; // Obtener datos
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
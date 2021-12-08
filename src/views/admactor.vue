<template>
  <div class="card">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Varela"
    />
    <h1 class="title">Actores</h1>
    <v-card
      v-for="actor in actores"
      :key="actor.id"
      max-width="550"
      max-height="200"
      outlined
    >
      <v-list-item>
        <v-list-item-content>
          <p>Clave: {{ actor.clave }}</p>
          <p>Nombre: {{ actor.edad }}</p>
          <p>Edad: {{ actor.nombre }}</p>
          <p>Edad: {{ actor.sexo }}</p>
        </v-list-item-content>
      </v-list-item>
      <v-app>
        <v-card-actions>
          <v-dialog v-if="!dialog" max-width="600px" loading>
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="primary" dark v-bind="attrs" v-on="on">
                Agregar
              </v-btn>
            </template>
            <v-card>
              <v-card-title>
                <span class="text-h5">Agregar funcion</span>
              </v-card-title>
              <v-card-text>
                <v-form>
                  <v-container>
                    <v-row>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          label="Clave"
                          required
                          v-model="enteredData.clave"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          label="Fecha"
                          required
                          v-model="enteredData.fecha"
                          hint="Formato YYYY-MM-DD"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          label="Duracion"
                          v-model="enteredData.duracion"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12">
                        <v-text-field
                          label="Hora inicio"
                          required
                          v-model="enteredData.horaInicio"
                          hint="Formato HH-MM-SS"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12">
                        <v-text-field
                          v-model="enteredData.clavePelicula"
                          label="Clave Pelicula"
                          required
                          hint="Formato HH-MM-SS"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <v-text-field
                          v-model="enteredData.claveProgramacion"
                          label="clave Programacion"
                          required
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <v-text-field
                          v-model="enteredData.claveSala"
                          label="Clave Sala"
                          required
                          hint="Formato YYYY-MM-DD"
                        ></v-text-field>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="onSubmit">
                  Actualizar
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
          <v-dialog v-if="!dialog" max-width="600px" loading>
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="primary" dark v-bind="attrs" v-on="on">
                Editar
              </v-btn>
            </template>
            <v-card>
              <v-card-title>
                <span class="text-h5">Editar funcion a partir de clave</span>
              </v-card-title>
              <v-card-text>
                <v-form>
                  <v-container>
                    <v-row>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          required
                          v-model="enteredData.clave"
                          disabled
                          >}</v-text-field
                        >
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          label="Fecha"
                          required
                          v-model="enteredData.fecha"
                          hint="Formato YYYY-MM-DD"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          label="Duracion"
                          v-model="enteredData.duracion"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12">
                        <v-text-field
                          label="Hora inicio"
                          required
                          v-model="enteredData.horaInicio"
                          hint="Formato HH-MM-SS"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12">
                        <v-text-field
                          v-model="enteredData.clavePelicula"
                          label="Clave Pelicula"
                          required
                          hint="Formato HH-MM-SS"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <v-text-field
                          v-model="enteredData.claveProgramacion"
                          label="clave Programacion"
                          required
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <v-text-field
                          v-model="enteredData.claveSala"
                          label="Clave Sala"
                          required
                          hint="Formato YYYY-MM-DD"
                        ></v-text-field>
                      </v-col>
                    </v-row>
                  </v-container>
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                  color="blue darken-1"
                  text
                  @click="onUpdate(actor.clave)"
                >
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
            @click="onDelete(actor.clave)"
          >
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
      enteredData: {
        clave: "",
        nombre: "",
        edad: "",
        sexo: "",
      },
    };
  },
  created() {
    // Creado aquí es equivalente a inicializar los datos de la página de inicio
    axios.get("http://localhost:8000/admactor.php").then((res) => {
      this.actores = res.data; // Obtener datos
    });
  },
  methods: {
    toFormData(obj) {
      var form_data = new FormData();
      for (var key in obj) {
        form_data.append(key, obj[key]);
      }
      return form_data;
    },
    onSubmit() {
      var formData = this.toFormData(this.enteredData);
      axios
        .post("http://localhost:8000/actorpost.php", formData)
        .then((response) => {
          if (response.data.error) {
            console.log("danger", response.data.message);
          } else {
            console.log("info", response.data.message);
          }
        })
        .catch((error) => {
          console.log.noteMsg("danger", error);
        });
    },
    onUpdate(clave) {
      this.show = clave;
      this.enteredData.clave = clave;
      var formData = this.toFormData(this.enteredData);
      axios
        .post("http://localhost:8000/actorupdate.php", formData)
        .then((response) => {
          if (response.data.error) {
            console.log("danger", response.data.message);
          } else {
            console.log("info", response.data.message);
          }
        })
        .catch((error) => {
          console.log.noteMsg("danger", error);
        });
    },
    onDelete(clave) {
      this.show = clave;
      this.enteredData.clave = clave;
      var formData = this.toFormData(this.enteredData);
      axios
        .post("http://localhost:8000/actorDelete.php", formData)
        .then((response) => {
          if (response.data.error) {
            console.log("danger", response.data.message);
          } else {
            console.log("info", response.data.message);
          }
        })
        .catch((error) => {
          console.log.noteMsg("danger", error);
        });
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
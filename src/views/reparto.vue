<template>
  <div class="card">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Varela"
    />
    <h1 class="title">Reparto</h1>
    <v-card
      v-for="actor in actores"
      :key="actor.id"
      max-width="550"
      max-height="200"
      outlined
    >
      <v-list-item>
        <v-list-item-content>
          <p>Clave de personaje: {{ actor.clavePersonaje }}</p>
          <p>Clave de pelicula: {{ actor.clavePelicula }}</p>
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
                  <span class="text-h5">Agregar reparto</span>
                </v-card-title>
                <v-card-text>
                  <v-form>
                    <v-container>
                      <v-row>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field
                            label="Clave de Personaje"
                            required
                            v-model="enteredData.clavePersonaje"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field
                            label="Clave de Pelicula"
                            required
                            v-model="enteredData.clavePelicula"
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
                  <span class="text-h5">Editar reparto a partir de clave</span>
                </v-card-title>
                <v-card-text>
                  <v-form>
                    <v-container>
                      <v-row>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field
                            label="Clave de Personaje"
                            required
                            v-model="enteredData.clavePersonaje"
                            disabled
                          >}</v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field
                            label="Clave de Pelicula"
                            required
                            v-model="enteredData.clavePelicula"
                          ></v-text-field>
                        </v-col>
                      </v-row>
                    </v-container>
                  </v-form>
                </v-card-text>
                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn color="blue darken-1" text @click="onUpdate(actor.clavePersonaje)">
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
            @click="onDelete(actor.clavePersonaje)"
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
            show: "",
      enteredData: {
        clavePersonaje: "",
        clavePelicula: "",
      },
    };
  },
  created() {
    // Creado aquí es equivalente a inicializar los datos de la página de inicio
    axios.get("http://localhost:8000/admreparto.php").then((res) => {
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
        .post("http://localhost:8000/repartopost.php", formData)
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
        .post("http://localhost:8000/repartoUpdate.php", formData)
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
        .post("http://localhost:8000/repartoDelete.php", formData)
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
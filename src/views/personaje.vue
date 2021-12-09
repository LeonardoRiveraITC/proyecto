<template>
  <div class="card">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Varela"
    />
    <h1 class="title">Personaje</h1>
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
          <p>Nombre: {{ actor.nombre }}</p>
          <p>Clave actor: {{ actor.claveActor }}</p>
          <p>Clave rol: {{ actor.claveRol }}</p>
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
                <span class="text-h5">Agregar Personaje</span>
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
                          label="Nombre"
                          required
                          v-model="enteredData.nombre"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          label="Clave actor"
                          v-model="enteredData.claveActor"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12">
                        <v-text-field
                          label="Clave Rol"
                          required
                          v-model="enteredData.claveRol"
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
                <span class="text-h5">Editar personaje a partir de clave</span>
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
                          label="Nombre"
                          required
                          v-model="enteredData.nombre"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          label="Clave actor"
                          v-model="enteredData.claveActor"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12">
                        <v-text-field
                          label="Clave rol"
                          required
                          v-model="enteredData.claveRol"
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
                <notification :message="message" :snackbar="snackbar"/> 
      </v-app>
    </v-card>
  </div>
</template>

<script>
import axios from "axios";
import notification from '../components/notification.vue';
export default {
    components: { notification },
  data() {
    return {
            snackbar: false,
      message: "",
      actores: [],
      show: "",
      enteredData: {
        clave: "",
        nombre: "",
        claveActor: "",
        claveRol: "",
      },
    };
  },
  created() {
    // Creado aquí es equivalente a inicializar los datos de la página de inicio
    axios.get("http://localhost:8000/admpersonaje.php").then((res) => {
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
        .post("http://localhost:8000/personajepost.php", formData)
        .then((response) => {
          if (response.data.error) {
            this.snackbar=true;
            this.message=("Danger: "+ response.data.message.toString() );
          } else {
            this.snackbar=true;
            this.message=("Info: "+ response.data.message.toString());
          }
        })
        .catch((error) => {
          this.snackbar=true;
          this.message=("Danger: "+ error.toString());
        });
    },
    onUpdate(clave) {
      this.show = clave;
      this.enteredData.clave = clave;
      var formData = this.toFormData(this.enteredData);
      axios
        .post("http://localhost:8000/personajeUpdate.php", formData)
        .then((response) => {
          if (response.data.error) {
            this.snackbar=true;
            this.message=("Danger: "+ response.data.message.toString() );
          } else {
            this.snackbar=true;
            this.message=("Info: "+ response.data.message.toString());
          }
        })
        .catch((error) => {
          this.snackbar=true;
          this.message=("Danger: "+ error.toString());
        });
    },
        onDelete(clave) {
      this.show = clave;
      this.enteredData.clave = clave;
      var formData = this.toFormData(this.enteredData);
      axios
        .post("http://localhost:8000/personajeDelete.php", formData)
        .then((response) => {
          if (response.data.error) {
            this.snackbar=true;
            this.message=("Danger: "+ response.data.message.toString() );
          } else {
            this.snackbar=true;
            this.message=("Info: "+ response.data.message.toString());
          }
        })
        .catch((error) => {
          this.snackbar=true;
          this.message=("Danger: "+ error.toString());
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
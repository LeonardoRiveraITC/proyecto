<template>
  <div class="card">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Varela"
    />
    <h1 class="title">Horario</h1>
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
          <p>Primer funcion: {{ actor.primeraFuncion }}</p>
          <p>Ultima funcion: {{ actor.ultimaFuncion }}</p>
          <p>Duracion de la publicidad: {{ actor.duracionPublicidad }}</p>
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
                <span class="text-h5">Agregar Horarios</span>
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
                      <!-- RELOJ  UNO -->
                      <v-col cols="12" sm="6" md="4">
                        <v-menu
                          ref="menu"
                          v-model="menu1"
                          :close-on-content-click="false"
                          :nudge-right="40"
                          :return-value.sync="time"
                          transition="scale-transition"
                          offset-y
                          max-width="290px"
                          min-width="290px"
                        >
                          <template v-slot:activator="{ on, attrs }">
                            <v-text-field
                              v-model="enteredData.primeraFuncion"
                              label="Hora"
                              prepend-icon="mdi-clock-time-four-outline"
                              readonly
                              v-bind="attrs"
                              v-on="on"
                            ></v-text-field>
                          </template>
                          <v-time-picker
                            format="24hr"
                            use-seconds
                            v-if="menu1"
                            v-model="enteredData.primeraFuncion"
                            full-width
                            @click:minute="$refs.menu.save(time)"
                          ></v-time-picker>
                        </v-menu>
                      </v-col>
                      <!-- fin reloj uno  -->
                      <!-- reloj dos  -->
                      <v-col cols="12" sm="6" md="4">
                        <v-menu
                          ref="menu"
                          v-model="menu2"
                          :close-on-content-click="false"
                          :nudge-right="40"
                          :return-value.sync="time"
                          transition="scale-transition"
                          offset-y
                          max-width="290px"
                          min-width="290px"
                        >
                          <template v-slot:activator="{ on, attrs }">
                            <v-text-field
                              v-model="enteredData.ultimaFuncion"
                              label="Hora"
                              prepend-icon="mdi-clock-time-four-outline"
                              readonly
                              v-bind="attrs"
                              v-on="on"
                            ></v-text-field>
                          </template>
                          <v-time-picker
                            format="24hr"
                            use-seconds
                            v-if="menu2"
                            v-model="enteredData.ultimaFuncion"
                            full-width
                            @click:minute="$refs.menu.save(time)"
                          ></v-time-picker>
                        </v-menu>
                      </v-col>

                      <!-- fin reloj dos  -->
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          label="Duracion de Publicidad (Minutos)"
                          required
                          v-model="enteredData.duracionPublicidad"
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
                  @click="onSubmit(actor.clave)"
                >
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
                <span class="text-h5">Editar horario a partir de clave</span>
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
                      <!-- RELOJ  UNO -->
                      <v-col cols="12" sm="6" md="4">
                        <v-menu
                          ref="menu"
                          v-model="menu3"
                          :close-on-content-click="false"
                          :nudge-right="40"
                          :return-value.sync="time"
                          transition="scale-transition"
                          offset-y
                          max-width="290px"
                          min-width="290px"
                        >
                          <template v-slot:activator="{ on, attrs }">
                            <v-text-field
                              v-model="enteredData.primeraFuncion"
                              label="Hora"
                              prepend-icon="mdi-clock-time-four-outline"
                              readonly
                              v-bind="attrs"
                              v-on="on"
                            ></v-text-field>
                          </template>
                          <v-time-picker
                            format="24hr"
                            use-seconds
                            v-if="menu3"
                            v-model="enteredData.primeraFuncion"
                            full-width
                            @click:minute="$refs.menu.save(time)"
                          ></v-time-picker>
                        </v-menu>
                      </v-col>
                      <!-- fin reloj uno  -->
                      <!-- reloj dos  -->
                      <v-col cols="12" sm="6" md="4">
                        <v-menu
                          ref="menu"
                          v-model="menu4"
                          :close-on-content-click="false"
                          :nudge-right="40"
                          :return-value.sync="time"
                          transition="scale-transition"
                          offset-y
                          max-width="290px"
                          min-width="290px"
                        >
                          <template v-slot:activator="{ on, attrs }">
                            <v-text-field
                              v-model="enteredData.ultimaFuncion"
                              label="Hora"
                              prepend-icon="mdi-clock-time-four-outline"
                              readonly
                              v-bind="attrs"
                              v-on="on"
                            ></v-text-field>
                          </template>
                          <v-time-picker
                            format="24hr"
                            use-seconds
                            v-if="menu4"
                            v-model="enteredData.ultimaFuncion"
                            full-width
                            @click:minute="$refs.menu.save(time)"
                          ></v-time-picker>
                        </v-menu>
                      </v-col>

                      <!-- fin reloj dos  -->
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          label="Duracion de Publicidad (Minutos)"
                          required
                          v-model="enteredData.duracionPublicidad"
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
        <notification :message="message" :snackbar="snackbar" />
      </v-app>
    </v-card>
  </div>
</template>

<script>
import notification from "../components/notification.vue";
import axios from "axios";
export default {
        components: { notification },
  data() {
    return {
      snackbar: false,
      message: "",
      menu1: false,
      menu2: false,
      menu3: false,
      menu4: false,
      show: "",
      enteredData: {
        clave: "",
        primeraFuncion: "",
        ultimaFuncion: "",
        duracionPublicidad: "",
      },
      actores: [],
    };
  },
  created() {
    // Creado aquí es equivalente a inicializar los datos de la página de inicio
    axios.get("http://localhost:8000/admhorario.php").then((res) => {
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
        .post("http://localhost:8000/horariopost.php", formData)
        .then((response) => {
          if (response.data.error) {
            this.snackbar = true;
            this.message = "Danger: " + response.data.message.toString();
          } else {
            this.snackbar = true;
            this.message = "Info: " + response.data.message.toString();
          }
        })
        .catch((error) => {
          this.snackbar = true;
          this.message = "Danger: " + error.toString();
        });
    },
    onUpdate(clave) {
      this.show = clave;
      this.enteredData.clave = clave;
      var formData = this.toFormData(this.enteredData);
      axios
        .post("http://localhost:8000/horarioUpdate.php", formData)
        .then((response) => {
          if (response.data.error) {
            this.snackbar = true;
            this.message = "Danger: " + response.data.message.toString();
          } else {
            this.snackbar = true;
            this.message = "Info: " + response.data.message.toString();
          }
        })
        .catch((error) => {
          this.snackbar = true;
          this.message = "Danger: " + error.toString();
        });
    },
    onDelete(clave) {
      this.show = clave;
      this.enteredData.clave = clave;
      var formData = this.toFormData(this.enteredData);
      axios
        .post("http://localhost:8000/horarioDelete.php", formData)
        .then((response) => {
          if (response.data.error) {
            this.snackbar = true;
            this.message = "Danger: " + response.data.message.toString();
          } else {
            this.snackbar = true;
            this.message = "Info: " + response.data.message.toString();
          }
        })
        .catch((error) => {
          this.snackbar = true;
          this.message = "Danger: " + error.toString();
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
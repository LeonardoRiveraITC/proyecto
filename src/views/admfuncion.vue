<template>
  <div class="card">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Varela"
    />
    <h1 class="title">Funcion</h1>
    <v-card
      v-for="actor in actores"
      :key="actor.id"
      max-width="550"
      max-height="230"
      outlined
    >
      <v-list-item>
        <v-list-item-content>
          <p>Clave: {{ actor.clave }}</p>
          <p>Fecha: {{ actor.fecha }}</p>
          <p>Duracion: {{ actor.duracion }}</p>
          <p>Hora de inicio: {{ actor.horaInicio }}</p>
          <p>Clave de pelicula: {{ actor.clavePelicula }}</p>
          <p>Clave de programacion: {{ actor.claveProgramacion }}</p>
          <p>Clave de sala: {{ actor.claveSala }}</p>
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
                       <!-- calendar inicio  -->
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          label="Clave"
                          required
                          v-model="enteredData.clave"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">


                        <v-menu
                          v-model="menu2"
                          :close-on-content-click="false"
                          :nudge-right="40"
                          transition="scale-transition"
                          offset-y
                          min-width="auto"
                        >
                          <template v-slot:activator="{ on, attrs }">
                            <v-text-field
                              v-model="enteredData.fecha"
                              label="Seleccione una fecha"
                              prepend-icon="mdi-calendar"
                              readonly
                              v-bind="attrs"
                              v-on="on"
                            ></v-text-field>
                          </template>
                          <v-date-picker
                            v-model="enteredData.fecha"
                            @input="menu2 = false"
                          ></v-date-picker>
                        </v-menu>


                      </v-col> 
                      <!-- calendar fin  -->
                      <!-- reloj  inicio-->
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
                                  v-model="enteredData.horaInicio"
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
                                v-model="enteredData.horaInicio"
                                full-width
                                @click:minute="$refs.menu.save(time)"
                              ></v-time-picker>
                            </v-menu>

                        
                      </v-col>
                      <!-- reloj fin  -->
                      <v-col cols="12">
                        <v-text-field
                          label="Duracion"
                          required
                          v-model="enteredData.duracion"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12">
                        <v-text-field
                          v-model="enteredData.clavePelicula"
                          label="Clave Pelicula"
                          required
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



                        <v-menu
                          v-model="menu4"
                          :close-on-content-click="false"
                          :nudge-right="40"
                          transition="scale-transition"
                          offset-y
                          min-width="auto"
                        >
                          <template v-slot:activator="{ on, attrs }">
                            <v-text-field
                              v-model="enteredData.fecha"
                              label="Seleccione una fecha"
                              prepend-icon="mdi-calendar"
                              readonly
                              v-bind="attrs"
                              v-on="on"
                            ></v-text-field>
                          </template>
                          <v-date-picker
                            v-model="enteredData.fecha"
                            @input="menu4 = false"
                          ></v-date-picker>
                        </v-menu>




                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          label="Duracion"
                          v-model="enteredData.duracion"
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                          <v-menu
                              ref="menu"
                              v-model="menu5"
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
                                  v-model="enteredData.horaInicio"
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
                                v-if="menu5"
                                v-model="enteredData.horaInicio"
                                full-width
                                @click:minute="$refs.menu.save(time)"
                              ></v-time-picker>
                            </v-menu>

                        
                      </v-col>
                      <v-col cols="12">
                        <v-text-field
                          v-model="enteredData.clavePelicula"
                          label="Clave Pelicula"
                          required
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
      menu3: false,
      menu2: false,
      menu4: false,
      menu5: false,
      show: "",
      enteredData: {
        clave: "",
        fecha: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
        .toISOString()
        .substr(0, 10),
        duracion: "",
        horaInicio:"",
        clavePelicula: "",
        claveProgramacion: "",
        claveSala: "",
      },
      actores: [],
    };
  },
  created() {
    // Creado aquí es equivalente a inicializar los datos de la página de inicio
    axios.get("http://localhost:8000/admfuncion.php").then((res) => {
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
        .post("http://localhost:8000/funcionpost.php", formData)
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
        .post("http://localhost:8000/funcionupdate.php", formData)
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
        .post("http://localhost:8000/funcionDelete.php", formData)
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
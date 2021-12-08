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
          <p>Numero: {{ actor.numero }}</p>
          <p>Asiento: {{ actor.asiento }}</p>
          <p>Clave: {{ actor.claveFuncion }}</p>
          <p>Tipo entrada: {{ actor.claveTipoEntrada }}</p>
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
                  <span class="text-h5">Agregar Actor</span>
                </v-card-title>
                <v-card-text>
                  <v-form>
                    <v-container>
                      <v-row>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field
                            label="Numero"
                            required
                            v-model="enteredData.numero"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field
                            label="Asiento"
                            required
                            v-model="enteredData.asiento"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field
                            label="Funcion"
                            v-model="enteredData.claveFuncion"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12">
                          <v-text-field
                            label="Clave de tipo de entrada"
                            required
                            v-model="enteredData.claveTipoEntrada"
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
                  <span class="text-h5">Editar actor a partir de clave</span>
                </v-card-title>
                <v-card-text>
                  <v-form>
                    <v-container>
                      <v-row>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field
                            required
                            v-model="enteredData.numero"
                            disabled
                          >}</v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field
                            label="Nombre"
                            required
                            v-model="enteredData.asiento"
                            hint="Formato YYYY-MM-DD"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6" md="4">
                          <v-text-field
                            label="Edad"
                            v-model="enteredData.claveFuncion"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="12">
                          <v-text-field
                            label="Sexo"
                            required
                            v-model="enteredData.claveTipoEntrada"
                          ></v-text-field>
                          </v-col>
                      </v-row>
                    </v-container>
                  </v-form>
                </v-card-text>
                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn color="blue darken-1" text @click="onUpdate(actor.clave)">
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
            @click="
              qdelete(
                  actor.numero, actor.asiento, actor.claveFuncion,actor.claveTipoEntrada
              )
            "
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
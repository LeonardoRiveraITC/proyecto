<template>
  <div>
    <div class="layout">
      <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Varela"
      />
      <v-card class="overflow-hidden">
        <v-app-bar
          absolute
          color="#43a047"
          dark
          prominent
          src="https://www.cinemascomics.com/wp-content/uploads/2020/08/volver-al-cine.jpg"
          fade-img-on-scroll
          scroll-threshold="500"
        >
          <template v-slot:img="{ props }">
            <v-img
              v-bind="props"
              gradient="to top right, rgba(55,236,186,.7), rgba(25,32,72,.7)"
            ></v-img>
          </template>

          <v-app-bar-nav-icon
            @click.stop="drawer = !drawer"
          ></v-app-bar-nav-icon>

          Gestión de Cines
        </v-app-bar>
      </v-card>
      <v-navigation-drawer v-model="drawer" absolute temporary clipped fixed>
        <v-list>
          <v-list-item
            v-for="item in items"
            :key="item.title"
            :to="item.link"
            link
          >
            <v-list-item-icon>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-icon>

            <v-list-item-content>
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>

          <v-divider></v-divider>
          <v-list-group
            v-for="item in adminitems"
            :key="item.title"
            v-model="item.active"
            :prepend-icon="item.action"
          >
            <template v-slot:activator>
              <v-list-item-content>
                <v-list-item-title v-text="item.title"></v-list-item-title>
              </v-list-item-content>
            </template>

            <v-list-item
              v-for="child in item.items"
              :key="child.title"
              :to="child.link"
              link
            >
              <v-list-item-content>
                <v-list-item-title v-text="child.title"></v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-group>
        </v-list>
      </v-navigation-drawer>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      drawer: false,
      items: [
        { title: "Actores", icon: "mdi-account-star", link: "actor" },
        { title: "Pelicula", icon: "mdi-movie", link: "pelicula" },
        { title: "Boletos", icon: "mdi-ticket", link: "boleto" },
        { title: "Horario", icon: "mdi-calendar-clock", link: "horario" },
        { title: "Funcion", icon: "mdi-projector", link: "funcion" },
      ],
      adminitems: [
        {
          action: "mdi-admin",
          items: [
            { title: "Actor", link: "admactor" },
            { title: "Cine", link: "cine" },
            { title: "Director", link: "director" },
            { title: "Entrada", link: "admentrada" },
            { title: "funcion", link: "admfuncion" },
            { title: "Genero", link: "admgenero" },
            { title: "Horario", link: "admhorario" },
            { title: "Pais", link: "admpais" },
            { title: "Pelicula", link: "admpelicula" },
            { title: "Personaje", link: "admpersonaje" },
            { title: "Productora", link: "admproductora" },
            { title: "Programacion", link: "admprogramacion" },
            { title: "Reparto", link: "admreparto" },
            { title: "Rol", link: "admrol" },
            { title: "Sala", link: "admsala" },
            { title: "Tipo entrada", link: "admentrada" },
          ],
          title: "Admin",
        },
      ],
    };
  },
  methods: {},
};
</script>

<style scoped>
.layout {
  font-family: "Varela", sans-serif;
  padding-bottom: 50px;
}
</style>
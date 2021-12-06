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
          shrink-on-scroll
          prominent
          src="https://www.cinemascomics.com/wp-content/uploads/2020/08/volver-al-cine.jpg"
          fade-img-on-scroll
          scroll-target="#scrolling-techniques-5"
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

          Cinepolis
        </v-app-bar>
      </v-card>
      <v-navigation-drawer v-model="drawer" absolute temporary>
        <v-list-item>
          <v-list-item-avatar>
            <v-img src="https://randomuser.me/api/portraits/men/78.jpg"></v-img>
          </v-list-item-avatar>

          <v-list-item-content>
            <v-list-item-title>John Leider</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-divider></v-divider>

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
        </v-list>
        <v-divider></v-divider>
        <v-list>
          <v-list-item>
            <v-list-item-icon>
              <v-icon>mdi-exit-to-app</v-icon>
            </v-list-item-icon>

            <v-list-item-content>
              <v-list-item-title>Cerrar sesión</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
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
        { title: "Citas", icon: "mdi-calendar", link: "citas" },
        { title: "Mascotas", icon: "mdi-dog-side", link: "mascotas" },
      ],
      routerlink: "home",
    };
  },
  methods: {

  },
};
</script>

<style scoped>
.layout {
  font-family: "Varela", sans-serif;
  padding-bottom: 50px;
}

</style>
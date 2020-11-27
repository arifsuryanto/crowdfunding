<template>
  <v-app>
    <!-- alert -->
    <alert></alert>

    <!-- dialog Search -->
    <v-dialog
      v-model="dialog"
      fullscreen
      hide-overlay
      transition="scale-transition"
    >
      <search @closed="closeDialog" />
    </v-dialog>
    <!-- sidebar   -->
    <v-navigation-drawer app v-model="drawer">
      <v-list>
        <v-list-item v-if="!guest">
          <v-list-item-avatar>
            <v-img src="https://randomuser.me/api/portraits/lego/0.jpg">
            </v-img>
          </v-list-item-avatar>
          <v-list-item-content>
            <v-list-item-title>Kraken</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <div class="pa-2" v-if="guest">
          <v-btn block color="success" class="mb-1">
            <v-icon left>mdi-lock</v-icon>
            Login
          </v-btn>
          <v-btn block color="primary" class="mb-1">
            <v-icon left>mdi-account</v-icon>
            Register
          </v-btn>
        </div>

        <v-divider></v-divider>

        <v-list-item
          v-for="(item, index) in menus"
          :key="`menu-` + index"
          :to="item.route"
        >
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>

      <template v-slot:append v-if="!guest">
        <div class="pa-2">
          <v-btn block color="red" dark>
            <v-icon left>mdi-lock</v-icon>
            Logout
          </v-btn>
        </div>
      </template>
    </v-navigation-drawer>

    <!-- header -->
    <v-app-bar
      app
      absolute
      color="success"
      dark
      elevate-on-scroll
      scroll-target="#scrolling-techniques-7"
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Sanbercode App</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon v-if="transactions != 0">
        <v-badge color="warning" overlap>
          <template v-slot:badge>
            <span>{{ transactions }}</span>
          </template>
          <v-icon>mdi-cash-multiple</v-icon>
        </v-badge>
      </v-btn>

      <v-btn icon v-else>
        <v-icon>mdi-cash-multiple</v-icon>
      </v-btn>

      <v-text-field
        slot="extension"
        append-icon="mdi-microphone"
        flat
        hide-details
        label="Search"
        prepend-inner-icon="mdi-magnify"
        solo-inverted
        @click.native="openDialog"
      ></v-text-field>
    </v-app-bar>

    <!-- Sizes your content based upon application components -->
    <v-main>
      <!-- Provides the application the proper gutter -->
      <v-container fluid>
        <!-- If using vue-router -->
        <v-slide-y-transition>
          <router-view></router-view>
        </v-slide-y-transition>
      </v-container>
    </v-main>

    <!-- footer -->
    <v-card>
      <v-footer absolute app>
        <v-card-text class="text-center">
          &copy; {{ new Date().getFullYear() }} - <strong>SanbercodeApp</strong>
        </v-card-text>
      </v-footer>
    </v-card>
  </v-app>

  <!-- <div class="wrapper">
    <router-link to="/">Home</router-link>
    <router-link to="/donations">Donations</router-link>
    <router-link to="/blogs">Blogs</router-link>

    <div class="content-wrapper">
      <router-view></router-view>
    </div>

    <app-footer />
  </div> -->
</template>

<script>
import { mapGetters } from "vuex";
import Alert from "./components/Alert.vue";
import Search from "./components/Search.vue";
export default {
  components: {
    Alert: () => import("./components/Alert"),
    Search: () => import("./components/Search"),
  },
  name: "App",
  data: () => ({
    drawer: false,
    dialog: false,
    menus: [
      { title: "Home", icon: "mdi-home", route: "/" },
      { title: "Campaigns", icon: "mdi-hand-heart", route: "/campaigns" },
      { title: "Blogs", icon: "mdi-hand-heart", route: "/blogs" },
    ],
    guest: false,
  }),
  computed: {
    isHome() {
      return this.$route.path === "/" || this.$route.path === "/home";
    },
    ...mapGetters({
      transactions: "transaction/transactions",
    }),
    // transaction() {
    //   return this.$store.getters.transaction;
    //   console.log(this.$store.getters.transaction);
    // },
  },
  methods: {
    closeDialog(value) {
      this.dialog = value;
    },
    openDialog(value) {
      this.dialog = true;
    },
  },
};
</script>

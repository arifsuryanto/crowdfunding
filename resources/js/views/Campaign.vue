<template>
  <v-card class="mx-auto" max-width="344" v-if="campaign.id">
    <v-img :src="campaign.image" height="200px" class="white--text">
      <v-card-title
        v-text="campaign.title"
        class="fill-height align-end"
      ></v-card-title>
    </v-img>

    <v-card-text>
      <v-simple-table dense>
        <tbody>
          <tr>
            <td><v-icon>mdi-home-city</v-icon> Alamat</td>
            <td>{{ campaign.address }}</td>
          </tr>
          <tr>
            <td><v-icon>mdi-hand-heart</v-icon> Terkumpul</td>
            <td class="blue--text">
              Rp. {{ campaign.collected.toLocaleString() }}
            </td>
          </tr>
          <tr>
            <td><v-icon>mdi-cash</v-icon> Dibutuhkan</td>
            <td class="orange--text">
              Rp.
              {{ campaign.required.toLocaleString() }}
            </td>
          </tr>
        </tbody>
      </v-simple-table>
    </v-card-text>

    <v-card-actions>
      <v-btn
        block
        color="primary"
        @click="donate"
        :disabled="campaign.collected >= campaign.required"
      >
        <v-icon>mdi-cash</v-icon> &nbsp; DONATE
      </v-btn>
    </v-card-actions>

    <v-card-actions>
      <v-btn color="green lighten-2" text> Description </v-btn>

      <v-spacer></v-spacer>

      <v-btn icon @click="show = !show">
        <v-icon>{{ show ? "mdi-chevron-up" : "mdi-chevron-down" }}</v-icon>
      </v-btn>
    </v-card-actions>

    <v-expand-transition>
      <div v-show="show">
        <v-divider></v-divider>

        <v-card-text v-text="campaign.description"> </v-card-text>
      </div>
    </v-expand-transition>
  </v-card>
</template>


<script>
import { mapActions, mapMutations } from "vuex";

export default {
  data: () => ({
    campaign: {},
    show: true,
  }),
  created() {
    this.go();
  },
  methods: {
    go() {
      let { id } = this.$route.params;
      let url = "/api/campaign/" + id;
      axios
        .get(url)
        .then((response) => {
          let { data } = response.data;
          this.campaign = data.campaign;
          console.log(data.campaign);
        })
        .catch((error) => {
          let { response } = error;
          console.log(response);
          console.log("hello");
          console.log(id);
        });
    },
    ...mapMutations({
      tambahTransaksi: "transaction/insert",
    }),

    ...mapActions({
      setAlert: "alert/set",
    }),

    donate() {
      this.tambahTransaksi();
      this.setAlert({
        status: true,
        color: "success",
        text: "transaksi berhasil",
      });
    },
    // go() {},
  },
};
</script>

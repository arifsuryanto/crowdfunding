<template>
  <v-card>
    <v-toolbar dark color="info">
      <v-btn icon dark @click.native="close">
        <v-icon>mdi-close</v-icon>
      </v-btn>
      <v-text-field
        append-icon="mdi-microphone"
        flat
        hide-details
        autofocus
        label="Search"
        prepend-inner-icon="mdi-magnify"
        v-model="keyword"
        @input="doSearch"
      ></v-text-field>
    </v-toolbar>

    <v-card-text>
      <v-subheader v-if="keyword.length > 0">
        Result Search "{{ keyword }}"
      </v-subheader>
      <v-alert
        :value="campaigns.length == 0 && keyword.length > 0"
        color="warning"
        outlined
      >
        Sorry, but no results were found.
      </v-alert>

      <!-- show search -->
      <v-container class="ma-0 pa-0" grid-list-sm>
        <v-layout wrap>
          <v-flex
            v-for="campaign in campaigns"
            :key="'campaign-' + campaign.id"
            xs6
          >
            <campaign-item :campaign="campaign" @click.native="close" />
          </v-flex>
        </v-layout>
      </v-container>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  name: "search",
  components: {
    CampaignItem: () => import("./CampaignItem"),
  },
  data() {
    return {
      keyword: "",
      campaigns: [],
    };
  },
  methods: {
    doSearch() {
      let keyword = this.keyword;
      if (keyword.length > 0) {
        let url = "/api/campaign/search/" + keyword;
        axios
          .get(url)
          .then((response) => {
            let { data } = response.data;
            this.campaigns = data.campaigns;
            console.log(this.campaigns);
          })
          .catch((error) => {
            let { response } = error;
            console.log(response);
          });
      } else {
        this.campaigns = [];
      }
    },
    close() {
      this.$emit("closed", false);
    },
  },
};
</script>

<template>
  <v-card :to="`/campaign/` + campaign.id">
    <v-img :src="campaign.image" class="white--text" height="300px">
      <v-card-title class="fill-height align-end" v-text="campaign.title">
      </v-card-title>
    </v-img>

    <v-card-text>
      <v-progress-linear v-model="proggress" height="15">
        <strong>{{ Math.ceil(proggress) }}%</strong>
      </v-progress-linear>
    </v-card-text>

    <v-card-text>
      <v-row class="mx-0">
        <div>
          <strong>
            <v-icon>mdi-cash</v-icon> Rp.
            {{ campaign.required.toLocaleString() }}
          </strong>
        </div>
        <v-spacer></v-spacer>
        <div class="grey--text">
          <strong>{{ proggress }}%</strong>
        </div>
      </v-row>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  name: "campaign-item",
  props: ["campaign"],
  computed: {
    proggress: function () {
      let precentage = parseInt(
        (this.campaign.collected / this.campaign.required) * 100
      );
      console.log(precentage);
      return precentage;
    },
  },
};
</script>

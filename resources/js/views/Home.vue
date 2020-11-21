<template>
  <div>
    <v-container class="ma-0 pa-0" grid-list-sm>
      <div class="text-right">
        <v-btn small text to="/campaigns" class="blue--text">
          All Campaign <v-icon>mdi-chevron-right</v-icon>
        </v-btn>
      </div>

      <v-layout wrap>
        <v-flex
          v-for="(campaign, index) in campaigns"
          :key="`campaign-` + campaign.id"
          xs6
        >
          <v-card :to="`/campaign/` + campaign.id">
            <v-img :src="campaign.image" class="white--text">
              <v-card-title
                class="fill-height align-end"
                v-text="campaign.title"
              >
              </v-card-title>
            </v-img>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
    <br />

    <v-container class="ma-0 pa-0" grid-list-sm>
      <div class="text-right">
        <v-btn small text to="/campaigns" class="blue--text">
          All Blog <v-icon>mdi-chevron-right</v-icon>
        </v-btn>
      </div>

      <v-layout wrap>
        <v-flex v-for="(blog, index) in blogs" :key="`blog-` + blog.id" xs6>
          <v-card :to="`/blog/` + blog.id">
            <v-img :src="blog.image" class="white--text">
              <v-card-title class="fill-height align-end" v-text="blog.title">
              </v-card-title>
            </v-img>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
export default {
  data: () => ({
    campaigns: [],
    blogs: [],
  }),
  created() {
    axios
      .get("api/campaign/random/2")
      .then((response) => {
        let { data } = response.data;
        this.campaigns = data.campaigns;
      })
      .catch((error) => {
        let { response } = error;
        console.log(response);
      });
    axios
      .get("api/blog/random/2")
      .then((response) => {
        let { data } = response.data;
        this.blogs = data.blogs;
      })
      .catch((error) => {
        let { response } = error;
        console.log(response);
      });
  },
};
</script>

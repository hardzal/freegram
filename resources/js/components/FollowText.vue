<template>
  <div>
    <a
      class="pl-3 follow-btn"
      @click="followUser"
      v-text="buttonText"
      style="color: skyblue; cursor: pointer;"
    ></a>
  </div>
</template>
<script>
export default {
  props: ["follows", "userId"],

  mounted() {
    console.log("Component mounted");
  },

  data: function () {
    return {
      status: this.follows,
    };
  },

  methods: {
    followUser() {
      axios
        .post("/follow/" + this.userId)
        .then((response) => {
          this.status = !this.status;
        })
        .catch((errors) => {
          if (errors.response.status == 401) {
            console.log("Not Login!");
            // window.location = "/login";
          }
        });
    },
  },

  computed: {
    buttonText() {
      return this.status ? "unfollow" : "follow";
    },
  },
};
</script>

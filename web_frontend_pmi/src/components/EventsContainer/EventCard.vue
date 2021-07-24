<template>
  <div class="card card-services">
    <div class="card-body">
      <h5 class="card-title">{{ title }}</h5>
      <p class="card-text">{{time}}</p>
      <p class="card-text">{{location}}</p>
      <p class="card-text">
        {{ description }}
      </p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: String,
    description: String,
    location:String,
    time:String
  },
  name: "card",
};
</script>

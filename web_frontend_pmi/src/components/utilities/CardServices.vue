<template>
  <div class="card card-services">
    <div class="card-services-img">
      <img src="../../../public/img/cure.svg" alt="online phamachy" />
    </div>
    <div class="card-body">
      <h5 class="card-title">{{title}}</h5>
      <p class="card-text">
       {{description}}
      </p>
    </div>
  </div>
</template>

<script>
export default {
  props:{
    title:String,
    description:String
  },
    name:'card'
}
</script>

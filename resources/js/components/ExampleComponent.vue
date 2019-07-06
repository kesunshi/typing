<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            {{ title }}
            <span class="badge badge-success">{{ categoryName }}</span>
          </div>
          <div class="card-body text-center drill-body">
            <button class="btn tn-primary" @click="doDrill" v-if="!isStarted">START</button>
            <p v-if="isCountDown" style="font-size:100x;">{{ CountDown }}</p>
            <template v-if="isStarted && !isCountDown && !isEnd">
              <p>{{ timeNum }}</p>
              <span :class="{'text-primary': index < currentWordNum}">{{word}}</span>
              <!-- v-for="(word, index) in problemWords" (上のspanタグに入れる) -->
            </template>

            <template>
              <p>あなたのスコア</p>
              <p>{{typeSore}}</p>
            </template>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  }
};
</script>

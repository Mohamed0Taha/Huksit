<template>
  <div id="datepicker">
    <input type="date" name="dateinput" v-model="selected" v-on:change="ajax">
      <h1>{{ selected }}</h1>
      <select>
        <option v-for="time in sortedArray" :disabled=" time.value ==1"> {{time.data}} </option>
      </select>

  </div>
</template>
<script>
export default {
  name: "datepicker",
  data: () => ({
    selected: '',
    times:[],
    message:"first value"
  }),
  methods: {
      ajax() {

      axios.get("/ajax_url/1/"+this.selected).then(response=>this.times=response.data);

      }
    },computed: {
    sortedArray: function() {
      function compare(a, b) {
        return parseFloat(a.rank) - parseFloat(b.rank);
      }

      return this.times.sort(compare);
    }
    }
}
</script>
<style lang="scss" scoped>
</style>

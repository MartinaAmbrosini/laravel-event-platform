<script>
  import axios from 'axios';
    export default {
      name: 'Tags',
      data() {
        return {
          tags: []
        };
      },
      mounted () {
          axios.get ('http://localhost:8000/api/v1/tags')
          .then (res=>{
            this.tags = res.data;
            console.log(res.data);
          })
          .catch(err => {
              console.error(err);
          })
        }
    }
</script>

<template>
  <div class="tags">
    <h1 class="tags__title">Tags</h1>
    <ul class="tags__list">
      <li v-for="tag in tags" :key="tag.id" class="tags__item">
        <strong class="tag-title">{{ tag.title }}</strong>
      </li>
    </ul>
  </div>
</template>

<style lang="scss">
.tags {
  text-align: center;

  &__title {
    font-size: 24px;
    margin-bottom: 20px;
  }

  &__list {
    list-style: none;
    padding: 0;
  }

  &__item {
    margin-bottom: 20px;
  }

  .tag-title {
    font-size: 18px;
    color: yellowgreen;
    padding: 10px 20px;
    border: 2px solid #ccc;
    border-radius: 5px;
    display: inline-block;
    transition: all 0.3s ease;

    &:hover {
      background-color: #ccc;
      color: black;
    }
  }
}
</style>


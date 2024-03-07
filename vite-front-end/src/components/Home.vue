<script>
  import axios from 'axios';
    export default {
      name: 'Home',
      data() {
        return {
          events: []
        };
      },
      mounted () {
          axios.get ('http://localhost:8000/api/v1/events')
          .then (res=>{
            this.events = res.data;
            console.log(res.data);
          })
          .catch(err => {
              console.error(err);
          })
        }
    }
</script>

<template>
  <div class="events">
    <h1 class="events__title">Eventi</h1>
    <ul class="events__list">
      <li v-for="event in events" :key="event.id" class="events__item">
        <div class="event-info">
          <h2 class="event-info__name">{{ event.name }}</h2>
          <p class="event-info__description">{{ event.description }}</p>
        </div>
      </li>
    </ul>
  </div>
</template>

<style lang="scss">
.events {
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
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;

    &:hover {
      transform: translateY(-5px);
    }
  }

  .event-info {
    &__name {
      font-size: 20px;
      margin-bottom: 10px;
    }

    &__description {
      font-style: italic;
    }
  }
}
</style>


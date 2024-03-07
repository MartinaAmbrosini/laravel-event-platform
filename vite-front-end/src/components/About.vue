<script>
  import axios from 'axios';
    export default {
      name: 'About',
      data() {
        return {
          users: []
        };
      },
      mounted () {
          axios.get ('http://localhost:8000/api/v1/users')
          .then (res=>{
            this.users = res.data;
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
        <li v-for="user in users" :key="user.id" class="tags__item">
          <div class="user-profile">
            <h2 class="user-profile__title">User Profile</h2>
            <p class="user-profile__info"><strong>Name:</strong> {{ user.name }}</p>
            <p class="user-profile__info"><strong>Email:</strong> {{ user.email }}</p>
            <p class="user-profile__info user-profile__description"><strong>Description:</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti dignissimos officia omnis consequatur rem exercitationem debitis similique culpa velit veritatis earum recusandae, libero fugit totam accusantium molestias vel, accusamus quas.</p>
          </div>
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
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
  
      &:hover {
        transform: translateY(-5px);
      }
    }
  
    .user-profile {
      &__title {
        font-size: 20px;
        margin-bottom: 10px;
      }
  
      &__info {
        margin-bottom: 5px;
      }
  
      &__description {
        font-style: italic;
      }
    }
  }
  </style>
  

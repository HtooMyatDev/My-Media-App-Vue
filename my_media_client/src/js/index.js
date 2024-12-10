import axios from 'axios'
import { mapGetters } from 'vuex'
export default {
  name: 'HomePage',
  data() {
    return {
      message: 'This is testing',
      postList: {},
      categoryList: {},
      searchKey: '',
      tokenStatus: false,
    }
  },
  computed: {
    ...mapGetters(['getToken', 'getUser']),
  },
  methods: {
    getAllPost() {
      axios.get('http://localhost:8000/api/allPost').then((response) => {
        for (let index = 0; index < response.data.posts.length; index++) {
          if (response.data.posts[index].image != null) {
            response.data.posts[index].image =
              'http://localhost:8000/posts/' + response.data.posts[index].image
          } else {
            response.data.posts[index].image = 'http://localhost:8000/img/default.png'
          }
        }
        this.postList = response.data.posts
      })
    },
    getAllCategory() {
      axios
        .get('http://localhost:8000/api/allCategory')
        .then((response) => {
          this.categoryList = response.data.categories
        })
        .catch((error) => {
          console.log(error)
        })
    },
    searchPost() {
      axios
        .post('http://localhost:8000/api/search/post', {
          key: this.searchKey,
        })
        .then((response) => {
          for (let index = 0; index < response.data.posts.length; index++) {
            if (response.data.posts[index].image != null) {
              response.data.posts[index].image =
                'http://localhost:8000/posts/' + response.data.posts[index].image
            } else {
              response.data.posts[index].image = 'http://localhost:8000/img/default.png'
            }
          }
          this.postList = response.data.posts
        })
    },

    searchCategory(categoryTitle) {
      axios
        .post('http://localhost:8000/api/search/category', {
          key: categoryTitle,
        })
        .then((response) => {
          for (let index = 0; index < response.data.posts.length; index++) {
            if (response.data.posts[index].image != null) {
              response.data.posts[index].image =
                'http://localhost:8000/posts/' + response.data.posts[index].image
            } else {
              response.data.posts[index].image = 'http://localhost:8000/img/default.png'
            }
          }
          this.postList = response.data.posts
        })
        .catch((error) => console.log(error))
    },
    newsDetails(id) {
      this.$router.push({ name: 'newsDetails', params: { postsId: id } })
    },
    home() {
      this.$router.push({
        name: 'HomePage',
      })
    },
    login() {
      this.$router.push({
        name: 'LoginPage',
      })
    },
    logout() {
      this.$store.dispatch('setToken', null)
      this.$router.push({ name: 'LoginPage' })
    },
    checkToken() {
      if (this.getToken) {
        this.tokenStatus = true
      }
    },
  },

  mounted() {
    this.checkToken()
    this.getAllPost()
    this.getAllCategory()
  },
}

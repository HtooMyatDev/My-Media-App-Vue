import axios from 'axios'
import { mapGetters } from 'vuex'
export default {
  name: 'newsDetails',
  data() {
    return {
      post: {},
      views: 0,
    }
  },
  computed: {
    ...mapGetters(['getUser']),
  },
  methods: {
    newsDetails() {
      let post = {
        postsId: this.$route.params.postsId,
      }

      axios
        .post('http://localhost:8000/api/post/details', post)
        .then((response) => {
          if (response.data.post.image != null) {
            response.data.post.image = 'http://localhost:8000/posts/' + response.data.post.image
          } else {
            response.data.post.image = 'http://localhost:8000/img/default.png'
          }
          this.post = response.data.post
        })
        .catch((error) => console.log(error))
    },
    viewCount() {
      axios
        .post('http://localhost:8000/api/view/count', {
          post: this.$route.params.postsId,
          user: this.getUser.id,
        })
        .then((response) => {
          this.views = response.data.length
        })
        .catch((error) => console.log(error))
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
  },
  mounted() {
    this.viewCount()
    this.newsDetails()
  },
}

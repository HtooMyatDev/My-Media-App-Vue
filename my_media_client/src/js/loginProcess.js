import axios from 'axios'
import { mapGetters } from 'vuex'
export default {
  name: 'loginPage',
  data() {
    return {
      userData: {
        email: '',
        password: '',
      },
      userCheck: {
        email: false,
        password: false,
      },
      tokenStatus: false,
    }
  },
  computed: {
    ...mapGetters(['getToken', 'getUser']),
  },
  methods: {
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
    loginProcess() {
      this.userCheck.email = this.userData.email == '' ? true : false
      this.userCheck.password = this.userData.password == '' ? true : false

      axios
        .post('http://localhost:8000/api/user/login', this.userData)
        .then((response) => {
          if (response.data.token == null) {
            console.log('Unauthenticated!')
          } else {
            console.log(response.data.token)
            this.$store.dispatch('setToken', response.data.token)
            this.$store.dispatch('setUser', response.data.user)
            this.$router.push({ name: 'HomePage' })
          }
        })
        .catch((error) => console.log(error))
    },
  },
}

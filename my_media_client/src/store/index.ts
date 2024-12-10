import { createStore } from 'vuex'

export const store = createStore({
  state: {
    userData: {},
    token: '',
  },
  getters: {
    getToken: (state) => state.token,
    getUser: (state) => state.userData,
  },
  actions: {
    setToken: ({ state }, value) => (state.token = value),
    setUser: ({ state }, value) => (state.userData = value),
  },
  mutations: {},
  modules: {},
})

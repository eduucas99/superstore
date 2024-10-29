export default {
  fetchExampleData({ commit }) {
    // Simulando una llamada a una API
    setTimeout(() => {
      commit("setExampleData", "Data from API");
    }, 1000);
  },
};

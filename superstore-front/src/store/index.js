import { createStore } from "vuex";
import ui from "./ui/index";

const store = createStore({
  modules: {
    ui,
  },
});

export default store;

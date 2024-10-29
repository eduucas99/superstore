<template>
  <q-layout view="lHh Lpr lFf">
    <div class="q-pa-none">
      <q-toolbar class="bg-primary text-black q-my-md shadow-2">
        <q-btn
          flat
          round
          dense
          icon="las la-shopping-cart"
          class="q-mr-sm"
          @click="routerPush('Home')"
        />

        <q-space />

        <q-btn-toggle
          v-model="model"
          flat
          stretch
          toggle-color="red"
          :options="[
            { label: 'Productos', value: 'products' },
            { label: 'Categorias', value: 'categories' },
          ]"
        />
      </q-toolbar>
      <q-page-container>
        <router-view />
      </q-page-container>
    </div>
  </q-layout>
</template>

<script>
import { useRouter } from "vue-router";

export default {
  data() {
    return {
      model: "",
    };
  },
  created() {
    this.router = useRouter();
  },
  methods: {
    routerPush(name) {
      this.router.push({ name: name });
    },
    handleToggleChange(value) {
      this.routerPush(value);
    },
  },
  watch: {
    model(newValue) {
      this.handleToggleChange(newValue);
    },
    "$route.name": {
      handler(newValue) {
        console.log("newValue: ", newValue);
        if (newValue === "Home") {
          this.model = "";
        }
      },
      immediate: true,
    },
  },
};
</script>

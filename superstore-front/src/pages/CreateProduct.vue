<template>
  <q-page class="full-width">
    <div class="column q-pa-md">
      <h2>Crear Producto</h2>

      <q-form @submit.prevent="submitForm">
        <q-input v-model="product.name" label="Nombre del Producto" required />
        <q-input
          v-model="product.description"
          label="Descripción"
          type="textarea"
          required
        />
        <q-input v-model="product.image_url" label="Imagen" required />
        <q-input v-model="product.cta_url" label="URL" required />

        <q-select
          v-model="selectedCategories"
          :options="categories"
          label="Categorías"
          multiple
          required
        />

        <q-btn
          label="Crear Producto"
          type="submit"
          color="primary"
          class="q-mt-md"
        />
      </q-form>

      <q-btn
        label="Cancelar"
        @click="cancel"
        class="q-mt-md"
        color="secondary"
      />
    </div>
  </q-page>
</template>

<script>
import axios from "axios";
import { defineComponent } from "vue";

export default defineComponent({
  name: "CreateProduct",
  data() {
    return {
      product: {
        name: "",
        description: "",
        image_url: "",
        cta_url: "",
      },
      categories: [],
      selectedCategories: [],
    };
  },
  async created() {
    await this.fetchCategories();
  },
  methods: {
    async fetchCategories() {
      try {
        const response = await axios.get(
          "http://127.0.0.1:8000/api/categories",
        );
        this.categories = response.data.map((category) => ({
          label: category.name,
          value: category.id,
        }));
      } catch (error) {
        alert("Error al obtener categorías:", error);
      }
    },
    async submitForm() {
      try {
        const productData = {
          name: this.product.name,
          description: this.product.description,
          description: this.product.description,
          image_url: this.product.image_url,
          cta_url: this.product.cta_url,
          category_ids: this.selectedCategories[0].value,
        };
        console.log(productData);
        const response = await axios.post(
          "http://127.0.0.1:8000/api/create-product",
          productData,
        );

        const productId = response.data.id;
        console.log("Product ID:", productId);
        this.$router.push({ name: "products" });
      } catch (error) {
        alert("Error al crear producto:", error);
      }
    },
    cancel() {
      this.$router.push({ name: "products" });
    },
  },
});
</script>

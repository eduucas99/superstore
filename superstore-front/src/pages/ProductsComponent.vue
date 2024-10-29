<template>
  <q-page class="full-width">
    <div class="column custom-height q-mb-md items-center justify-center">
      <q-btn label="Ver Productos" color="primary" @click="getProducts" />
      <q-btn
        label="Crear Producto"
        color="green"
        @click="createProduct"
        class="q-mt-md"
      />

      <div v-if="products.length">
        <q-list>
          <q-item v-for="product in products" :key="product.id">
            <q-card class="my-card">
              <q-card-section>
                <q-item-label>
                  <strong>{{ product.name }}</strong>
                </q-item-label>
                <q-item-label>{{ product.description }}</q-item-label>
                <q-img :src="product.image_url" style="max-width: 100px" />
              </q-card-section>
              <q-card-actions>
                <q-btn
                  label="Ver más"
                  :href="product.cta_url"
                  target="_blank"
                />
                <q-btn
                  label="Modificar"
                  color="secondary"
                  @click="editProduct(product)"
                />
              </q-card-actions>
            </q-card>
          </q-item>
        </q-list>
      </div>
    </div>
  </q-page>
</template>

<script>
import axios from "axios";
import { defineComponent } from "vue";
import { useRouter } from "vue-router";

export default defineComponent({
  name: "ProductsComponent",
  data() {
    return {
      products: [],
    };
  },
  methods: {
    async getProducts() {
      try {
        const response = await axios.get("http://127.0.0.1:8000/api/products");
        this.products = response.data;
      } catch (error) {
        alert("Error al obtener productos:", error);
      }
    },
    editProduct(product) {
      this.$router.push({
        path: `/edit-product/${product.id}`,
        query: { product: JSON.stringify(product) },
      });
    },
    createProduct() {
      this.$router.push({ path: "/create-product" });
    },
  },
});
</script>

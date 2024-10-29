<template>
  <q-page class="full-width">
    <div class="q-gutter-md">
      <h2>Editar Producto</h2>
      <q-form @submit.prevent="updateProduct">
        <q-input v-model="product.name" label="Nombre" required />
        <q-input
          v-model="product.description"
          label="Descripción"
          type="textarea"
        />
        <q-input v-model="product.image_url" label="URL de Imagen" />
        <q-input v-model="product.cta_url" label="URL de CTA" />

        <div class="q-mt-md">
          <q-btn type="submit" label="Actualizar Producto" color="primary" />
          <q-btn label="Cancelar" color="secondary" @click="cancelEdit" />
        </div>
      </q-form>
    </div>
  </q-page>
</template>

<script>
import axios from "axios";
import { defineComponent } from "vue";

export default defineComponent({
  name: "EditProductComponent",
  data() {
    return {
      product: {
        id: "",
        name: "",
        description: "",
        image_url: "",
        cta_url: "",
      },
    };
  },
  created() {
    const productData = this.$route.query.product;
    if (productData) {
      this.product = JSON.parse(productData);
    }
  },
  methods: {
    async updateProduct() {
      try {
        await axios.put(
          `http://127.0.0.1:8000/api/edit-product/${this.product.id}`,
          this.product,
        );
        alert("Producto Actualizado");
        this.$router.push("/products");
      } catch (error) {
        alert("Error al actualizar el producto:", error);
      }
    },
    cancelEdit() {
      this.$router.push("/products"); // Regresar a la lista de productos sin cambios
    },
  },
});
</script>

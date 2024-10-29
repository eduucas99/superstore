<template>
  <q-page class="full-width">
    <div class="column custom-height q-mb-md items-center justify-center">
      <q-btn
        label="Agregar Categoría"
        color="green"
        @click="openDialog"
        class="q-mb-md"
      />

      <q-list>
        <q-item v-for="category in categories" :key="category.id">
          <q-card class="my-card">
            <q-btn
              label="Ver productos"
              color="blue-12"
              @click="getProducts(category.id)"
            />
            <q-card-section>
              <q-item-label>
                <strong>{{ category.name }}</strong>
              </q-item-label>
            </q-card-section>
            <q-card-actions>
              <q-btn
                label="Editar"
                color="secondary"
                @click="editCategory(category)"
              />
              <q-btn
                label="Eliminar"
                color="negative"
                @click="deleteCategory(category.id)"
              />
            </q-card-actions>
          </q-card>
        </q-item>
      </q-list>
      <div
        class="column custom-height q-mb-md items-center justify-center q-gutter-md"
      >
        <h2 class="q-mb-md">Productos de la categoría seleccionada</h2>
        <div v-if="products.length" class="q-gutter-md">
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
              </q-card>
            </q-item>
          </q-list>
        </div>
        <div v-else>
          <q-banner class="bg-grey-3 text-center">
            No hay productos en esta categoría.
          </q-banner>
        </div>
      </div>
      <category-dialog
        v-model="dialog"
        :category="selectedCategory"
        @refreshCategories="getCategories"
        @close="closeDialog"
      />
    </div>
  </q-page>
</template>

<script>
import axios from "axios";
import CategoryDialog from "./CategoryDialog.vue";

export default {
  name: "CategoriesComponent",
  components: {
    CategoryDialog,
  },
  data() {
    return {
      categories: [],
      products: [],
      dialog: false,
      selectedCategory: null,
    };
  },
  methods: {
    async getCategories() {
      try {
        const response = await axios.get(
          "http://127.0.0.1:8000/api/categories",
        );
        this.categories = response.data;
      } catch (error) {
        alert("Error al obtener categorías:", error);
      }
    },
    async getProducts(categoryId) {
      try {
        const response = await axios.get(
          `http://127.0.0.1:8000/api/categories-products/${categoryId}`,
        );
        this.products = response.data;
      } catch (error) {
        alert("Error al obtener productos:", error);
      }
    },
    openDialog(category = null) {
      this.selectedCategory = category;
      this.dialog = true;
    },
    closeDialog() {
      this.selectedCategory = null;
      this.dialog = false;
    },
    editCategory(category) {
      this.openDialog(category);
    },
    async deleteCategory(id) {
      try {
        await axios.delete(`http://127.0.0.1:8000/api/delete-category/${id}`);
        this.getCategories();
      } catch (error) {
        alert("Error al eliminar categoría:", error);
      }
    },
  },
  async created() {
    await this.getCategories();
  },
};
</script>

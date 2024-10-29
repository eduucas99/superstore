<template>
  <q-dialog v-model="dialog">
    <q-card>
      <q-card-section>
        <q-input v-model="localCategory.name" label="Nombre de la categoría" />
      </q-card-section>
      <q-card-actions>
        <q-btn @click="saveCategory" label="Guardar" color="primary" />
        <q-btn @click="close" label="Cancelar" color="secondary" />
      </q-card-actions>
    </q-card>
  </q-dialog>
</template>

<script>
import axios from "axios";

export default {
  props: {
    modelValue: {
      type: Boolean,
      required: true,
    },
    category: {
      type: Object,
    },
  },
  data() {
    return {
      localCategory: { ...this.category },
    };
  },
  methods: {
    async saveCategory() {
      try {
        let params = { id: this.category.id, name: this.localCategory.name };
        if (this.category.id) {
          await axios.put(
            `http://127.0.0.1:8000/api/edit-category/${this.category.id}`,
            params,
          );
        } else {
          await axios.post(
            "http://127.0.0.1:8000/api/create-category",
            this.localCategory,
          );
        }
        this.$emit("refreshCategories");
        this.close();
      } catch (error) {
        alert("Error al guardar la categoría:", error);
      }
    },
    close() {
      this.dialog = false;
      this.$emit("close");
    },
  },
};
</script>

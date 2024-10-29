const routes = [
  {
    path: "/",
    component: () => import("pages/BannerPrin.vue"),
    children: [
      {
        path: "",
        name: "Home",
        component: () => import("pages/IndexPage.vue"),
      },
      {
        path: "products",
        name: "products",
        component: () => import("src/pages/ProductsComponent.vue"),
      },
      {
        path: "categories",
        name: "categories",
        component: () => import("src/pages/Categories.vue"),
      },
      {
        path: "edit-product/:id",
        name: "edit-product",
        component: () => import("pages/EditProduct.vue"),
      },
      {
        path: "create-product",
        name: "create-product",
        component: () => import("pages/CreateProduct.vue"),
      },
    ],
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: "/:catchAll(.*)*",
    component: () => import("pages/ErrorNotFound.vue"),
  },
];

export default routes;

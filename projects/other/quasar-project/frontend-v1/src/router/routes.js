const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', redirect: '/index' }, // Перенаправление на главную страницу
      { path: 'index', component: () => import('pages/IndexPage.vue'), name: 'home' },
      { path: 'about', component: () => import('pages/AboutIndex.vue'), name: 'AboutUs' },
      { path: 'contacts', component: () => import('pages/ContactsIndex.vue'), name: 'Contacts' },
      { path: 'documents', component: () => import('pages/DocumentsIndex.vue'), name: 'Documents' },
      { path: '/services/:id', component: () => import('src/pages/services/ShowPage.vue'), name: 'services.show' },
      { path: '/works', component: () => import('src/pages/works/IndexPage.vue'), name: 'works.index' },
      { path: '/works/:id', component: () => import('src/pages/works/ShowPage.vue'), name: 'works.show' },

      { path: '49-kvesisskaya', component: () => import('src/pages/works/ShowPage.vue'), name: '49-kvesisskaya' },
      // другие маршруты здесь
    ]
  },
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
];

export default routes;

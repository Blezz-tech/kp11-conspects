const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', redirect: '/index' }, // Перенаправление на главную страницу
      { path: 'index', component: () => import('pages/IndexPage.vue'), name: 'IndexPage' },
      { path: 'about', component: () => import('pages/AboutIndex.vue'), name: 'AboutUs' },
      { path: 'contacts', component: () => import('pages/ContactsIndex.vue'), name: 'Contacts' },
      { path: 'documents', component: () => import('pages/DocumentsIndex.vue'), name: 'Documents' },
      { path: 'podryad', component: () => import('pages/services/FirstService.vue'), name: 'Podryad' },
      { path: 'wallgrunt', component: () => import('pages/services/SecondService.vue'), name: 'Wallgrunt' },
      { path: 'monolitnoe-stroitelstvo', component: () => import('pages/services/ThirdService.vue'), name: 'Monolitnoe-stroitelstvo' },
      { path: '49-kvesisskaya', component: () => import('pages/OurWorks/KvesisskayaPage.vue'), name: '49-kvesisskaya' },
      { path: 'shpuntovoe-ograzhdenie', component: () => import('pages/services/FourthService.vue'), name: 'shpuntovoe-ograzhdenie' },
      { path: 'buronabivnye-svai', component: () => import('pages/services/FifthService.vue'), name: 'buronabivnye-svai' },
      { path: 'buroinektsionnye-svai', component: () => import('pages/services/SixthService.vues'), name: 'buroinektsionnye-svai' },

      // другие маршруты здесь

    ]
  },
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
];

export default routes;

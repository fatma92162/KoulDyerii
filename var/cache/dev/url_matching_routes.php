<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/abonnement' => [[['_route' => 'app_abonnement_index', '_controller' => 'App\\Controller\\AbonnementController::index'], null, null, null, true, false, null]],
        '/abonnement/success' => [[['_route' => 'app_abonnement_success', '_controller' => 'App\\Controller\\AbonnementController::success'], null, null, null, false, false, null]],
        '/abonnement/cancel' => [[['_route' => 'app_abonnement_cancel', '_controller' => 'App\\Controller\\AbonnementController::cancel'], null, null, null, false, false, null]],
        '/admin/abandoned-commandes' => [[['_route' => 'app_admin_abandoned_commandes_index', '_controller' => 'App\\Controller\\AdminAbandonedCommandeController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/commandes' => [[['_route' => 'app_admin_commandes_index', '_controller' => 'App\\Controller\\AdminCommandeController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/commandes/export-lookalike' => [[['_route' => 'app_admin_commandes_export_lookalike', '_controller' => 'App\\Controller\\AdminCommandeController::exportLookalike'], null, ['GET' => 0], null, false, false, null]],
        '/admin/commandes/calculator' => [[['_route' => 'app_admin_commandes_calculator', '_controller' => 'App\\Controller\\AdminCommandeController::calculator'], null, ['GET' => 0], null, false, false, null]],
        '/admin/commandes/advanced-stats' => [[['_route' => 'app_admin_commandes_advanced_stats', '_controller' => 'App\\Controller\\AdminCommandeController::advancedStats'], null, ['GET' => 0], null, false, false, null]],
        '/admin/commandes/import-txt' => [[['_route' => 'app_admin_commandes_import_txt', '_controller' => 'App\\Controller\\AdminCommandeController::importTxt'], null, ['POST' => 0], null, false, false, null]],
        '/admin/commandes/live-data' => [[['_route' => 'app_admin_commandes_live_data', '_controller' => 'App\\Controller\\AdminCommandeController::liveData'], null, ['GET' => 0], null, false, false, null]],
        '/admin/formations' => [[['_route' => 'app_admin_formations_index', '_controller' => 'App\\Controller\\AdminFormationController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/formations/new' => [[['_route' => 'app_admin_formations_new', '_controller' => 'App\\Controller\\AdminFormationController::new'], null, ['GET' => 0], null, false, false, null]],
        '/admin/formations/create' => [[['_route' => 'app_admin_formations_create', '_controller' => 'App\\Controller\\AdminFormationController::create'], null, ['POST' => 0], null, false, false, null]],
        '/admin/livraisons' => [[['_route' => 'app_admin_livraisons_liste', '_controller' => 'App\\Controller\\AdminLivraisonController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/partenaires' => [[['_route' => 'app_admin_partenaires_index', '_controller' => 'App\\Controller\\AdminPartenaireController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/partenaires/collaborations' => [[['_route' => 'app_admin_collaborations_index', '_controller' => 'App\\Controller\\AdminPartenaireController::indexCollaborations'], null, ['GET' => 0], null, false, false, null]],
        '/admin/plats/pending' => [[['_route' => 'app_admin_plats_pending', '_controller' => 'App\\Controller\\AdminPlatController::pending'], null, ['GET' => 0], null, false, false, null]],
        '/admin/plats' => [[['_route' => 'app_admin_plats_index', '_controller' => 'App\\Controller\\AdminPlatController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/posts' => [[['_route' => 'app_admin_posts_index', '_controller' => 'App\\Controller\\AdminPostController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/posts/export' => [[['_route' => 'app_admin_posts_export', '_controller' => 'App\\Controller\\AdminPostController::exportPosts'], null, ['GET' => 0], null, false, false, null]],
        '/admin/posts/stats-modal' => [[['_route' => 'app_admin_stats_modal', '_controller' => 'App\\Controller\\AdminPostController::statsModal'], null, ['GET' => 0], null, false, false, null]],
        '/admin/posts/new' => [[['_route' => 'app_admin_post_new', '_controller' => 'App\\Controller\\AdminPostController::new'], null, ['GET' => 0], null, false, false, null]],
        '/admin/posts/create' => [[['_route' => 'app_admin_post_create', '_controller' => 'App\\Controller\\AdminPostController::create'], null, ['POST' => 0], null, false, false, null]],
        '/admin/produits' => [[['_route' => 'app_admin_produits_index', '_controller' => 'App\\Controller\\AdminProduitController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/produits/new' => [[['_route' => 'app_admin_produits_new', '_controller' => 'App\\Controller\\AdminProduitController::new'], null, ['GET' => 0], null, false, false, null]],
        '/admin/produits/create' => [[['_route' => 'app_admin_produits_create', '_controller' => 'App\\Controller\\AdminProduitController::create'], null, ['POST' => 0], null, false, false, null]],
        '/admin/produits/ajouter-ajax' => [[['_route' => 'app_admin_produit_ajax', '_controller' => 'App\\Controller\\AdminProduitController::ajouterAjax'], null, ['POST' => 0], null, false, false, null]],
        '/admin/produits/modifier-ajax' => [[['_route' => 'app_admin_produit_ajax_update', '_controller' => 'App\\Controller\\AdminProduitController::modifierAjax'], null, ['POST' => 0], null, false, false, null]],
        '/admin/results' => [[['_route' => 'app_admin_results', '_controller' => 'App\\Controller\\AdminQuizResultController::results'], null, ['GET' => 0], null, false, false, null]],
        '/admin/certificates' => [[['_route' => 'app_admin_certificates', '_controller' => 'App\\Controller\\AdminQuizResultController::certificates'], null, ['GET' => 0], null, false, false, null]],
        '/admin/visitors/count' => [[['_route' => 'app_admin_visitors_count', '_controller' => 'App\\Controller\\AdminVisitorController::count'], null, ['GET' => 0], null, false, false, null]],
        '/api/quiz/submit' => [[['_route' => 'app_apiquiz_submit', '_controller' => 'App\\Controller\\ApiQuizController::submit'], null, ['POST' => 0], null, false, false, null]],
        '/api/chat' => [[['_route' => 'api_chat', '_controller' => 'App\\Controller\\ChatController::chat'], null, ['POST' => 0], null, false, false, null]],
        '/mes-livraisons' => [[['_route' => 'app_client_livraisons', '_controller' => 'App\\Controller\\ClientLivraisonController::index'], null, ['GET' => 0], null, true, false, null]],
        '/mes-commandes' => [[['_route' => 'app_mes_commandes_index', '_controller' => 'App\\Controller\\CommandeController::index'], null, ['GET' => 0], null, true, false, null]],
        '/mes-favoris' => [[['_route' => 'app_mes_favoris', '_controller' => 'App\\Controller\\FavoriController::index'], null, null, null, false, false, null]],
        '/formations' => [[['_route' => 'app_formations_index', '_controller' => 'App\\Controller\\FormationController::index'], null, ['GET' => 0], null, true, false, null]],
        '/formations/mes-inscriptions' => [[['_route' => 'app_mes_inscriptions', '_controller' => 'App\\Controller\\FormationController::mesInscriptions'], null, ['GET' => 0], null, false, false, null]],
        '/friend/requests' => [[['_route' => 'app_notif_requests_list', '_controller' => 'App\\Controller\\FriendController::requestsList'], null, null, null, false, false, null]],
        '/friend/friends' => [[['_route' => 'app_friends_list', '_controller' => 'App\\Controller\\FriendController::friendsList'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/contact' => [[['_route' => 'app_contact', '_controller' => 'App\\Controller\\HomeController::contact'], null, ['POST' => 0], null, false, false, null]],
        '/messages' => [[['_route' => 'app_messages_inbox', '_controller' => 'App\\Controller\\MessageController::inbox'], null, null, null, true, false, null]],
        '/notifications' => [[['_route' => 'app_notifications_index', '_controller' => 'App\\Controller\\NotificationController::index'], null, null, null, false, false, null]],
        '/partenaire' => [[['_route' => 'app_partenaire_index', '_controller' => 'App\\Controller\\PartenaireController::index'], null, ['GET' => 0], null, true, false, null]],
        '/partenaire/recommandations' => [[['_route' => 'app_partenaire_recommandations', '_controller' => 'App\\Controller\\PartenaireController::recommandations'], null, ['GET' => 0], null, false, false, null]],
        '/partenaire/devenir' => [[['_route' => 'app_partenaire_devenir', '_controller' => 'App\\Controller\\PartenaireController::devenirPartenaire'], null, ['GET' => 0], null, false, false, null]],
        '/partenaire/devenir/submit' => [[['_route' => 'app_partenaire_submit', '_controller' => 'App\\Controller\\PartenaireController::submitDemande'], null, ['POST' => 0], null, false, false, null]],
        '/partenaire/annuler' => [[['_route' => 'app_partenaire_annuler', '_controller' => 'App\\Controller\\PartenaireController::annulerDemande'], null, ['POST' => 0], null, false, false, null]],
        '/partenaire/ajouter-plat' => [[['_route' => 'app_partenaire_ajouter_plat', '_controller' => 'App\\Controller\\PartenaireController::ajouterPlat'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/partenaire/mes-plats' => [[['_route' => 'app_partenaire_mes_plats', '_controller' => 'App\\Controller\\PartenaireController::mesPlats'], null, ['GET' => 0], null, false, false, null]],
        '/partenaire/collaborations' => [[['_route' => 'app_partenaire_collaborations', '_controller' => 'App\\Controller\\PartenaireController::mesCollaborations'], null, ['GET' => 0], null, false, false, null]],
        '/plats/panier' => [[['_route' => 'app_plat_panier', '_controller' => 'App\\Controller\\PlatPublicController::panier'], null, ['GET' => 0], null, false, false, null]],
        '/plats/panier/commander' => [[['_route' => 'app_plat_panier_commander', '_controller' => 'App\\Controller\\PlatPublicController::commanderPanierPlats'], null, ['POST' => 0], null, false, false, null]],
        '/plats/panier/vider' => [[['_route' => 'app_plat_panier_vider', '_controller' => 'App\\Controller\\PlatPublicController::viderPanierPlats'], null, ['POST' => 0], null, false, false, null]],
        '/plats' => [[['_route' => 'app_plats_public', '_controller' => 'App\\Controller\\PlatPublicController::index'], null, ['GET' => 0], null, true, false, null]],
        '/posts' => [[['_route' => 'app_posts_index', '_controller' => 'App\\Controller\\PostController::index'], null, ['GET' => 0], null, true, false, null]],
        '/posts/new' => [[['_route' => 'app_post_new', '_controller' => 'App\\Controller\\PostController::new'], null, ['GET' => 0], null, false, false, null]],
        '/posts/create' => [[['_route' => 'app_post_create', '_controller' => 'App\\Controller\\PostController::create'], null, ['POST' => 0], null, false, false, null]],
        '/posts/story/new' => [[['_route' => 'app_story_new', '_controller' => 'App\\Controller\\PostController::newStory'], null, ['GET' => 0], null, false, false, null]],
        '/posts/story/create' => [[['_route' => 'app_story_create', '_controller' => 'App\\Controller\\PostController::createStory'], null, ['POST' => 0], null, false, false, null]],
        '/produits' => [[['_route' => 'app_produits_index', '_controller' => 'App\\Controller\\ProduitController::index'], null, ['GET' => 0], null, true, false, null]],
        '/produits/panier' => [[['_route' => 'app_panier_index', '_controller' => 'App\\Controller\\ProduitController::panier'], null, ['GET' => 0], null, false, false, null]],
        '/produits/panier/test-session' => [[['_route' => 'app_panier_test_session', '_controller' => 'App\\Controller\\ProduitController::testSession'], null, ['GET' => 0], null, false, false, null]],
        '/produits/panier/appliquer-code' => [[['_route' => 'app_panier_appliquer_code', '_controller' => 'App\\Controller\\ProduitController::appliquerCode'], null, ['POST' => 0], null, false, false, null]],
        '/produits/panier/retirer-code' => [[['_route' => 'app_panier_retirer_code', '_controller' => 'App\\Controller\\ProduitController::retirerCode'], null, ['POST' => 0], null, false, false, null]],
        '/produits/panier/code-actif' => [[['_route' => 'app_panier_code_actif', '_controller' => 'App\\Controller\\ProduitController::codeActif'], null, ['GET' => 0], null, false, false, null]],
        '/produits/panier/vider' => [[['_route' => 'app_panier_clear', '_controller' => 'App\\Controller\\ProduitController::viderPanier'], null, ['POST' => 0], null, false, false, null]],
        '/produits/abandoned/save' => [[['_route' => 'app_abandoned_commandes_save', '_controller' => 'App\\Controller\\ProduitController::saveAbandonedCommande'], null, ['POST' => 0], null, false, false, null]],
        '/produits/panier/commander' => [[['_route' => 'app_panier_commander', '_controller' => 'App\\Controller\\ProduitController::commanderPanier'], null, ['POST' => 0], null, false, false, null]],
        '/produits/panier/mini-data' => [[['_route' => 'app_panier_mini_data', '_controller' => 'App\\Controller\\ProduitController::miniPanierData'], null, ['GET' => 0], null, false, false, null]],
        '/recompenses' => [[['_route' => 'app_recompenses_index', '_controller' => 'App\\Controller\\RecompenseController::index'], null, ['GET' => 0], null, true, false, null]],
        '/recompenses/mes-recompenses' => [[['_route' => 'app_mes_recompenses', '_controller' => 'App\\Controller\\RecompenseController::mesRecompenses'], null, ['GET' => 0], null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegisterController::register'], null, null, null, false, false, null]],
        '/mot-de-passe-oublie' => [[['_route' => 'app_forgot_password', '_controller' => 'App\\Controller\\ResetPasswordController::forgot'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/deconnecter-tous-appareils' => [[['_route' => 'app_logout_all_devices', '_controller' => 'App\\Controller\\SecurityController::logoutAllDevices'], null, null, null, false, false, null]],
        '/admin/statistiques' => [[['_route' => 'app_admin_statistiques', '_controller' => 'App\\Controller\\StatistiqueController::index'], null, null, null, false, false, null]],
        '/unlock/request' => [[['_route' => 'app_unlock_request', '_controller' => 'App\\Controller\\UnlockController::request'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/utilisateur/plats/top-ventes.json' => [[['_route' => 'user_plats_top_ventes_json', '_controller' => 'App\\Controller\\UserPlatController::topVentesJson'], null, ['GET' => 0], null, false, false, null]],
        '/utilisateur/plats/top-ventes' => [[['_route' => 'user_plats_top_ventes', '_controller' => 'App\\Controller\\UserPlatController::topVentesPage'], null, ['GET' => 0], null, false, false, null]],
        '/utilisateur/api' => [
            [['_route' => 'utilisateur_api_index', '_controller' => 'App\\Controller\\UtilisateurController::apiIndex'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'utilisateur_api_create', '_controller' => 'App\\Controller\\UtilisateurController::apiCreate'], null, ['POST' => 0], null, false, false, null],
        ],
        '/utilisateur' => [[['_route' => 'app_utilisateur_liste', '_controller' => 'App\\Controller\\UtilisateurWebController::liste'], null, ['GET' => 0], null, true, false, null]],
        '/utilisateur/mon-profil' => [[['_route' => 'app_mon_profil', '_controller' => 'App\\Controller\\UtilisateurWebController::monProfil'], null, ['GET' => 0], null, false, false, null]],
        '/utilisateur/mon-historique' => [[['_route' => 'app_historique_index', '_controller' => 'App\\Controller\\UtilisateurWebController::monHistorique'], null, ['GET' => 0], null, false, false, null]],
        '/utilisateur/nouveau' => [[['_route' => 'app_utilisateur_nouveau', '_controller' => 'App\\Controller\\UtilisateurWebController::nouveau'], null, ['GET' => 0], null, false, false, null]],
        '/utilisateur/create' => [[['_route' => 'app_utilisateur_create', '_controller' => 'App\\Controller\\UtilisateurWebController::create'], null, ['POST' => 0], null, false, false, null]],
        '/utilisateur/export-pdf' => [[['_route' => 'app_utilisateur_export_pdf', '_controller' => 'App\\Controller\\UtilisateurWebController::exportPdf'], null, ['GET' => 0], null, false, false, null]],
        '/utilisateur/chat-search' => [[['_route' => 'app_utilisateur_chat_search', '_controller' => 'App\\Controller\\UtilisateurWebController::chatSearch'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/a(?'
                    .'|bonnement/checkout/([^/]++)(*:74)'
                    .'|dmin/(?'
                        .'|commandes/(?'
                            .'|([^/]++)/(?'
                                .'|edit\\-data(*:124)'
                                .'|update\\-ajax(*:144)'
                            .')'
                            .'|abandoned/([^/]++)/(?'
                                .'|accepter(*:183)'
                                .'|refuser(*:198)'
                            .')'
                            .'|([^/]++)/(?'
                                .'|delete(*:225)'
                                .'|accepter(*:241)'
                                .'|first\\-delivery(*:264)'
                                .'|refuser(*:279)'
                            .')'
                        .')'
                        .'|formation(?'
                            .'|s/(?'
                                .'|([^/]++)/inscriptions(*:327)'
                                .'|inscription/([^/]++)/(?'
                                    .'|accepter(*:367)'
                                    .'|refuser(*:382)'
                                .')'
                                .'|([^/]++)/(?'
                                    .'|edit(*:407)'
                                    .'|update(*:421)'
                                    .'|delete(*:435)'
                                    .'|generate\\-quiz\\-ai(*:461)'
                                    .'|quiz\\-duration(*:483)'
                                .')'
                            .')'
                            .'|/([^/]++)/quiz/generate\\-ai(*:520)'
                        .')'
                        .'|livraisons/(?'
                            .'|affecter/([^/]++)(*:560)'
                            .'|s(?'
                                .'|tatus/([^/]++)(*:586)'
                                .'|end\\-first\\-delivery/([^/]++)(*:623)'
                            .')'
                            .'|terminer/([^/]++)(*:649)'
                            .'|details/([^/]++)(*:673)'
                            .'|cancel\\-first\\-delivery/([^/]++)(*:713)'
                            .'|mark\\-first\\-packed/([^/]++)(*:749)'
                        .')'
                        .'|p(?'
                            .'|artenaires/(?'
                                .'|([^/]++)/(?'
                                    .'|accepter(*:796)'
                                    .'|refuser(*:811)'
                                    .'|supprimer(*:828)'
                                    .'|voir(*:840)'
                                .')'
                                .'|collaborations/([^/]++)/(?'
                                    .'|refuser(*:883)'
                                    .'|valider(*:898)'
                                .')'
                            .')'
                            .'|lats/([^/]++)/(?'
                                .'|approve(*:932)'
                                .'|reject(*:946)'
                            .')'
                            .'|osts/(?'
                                .'|([^/]++)/(?'
                                    .'|edit(*:979)'
                                    .'|delete(*:993)'
                                    .'|pin(*:1004)'
                                    .'|show(*:1017)'
                                    .'|comment(*:1033)'
                                    .'|like(*:1046)'
                                .')'
                                .'|comment/([^/]++)/(?'
                                    .'|like(*:1080)'
                                    .'|edit(*:1093)'
                                    .'|update(*:1108)'
                                    .'|delete(*:1123)'
                                .')'
                                .'|([^/]++)/reset\\-signals(*:1156)'
                            .')'
                            .'|roduits/([^/]++)/(?'
                                .'|edit(*:1190)'
                                .'|update(*:1205)'
                                .'|delete(*:1220)'
                            .')'
                        .')'
                    .')'
                    .'|pi/(?'
                        .'|quiz/start/([^/]++)(*:1257)'
                        .'|certificate/([^/]++)(*:1286)'
                        .'|admin/quiz/generate\\-ai/([^/]++)(*:1327)'
                    .')'
                .')'
                .'|/certificate/([^/]++)(?'
                    .'|(*:1362)'
                    .'|/pdf(*:1375)'
                .')'
                .'|/mes(?'
                    .'|\\-(?'
                        .'|livraisons/(?'
                            .'|commande/([^/]++)(*:1428)'
                            .'|([^/]++)/annuler(*:1453)'
                        .')'
                        .'|commandes/([^/]++)(?'
                            .'|/annuler(*:1492)'
                            .'|(*:1501)'
                        .')'
                    .')'
                    .'|sages/with/([^/]++)(*:1531)'
                .')'
                .'|/f(?'
                    .'|ormations/(?'
                        .'|([^/]++)(?'
                            .'|(*:1570)'
                            .'|/quiz(*:1584)'
                        .')'
                        .'|formation/([^/]++)/quiz/start(*:1623)'
                        .'|([^/]++)/quiz/submit(*:1652)'
                        .'|formation/([^/]++)/quiz/submit(*:1691)'
                        .'|([^/]++)/inscrire(*:1717)'
                        .'|inscription/([^/]++)/annuler(*:1754)'
                    .')'
                    .'|riend/(?'
                        .'|send/([^/]++)(*:1786)'
                        .'|accept(?'
                            .'|/([^/]++)(*:1813)'
                            .'|\\-from\\-user/([^/]++)(*:1843)'
                        .')'
                        .'|reject/([^/]++)(*:1868)'
                        .'|profile/([^/]++)(*:1893)'
                    .')'
                .')'
                .'|/set\\-locale/([^/]++)(*:1925)'
                .'|/notification/([^/]++)/read(*:1961)'
                .'|/p(?'
                    .'|artenaire/(?'
                        .'|collaboration(?'
                            .'|\\-produit/([^/]++)/choisir(*:2030)'
                            .'|s/([^/]++)/annuler(*:2057)'
                        .')'
                        .'|plat/([^/]++)/(?'
                            .'|modifier(*:2092)'
                            .'|supprimer(*:2110)'
                        .')'
                    .')'
                    .'|lats/(?'
                        .'|panier/([^/]++)/(?'
                            .'|maj(*:2151)'
                            .'|supprimer(*:2169)'
                        .')'
                        .'|([^/]++)/select(*:2194)'
                    .')'
                    .'|osts/(?'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|edit(*:2231)'
                                .'|update(*:2246)'
                                .'|delete(*:2261)'
                                .'|pin(*:2273)'
                                .'|re(?'
                                    .'|act(*:2290)'
                                    .'|post(*:2303)'
                                .')'
                                .'|comment(*:2320)'
                            .')'
                            .'|(*:2330)'
                        .')'
                        .'|comment/([^/]++)/(?'
                            .'|edit(*:2364)'
                            .'|update(*:2379)'
                            .'|delete(*:2394)'
                            .'|like(*:2407)'
                        .')'
                        .'|hashtag/([^/]++)(*:2433)'
                        .'|([^/]++)/(?'
                            .'|signal(*:2460)'
                            .'|favori(*:2475)'
                        .')'
                    .')'
                    .'|roduits/(?'
                        .'|panier/([^/]++)/(?'
                            .'|modifier(*:2524)'
                            .'|supprimer(*:2542)'
                        .')'
                        .'|([^/]++)/ajouter\\-panier(*:2576)'
                        .'|(\\d+)/commander(*:2600)'
                        .'|([^/]++)(*:2617)'
                        .'|panier/mini\\-update/([^/]++)(*:2654)'
                    .')'
                .')'
                .'|/re(?'
                    .'|compenses/echanger/([^/]++)(*:2698)'
                    .'|initialiser/([^/]++)(*:2727)'
                .')'
                .'|/u(?'
                    .'|nlock/verify/([^/]++)(*:2763)'
                    .'|tilisateur/(?'
                        .'|api/([^/]++)(?'
                            .'|(*:2801)'
                        .')'
                        .'|([^/]++)/(?'
                            .'|editer(*:2829)'
                            .'|update(*:2844)'
                            .'|delete(*:2859)'
                            .'|ajouter\\-points(*:2883)'
                            .'|ban(*:2895)'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        74 => [[['_route' => 'app_abonnement_checkout', '_controller' => 'App\\Controller\\AbonnementController::checkout'], ['plan'], null, null, false, true, null]],
        124 => [[['_route' => 'app_admin_commandes_edit_data', '_controller' => 'App\\Controller\\AdminCommandeController::editData'], ['id'], ['GET' => 0], null, false, false, null]],
        144 => [[['_route' => 'app_admin_commandes_update_ajax', '_controller' => 'App\\Controller\\AdminCommandeController::updateAjax'], ['id'], ['POST' => 0], null, false, false, null]],
        183 => [[['_route' => 'app_admin_abandoned_commandes_accepter', '_controller' => 'App\\Controller\\AdminCommandeController::accepterAbandoned'], ['id'], ['POST' => 0], null, false, false, null]],
        198 => [[['_route' => 'app_admin_abandoned_commandes_refuser', '_controller' => 'App\\Controller\\AdminCommandeController::refuserAbandoned'], ['id'], ['POST' => 0], null, false, false, null]],
        225 => [[['_route' => 'app_admin_commandes_delete', '_controller' => 'App\\Controller\\AdminCommandeController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        241 => [[['_route' => 'app_admin_commandes_accepter', '_controller' => 'App\\Controller\\AdminCommandeController::accepter'], ['id'], ['POST' => 0], null, false, false, null]],
        264 => [[['_route' => 'app_admin_commandes_first_delivery', '_controller' => 'App\\Controller\\AdminCommandeController::sendToFirstDelivery'], ['id'], ['POST' => 0], null, false, false, null]],
        279 => [[['_route' => 'app_admin_commandes_refuser', '_controller' => 'App\\Controller\\AdminCommandeController::refuser'], ['id'], ['POST' => 0], null, false, false, null]],
        327 => [[['_route' => 'app_admin_formations_inscriptions', '_controller' => 'App\\Controller\\AdminFormationController::inscriptions'], ['id'], ['GET' => 0], null, false, false, null]],
        367 => [[['_route' => 'app_admin_inscription_accepter', '_controller' => 'App\\Controller\\AdminFormationController::accepterInscription'], ['id'], ['POST' => 0], null, false, false, null]],
        382 => [[['_route' => 'app_admin_inscription_refuser', '_controller' => 'App\\Controller\\AdminFormationController::refuserInscription'], ['id'], ['POST' => 0], null, false, false, null]],
        407 => [[['_route' => 'app_admin_formations_edit', '_controller' => 'App\\Controller\\AdminFormationController::edit'], ['id'], ['GET' => 0], null, false, false, null]],
        421 => [[['_route' => 'app_admin_formations_update', '_controller' => 'App\\Controller\\AdminFormationController::update'], ['id'], ['POST' => 0], null, false, false, null]],
        435 => [[['_route' => 'app_admin_formations_delete', '_controller' => 'App\\Controller\\AdminFormationController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        461 => [[['_route' => 'app_admin_formations_generate_quiz_ai', '_controller' => 'App\\Controller\\AdminFormationController::generateQuizWithAi'], ['id'], ['POST' => 0], null, false, false, null]],
        483 => [[['_route' => 'app_admin_formations_quiz_duration', '_controller' => 'App\\Controller\\AdminFormationController::updateQuizDuration'], ['id'], ['POST' => 0], null, false, false, null]],
        520 => [[['_route' => 'app_admin_formation_quiz_generate_alias', '_controller' => 'App\\Controller\\AdminQuizGenerationAliasController::alias'], ['id'], ['POST' => 0], null, false, false, null]],
        560 => [[['_route' => 'app_admin_livraison_affecter', '_controller' => 'App\\Controller\\AdminLivraisonController::affecter'], ['id'], ['POST' => 0], null, false, true, null]],
        586 => [[['_route' => 'app_admin_livraison_status_ajax', '_controller' => 'App\\Controller\\AdminLivraisonController::updateStatus'], ['id'], ['POST' => 0], null, false, true, null]],
        623 => [[['_route' => 'app_admin_livraison_send_first_delivery', '_controller' => 'App\\Controller\\AdminLivraisonController::sendToFirstDelivery'], ['id'], ['POST' => 0], null, false, true, null]],
        649 => [[['_route' => 'app_admin_livraison_terminer', '_controller' => 'App\\Controller\\AdminLivraisonController::terminer'], ['id'], ['POST' => 0], null, false, true, null]],
        673 => [[['_route' => 'app_admin_livraison_details_ajax', '_controller' => 'App\\Controller\\AdminLivraisonController::details'], ['id'], ['GET' => 0], null, false, true, null]],
        713 => [[['_route' => 'app_admin_livraison_cancel_first_delivery', '_controller' => 'App\\Controller\\AdminLivraisonController::cancelFirstDelivery'], ['id'], ['POST' => 0], null, false, true, null]],
        749 => [[['_route' => 'app_admin_livraison_mark_first_packed', '_controller' => 'App\\Controller\\AdminLivraisonController::markFirstPacked'], ['id'], ['POST' => 0], null, false, true, null]],
        796 => [[['_route' => 'app_admin_partenaire_accepter', '_controller' => 'App\\Controller\\AdminPartenaireController::accepter'], ['id'], ['POST' => 0], null, false, false, null]],
        811 => [[['_route' => 'app_admin_partenaire_refuser', '_controller' => 'App\\Controller\\AdminPartenaireController::refuser'], ['id'], ['POST' => 0], null, false, false, null]],
        828 => [[['_route' => 'app_admin_partenaire_supprimer', '_controller' => 'App\\Controller\\AdminPartenaireController::supprimer'], ['id'], ['POST' => 0], null, false, false, null]],
        840 => [[['_route' => 'app_admin_partenaire_voir', '_controller' => 'App\\Controller\\AdminPartenaireController::voir'], ['id'], ['GET' => 0], null, false, false, null]],
        883 => [[['_route' => 'app_admin_collaboration_refuser', '_controller' => 'App\\Controller\\AdminPartenaireController::refuserCollaboration'], ['collaborationId'], ['POST' => 0], null, false, false, null]],
        898 => [[['_route' => 'app_admin_collaboration_valider', '_controller' => 'App\\Controller\\AdminPartenaireController::validerCollaboration'], ['collaborationId'], ['POST' => 0], null, false, false, null]],
        932 => [[['_route' => 'app_admin_plat_approve', '_controller' => 'App\\Controller\\AdminPlatController::approve'], ['id'], ['POST' => 0], null, false, false, null]],
        946 => [[['_route' => 'app_admin_plat_reject', '_controller' => 'App\\Controller\\AdminPlatController::reject'], ['id'], ['POST' => 0], null, false, false, null]],
        979 => [[['_route' => 'app_admin_post_edit', '_controller' => 'App\\Controller\\AdminPostController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        993 => [[['_route' => 'app_admin_post_delete', '_controller' => 'App\\Controller\\AdminPostController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1004 => [[['_route' => 'app_admin_post_pin', '_controller' => 'App\\Controller\\AdminPostController::pin'], ['id'], ['POST' => 0], null, false, false, null]],
        1017 => [[['_route' => 'app_admin_post_show', '_controller' => 'App\\Controller\\AdminPostController::show'], ['id'], ['GET' => 0], null, false, false, null]],
        1033 => [[['_route' => 'app_admin_post_comment', '_controller' => 'App\\Controller\\AdminPostController::comment'], ['id'], ['POST' => 0], null, false, false, null]],
        1046 => [[['_route' => 'app_admin_post_like', '_controller' => 'App\\Controller\\AdminPostController::like'], ['id'], ['POST' => 0], null, false, false, null]],
        1080 => [[['_route' => 'app_admin_comment_like', '_controller' => 'App\\Controller\\AdminPostController::likeComment'], ['id'], ['POST' => 0], null, false, false, null]],
        1093 => [[['_route' => 'app_admin_comment_edit', '_controller' => 'App\\Controller\\AdminPostController::editComment'], ['id'], ['GET' => 0], null, false, false, null]],
        1108 => [[['_route' => 'app_admin_comment_update', '_controller' => 'App\\Controller\\AdminPostController::updateComment'], ['id'], ['POST' => 0], null, false, false, null]],
        1123 => [[['_route' => 'app_admin_comment_delete', '_controller' => 'App\\Controller\\AdminPostController::deleteComment'], ['id'], ['POST' => 0], null, false, false, null]],
        1156 => [[['_route' => 'app_admin_post_reset_signals', '_controller' => 'App\\Controller\\AdminPostController::resetSignals'], ['id'], ['POST' => 0], null, false, false, null]],
        1190 => [[['_route' => 'app_admin_produits_edit', '_controller' => 'App\\Controller\\AdminProduitController::edit'], ['id'], ['GET' => 0], null, false, false, null]],
        1205 => [[['_route' => 'app_admin_produits_update', '_controller' => 'App\\Controller\\AdminProduitController::update'], ['id'], ['POST' => 0], null, false, false, null]],
        1220 => [[['_route' => 'app_admin_produits_delete', '_controller' => 'App\\Controller\\AdminProduitController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1257 => [[['_route' => 'app_apiquiz_start', '_controller' => 'App\\Controller\\ApiQuizController::start'], ['formationId'], ['POST' => 0], null, false, true, null]],
        1286 => [[['_route' => 'app_apiquiz_certificate', '_controller' => 'App\\Controller\\ApiQuizController::certificate'], ['id'], ['GET' => 0], null, false, true, null]],
        1327 => [[['_route' => 'app_apiquiz_generateai', '_controller' => 'App\\Controller\\ApiQuizController::generateAi'], ['formationId'], ['POST' => 0], null, false, true, null]],
        1362 => [[['_route' => 'app_certificate_show', '_controller' => 'App\\Controller\\CertificateController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1375 => [[['_route' => 'app_certificate_pdf', '_controller' => 'App\\Controller\\CertificateController::pdf'], ['id'], ['GET' => 0], null, false, false, null]],
        1428 => [[['_route' => 'app_client_livraison_commande', '_controller' => 'App\\Controller\\ClientLivraisonController::voirLivraisonParCommande'], ['id'], ['GET' => 0], null, false, true, null]],
        1453 => [[['_route' => 'app_client_livraison_annuler', '_controller' => 'App\\Controller\\ClientLivraisonController::annulerLivraison'], ['id'], ['POST' => 0], null, false, false, null]],
        1492 => [[['_route' => 'app_mes_commandes_annuler', '_controller' => 'App\\Controller\\CommandeController::annuler'], ['id'], ['POST' => 0], null, false, false, null]],
        1501 => [[['_route' => 'app_mes_commandes_show', '_controller' => 'App\\Controller\\CommandeController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1531 => [[['_route' => 'app_messages_conversation', '_controller' => 'App\\Controller\\MessageController::conversation'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        1570 => [[['_route' => 'app_formations_show', '_controller' => 'App\\Controller\\FormationController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1584 => [[['_route' => 'app_formations_quiz_start', '_controller' => 'App\\Controller\\FormationController::startQuiz'], ['id'], ['GET' => 0], null, false, false, null]],
        1623 => [[['_route' => 'app_formation_quiz_start', '_controller' => 'App\\Controller\\FormationController::startQuiz'], ['id'], ['GET' => 0], null, false, false, null]],
        1652 => [[['_route' => 'app_formations_quiz_submit', '_controller' => 'App\\Controller\\FormationController::submitQuiz'], ['id'], ['POST' => 0], null, false, false, null]],
        1691 => [[['_route' => 'app_formation_quiz_submit', '_controller' => 'App\\Controller\\FormationController::submitQuiz'], ['id'], ['POST' => 0], null, false, false, null]],
        1717 => [[['_route' => 'app_formations_inscrire', '_controller' => 'App\\Controller\\FormationController::inscrire'], ['id'], ['POST' => 0], null, false, false, null]],
        1754 => [[['_route' => 'app_inscription_annuler', '_controller' => 'App\\Controller\\FormationController::annulerInscription'], ['id'], ['POST' => 0], null, false, false, null]],
        1786 => [[['_route' => 'app_friend_send', '_controller' => 'App\\Controller\\FriendController::sendRequest'], ['id'], ['POST' => 0], null, false, true, null]],
        1813 => [[['_route' => 'app_friend_accept', '_controller' => 'App\\Controller\\FriendController::acceptRequest'], ['id'], ['POST' => 0], null, false, true, null]],
        1843 => [[['_route' => 'app_friend_accept_from_user', '_controller' => 'App\\Controller\\FriendController::acceptRequestFromUser'], ['id'], ['POST' => 0], null, false, true, null]],
        1868 => [[['_route' => 'app_friend_reject', '_controller' => 'App\\Controller\\FriendController::rejectRequest'], ['id'], ['POST' => 0], null, false, true, null]],
        1893 => [[['_route' => 'app_friend_profile', '_controller' => 'App\\Controller\\FriendController::friendProfile'], ['id'], null, null, false, true, null]],
        1925 => [[['_route' => 'app_set_locale', '_controller' => 'App\\Controller\\LanguageController::setLocale'], ['locale'], null, null, false, true, null]],
        1961 => [[['_route' => 'app_notification_read', '_controller' => 'App\\Controller\\NotificationController::markAsRead'], ['id'], ['POST' => 0], null, false, false, null]],
        2030 => [[['_route' => 'app_partenaire_choisir_collaboration_produit', '_controller' => 'App\\Controller\\PartenaireController::choisirCollaborationProduit'], ['produitId'], ['POST' => 0], null, false, false, null]],
        2057 => [[['_route' => 'app_partenaire_annuler_collaboration', '_controller' => 'App\\Controller\\PartenaireController::annulerCollaboration'], ['collaborationId'], ['POST' => 0], null, false, false, null]],
        2092 => [[['_route' => 'app_partenaire_plat_modifier', '_controller' => 'App\\Controller\\PartenaireController::modifierPlat'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        2110 => [[['_route' => 'app_partenaire_plat_supprimer', '_controller' => 'App\\Controller\\PartenaireController::supprimerPlat'], ['id'], ['POST' => 0], null, false, false, null]],
        2151 => [[['_route' => 'app_plat_panier_maj', '_controller' => 'App\\Controller\\PlatPublicController::majLignePanierPlat'], ['id'], ['POST' => 0], null, false, false, null]],
        2169 => [[['_route' => 'app_plat_panier_supprimer', '_controller' => 'App\\Controller\\PlatPublicController::supprimerLignePanierPlat'], ['id'], ['POST' => 0], null, false, false, null]],
        2194 => [[['_route' => 'app_plat_select', '_controller' => 'App\\Controller\\PlatPublicController::selectPlat'], ['id'], ['POST' => 0], null, false, false, null]],
        2231 => [[['_route' => 'app_post_edit', '_controller' => 'App\\Controller\\PostController::edit'], ['id'], ['GET' => 0], null, false, false, null]],
        2246 => [[['_route' => 'app_post_update', '_controller' => 'App\\Controller\\PostController::update'], ['id'], ['POST' => 0], null, false, false, null]],
        2261 => [[['_route' => 'app_post_delete', '_controller' => 'App\\Controller\\PostController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        2273 => [[['_route' => 'app_post_pin', '_controller' => 'App\\Controller\\PostController::pin'], ['id'], ['POST' => 0], null, false, false, null]],
        2290 => [[['_route' => 'app_post_react', '_controller' => 'App\\Controller\\PostController::react'], ['id'], ['POST' => 0], null, false, false, null]],
        2303 => [[['_route' => 'app_post_repost', '_controller' => 'App\\Controller\\PostController::repost'], ['id'], ['POST' => 0], null, false, false, null]],
        2320 => [[['_route' => 'app_post_comment', '_controller' => 'App\\Controller\\PostController::comment'], ['id'], ['POST' => 0], null, false, false, null]],
        2330 => [[['_route' => 'app_post_show', '_controller' => 'App\\Controller\\PostController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        2364 => [[['_route' => 'app_comment_edit', '_controller' => 'App\\Controller\\PostController::editComment'], ['id'], ['GET' => 0], null, false, false, null]],
        2379 => [[['_route' => 'app_comment_update', '_controller' => 'App\\Controller\\PostController::updateComment'], ['id'], ['POST' => 0], null, false, false, null]],
        2394 => [[['_route' => 'app_comment_delete', '_controller' => 'App\\Controller\\PostController::deleteComment'], ['id'], ['POST' => 0], null, false, false, null]],
        2407 => [[['_route' => 'app_comment_like', '_controller' => 'App\\Controller\\PostController::likeComment'], ['id'], ['POST' => 0], null, false, false, null]],
        2433 => [[['_route' => 'app_posts_hashtag', '_controller' => 'App\\Controller\\PostController::postsByHashtag'], ['name'], ['GET' => 0], null, false, true, null]],
        2460 => [[['_route' => 'app_post_signal', '_controller' => 'App\\Controller\\PostController::signal'], ['id'], ['POST' => 0], null, false, false, null]],
        2475 => [[['_route' => 'app_post_favori', '_controller' => 'App\\Controller\\PostController::toggleFavori'], ['id'], ['POST' => 0], null, false, false, null]],
        2524 => [[['_route' => 'app_panier_update', '_controller' => 'App\\Controller\\ProduitController::modifierPanier'], ['id'], ['POST' => 0], null, false, false, null]],
        2542 => [[['_route' => 'app_panier_remove', '_controller' => 'App\\Controller\\ProduitController::supprimerDuPanier'], ['id'], ['POST' => 0], null, false, false, null]],
        2576 => [[['_route' => 'app_panier_add', '_controller' => 'App\\Controller\\ProduitController::ajouterPanier'], ['id'], ['POST' => 0], null, false, false, null]],
        2600 => [[['_route' => 'app_produits_commander', '_controller' => 'App\\Controller\\ProduitController::commander'], ['id'], ['POST' => 0], null, false, false, null]],
        2617 => [[['_route' => 'app_produits_show', '_controller' => 'App\\Controller\\ProduitController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        2654 => [[['_route' => 'app_panier_mini_update', '_controller' => 'App\\Controller\\ProduitController::miniPanierUpdate'], ['id'], ['POST' => 0], null, false, true, null]],
        2698 => [[['_route' => 'app_recompenses_echanger', '_controller' => 'App\\Controller\\RecompenseController::echanger'], ['id'], ['POST' => 0], null, false, true, null]],
        2727 => [[['_route' => 'app_reset_password', '_controller' => 'App\\Controller\\ResetPasswordController::reset'], ['token'], null, null, false, true, null]],
        2763 => [[['_route' => 'app_unlock_verify', '_controller' => 'App\\Controller\\UnlockController::verify'], ['email'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        2801 => [
            [['_route' => 'utilisateur_api_show', '_controller' => 'App\\Controller\\UtilisateurController::apiShow'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'utilisateur_api_update', '_controller' => 'App\\Controller\\UtilisateurController::apiUpdate'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'utilisateur_api_delete', '_controller' => 'App\\Controller\\UtilisateurController::apiDelete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        2829 => [[['_route' => 'app_utilisateur_editer', '_controller' => 'App\\Controller\\UtilisateurWebController::editer'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        2844 => [[['_route' => 'app_utilisateur_update', '_controller' => 'App\\Controller\\UtilisateurWebController::update'], ['id'], ['POST' => 0], null, false, false, null]],
        2859 => [[['_route' => 'app_utilisateur_delete', '_controller' => 'App\\Controller\\UtilisateurWebController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        2883 => [[['_route' => 'app_utilisateur_ajouter_points', '_controller' => 'App\\Controller\\UtilisateurWebController::ajouterPoints'], ['id'], ['POST' => 0], null, false, false, null]],
        2895 => [
            [['_route' => 'app_utilisateur_ban', '_controller' => 'App\\Controller\\UtilisateurWebController::ban'], ['id'], ['POST' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];

<?php

$data = array(
	'routes' => array(
		'activation' => array(
			'route' => '/aktivierung',
			'redirect' => '/activation/index.php',
		),
		'activation_email' => array(
			'route' => '/aktivierung/email/:?optcode',
			'redirect' => '/activation/email.php',
			'meta' => array(
				'token' => '1',
			),
		),
		'activation_gen_email' => array(
			'route' => '/aktivierung/email/:?optcode',
			'redirect' => '/activation/email.php',
		),
		'activation_confirmation' => array(
			'route' => '/aktivierung/bestaetigung/:optcode',
			'redirect' => '/activation/confirmation.php',
		),
		'career' => array(
			'route' => '/career',
			'redirect' => '/career/index.php',
		),
		'career_apply' => array(
			'route' => '/career/apply/:job',
			'redirect' => '/career/apply.php',
		),
		'eventpics_user' => array(
			'route' => '/eventpics/user/:username',
			'redirect' => '/eventpics/show_search.php',
		),
		'eventpics_search' => array(
			'route' => '/eventpics/search',
			'redirect' => '/eventpics/show_search.php',
		),
		'eventpics_gallery_abuse' => array(
			'route' => '/eventpics/:gallery_id/abuse',
			'redirect' => '/eventpics/abuse.php',
		),
		'eventpics_gallery_comments' => array(
			'route' => '/eventpics/:g/comments/:?page',
			'redirect' => '/eventpics/comments.php',
		),
		'eventpics_gallery_image' => array(
			'route' => '/eventpics/:id/image/:image',
			'redirect' => '/eventpics/image.php',
		),
		'eventpics_gallery_image_comment_set' => array(
			'route' => '/eventpics/:id/image/:image/comment',
			'redirect' => '/eventpics/image.php',
		),
		'eventpics_gallery_image_comment_del' => array(
			'meta' => array(
				'token' => '1',
			),
			'route' => '/eventpics/:id/image/:image/delete_comment/:delcomment',
			'redirect' => '/eventpics/image.php',
		),
		'eventpics_gallery_image_comment_abuse' => array(
			'meta' => array(
				'token' => '1',
			),
			'route' => '/eventpics/:id/image/:image/report_comment/:blowwhistle',
			'redirect' => '/eventpics/image.php',
		),
		'eventpics_gallery_image_pin_set' => array(
			'meta' => array(
				'token' => '1',
			),
			'route' => '/eventpics/:id/image/:image/set_pin',
			'redirect' => '/eventpics/image.php',
		),
		'eventpics_gallery_image_pin_del' => array(
			'meta' => array(
				'token' => '1',
			),
			'route' => '/eventpics/:id/image/:image/delete_pin/:?userid',
			'redirect' => '/eventpics/image.php',
		),
		'eventpics_gallery_top' => array(
			'route' => '/eventpics/:g/top/:?page',
			'redirect' => '/eventpics/top.php',
		),
		'eventpics_gallery_people' => array(
			'route' => '/eventpics/:g/people/:?page',
			'redirect' => '/eventpics/member-pins.php',
		),
		'eventpics_gallery' => array(
			'route' => '/eventpics/:g/:?page',
			'redirect' => '/eventpics/show.php',
		),
		'eventpics' => array(
			'route' => '/eventpics',
			'redirect' => '/eventpics/index.php',
		),
		'events_prefered_location_toggle' => array(
			'meta' => array(
				'token' => '1',
			),
			'route' => '/events/location/favourite/:l',
			'redirect' => '/events/location/index.php',
		),
		'events_location' => array(
			'route' => '/events/location/:l',
			'redirect' => '/events/location/index.php',
		),
		'events_search' => array(
			'route' => '/events/search/:?load',
			'redirect' => '/events/suche/index.php',
		),
		'events_calendar' => array(
			'route' => '/events/calendar',
			'redirect' => '/events/index_ajax.php',
		),
		'events_myevents' => array(
			'route' => '/events/myevents',
			'redirect' => '/events/meine-events.php',
		),
		'events_propose' => array(
			'meta' => array(
				'token' => '1',
			),
			'route' => '/events/propose',
			'redirect' => '/events/vorschlagen.php',
		),
		'events_route' => array(
			'route' => '/events/:e/route',
			'redirect' => '/events/anfahrt/index.php',
		),
		'events_submissions' => array(
			'route' => '/events/:e/submissions',
			'redirect' => '/events/anmeldungen/index.php',
		),
		'events_submissions_submit' => array(
			'meta' => array(
				'token' => '1',
			),
			'route' => '/events/:e/submissions/submit',
			'redirect' => '/events/anmeldungen/index.php',
		),
		'events_submissions_unsubmit' => array(
			'meta' => array(
				'token' => '1',
			),
			'route' => '/events/:e/submissions/unsubmit',
			'redirect' => '/events/anmeldungen/index.php',
		),
		'events_submit' => array(
			'meta' => array(
				'token' => '1',
			),
			'route' => '/events/:e/submit',
			'redirect' => '/events/info/index.php',
		),
		'events_unsubmit' => array(
			'meta' => array(
				'token' => '1',
			),
			'route' => '/events/:e/unsubmit',
			'redirect' => '/events/info/index.php',
		),
		'events_invite' => array(
			'route' => '/events/:e/invite',
			'redirect' => '/events/info/index.php',
		),
		'events_info' => array(
			'route' => '/events/:e',
			'redirect' => '/events/info/index.php',
		),
		'events_date' => array(
			'route' => '/events/date/:?d',
			'redirect' => '/events/index.php',
		),
		'events' => array(
			'route' => '/events',
			'redirect' => '/events/index.php',
		),
		'group_directors' => array(
			'route' => '/clans/:cl_id/mitglieder/vorstand',
			'redirect' => '/clans/clan/mitglieder/vorstand.php',
		),
		'group_dynamic_route' => array(
			'route' => '/clans/:cl_id/:query',
			'redirect' => '/clans/clan/dispatcher.php',
		),
		'group_members' => array(
			'route' => '/clans/:cl_id/mitglieder',
			'redirect' => '/clans/clan/mitglieder/index.php',
		),
		'group_membership' => array(
			'route' => '/clans/:cl_id/mitgliedschaft',
			'redirect' => '/clans/clan/mitgliedschaft.php',
		),
		'group_settings' => array(
			'route' => '/clans/:cl_id/verwalten/einstellungen',
			'redirect' => '/clans/clan/verwalten/einstellungen.php',
		),
		'group_invite_member' => array(
			'route' => '/clans/:cl_id/kwickie-einladen/:?username',
			'redirect' => '/clans/clan/kwickie-einladen.php',
		),
		'group_mail_admins' => array(
			'route' => '/clans/:cl_id/admin-email',
			'redirect' => '/clans/clan/admin-email.php',
		),
		'group_manage_blog_subscritions' => array(
			'route' => '/clans/:cl_id/verwalten/blogabos/:?page',
			'redirect' => '/clans/clan/verwalten/blogabos.php',
		),
		'group_manage_invitations' => array(
			'route' => '/clans/:cl_id/verwalten/einladungen',
			'redirect' => '/clans/clan/verwalten/einladungen.php',
		),
		'group_manage_layout' => array(
			'route' => '/clans/:cl_id/verwalten/layout',
			'redirect' => '/clans/clan/verwalten/layout.php',
		),
		'group_manage_deletion' => array(
			'route' => '/clans/:cl_id/verwalten/loeschen',
			'redirect' => '/clans/clan/verwalten/loeschen.php',
		),
		'group_manage_membership_proposals' => array(
			'route' => '/clans/:cl_id/verwalten/mitgliedschaftsantraege',
			'redirect' => '/clans/clan/verwalten/mitgliedschaftsantraege.php',
		),
		'groups' => array(
			'route' => '/clans',
			'redirect' => '/clans/index.php',
		),
		'groups_categories' => array(
			'route' => '/clans/kategorien/:category/:?page',
			'redirect' => '/clans/kategorien/kategorie.php',
		),
		'groups_search' => array(
			'route' => '/clans/search',
			'redirect' => '/clans/suche/index.php',
		),
		'help' => array(
			'route' => '/help',
			'redirect' => '/help/index.php',
		),
		'help_request' => array(
			'route' => '/help/request',
			'redirect' => '/help/request.php',
		),
		'magazine' => array(
			'route' => '/magazine',
			'controller' => 'Controller_Magazine_Index',
			'method' => 'index',
			'view' => 'Magazine/Index.tpl',
			'meta' => array(
				'menu' => array(
					'0' => '8',
					'1' => '6',
				),
				'logpage' => 'magazine',
			),
		),
		'magazine_article' => array(
			'route' => '/magazine/article/:id/:?name',
			'controller' => 'Controller_Magazine_Article',
			'method' => 'article',
			'view' => 'Magazine/Article.tpl',
			'meta' => array(
				'menu' => array(
					'0' => '8',
					'1' => '6',
				),
				'logpage' => 'magazine',
			),
		),
		'magazine_article_insert_comment' => array(
			'route' => '/magazine/article/:id/comment_add',
			'controller' => 'Controller_Magazine_Article',
			'method' => 'insertComment',
			'meta' => array(
				'logpage' => 'magazine',
			),
		),
		'magazine_article_comment_del' => array(
			'route' => '/magazine/article/:id/comment_del/:comment_id',
			'controller' => 'Controller_Magazine_Article',
			'method' => 'deleteComment',
			'meta' => array(
				'logpage' => 'magazine',
			),
		),
		'magazine_article_raffle' => array(
			'route' => '/magazine/article/:id/raffle',
			'controller' => 'Controller_Magazine_Article',
			'method' => 'raffle',
			'meta' => array(
				'logpage' => 'magazine',
			),
		),
		'magazine_search' => array(
			'route' => '/magazine/search',
			'controller' => 'Controller_Magazine_Search',
			'method' => 'search',
			'view' => 'Magazine/Search.tpl',
			'meta' => array(
				'menu' => array(
					'0' => '8',
					'1' => '6',
				),
				'logpage' => 'magazine',
			),
		),
		'magazine_compat' => array(
			'route' => '/magazin',
			'controller' => 'Controller_Magazine_Index',
			'method' => 'index',
			'view' => 'Magazine/Index.tpl',
			'meta' => array(
				'menu' => array(
					'0' => '8',
					'1' => '6',
				),
				'logpage' => 'magazine',
			),
		),
		'magazine_compat_article' => array(
			'route' => '/magazin/artikel/:name/:id',
			'controller' => 'Controller_Magazine_Article',
			'method' => 'article',
			'view' => 'Magazine/Article.tpl',
			'meta' => array(
				'menu' => array(
					'0' => '8',
					'1' => '6',
				),
				'logpage' => 'magazine',
			),
		),
		'magazine_compat_search' => array(
			'route' => '/magazin/suche',
			'controller' => 'Controller_Magazine_Search',
			'method' => 'search',
			'view' => 'Magazine/Search.tpl',
			'meta' => array(
				'menu' => array(
					'0' => '8',
					'1' => '6',
				),
				'logpage' => 'magazine',
			),
		),
		'welcome' => array(
			'route' => '/willkommen/:?step',
			'redirect' => '/welcome/index.php',
		),
		'welcome_ajax' => array(
			'route' => '/willkommen/ajax',
			'redirect' => '/welcome/ajax.php',
		),
		'welcome_ajax_step' => array(
			'route' => '/willkommen/ajax_step',
			'redirect' => '/welcome/ajax_step.php',
		),
		'welcome_ban' => array(
			'route' => '/willkommen/sperren/:ban',
			'redirect' => '/welcome/sperren.php',
		),
		'help_wiki' => array(
			'route' => 'http://hilfe.kwick.de/index.php/:?topic',
			'redirect' => '/index.php',
		),
		'profile_statistics' => array(
			'route' => '/:username/statistics',
			'redirect' => '/profil/statistics.php',
		),
		'profile_activities' => array(
			'route' => '/:username/activities',
			'redirect' => '/profil/activities.php',
		),
		'profile_activities_ajax' => array(
			'route' => '/:username/activities/ajax/:section/:?page',
			'redirect' => '/profil/activities_ajax.php',
		),
		'mail_folder' => array(
			'route' => '/mail/folder/:?folder',
			'redirect' => '/mail/index.php',
		),
		'mail_headers' => array(
			'route' => '/mail/headers/:folder/:msg',
			'redirect' => '/mail/headers.php',
		),
		'mail_write_attachment' => array(
			'route' => '/mail/write/attachment',
			'redirect' => '/mail/write_attachment.php',
		),
		'mail_write' => array(
			'route' => '/mail/write',
			'redirect' => '/mail/write.php',
		),
		'mail_read_part' => array(
			'route' => '/mail/attachment/:msg/:imap_id',
			'redirect' => '/mail/read_attachment.php',
		),
		'mail_read' => array(
			'route' => '/mail/read/:folder/:msg',
			'redirect' => '/mail/read.php',
		),
		'mail_print' => array(
			'route' => '/mail/print/:msg',
			'redirect' => '/mail/print.php',
		),
		'mail_search' => array(
			'route' => '/mail/search/',
			'redirect' => '/mail/search.php',
		),
		'mail_save' => array(
			'route' => '/mail/save/:msg',
			'redirect' => '/mail/save.php',
		),
		'mail_maintenance' => array(
			'route' => '/mail/maintenance',
			'redirect' => '/mail/maintenance.php',
		),
		'mail' => array(
			'route' => '/mail',
			'redirect' => '/mail/index.php',
		),
		'registration' => array(
			'route' => '/registration',
			'redirect' => '/index.php',
			'params' => array(
				'tunnel' => '1',
			),
		),
		'registration_optcode' => array(
			'route' => '/registration/:optcode',
			'redirect' => '/registration/confirmation.php',
		),
		'registration_confirm' => array(
			'route' => '/registration/confirm',
			'redirect' => '/registration/confirmation.php',
		),
		'registration_ajax' => array(
			'route' => '/registration/ajax',
			'redirect' => '/registration/ajax.php',
		),
		'profile_gb' => array(
			'route' => '/:username/gb/:?page',
			'redirect' => '/profil/gb.php',
		),
		'profile_gb_ajax_page' => array(
			'route' => '/:username/gb/ajax_page/:?page',
			'redirect' => '/profil/gb.php',
		),
		'profile_gb_ajax_question' => array(
			'route' => '/:username/gb/question/:gb_id/:author/:?page',
			'redirect' => '/profil/gb.php',
		),
		'profile_gb_comment_edit' => array(
			'route' => '/:username/gb/comment/edit/:gb_id',
			'redirect' => '/profil/gb.php',
		),
		'profile_gb_comment_remove' => array(
			'route' => '/:username/gb/comment/remove/:gb_id',
			'redirect' => '/profil/gb.php',
		),
		'profile_gb_edit' => array(
			'route' => '/:username/gb/edit/:gb_id/:?page',
			'redirect' => '/profil/gb.php',
		),
		'profile_gb_edit_save' => array(
			'route' => '/:username/gb/edit/save',
			'redirect' => '/profil/gb.php',
		),
		'profile_gb_important' => array(
			'route' => '/:username/gb/important/:gb_id',
			'redirect' => '/profil/gb.php',
		),
		'profile_gb_new' => array(
			'route' => '/:username/gb/new',
			'redirect' => '/profil/gb.php',
		),
		'profile_gb_new_quote' => array(
			'route' => '/:username/gb/new/:gb_id/:owner_id',
			'redirect' => '/profil/gb.php',
		),
		'profile_gb_permalink' => array(
			'route' => '/:username/gb/permalink/:gb_id',
			'redirect' => '/profil/gb.php',
		),
		'profile_gb_permalink_compat' => array(
			'route' => '/:username/gb/eintrag/:gb_id',
			'redirect' => '/profil/gb.php',
		),
		'profile_gb_pin' => array(
			'route' => '/:username/gb/pin/:gb_id/:?by_user',
			'redirect' => '/profil/gb.php',
		),
		'profile_gb_quote' => array(
			'route' => '/:username/gb/quote/:gb_id/:author',
			'redirect' => '/profil/gb.php',
		),
		'profile_gb_remove' => array(
			'route' => '/:username/gb/remove',
			'redirect' => '/profil/gb.php',
		),
		'profile_gb_rss' => array(
			'route' => '/rss/gb/:username',
			'redirect' => '/rss/index.php',
		),
		'profile_gb_save' => array(
			'route' => '/:username/gb/save',
			'redirect' => '/profil/gb.php',
		),
		'profile_gb_save_quickanswer' => array(
			'route' => '/:username/gb/save/quickanswer',
			'redirect' => '/profil/gb.php',
		),
		'profile_gb_send_picture' => array(
			'route' => '/:username/gb/send/picture/:encode',
			'redirect' => '/profil/gb.php',
		),
		'dialogue_abuse_ajax' => array(
			'route' => '/dialogue/abuse/ajax',
			'redirect' => '/dialogue/abuse.php',
		),
		'widget_group' => array(
			'route' => '/widget/group/:cl_id',
			'redirect' => '/clans/clan/widget/index.php',
		),
		'modulemanager_config' => array(
			'route' => '/modulemanager/:modulename/config',
			'controller' => 'Controller_ModuleManager',
			'method' => 'loadConfig',
		),
		'modulemanager_config_save' => array(
			'route' => '/modulemanager/:modulename/config/save',
			'controller' => 'Controller_ModuleManager',
			'method' => 'saveConfig',
		),
		'modulemanager_click' => array(
			'route' => '/modulemanager/:modulename/click',
			'controller' => 'Controller_ModuleManager',
			'method' => 'click',
		),
		'modulemanager_module' => array(
			'route' => '/modulemanager/:modulename',
			'controller' => 'Controller_ModuleManager',
			'method' => 'loadModule',
		),
		'forum' => array(
			'route' => '/forum',
			'controller' => 'Controller_Forum_Index',
			'method' => 'index',
			'view' => 'Module/ColTwoLeftTop.tpl',
			'meta' => array(
				'menu' => array(
					'0' => '8',
					'1' => '5',
				),
			),
		),
		'members' => array(
			'route' => '/members',
			'redirect' => '/members/index.php',
		),
		'members_search_online' => array(
			'route' => '/members/online',
			'redirect' => '/members/index.php',
			'params' => array(
				'e_online' => '1',
			),
		),
		'members_search_blogs' => array(
			'route' => '/members/blogs',
			'redirect' => '/members/blogs/index.php',
		),
		'members_search_fof' => array(
			'route' => '/members/fof',
			'redirect' => '/members/index.php',
			'params' => array(
				'fof' => '1',
			),
		),
		'members_search_photos' => array(
			'route' => '/members/photos',
			'redirect' => '/members/photos/index.php',
		),
		'members_search_schools_ajax' => array(
			'route' => '/members/search/schools/ajax',
			'redirect' => '/members/search/schools_ajax.php',
		),
	),
	'tree' => array(
		'aktivierung' => array(
			'/' => 'activation',
			'email' => array(
				'/' => 'activation_gen_email',
				'*' => array(
					'/' => 'activation_gen_email',
				),
			),
			'bestaetigung' => array(
				'*' => array(
					'/' => 'activation_confirmation',
				),
			),
		),
		'career' => array(
			'/' => 'career',
			'apply' => array(
				'*' => array(
					'/' => 'career_apply',
				),
			),
		),
		'eventpics' => array(
			'user' => array(
				'*' => array(
					'/' => 'eventpics_user',
				),
			),
			'search' => array(
				'/' => 'eventpics_search',
			),
			'*' => array(
				'abuse' => array(
					'/' => 'eventpics_gallery_abuse',
				),
				'comments' => array(
					'/' => 'eventpics_gallery_comments',
					'*' => array(
						'/' => 'eventpics_gallery_comments',
					),
				),
				'image' => array(
					'*' => array(
						'/' => 'eventpics_gallery_image',
						'comment' => array(
							'/' => 'eventpics_gallery_image_comment_set',
						),
						'delete_comment' => array(
							'*' => array(
								'/' => 'eventpics_gallery_image_comment_del',
							),
						),
						'report_comment' => array(
							'*' => array(
								'/' => 'eventpics_gallery_image_comment_abuse',
							),
						),
						'set_pin' => array(
							'/' => 'eventpics_gallery_image_pin_set',
						),
						'delete_pin' => array(
							'/' => 'eventpics_gallery_image_pin_del',
							'*' => array(
								'/' => 'eventpics_gallery_image_pin_del',
							),
						),
					),
				),
				'top' => array(
					'/' => 'eventpics_gallery_top',
					'*' => array(
						'/' => 'eventpics_gallery_top',
					),
				),
				'people' => array(
					'/' => 'eventpics_gallery_people',
					'*' => array(
						'/' => 'eventpics_gallery_people',
					),
				),
				'/' => 'eventpics_gallery',
				'*' => array(
					'/' => 'eventpics_gallery',
				),
			),
			'/' => 'eventpics',
		),
		'events' => array(
			'location' => array(
				'favourite' => array(
					'*' => array(
						'/' => 'events_prefered_location_toggle',
					),
				),
				'*' => array(
					'/' => 'events_location',
				),
			),
			'search' => array(
				'/' => 'events_search',
				'*' => array(
					'/' => 'events_search',
				),
			),
			'calendar' => array(
				'/' => 'events_calendar',
			),
			'myevents' => array(
				'/' => 'events_myevents',
			),
			'propose' => array(
				'/' => 'events_propose',
			),
			'*' => array(
				'route' => array(
					'/' => 'events_route',
				),
				'submissions' => array(
					'/' => 'events_submissions',
					'submit' => array(
						'/' => 'events_submissions_submit',
					),
					'unsubmit' => array(
						'/' => 'events_submissions_unsubmit',
					),
				),
				'submit' => array(
					'/' => 'events_submit',
				),
				'unsubmit' => array(
					'/' => 'events_unsubmit',
				),
				'invite' => array(
					'/' => 'events_invite',
				),
				'/' => 'events_info',
			),
			'date' => array(
				'/' => 'events_date',
				'*' => array(
					'/' => 'events_date',
				),
			),
			'/' => 'events',
		),
		'clans' => array(
			'*' => array(
				'mitglieder' => array(
					'vorstand' => array(
						'/' => 'group_directors',
					),
					'/' => 'group_members',
				),
				'*' => array(
					'/' => 'group_dynamic_route',
				),
				'mitgliedschaft' => array(
					'/' => 'group_membership',
				),
				'verwalten' => array(
					'einstellungen' => array(
						'/' => 'group_settings',
					),
					'blogabos' => array(
						'/' => 'group_manage_blog_subscritions',
						'*' => array(
							'/' => 'group_manage_blog_subscritions',
						),
					),
					'einladungen' => array(
						'/' => 'group_manage_invitations',
					),
					'layout' => array(
						'/' => 'group_manage_layout',
					),
					'loeschen' => array(
						'/' => 'group_manage_deletion',
					),
					'mitgliedschaftsantraege' => array(
						'/' => 'group_manage_membership_proposals',
					),
				),
				'kwickie-einladen' => array(
					'/' => 'group_invite_member',
					'*' => array(
						'/' => 'group_invite_member',
					),
				),
				'admin-email' => array(
					'/' => 'group_mail_admins',
				),
			),
			'/' => 'groups',
			'kategorien' => array(
				'*' => array(
					'/' => 'groups_categories',
					'*' => array(
						'/' => 'groups_categories',
					),
				),
			),
			'search' => array(
				'/' => 'groups_search',
			),
		),
		'help' => array(
			'/' => 'help',
			'request' => array(
				'/' => 'help_request',
			),
		),
		'magazine' => array(
			'/' => 'magazine',
			'article' => array(
				'*' => array(
					'/' => 'magazine_article',
					'*' => array(
						'/' => 'magazine_article',
					),
					'comment_add' => array(
						'/' => 'magazine_article_insert_comment',
					),
					'comment_del' => array(
						'*' => array(
							'/' => 'magazine_article_comment_del',
						),
					),
					'raffle' => array(
						'/' => 'magazine_article_raffle',
					),
				),
			),
			'search' => array(
				'/' => 'magazine_search',
			),
		),
		'magazin' => array(
			'/' => 'magazine_compat',
			'artikel' => array(
				'*' => array(
					'*' => array(
						'/' => 'magazine_compat_article',
					),
				),
			),
			'suche' => array(
				'/' => 'magazine_compat_search',
			),
		),
		'willkommen' => array(
			'/' => 'welcome',
			'*' => array(
				'/' => 'welcome',
			),
			'ajax' => array(
				'/' => 'welcome_ajax',
			),
			'ajax_step' => array(
				'/' => 'welcome_ajax_step',
			),
			'sperren' => array(
				'*' => array(
					'/' => 'welcome_ban',
				),
			),
		),
		'*' => array(
			'statistics' => array(
				'/' => 'profile_statistics',
			),
			'activities' => array(
				'/' => 'profile_activities',
				'ajax' => array(
					'*' => array(
						'/' => 'profile_activities_ajax',
						'*' => array(
							'/' => 'profile_activities_ajax',
						),
					),
				),
			),
			'gb' => array(
				'/' => 'profile_gb',
				'*' => array(
					'/' => 'profile_gb',
				),
				'ajax_page' => array(
					'/' => 'profile_gb_ajax_page',
					'*' => array(
						'/' => 'profile_gb_ajax_page',
					),
				),
				'question' => array(
					'*' => array(
						'*' => array(
							'/' => 'profile_gb_ajax_question',
							'*' => array(
								'/' => 'profile_gb_ajax_question',
							),
						),
					),
				),
				'comment' => array(
					'edit' => array(
						'*' => array(
							'/' => 'profile_gb_comment_edit',
						),
					),
					'remove' => array(
						'*' => array(
							'/' => 'profile_gb_comment_remove',
						),
					),
				),
				'edit' => array(
					'*' => array(
						'/' => 'profile_gb_edit',
						'*' => array(
							'/' => 'profile_gb_edit',
						),
					),
					'save' => array(
						'/' => 'profile_gb_edit_save',
					),
				),
				'important' => array(
					'*' => array(
						'/' => 'profile_gb_important',
					),
				),
				'new' => array(
					'/' => 'profile_gb_new',
					'*' => array(
						'*' => array(
							'/' => 'profile_gb_new_quote',
						),
					),
				),
				'permalink' => array(
					'*' => array(
						'/' => 'profile_gb_permalink',
					),
				),
				'eintrag' => array(
					'*' => array(
						'/' => 'profile_gb_permalink_compat',
					),
				),
				'pin' => array(
					'*' => array(
						'/' => 'profile_gb_pin',
						'*' => array(
							'/' => 'profile_gb_pin',
						),
					),
				),
				'quote' => array(
					'*' => array(
						'*' => array(
							'/' => 'profile_gb_quote',
						),
					),
				),
				'remove' => array(
					'/' => 'profile_gb_remove',
				),
				'save' => array(
					'/' => 'profile_gb_save',
					'quickanswer' => array(
						'/' => 'profile_gb_save_quickanswer',
					),
				),
				'send' => array(
					'picture' => array(
						'*' => array(
							'/' => 'profile_gb_send_picture',
						),
					),
				),
			),
		),
		'mail' => array(
			'folder' => array(
				'/' => 'mail_folder',
				'*' => array(
					'/' => 'mail_folder',
				),
			),
			'headers' => array(
				'*' => array(
					'*' => array(
						'/' => 'mail_headers',
					),
				),
			),
			'write' => array(
				'attachment' => array(
					'/' => 'mail_write_attachment',
				),
				'/' => 'mail_write',
			),
			'attachment' => array(
				'*' => array(
					'*' => array(
						'/' => 'mail_read_part',
					),
				),
			),
			'read' => array(
				'*' => array(
					'*' => array(
						'/' => 'mail_read',
					),
				),
			),
			'print' => array(
				'*' => array(
					'/' => 'mail_print',
				),
			),
			'search' => array(
				'' => array(
					'/' => 'mail_search',
				),
			),
			'save' => array(
				'*' => array(
					'/' => 'mail_save',
				),
			),
			'maintenance' => array(
				'/' => 'mail_maintenance',
			),
			'/' => 'mail',
		),
		'registration' => array(
			'/' => 'registration',
			'*' => array(
				'/' => 'registration_optcode',
			),
			'confirm' => array(
				'/' => 'registration_confirm',
			),
			'ajax' => array(
				'/' => 'registration_ajax',
			),
		),
		'rss' => array(
			'gb' => array(
				'*' => array(
					'/' => 'profile_gb_rss',
				),
			),
		),
		'dialogue' => array(
			'abuse' => array(
				'ajax' => array(
					'/' => 'dialogue_abuse_ajax',
				),
			),
		),
		'widget' => array(
			'group' => array(
				'*' => array(
					'/' => 'widget_group',
				),
			),
		),
		'modulemanager' => array(
			'*' => array(
				'config' => array(
					'/' => 'modulemanager_config',
					'save' => array(
						'/' => 'modulemanager_config_save',
					),
				),
				'click' => array(
					'/' => 'modulemanager_click',
				),
				'/' => 'modulemanager_module',
			),
		),
		'forum' => array(
			'/' => 'forum',
		),
		'members' => array(
			'/' => 'members',
			'online' => array(
				'/' => 'members_search_online',
			),
			'blogs' => array(
				'/' => 'members_search_blogs',
			),
			'fof' => array(
				'/' => 'members_search_fof',
			),
			'photos' => array(
				'/' => 'members_search_photos',
			),
			'search' => array(
				'schools' => array(
					'ajax' => array(
						'/' => 'members_search_schools_ajax',
					),
				),
			),
		),
	),
);

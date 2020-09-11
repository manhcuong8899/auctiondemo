<?php

use VNPCMS\Menu\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run()
	{
		DB::table('menus')->truncate();

		$menus = [

			[
				'slug' => 'home',
				'parent_slug' => null,
				'permission_id' => 1,
				'menu_group' => 'public',
				'menu_order' => 0,
				'title' => 'Home',
				'url' => '',
				'description' => null,
				'icon' => 'fa-home',
			],
			[
				'slug' => 'dashboard',
				'parent_slug' => null,
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 0,
				'title' => 'Dashboard',
				'url' => 'dashboard',
				'description' => null,
				'icon' => 'fa-dashboard',
			],
			[
				'slug' => 'reports',
				'parent_slug' => null,
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 1,
				'title' => 'Reports',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-bar-chart',
			],
			[
				'slug' => 'expenses',
				'parent_slug' => 'reports',
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 1,
				'title' => 'Expenses',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-line-chart',
			],
			[
				'slug' => 'membership',
				'parent_slug' => 'reports',
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 2,
				'title' => 'Membership',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-line-chart',
			],
			[
				'slug' => 'frequentation',
				'parent_slug' => 'reports',
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 3,
				'title' => 'Frequentation',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-line-chart',
			],
			[
				'slug' => 'membership',
				'parent_slug' => null,
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 2,
				'title' => 'Membership',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-rocket',
			],
			[
				'slug' => 'members',
				'parent_slug' => 'membership',
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 0,
				'title' => 'Members',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-mortar-board',
			],
			[
				'slug' => 'mentors',
				'parent_slug' => 'membership',
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 1,
				'title' => 'Mentors',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-child',
			],
			[
				'slug' => 'plans',
				'parent_slug' => 'membership',
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 2,
				'title' => 'Plans',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-ticket',
			],
			[
				'slug' => 'finances',
				'parent_slug' => null,
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 3,
				'title' => 'Finances',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-money',
			],
			[
				'slug' => 'transactions',
				'parent_slug' => 'finances',
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 0,
				'title' => 'Transactions',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-exchange',
			],
			[
				'slug' => 'billing',
				'parent_slug' => 'finances',
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 0,
				'title' => 'Billing',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-dollar',
			],
			[
				'slug' => 'accounts',
				'parent_slug' => 'finances',
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 0,
				'title' => 'Accounts',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-user',
			],
			[
				'slug' => 'stripe',
				'parent_slug' => 'finances',
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 0,
				'title' => 'Stripe',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-cc-stripe',
			],
			[
				'slug' => 'paypal',
				'parent_slug' => 'finances',
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 0,
				'title' => 'Paypal',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-paypal',
			],
			[
				'slug' => 'accesscontrol',
				'parent_slug' => null,
				'parent_slug' => null,
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 4,
				'title' => 'Access control',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-lock',
			],
			[
				'slug' => 'keys',
				'parent_slug' => 'accesscontrol',
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 0,
				'title' => 'Keys',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-key',
			],
			[
				'slug' => 'vnpcmscards',
				'parent_slug' => 'accesscontrol',
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 1,
				'title' => 'vnpcms Cards',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-credit-card',
			],
			[
				'slug' => 'alarmpins',
				'parent_slug' => 'accesscontrol',
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 2,
				'title' => 'Alarm Pins',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-shield',
			],
			[
				'slug' => 'haccsy',
				'parent_slug' => 'accesscontrol',
				'permission_id' => 11,
				'menu_group' => 'main',
				'menu_order' => 3,
				'title' => 'HACCSY',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-server',
			],
			[
				'slug' => 'settings_general',
				'parent_slug' => null,
				'permission_id' => 3,
				'menu_group' => 'settings',
				'menu_order' => 0,
				'title' => 'General',
				'url' => 'settings/general',
				'description' => null,
				'icon' => 'fa-gear',
			],
			[
				'slug' => 'settings_emails',
				'parent_slug' => null,
				'permission_id' => 3,
				'menu_group' => 'settings',
				'menu_order' => 1,
				'title' => 'Emails',
				'url' => 'settings/emails',
				'description' => null,
				'icon' => 'fa-envelope',
			],
			[
				'slug' => 'users',
				'parent_slug' => null,
				'permission_id' => 19,
				'menu_group' => 'settings',
				'menu_order' => 1,
				'title' => 'Users',
				'url' => 'settings/users',
				'description' => null,
				'icon' => 'fa-user',
			],
			[
				'slug' => 'allusers',
				'parent_slug' => 'users',
				'permission_id' => 19,
				'menu_group' => 'settings',
				'menu_order' => 0,
				'title' => 'All Users',
				'url' => 'users',
				'description' => null,
				'icon' => 'fa-users',
			],
			[
				'slug' => 'roles',
				'parent_slug' => 'users',
				'permission_id' => 7,
				'menu_group' => 'settings',
				'menu_order' => 1,
				'title' => 'Roles',
				'url' => 'roles',
				'description' => null,
				'icon' => 'fa-eye',
			],
			[
				'slug' => 'permissions',
				'parent_slug' => 'users',
				'permission_id' => 2,
				'menu_group' => 'settings',
				'menu_order' => 2,
				'title' => 'Permissions',
				'url' => 'permissions',
				'description' => null,
				'icon' => 'fa-exclamation-triangle',
			],
			[
				'slug' => 'modules',
				'parent_slug' => null,
				'permission_id' => 11,
				'menu_group' => 'settings',
				'menu_order' => 3,
				'title' => 'Modules',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-plug',
			],
			[
				'slug' => 'installedmodules',
				'parent_slug' => 'modules',
				'permission_id' => 11,
				'menu_group' => 'settings',
				'menu_order' => 0,
				'title' => 'Installed Modules',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-inbox',
			],
			[
				'slug' => 'modulesaddnew',
				'parent_slug' => 'modules',
				'permission_id' => 11,
				'menu_group' => 'settings',
				'menu_order' => 1,
				'title' => 'Add new',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-plus',
			],
			[
				'slug' => 'appearance',
				'parent_slug' => null,
				'permission_id' => 3,
				'menu_group' => 'settings',
				'menu_order' => 4,
				'title' => 'Appearance',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-paint-brush',
			],
			[
				'slug' => 'menus',
				'parent_slug' => 'appearance',
				'permission_id' => 11,
				'menu_group' => 'settings',
				'menu_order' => 0,
				'title' => 'Menus',
				'url' => 'settings/menus',
				'description' => null,
				'icon' => 'fa-bars',
			],
			[
				'slug' => 'themes',
				'parent_slug' => 'appearance',
				'permission_id' => 3,
				'menu_group' => 'settings',
				'menu_order' => 1,
				'title' => 'Themes',
				'url' => '#',
				'description' => null,
				'icon' => 'fa-television',
			],

		];

		foreach ($menus as $menu) {
			Menu::create($menu);
		}
	}
}

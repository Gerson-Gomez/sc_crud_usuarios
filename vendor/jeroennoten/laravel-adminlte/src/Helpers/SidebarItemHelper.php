<?php

namespace JeroenNoten\LaravelAdminLte\Helpers;

class SidebarItemHelper extends MenuItemHelper
{
    /**
     * Checks if a menu item is a sidebar custom search box.
     *
     * @param  mixed  $item
     * @return bool
     */
    public static function isCustomSearch($item)
    {
        return isset($item['text'], $item['type'])
            && $item['type'] === 'sidebar-custom-search';
    }

    /**
     * Checks if a menu item is a sidebar menu search box.
     *
     * @param  mixed  $item
     * @return bool
     */
    public static function isMenuSearch($item)
    {
        return isset($item['text'], $item['type'])
            && $item['type'] === 'sidebar-menu-search';
    }

    /**
     * Checks if a menu item is a sidebar search item (legacy or new).
     *
     * @param  mixed  $item
     * @return bool
     */
    public static function isSearch($item)
    {
        return self::isLegacySearch($item)
            || self::isCustomSearch($item)
            || self::isMenuSearch($item);
    }

    /**
     * Checks if a menu item is accepted for the sidebar section.
     *
     * @param  mixed  $item
     * @return bool
     */
    public static function isAcceptedItem($item)
    {
        return self::isSubmenu($item)
            || self::isSearch($item)
            || self::isHeader($item)
            || self::isLink($item);
    }

    /**
     * Checks if a menu item is valid for the sidebar.
     *
     * @param  mixed  $item
     * @return bool
     */
    public static function isValidItem($item)
    {
        return self::isAcceptedItem($item)
            && empty($item['topnav_right'])
            && empty($item['topnav_user'])
            && empty($item['topnav']);
    }
}
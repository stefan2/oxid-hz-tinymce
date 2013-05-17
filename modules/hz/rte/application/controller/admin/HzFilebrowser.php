<?php
/**
 * $Id: HzFilebrowser.php 54 2013-05-15 22:49:06Z stefan $
 *
 * @autor Stefan Mayer (meniskus@gmx.net)
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General
 * Public License as published by the Free Software Foundation; either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see <http://www.gnu.org/licenses/>
 */

class HzFilebrowser extends oxAdminView
{
    const IN_OXID_MODE                = true;

    protected static $_aBrowserConfig = array();

    public static function getBrowserConfig($key)
    {
        if( array_key_exists( $key, self::$_aBrowserConfig ) ) {
            return self::$_aBrowserConfig[$key];
        } else {
            return null;
        }
    }


    public function getBrowserCss()
    {
        chdir( self::getBrowserConfig('browserDir') );
        include 'css.php';
        exit();
    }


    public function init()
    {
        parent::init();

        self::$_aBrowserConfig = array(
            'moduleUrl'   => $this->getViewConfig()->getModuleUrl('hzrte'),
            'browserDir'  => $this->getViewConfig()->getModulePath('hzrte','browser'),
            'browserPath' => $this->getViewConfig()->getModuleUrl('hzrte','browser'),
            'browserUrl'  => $this->getViewConfig()->getSelfLink() . 'cl=hzfilebrowser&'
        );
    }


    public function render()
    {
        parent::render();

        chdir( self::$_aBrowserConfig['browserDir'] );

        ob_start();
        require 'core/autoload.php';
        $browser = new browser();
        $browser->action();

        foreach(self::$_aBrowserConfig as $sKey => $mValue ) {
            $this->_aViewData[$sKey] = $mValue;
        }
        $this->_aViewData['sBrowserOutput'] = ob_get_clean();

        return 'hzfilebrowser.tpl';
    }
}

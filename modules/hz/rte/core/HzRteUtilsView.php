<?php
/**
 * $Id: HzRteUtilsView.php 54 2013-05-15 22:49:06Z stefan $
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
 *
 *
 * @TODO bottomitem.tpl hat kein Block und kann nicht über die metadata.php
 *       überschrieben werden?
 */
class HzRteUtilsView extends HzRteUtilsView_parent
{
    protected function _fillCommonSmartyProperties( $oSmarty )
    {
        parent::_fillCommonSmartyProperties( $oSmarty );

        if( $this->isAdmin() ) {
            array_unshift (
                $oSmarty->template_dir,
                oxRegistry::get('oxViewConfig')->getModulePath('hzrte','application/views/admin/tpl')
            );
        }
    }
}
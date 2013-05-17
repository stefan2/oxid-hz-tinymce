<?php
/**
 * $Id: HzRte.php 68 2013-05-16 19:40:11Z stefan $
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
 * @TODO $_aHzRteParams aus metadata lesen?
 */
class HzRte extends HzRte_parent
{

    protected $_aHzRteViews = array(
        'article_main',
        'article_extend',
        'article_stock',
        'article_files',
        'article_variant',
        'category_text',
        'category_main',
        'content_main',
        'attribute_main',
        'selectlist_main',
        'newsletter_main',
        'payment_main',
        'discount_main',
        'news_main',
        'news_text',
        'adminlinks_main',
        'discount_main',
        'actions_main'
    );

    /**
     * Standardparameter
     */
    protected $_aHzRteParams = array(
        'doctype'         => "'<!DOCTYPE html>'",
        'element_format'  => "'html'",
        'entity_encoding' => "'raw'",

        'verify_html'        => 'true',
        'cleanup'            => 'true',
        'cleanup_on_startup' => 'true',

        'preformatted'            => 'true',
        'apply_source_formatting' => 'true',
        'remove_linebreaks'       => 'false',
        'convert_fonts_to_spans'  => 'true',
        'visual'                  => 'true',

        'relative_urls'      => 'true',
        'document_base_url'  => "'/'",
        'remove_script_host' => 'true',

        'plugins'                      => "'style,advimage,advlink,searchreplace,contextmenu,paste,fullscreen,nonbreaking,xhtmlxtras,visualchars,media,template,table'",
        'plugin_insertdate_dateFormat' => "'%d-%m-%Y'",
        'plugin_insertdate_timeFormat' => "'%H:%M:%S'",
        'button_tile_map'              => 'true',

        'theme_advanced_buttons1'           => "'bullist,numlist,outdent,indent,separator,justifyleft,justifycenter,justifyright,justifyfull,sub,sup,|,image,link,unlink,|,bold,italic,underline,strikethrough,styleprops,|,styleselect,formatselect,attribs,|,fullscreen'",
        'theme_advanced_buttons2'           => "'undo,redo,selectall,separator,pastetext,pasteword,separator,search,replace,separator,nonbreaking,hr,charmap,separator,anchor,media,separator,cleanup,removeformat,|,tablecontrols'",
        'theme_advanced_buttons3'           => "''",
        'theme_advanced_buttons4'           => "''",
        'theme_advanced_toolbar_location'   => "'top'",
        'theme_advanced_toolbar_align'      => "'left'",
        'theme_advanced_statusbar_location' => "'bottom'",
        'theme_advanced_resizing'           => 'true',
        'theme_advanced_blockformats'       => "'p,h1,h2,h3,h4,h5,h6,div,blockquote,pre,address'"
    );

    protected $_aHzRteUsedParams = array();


    public function getRteParam($sKey = null)
    {
        if( array_key_exists($sKey, $this->_aHzRteParams) ) {
            $this->_aHzRteUsedParams[] = $sKey;
            return $this->_aHzRteParams[$sKey];
        } else {
            return 'null';
        }
    }


    public function getRteUnusedParams()
    {
        $_aUnusedParams = array();
        foreach( $this->_aHzRteParams as $sKey => $sValue ){
            if( !in_array($sKey, $this->_aHzRteUsedParams, true) ) {
                $_aUnusedParams[$sKey] = $sValue;
            }
        }
        return $_aUnusedParams;
    }


    public function render()
    {
        if( !in_array( $this->getClassName(), $this->_aHzRteViews ) ) {
            return parent::render();
        }

        $_oConfig     = oxRegistry::getConfig();
        $_oViewConfig = oxRegistry::get('oxViewConfig');

        $this->_aViewData['blHzRteIsActive'] = true;

        /**
         * Einstellungen für RTE
         */
        $this->_aViewData['oHzRte'] = (object)array(
            'sLang'      => $_oConfig->getConfigParam('sHzRteLanguage'),
            'aFields'    => $_oConfig->getConfigParam('aHzRteRteFields'),
            'aParameter' => $_oConfig->getConfigParam('aHzRteRteParameter')
        );

        if( is_array($_oConfig->getConfigParam('aHzRteRteParameter') ) ) {
            $this->_aHzRteParams = array_merge(
                $this->_aHzRteParams,
                $_oConfig->getConfigParam('aHzRteRteParameter')
            );
        }

        if( is_array( $_oConfig->getConfigParam('aHzRteRteParameterFormats') ) ){
            $this->_aHzRteParams['style_formats'] = implode(',' . PHP_EOL, $_oConfig->getConfigParam('aHzRteRteParameterFormats'));
        } else {
            $this->_aHzRteParams['style_formats'] = '';
        }
        $this->_aViewData['oHzRteParam'] = (object)$this->_aHzRteParams;

        /**
         * Einstellungen für Code-Editor
         */
        $this->_aViewData['oHzRteCode'] = (object)array(
            'aFields'   => $_oConfig->getConfigParam('aHzRteCodeFields'),
            'sMode'     => $_oConfig->getConfigParam('aHzRteCodeMode'),
            'sModeUrl'  => $_oViewConfig->getModuleUrl('hzrte','out/src/js/ace/mode-' . $_oConfig->getConfigParam('aHzRteCodeMode') . '.js'),
            'sTheme'    => $_oConfig->getConfigParam('aHzRteCodeTheme'),
            'sThemeUrl' => $_oViewConfig->getModuleUrl('hzrte','out/src/js/ace/theme-' . $_oConfig->getConfigParam('aHzRteCodeTheme') . '.js')
        );

        /**
         * Einstellungen für Dateibrowser
         *
         * @TODO sJs entfernen, custom.js benutzen.
         */
        $this->_aViewData['oHzRteBrowser'] = (object)array(
            'sLang'   => $_oConfig->getConfigParam('sHzRteBrowserLanguage'),
            'aFields' => $_oConfig->getConfigParam('aHzRteBrowserFields'),
            'sJs'     => is_array( $_oConfig->getConfigParam('aHzRteBrowserJs') )
                         ? implode( PHP_EOL, $_oConfig->getConfigParam('aHzRteBrowserJs') )
                         : '',
        );

        return parent::render();
    }
}
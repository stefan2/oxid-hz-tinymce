<?php
/**
 * $Id: metadata.php 68 2013-05-16 19:40:11Z stefan $
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

$sMetadataVersion = '1.1';

$aModule = array(
    'id'           => 'hzrte',
    'title'        => 'RTE und Dateibrowser',
    'description'  => 'RTE und Dateibrowser für beliebige Felder',
    'version'      => '0.7.3',
    'author'       => 'Stefan Mayer',
    'email'        => 'meniskus@gmx.net',

    'extend'       => array(
        'article_main'    => 'hz/rte/application/controller/admin/HzRte',
        'article_extend'  => 'hz/rte/application/controller/admin/HzRte',
        'article_stock'   => 'hz/rte/application/controller/admin/HzRte',
        'article_files'   => 'hz/rte/application/controller/admin/HzRte',
        'article_variant' => 'hz/rte/application/controller/admin/HzRte',
        'category_text'   => 'hz/rte/application/controller/admin/HzRte',
        'category_main'   => 'hz/rte/application/controller/admin/HzRte',
        'content_main'    => 'hz/rte/application/controller/admin/HzRte',
        'attribute_main'  => 'hz/rte/application/controller/admin/HzRte',
        'selectlist_main' => 'hz/rte/application/controller/admin/HzRte',
        'newsletter_main' => 'hz/rte/application/controller/admin/HzRte',
        'payment_main'    => 'hz/rte/application/controller/admin/HzRte',
        'discount_main'   => 'hz/rte/application/controller/admin/HzRte',
        'news_main'       => 'hz/rte/application/controller/admin/HzRte',
        'news_text'       => 'hz/rte/application/controller/admin/HzRte',
        'adminlinks_main' => 'hz/rte/application/controller/admin/HzRte',
        'discount_main'   => 'hz/rte/application/controller/admin/HzRte',
        'actions_main'    => 'hz/rte/application/controller/admin/HzRte',
        'oxutilsview'     => 'hz/rte/core/HzRteUtilsView'
    ),

    'blocks' => array(
        array(
            'template' => 'headitem.tpl',
            'block'    => 'admin_headitem_incjs',
            'file'     => 'admin_headitem_incjs.tpl'
        ),
        array(
            'template' => 'headitem.tpl',
            'block'    => 'admin_headitem_js',
            'file'     => 'admin_headitem_js.tpl'
        )
    ),

    'files' => array(
        'hzfilebrowser'     => 'hz/rte/application/controller/admin/HzFilebrowser.php'
    ),

    'templates' => array(
        'hzfilebrowser.tpl' => 'hz/rte/application/views/admin/tpl/hzfilebrowser.tpl',
        'bottomitem.tpl'    => 'hz/rte/application/views/admin/tpl/bottomitem.tpl'
    ),

    'settings' => array(

        /**
         * TinyMCE
         */
        array(
            'group' => 'hzRteRte',
            'name'  => 'sHzRteLanguage',
            'type'  => 'str',
            'value' => 'de'
        ),
        // Felder die den Toggler für den TinyMCE bekommen.
        array(
            'group' => 'hzRteRte',
            'name'  => 'aHzRteRteFields',
            'type'  => 'arr',
            'value' => array(
                 '#editor_oxcategories__oxlongdesc',
                 '#editor_oxcontents__oxcontent',
                 '#editor_oxnewsletter__oxtemplate',
                 '#editor_oxarticles__oxlongdesc',
                 '#editor_oxpayments__oxlongdesc',
                 '#editor_oxlinks__oxurldesc',
                 '#editor_oxnews__oxlongdesc'
            )
        ),
        array(
            'group' => 'hzRteRte',
            'name'  => 'aHzRteRteUrlSyle',
            'type'  => 'select',
            'value' => 'rel',
            'constraints' => 'rel|abs|full'
        ),
        array(
            'group' => 'hzRteRte',
            'name'  => 'aHzRteRteBaseUrl',
            'type'  => 'str',
            'value' => '/',
        ),
        array(
            'group' => 'hzRteRte',
            'name'  => 'aHzRteRteParameter',
            'type'  => 'aarr',
            'value' => array(
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
            )
        ),
        array(
            'group' => 'hzRteRte',
            'name'  => 'aHzRteRteParameterFormats',
            'type'  => 'arr',
            'value' => array(
                "{title : 'Links'}",
                    "{title : 'Intern: Weiterlesen',        selector : 'a', classes : 'intern'}",
                    "{title : 'Extern: Neue Seite öffnen',  selector : 'a', classes : 'extern'}",
                    "{title : 'Popup: Popupfenster öffnen', selector : 'a', classes : 'popup' }",
                    "{title : 'E-Mail',                     selector : 'a', classes : 'mail'  }",
                "{title : 'Überschriften'}",
                    "{title : 'Hauptüberschrift', selector : 'h1,h2,h3,h4', classes : 'main' }",
                    "{title : 'Sub-Überschrift', selector : 'h1,h2,h3,h4', classes : 'sub' }",
                "{title : 'Absatz'}",
                    "{title : 'erster Absatz',  selector : 'p', classes : 'first'}",
                    "{title : 'letzter Absatz', selector : 'p', classes : 'last' }",
                "{title : 'Listen'}",
                    "{title : 'Spezial',  selector : 'ul', classes : 'special'}",
                "{title : 'Bilder'}",
                    "{title : 'Bild links',   selector : 'img', classes : 'left' }",
                    "{title : 'Bild rechts',  selector : 'img', classes : 'right'}",
                    "{title : 'Bild zoombar', selector : 'img', classes : 'zoom' }",
                "{title : 'Technik'}",
                    "{title : 'Trenner/Block (clear)', selector : 'div,p,ul', classes : 'clear'}"
            )
        ),

        /**
         * Dateibrowser
         */
        array(
            'group' => 'hzRteBrowser',
            'name'  => 'sHzRteBrowserDir',
            'type'  => 'str',
            'value' => '/out'
        ),
        array(
            'group' => 'hzRteBrowser',
            'name'  => 'sHzRteBrowserLanguage',
            'type'  => 'str',
            'value' => 'de'
        ),
        array(
            'group' => 'hzRteBrowser',
            'name'  => 'aHzRteBrowserFields',
            'type'  => 'arr',
            'value' => ''
        ),
        array(
            'group' => 'hzRteBrowser',
            'name'  => 'aHzRteBrowserUrlSyle',
            'type'  => 'select',
            'value' => 'rte',
            'constraints' => 'rte|rel|abs|full'
        ),
        array(
            'group' => 'hzRteBrowser',
            'name'  => 'aHzRteBrowserJs',
            'type'  => 'arr',
            'value' => ''
        ),

        /**
         * ACE Code-Editor
         */
        array(
                'group' => 'hzRteCode',
                'name'  => 'aHzRteCodeFields',
                'type'  => 'arr',
                'value' => ''
        ),
        array(
                'group' => 'hzRteCode',
                'name'  => 'aHzRteCodeMode',
                'type'  => 'str',
                'value' => 'html'
        ),
        array(
                'group' => 'hzRteCode',
                'name'  => 'aHzRteCodeTheme',
                'type'  => 'str',
                'value' => 'chaos'
        ),
    )
);
<?php
/**
 * $Id: hzrte_lang.php 62 2013-05-16 12:41:37Z stefan $
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

$sLangName = 'Deutsch';

$aLang = array(
    'charset' => 'UTF-8',

    /**
     * TinyMCE
     */
    'SHOP_MODULE_GROUP_hzRteRte'         => 'Einstellungen TinyMCE',

        'SHOP_MODULE_sHzRteLanguage'            => 'Sprache für Editor',
        'SHOP_MODULE_aHzRteRteFields'           => 'Selektoren für Felder, für die der Editor getoggelt werden kann',
        'SHOP_MODULE_aHzRteRteUrlSyle'          => 'URL Stil',
            'SHOP_MODULE_aHzRteRteUrlSyle_rel'  => 'Relative "out/files/..."',
            'SHOP_MODULE_aHzRteRteUrlSyle_abs'  => 'Absolute "/out/files/..."',
            'SHOP_MODULE_aHzRteRteUrlSyle_full' => 'Mit Domäne "http://www.domain.tld/out/files/..."',

        'SHOP_MODULE_aHzRteRteBaseUrl'          => 'Basis URL, wird vom Editor benötigt um z.B. Bilder im Editor anzuzeigen wenn URLs relative gesetzt werden. | <a href="http://www.tinymce.com/wiki.php/Configuration3x:document_base_url" target="_blank">» Siehe http://www.tinymce.com/wiki.php/Configuration3x:document_base_url</a>',
        'SHOP_MODULE_aHzRteRteParameter'        => 'Parameter für den Editor | <a href="http://www.tinymce.com/wiki.php/Configuration3x" target="_blank">» Siehe http://www.tinymce.com/wiki.php/Configuration3x</a>',
        'SHOP_MODULE_aHzRteRteParameterFormats' => 'Formatvorlagen | <a href="http://www.tinymce.com/wiki.php/Configuration3x" target="_blank">» Siehe http://www.tinymce.com/wiki.php/Configuration3x:style_formats</a>',

    /**
     * Dateibrowser
     */
    'SHOP_MODULE_GROUP_hzRteBrowser' => 'Einstellungen Dateibrowser',

        'SHOP_MODULE_sHzRteBrowserLanguage' => 'Sprache für Browser',
        'SHOP_MODULE_sHzRteBrowserDir'      => 'Basisverzeichnis für den Dateibrowser ("/out/files/" nicht änderbar)',
        'SHOP_MODULE_aHzRteBrowserFields'   => 'Selektoren für Felder',
        'SHOP_MODULE_aHzRteBrowserUrlSyle'  => 'URL Stil',
            'SHOP_MODULE_aHzRteBrowserUrlSyle_rte'  => 'Wie in RTE Editor',
            'SHOP_MODULE_aHzRteBrowserUrlSyle_rel'  => 'Relative "out/files/..."',
            'SHOP_MODULE_aHzRteBrowserUrlSyle_abs'  => 'Absolute "/out/files/..."',
            'SHOP_MODULE_aHzRteBrowserUrlSyle_full' => 'Mit Domäne "http://www.domain.tld/out/files/..."',
        'SHOP_MODULE_aHzRteBrowserJs'       => 'Zusätzliches script (unnötig, custom.js benutzen)',


    /**
     * ACE Editor
     */
    'SHOP_MODULE_GROUP_hzRteCode'      => 'Einstellungen ACE Code-Editor | <a href="http://ace.ajax.org/" target="_blank">» ACE Webseite</a> <a href="http://ace.ajax.org/build/kitchen-sink.html" target="_blank">» Beispiele für Modes/Themes</a>',

        'SHOP_MODULE_aHzRteCodeFields' => 'Selektoren für die Felder',
        'SHOP_MODULE_aHzRteCodeMode'   => 'Modus',
        'SHOP_MODULE_aHzRteCodeTheme'  => 'Theme',
);
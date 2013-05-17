[{*
    $Id: bottomitem.tpl 64 2013-05-16 16:44:05Z stefan $ 

    @autor Stefan Mayer (meniskus@gmx.net)

    This program is free software;
    you can redistribute it and/or modify it under the terms of the GNU General
    Public License as published by the Free Software Foundation; either
    version 3 of the License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

    See the GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, see <http://www.gnu.org/licenses/>

    @TODO Funktionen in eine Klasse
*}]
</div>

[{ oxscript }]


[{if $blHzRteIsActive}] [{*  Wenn hzRte Modul aktiviert  *}]

<!-- hzRte / Mootools -->
<script src="[{$oViewConf->getModuleUrl('hzrte','out/src/js/lib/mootools-core.js')}]" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
//<![CDATA[

    // Global, wird zu true wenn der tiny initiiert wird.
    var tinyMCE = null;

    /**
     * Original-Kopierfunktion ersetzen.
     */
    var oxCopyLongDesc = Function.from(copyLongDesc);

    var copyLongDesc = function( sIdent ) {
        var oEditor  = null;
        var elTarget = document.getElement( '[name="editval[' + sIdent + ']"]' );
        if( tinyMCE && ( oEditor = tinyMCE.get('editor_' + sIdent) ) ) {
            if( elTarget ) {
                elTarget.set('value', oEditor.getContent() );
            } else {
                //throw 'Zielfeld: "editval[' + sIdent + ']" nicht vorhanden';
                console.log('Zielfeld: "editval[' + sIdent + ']" nicht vorhanden');
            }
        }
        else {
            oxCopyLongDesc( sIdent );
        }
        return null;
    }
//]]>
</script>

<!-- hzRte / tinyMCE -->
<script type="text/javascript" src="[{$oViewConf->getModuleUrl('hzrte','out/src/js/tinymce/tiny_mce.js') }]"></script>
<script type="text/javascript">
//<![CDATA[

    tinyMCE.init({
        language                : '[{$oHzRte->sLang}]',
        mode                    : 'none',
        theme                   : 'advanced',
        content_css             : '[{$oViewConf->getModuleUrl('hzrte','out/src/css/editor.css') }]',

        /**
         * http://www.tinymce.com/wiki.php/Configuration3x:doctype
         * http://www.tinymce.com/wiki.php/Configuration3x:element_format
         */
        doctype                 : [{$oView->getRteParam('doctype')}],
        element_format          : [{$oView->getRteParam('element_format')}],
        entity_encoding         : [{$oView->getRteParam('entity_encoding')}],

        /**
         * http://www.tinymce.com/wiki.php/Configuration3x:verify_html
         * http://www.tinymce.com/wiki.php/Configuration3x:cleanup
         * http://www.tinymce.com/wiki.php/Configuration3x:cleanup_on_startup
         */
        verify_html             : [{$oView->getRteParam('verify_html')}],
        cleanup                 : [{$oView->getRteParam('cleanup')}],
        cleanup_on_startup      : [{$oView->getRteParam('cleanup_on_startup')}],

        /**
         * http://www.tinymce.com/wiki.php/Configuration3x:apply_source_formatting
         * http://www.tinymce.com/wiki.php/Configuration3x:remove_linebreaks
         * http://www.tinymce.com/wiki.php/Configuration3x:convert_fonts_to_spans
         * http://www.tinymce.com/wiki.php/Configuration3x:preformatted
         * http://www.tinymce.com/wiki.php/Configuration3x:visual
         */
        apply_source_formatting : [{$oView->getRteParam('apply_source_formatting')}],
        remove_linebreaks       : [{$oView->getRteParam('remove_linebreaks')}],
        convert_fonts_to_spans  : [{$oView->getRteParam('convert_fonts_to_spans')}],
        preformatted            : [{$oView->getRteParam('preformatted')}],
        visual                  : [{$oView->getRteParam('visual')}],

        /**
         * Relative URLs und für Backend document_base_url setzen.
         *
         * http://www.tinymce.com/wiki.php/Configuration3x:relative_urls
         * http://www.tinymce.com/wiki.php/Configuration3x:document_base_url
         * http://www.tinymce.com/wiki.php/Configuration3x:remove_script_host
         */
        relative_urls           : [{$oView->getRteParam('relative_urls')}],
        document_base_url       : [{$oView->getRteParam('document_base_url')}],
        remove_script_host      : [{$oView->getRteParam('remove_script_host')}],

        /**
         * URLs zurückverwandelen falls Smarty-Tag
         *
         * @TODO callback entfernen? siehe Kommentar der Funktion
         */
        convert_urls                 : true,
        //urlconverter_callback        : 'hzRteTinyUrlConverter',

        /**
         * Plugins
         */
        plugins                      : [{$oView->getRteParam('plugins')}],
        plugin_insertdate_dateFormat : [{$oView->getRteParam('plugin_insertdate_dateFormat')}],
        plugin_insertdate_timeFormat : [{$oView->getRteParam('plugin_insertdate_timeFormat')}],

        /**
         * Theme
         */
        button_tile_map                    : [{$oView->getRteParam('button_tile_map')}],

        theme_advanced_buttons1            : [{$oView->getRteParam('theme_advanced_buttons1')}],
        theme_advanced_buttons2            : [{$oView->getRteParam('theme_advanced_buttons2')}],
        theme_advanced_buttons3            : [{$oView->getRteParam('theme_advanced_buttons3')}],
        theme_advanced_buttons4            : [{$oView->getRteParam('theme_advanced_buttons4')}],
        theme_advanced_toolbar_location    : [{$oView->getRteParam('theme_advanced_toolbar_location')}],
        theme_advanced_toolbar_align       : [{$oView->getRteParam('theme_advanced_toolbar_align')}],
        theme_advanced_statusbar_location  : [{$oView->getRteParam('theme_advanced_statusbar_location')}],
        theme_advanced_resizing            : [{$oView->getRteParam('theme_advanced_resizing')}],
        theme_advanced_blockformats        : [{$oView->getRteParam('theme_advanced_blockformats')}],

        [{if $oView->getRteParam('style_formats') != ''}]

            /**
             * Stil Formate
             * http://tinymce.moxiecode.com/wiki.php/Configuration3x:formats
             */
             style_formats : [
                [{$oView->getRteParam('style_formats')}]
            ],
        [{/if}]
    
        /**
         * Restlichen Parameter aus den Moduleinstellungen die noch nicht oben
         * verwendet wurden.
         *
         * Einzeln sind alle noch da [{$oHzRteParam->mein_parameter}]
         */
        [{foreach from=$oView->getRteUnusedParams() item='sValue' key='sKey' name='hzrteup'}]
            [{$sKey}] : [{$sValue}],
        [{/foreach}]

        /**
         * Bevor der Inhalt gepeichert wird, müssen die HTML-Enitäten
         * innerhalb der Smarty-Tags zurückverwandelt werden.
         */
         setup : function(ed) {
             /**
              * wenn der Inhalt exportiert wird, z.B. bei "toggleEditor"
              */
             ed.onSaveContent.add( function(ed, o) {
                [{literal}]
                var regex = /(\[{)(.*?)(}\])/gm; 
                [{/literal}]
                o.content = o.content.replace(regex, function() {
                    return arguments[0].replace( /&gt;/g,   '>' )
                                       .replace( /&lt;/g,   '<' )
                                       .replace( /&amp;/g,  '&' )
                                       .replace( /&quot;/g, '"' ); 
                });
            });

            /**
             * Wenn der Inhalt des Editors mit ".getContent()" geholt wird um
             * diesen z.B. in das Speicherfeld zu übertragen.
             */
            ed.onGetContent.add( function(ed, o) {
                [{literal}]
                var regex = /(\[{)(.*?)(}\])/gm; 
                [{/literal}]
                o.content = o.content.replace(regex, function() {
                    return arguments[0].replace( /&gt;/g,   '>' )
                                       .replace( /&lt;/g,   '<' )
                                       .replace( /&amp;/g,  '&' )
                                       .replace( /&quot;/g, '"' ); 
                });
            });
        },

        // Filebrowser
        file_browser_callback        : 'hzRteEditorFilebrowser'
    });


    /**
     * Editor ein/ausschalten
     *
     * @params string sFieldId    ID des HTML-Elements
     */
    var hzRteTinyToggle = function(sFieldId){
        return tinyMCE.execCommand( 'mceToggleEditor', false, sFieldId );
    }


    /**
     * Zum anpassen der URLs die gleiche Methode wie der TinyMCE verwenden
     * @see hzRteTinyUrlConverter
     */
    var hzRteTinyUri = new tinyMCE.util.URI( tinyMCE.settings.document_base_url || tinyMCE.documentBaseURL, {
        base_uri : tinyMCE.baseURI
    });


    /**
     * Urls werden von tinyMCE URL-kodiert.
     * [{literal}]
     *   aus:
     *     <a href="[{oxgetseourl ident=$oViewConf->getBasketLink() var='value'}]">
     *   wird:
     *     <a href="[{oxgetseourl%20ident=$oViewConf->getBasketLink()%20var='value'}]">
     * [{/literal}]
     *
     * Ist eine Kopie von tinyMCE.convertURL()
     *
     * @TODO Untersuchen ob decodeURI noch notwenig, seit einiger Zeit (tiny-Updates?)
     *       wird die URL nicht mehr kodiert (oder encoding:raw?).
     *
     */
    function hzRteTinyUrlConverter(sUrl, sNode, blOnSave, sAttributeName)
    {
        if( !tinyMCE.settings.convert_urls || (sNode && sNode.nodeName === 'LINK') || sUrl.indexOf('file:') === 0) {
            return sUrl;
        }

        [{literal}]
        var sPattern = /\[{/g;
        [{/literal}]

        if( /* sNode === 'a' && */ sPattern.test( sUrl ) ) {
            // Ist Smarty-Tag
            sUrl = decodeURI(sUrl);
        }

        if( tinyMCE.settings.relative_urls ) {
            return hzRteTinyUri.toRelative(sUrl);
        } else {
            return hzRteTinyUri.toAbsolute(sUrl, tinyMCE.settings.remove_script_host);
        }
    }


    /**
     * Dateibrowser für TinyMCE
     *
     * $type ist ausgeklammert, damit alle Aufrufe das gleiche Verzeichnis 
     * öffen.
     */
    function hzRteEditorFilebrowser(field_name, url, type, win)
    {
         tinyMCE.activeEditor.windowManager.open({
             file           : '[{$oViewConf->getSelfLink()|replace:"&amp;":"&" }]cl=hzfilebrowser&lang=[{ $oHzRteBrowser->sLang }]&opener=tinymce',//&type=' + type,
             title          : 'KCFinder',
             width          : 700,
             height         : 500,
             resizable      : 'yes',
             inline         : true,
             close_previous : 'no',
             popup_css      : false
         }, {
             window: win,
             input: field_name
         });
         return false;
     }


    /**
     * Toggler für RTE an die Felder, aus Modul-Einstellungen, anfügen.
     */
    [{if $oHzRte->aFields|@count > 0 }]

        var sHzRteTogglerText = 'RTE an/aus';
        if( '[{$oHzRte->sLang}]' !== 'de') {
            sHzRteTogglerText = 'RTE on/off';
        }

        var elHzRteToggler = new Element('span',[{literal}]{
            'text'   :  sHzRteTogglerText,
            'styles' : {
                'display'    : 'block',
                'cursor'     : 'pointer',
                'text-align' : 'right'
            }
        }[{/literal}]);

        [{foreach from="`$oHzRte->aFields`" item='sFieldSelector'}]

            Array.each( document.getElements('[{$sFieldSelector}]'), function(elField) {
                if( elField.get('id') === null ){
                    elField.set('id', 'hzrte-' + String.uniqueID() );
                }
                elField.set('data-hzrteisrte', 'true');
                elHzRteToggler.clone()/*.setStyle('width', elField.getSize().x)*/.addEvent('click', 
                    hzRteTinyToggle.pass( elField.get('id') )
                ).inject( elField, 'before');
            });

        [{/foreach}]
    [{/if}]


    /**
     * Dateibrowser für Eingabefelder, unabhängig
     * 
     * @use Wenn nicht über Modul-Einstellungen: 
     *      <input type="text" name="" ondblclick="hzRteOpenFilebrowser(this);return false;">
     *
     * @TODO 
     *  . Individuelle callback-Funktion verfügbar machen.
     *  . URL-Style im Moment wie die Einstellungen im Tiny
     *    "rte|rel|abs"  
     *     'rte' = Einstellungen wie RTE
     *     'rel' = Relativer Pfad 
     *     'abs' = Absoluter Pfad, ohne Host 
     */
    function hzRteOpenFilebrowser( elField, fnCallBack, fnCallBackMultiple )
    {
        window.KCFinder = {
            callBack: function( sUrl ) {
                window.KCFinder = null;
                elField.set('value', hzRteTinyUrlConverter(sUrl, elField, true, 'src') )
                       .fireEvent('change');
            },
            callBackMultiple: function( aFiles ) {
                window.KCFinder = null;
                elField.empty();
                aFiles = aFiles.map(function(sUrl,i) {
                    return hzRteTinyUrlConverter(sUrl, elField, true, 'src');
                });
                elField.set('value', aFiles.join('; ') )
                       .fireEvent('change');
            }
        };

        window.open('[{$oViewConf->getSelfLink()|replace:"&amp;":"&"}]cl=hzfilebrowser&lang=[{$oHzRteBrowser->sLang}]',
            'KCFinder',
            'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
            'resizable=1, scrollbars=0, width=800, height=600'
        );
    }


    /**
     * Dateibrowser an die Felder, aus den Modul-Einstellungen, anfügen.
     *
     * @TODO individuelle callbacks
     */
    [{if $oHzRteBrowser->aFields|@count > 0 }]

        var sHzRteTogglerText = 'Dateien durchsuchen';
        if( '[{$oHzRteBrowser->sLang}]' !== 'de') {
            sHzRteTogglerText = 'Browse files';
        }

        var elHzRteToggler = new Element('span',[{literal}]{
            'title'  :  sHzRteTogglerText,
            'styles' : {
                'display'          : 'block',
                'cursor'           : 'pointer',
                'width'            : '16px',
                'height'           : '0',
                'margin-top'       : '5px',
                'margin-left'      : '5px',
                'padding-top'      : '14px',
                'overflow'         : 'hidden',
                'float'            : 'left',
                'background-image' : 'url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAOCAYAAAAmL5yKAAAA/ElEQVQoU2M08U7+zwAEL78rMohz3gcxSWIzyjq1/H+0t5rB1CeF4fjGWQyW/mlEGQJTy4juApBLQADkGpir8NFgA0CmgQALMxPDn7//wGxiAMi1cC+ANMy11AbrC9l+jIFfgB9uBi5xkLfBLji9ZQ7Y5oU2uigWgwzi5uXFKg6yQM65FeGCjx8+YrgapBkEvn7+jCIHcx2KC0AGrPG0AiuMP3IZHB4ggEsc5GJwGMACEaQB5leYdbCwwCWO4gWQidicikscZAnJXkg+fhUeFiheAMUCsl9hqkAacImD1KB4ARZgyMENigVQ2KDHEEwc7gV8qQ45kyGrg4kDAAjAzWFRBH14AAAAAElFTkSuQmCC")'
            }
        }[{/literal}]);

        [{foreach from="`$oHzRteBrowser->aFields`" item='sFieldSelector'}]

            Array.each( document.getElements('[{$sFieldSelector}]'), function(elField) {
                elField.setStyle('float','left');
                elField.set('data-hzrteisbrowser', 'true');
                elHzRteToggler.clone().addEvent('click', 
                    hzRteOpenFilebrowser.pass( elField )
                ).inject( elField, 'after');
            });

        [{/foreach}]
    [{/if}]

     /**
      * JScript für z.B callbacks, bzw. events.
      * 
      * @TODO wieder entfernen, custom.js benutzen.
      */
     [{$oHzRteBrowser->sJs}]

</script>

<!-- hzRte / ACE -->
<script src="[{$oViewConf->getModuleUrl('hzrte','out/src/js/ace/ace.js')}]" type="text/javascript" charset="utf-8"></script>
<script src="[{$oHzRteCode->sThemeUrl}]" type="text/javascript" charset="utf-8"></script>
<script src="[{$oHzRteCode->sModeUrl}]" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
//<![CDATA[

    /**
     * Toggler für ACE-Editor.
     * 
     * @TODO toggle für ACE ist schwierig. Muß man wohl mit einem Fake-Element
     *       machen, dass sowohl die Eingaben vom Editor wie auch die der 
     *       textarea aufnimmt. Und beim Toggle den Inhalt aus dem Fake-Element
     *       setzt.
     */
    [{if $oHzRteCode->aFields|@count > 0 }]

        var aHzRteCodeEditorInstances = [];

        /*
            var sHzRteTogglerText = 'Code-Editor an/aus';
            if( '[{$oHzRte->sLang}]' !== 'de') {
                sHzRteTogglerText = 'Code-Editor on/off';
            }
        */

        [{foreach from="`$oHzRteCode->aFields`" item='sFieldSelector'}]

            Array.each( document.getElements('[{$sFieldSelector}]'), function(elField) {
                elField.setStyle('display','none');
                var elWorkspace = new Element('div',[{literal}]{
                    'styles' : {
                        'width'  : elField.getStyle('width'),
                        'height' : elField.getStyle('height')
                    }
                }[{/literal}]).inject( elField, 'after');

                var _aceEditor = ace.edit( elWorkspace );
                _aceEditor.getSession().setValue( elField.get('value') );
                _aceEditor.setTheme('ace/theme/[{$oHzRteCode->sTheme}]');
                _aceEditor.getSession().setMode( 'ace/mode/[{$oHzRteCode->sMode}]' );
                _aceEditor.getSession().on('change', function(e) {
                    elField.set('value', _aceEditor.getSession().getValue() );
                });

                aHzRteCodeEditorInstances[elField.get('name')] = _aceEditor;
            });

        [{/foreach}]
        [{/if}]
//]]>
</script>

<!-- hzRte / Eigene Scripte -->
<script src="[{$oViewConf->getModuleUrl('hzrte','out/src/js/custom.js')}]" type="text/javascript" charset="utf-8"></script>

<!-- /HzRte -->
[{/if}] [{* if $blHzRteActive *}]
</body>
</html>

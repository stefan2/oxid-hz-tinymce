/**
 * $Id: custom.js 65 2013-05-16 18:26:31Z stefan $
 *
 * Zusätzliche Scripte: Wird am Fuss der Seite eingebunden.
 */

/**
 * Beipiel für eine "callback" auf die Browserfelder.
 *
 * Alle Felder für die der Browser hergenommen wird haben das Attribut
 * "data-hzrteisbrowser" gesetzt, die Felder für den TinyMCE "data-hzrteisrte".
 *
 * Wenn ein oder mehrere Bildpfade vom Browser in das Feld übertragen werden,
 * wird beim Feld das onchange event ausgelöst.
 */
Array.each( document.getElements('[data-hzrteisbrowser="true"]'), function(elField) {
    elField.addEvent('change', function() {
        if( elField.get('value') !== '') {
            var _hzrteimage = elField.getParent().getElement('.hzrte-image');
            if( _hzrteimage === null ){
                _hzrteimage = new Element('img',{
                    'styles': {
                        'padding'     : '0',
                        'margin'      : '0',
                        'margin-left' : '5px',
                        'height'      : elField.getParent().getSize().y +'px',
                        'z-index'     : 10
                    },
                    'class' : 'hzrte-image'
                }).addEvents({
                    'mouseenter' : function() {
                        this.setStyles({
                            'position'  : 'absolute',
                            'height'    : 'auto',
                            'width'     : 'auto',
                            'border'    : '1px solid #fff',
                            'box-shadow': '#333 0 0 40px 0'
                        });
                    },
                    'mouseleave' : function(){
                        this.setStyles({
                            'position'   : 'relative',
                            'height'     : '20px',
                            'border'     : 'none',
                            'box-shadow' : 'none'
                        });
                    },

                }).inject( elField.getParent() );
            }
            _hzrteimage.set('src', hzRteTinyUri.toAbsolute(elField.get('value'), tinyMCE.settings.remove_script_host) );
        }
    }).fireEvent('change');
});

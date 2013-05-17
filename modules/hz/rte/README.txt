TinyMCE 3.5.8 +  KCFinder + ACE 
===============================

Das Modul fügt beliebigen Feldern einen Schalter hinzu der es erlaubt den TinyMCE für diese Feld zu aktivieren bzw. zu deaktiviern. Ebenso ist ein Dateibrowser oder der ACE-Editor möglich.

Das ist praktisch wenn man eigene Felder im Template verwendet. Man braucht dann dort nichts mehr rumfummeln, sondern stellt einfach über das Modul ein, dass diese Feld ein RTE sein soll.

Das Modul ist standardmäßig für Artikel, CMS-Seiten, Newsletter, Kategorien, Links, Nachrichten, Zahlungsarten, Aktionen, Auswahllisten, Rabatte und Attribute verfügbar. In einigen der Templates muß man natürlich erst noch entsprechende Eingabefelder platzieren.

Modul Einstellungen Selektoren
------------------------------

Das Modul bindet die Mootools ein. Wie die Notierungen sein müssen findet man hier: http://mootools.net/docs/core/Slick/Slick

Die Selektoren werden Zeilenweise interpretiert. Man kann also

    Selektor1,Selektor2

oder

    Selektor1
    Selektor2

notieren, beides funktioniert.

<strong>Beispiel für z.B. den tinyMCE<strong>

    #editor_oxarticles__oxlongdesc
    [name="editval[oxarticles__oxtitle]"]

Macht den tinyMCE bei den Artikel-Stammdaten für die Felder "Titel" und "Beschreibung" verfügbar.

    [type="text"],textarea

Würde für alle einzeiligen und mehrzeiligen Eingabefelder treffen (sieht witzig aus, mach mal.)

Für das anfügen des Dateibrowsers oder des ACE an Felder muß man analog vorgehen. Beim ACE ist es allerdings im Moment nicht möglich das er getoggelt werden kann.


Modul-Einstellungen TinyMCE
----------------------------

Webseite: http://www.tinymce.com

1. <strong>Sprache für Editor</strong> 

    Nur "en" oder "de" möglich, wenn eine andere Sprache eingestellt werden
    soll muß man die Sprachdateien von tinymce.com runterladen.

2. <strong>Selektoren für Felder</strong> 
 
    Wie beschrieben

3. <strong>URL Stil</strong>

    *<strong>Nicht aktiv</strong>*
    Eingestellt sind relative URLs wie z.B. "out/files/bild.jpg". Dies kann man im Moment über die Parameter-Einstellungen ändern.

4. <strong>Basis URL</strong>
 
    *<strong>Nicht aktiv</strong>*
    Die Basis URL wird vom Editor benötigt um Bilder richtig zu referenzieren. Der Editor läuft im /admin/ wärend die relativen Pfade auf "out/files" zeigen. Das hätte zur Folge, dass im Backend im Editor die Bilder nicht angezeigt werden. Die "Basis URL" wird den Pfaden Editor-Intern angefügt um die "fehlerhafte" Referenzierung auszugleichen.


5. <strong>Parameter für den Editor</strong>

    Eine komplette Liste aller Einstellungen finden man hier: http://www.tinymce.com/wiki.php/Configuration3x
    
    Parameter können in dem Feld einfach geändert oder neue eingefügt werden. Bei der Notierung darauf achten, dass die Werte zu den Paramter genau wie hier notiert an das Script übergeben werden, Zeichenketten sollten also inkl. der Anführungszeichen eingegeben werden. Boolsche oder numerische Werte benötigen keine Anführungszeichen.

    <strong>Beispiele</strong>

    <pre>
    Erstens  => 'Zeichenkette'
    Zweitens => true
    Drittens => 5
    </pre>


    URL-Einstellungen für Absolute URL "<strong>/out/files/bild.jpg</strong>"

    <pre>
    relative_urls      => false
    remove_script_host => true
    </pre>

    URL-Einstellungen für vollen URI "<strong>http://www.domain.tld/out/files/bild.jpg</strong>"

    <pre>
    relative_urls      => false
    remove_script_host => false
    </pre>
    
    Befindet man sich in einem Sub-Verzeichnis wie "/shop/admin" bzw. "/shop/" sollte man mit dem Parameter "document_base_url" spielen z.b. '/shop/' als Wert benutzen.

6. <strong>Formatvorlagen</strong>

    Stilvorlagen für das Pulldown "Format"

    Weitere Infomationen hier: http://www.tinymce.com/wiki.php/Configuration3x:style_formats

Einstellungen Dateibrowser
--------------------------

Webseite: http://kcfinder.sunhater.com

1. <strong>Basisverzeichnis</strong>

    *<strong>Nicht aktiv</strong>*
    Das Basisverzeichnis des Browsers, die Voreinstellung ist "/out/". Dies erzeugt im "out" Verzeichnis ein weiteres Verzeichnis "files". Dort liegen dann die Dateien die über den Browser hochgeladen werden.

2. <strong>Sprache für Browser</strong> 

    *<strong>Nicht aktiv</strong>*

3. <strong>Selektoren für Felder</strong> 

    wie beschrieben.

4. <strong>URL Stil</strong>

    *<strong>Nicht aktiv</strong>*
    Die URL ist so gestaltet wie in den Einstellungen im Editor festgelegt.

5. <strong>Zusätzliche scripte</strong>

    *<strong>Nicht aktiv und wird wieder entfernt. Eigene Script kommen in die custom.js</strong>*


Einstellungen ACE Code-Editor
-----------------------------

Webseite:         http://ace.ajax.org/
Themes und Modes: http://ace.ajax.org/build/kitchen-sink.html

1. <strong>Selektoren für die Felder</strong>

    wie beschrieben.

2. <strong>Modus</strong>

    Name des Modus der verwendet werden soll (Syntax Hervorhebung).

3. <strong>Theme</strong>

    Name des Themes das verwendet werden soll.

Eigene Scripte
--------------

Eigene Javascripts können in der Datei "/out/src/js/custom.js" notiert werden.

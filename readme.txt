=== muv - Hide Preview ===
Contributors: meinsundvogel
Plugin URI: https://wordpress.org/plugins/muv-hide-preview
Stable tag: 1.0.1
Tags: verstecken, rechtssicherheit, unbefugter zugriff, preview, entwicklung, unsichtbar, ausblenden, freischalten, anzeigen, comming-soon, schutz, schützen, projekte
Requires at least: 4.7
Tested up to: 4.7.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Versteckt in der Entwicklungsphase befindende einzelne Seiten, Unterordner oder auch ganze Websites vor den Augen nicht befugter Dritter!
 

== Description ==
Welche Werbeagentur, welcher Web-Designer, welcher Freelancer kennt das nicht:
Der Kunde möchte immer über den aktuellsten Stand seines WordPress-Projektes informiert sein und jeden Tag den Fortschritt sehen können.

Aus diesem Grunde richtet fast jeder, der für einen Kunden WordPress-Projekte realisiert, einen Preview-Server oder einen Preview-Bereich für seine Kundenprojekte ein.

Nun kann der Kunde / Auftraggeber zwar jederzeit die laufenden Projekte einsehen, aber jeder Andere kann dies auch.

Erschwerend kommt hinzu, dass es nach deutschem Recht möglich ist, diese - im entstehen befindende - Projekte aufgrund eines fehlerhaften Impressums, aufgrund fehlender oder falscher AGB, usw. abzumahnen.
Dies ist in der Praxis auch schon vorgekommen!

Hier setzt unser Plugin an:
Im Gegensatz zu "herkömmlichen" Comming-Soon Plugins, welche eine plakative "hier kommt gleich was" - Seite anzeigen (und den restlichen Auftritt KOMPLETT verbergen) wurde unser Plugin dafür geschrieben, entweder den gesamten Internet-Auftritt oder auch nur einzelnen Teile davon (z.B. eine Seite oder ein Unterverzeichnis) vor dem Zugriff unbefugter Augen zu schützen.

Die API von WordPress oder auch einzelner Plugins ist davon NICHT betroffen. D.h. eine entstehende Schnittstelle zu einem Warenwirtschaftssystem kann z.B. weiterhin getestet werden.

Ebenfalls im Gegensatz zu herkömmlichen Commin-Soon Plugins wird der Zugriff auf die geschützten Bereiche nicht über einen erfolgten Login, sondern über eine spezielle (auf Wunsch wechselnde) Freischalt-Seite.
D.h. nach dem Besuch dieser speziellen Seite können die geschützten Bereiche eingesehen werden.

Dies ist z.B. dann sinnvoll, wenn die entstehende Seite selber ein Login besitzt, denn:
Wie soll getestet werden, was ein nicht angemeldeter User sehen und wie er sich am System anmelden kann, wenn er diese Seiter erst nach erfolgtem Login sehen kann, da sie bis dahin von dem Comming-Soon Plugin verborgen sind.


= So einfach werden Bereiche geschützt =
Das Plugin fügt im Admin-Bereich ein eigenes Menü "Hide Preview" ein.

Klicken Sie dort auf den Menüpunkt "Einstellungen".

Aktivieren Sie (im Reiter Verstecken) die Checkbox "Verstecken der nicht öffentlichen Bereiche aktivieren"

Das war alles. Ihr kompletter Internet-Auftritt ist nun geschützt (Der Login und der Admin-Bereich sind davon selbstverständlich nicht betroffen).

Im Reiter "Anzeige freischalten" finden Sie den Freischalt-Link.

Nachdem Sie diesen Link besucht haben, sind die geschützten Bereiche wieder freigeschaltet (bis Sie den Browser schließen).


== Installation ==
1. Entpacken Sie die ZIP-Datei und laden Sie den Ordner muv-hide-preview in das Plugin-Verzeichnis von WordPress hoch: wp-content/plugins/.
2. Loggen Sie sich dann als Admin unter WordPress ein. Unter dem Menüpunkt "Plugins" können Sie "muv - Hide Preview" nun aktivieren. 

== Frequently Asked Questions ==

= Wie kann mein Kunden die geschützten Bereiche freischalten? =
Senden Sie ihm einfach den Freischalt-Link per Mail zu. Sobald der Kunde diesesn Link angeklickt (d.h. die Seite besucht) hat, ist er freigeschaltet.

= Wie kann einzelne Bereiche / einzelne Seiten schützen? =
Geben Sie die zu schützende URL in das Eingabefeld ein. Eine URL ist eine Zeile.
Also z.B.
--
/blog
/einkaufen/adresse
--

um diese beiden Bereiche zu schützen. Alle anderen Bereiche bleiben weiterhin sichtbar.

== Changelog ==

= 1.0.1 =
Veröffentlicht am: 10.04.2017
* Design an weitere Plugins von muv angepasst.


= 1.0.0 =

Veröffentlicht am: 10.04.2017

* Erstes Release


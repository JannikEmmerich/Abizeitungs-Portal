<?php
include "Templates/login.inc.php";
?>
<?php
	$title = "Umfragen";
	include "Templates/header.inc.php";
?>

<div id="main">

    <?php
        if (array_key_exists("invalid_input", $_GET)) {
            echo '<div class="error">';
            echo '<p>Der eingegebene Schüler / Lehrer existiert nicht!</p>';
            echo '</div>';
        }
    ?>

	<p><em>Wenn du bereits an einer Umfrage teilgenommen hast, kannst du durch eine erneute Teilnahme deine alte überschreiben!</em></p>

	<h3>Schülerumfragen:</h3>

	<form action="save_umfragen.php" method="post">
		<input type="hidden" value="student" name="type">
		<select name="survey">
			<option>ärgschter Dialekt</option>
			<option>Bundeskanzler</option>
			<option>beste Seele</option>
			<option>beste Erziehung</option>
			<option>breiter als der Türsteher</option>
			<option>bester Kleidungsstil</option>
			<option>Dramaqueen</option>
			<option>denkt er sei am geilsten</option>
			<option>ist am geilsten</option>
			<option>dauernd angepisst</option>
			<option>größtes Dorfkind</option>
			<option>am engagiertesten</option>
			<option>am ehrgeizigsten</option>
			<option>wird als erstes Mama</option>
			<option>wird als erstes Papa</option>
			<option>Frauenversteher</option>
			<option>hat immer gute Laune</option>
			<option>größtes Genie</option>
			<option>geht ins Dschungelcamp</option>
			<option>schönste Haare</option>
			<option>handysüchtig</option>
			<option>hört man, bevor man sieht</option>
			<option>will man im Dunkeln nicht begegnen</option>
			<option>immer am Essen</option>
			<option>Instamodel</option>
			<option>größter Klugscheißer</option>
			<option>landet mal im Knast</option>
			<option>größter Klassenclown</option>
			<option>kommt mit dem Kater vom Freitag</option>
			<option>größtes Kind im Kopf</option>
			<option>Klein aber oho</option>
			<option>könnte einem alles verkaufen</option>
			<option>beste Lache</option>
			<option>wandelndes Lexikon</option>
			<option>legt sich mit Lehrern an</option>
			<option>größter Lehrerschreck</option>
			<option>ist mit den Lehrern per 'Du'</option>
			<option>wird mal Millionär</option>
			<option>Mathe-Ass</option>
			<option>größter Morgenmuffel</option>
			<option>wohnt mit 40 noch bei seinen Eltern</option>
			<option>der neue Mozart</option>
			<option>niemals anwesend</option>
			<option>größter Nerd</option>
			<option>Oragnisationstalent</option>
			<option>perfekter Schwiegersohn</option>
			<option>perfekte Schwiegertochter</option>
			<option>der neue Picasso</option>
			<option>wird Professor</option>
			<option>wildester Partygänger</option>
			<option>landet auf dem roten Teppich</option>
			<option>größte Rampensau</option>
			<option>rettet die Welt</option>
			<option>redet am Meisten</option>
			<option>schwärzeste Lunge</option>
			<option>schlechtester Autofahrer</option>
			<option>größte Sportskanone</option>
			<option>größter Schleimer</option>
			<option>größter Sprücheklopfer</option>
			<option>größter Stimmungsmacher</option>
			<option>sah vor 10 Jahren aus wie jetzt</option>
			<option>schwärztester Humor</option>
			<option>Technikfreak</option>
			<option>Tollpatsch</option>
			<option>Toilettenstammkunde</option>
			<option>scheitert an der 50€-Frage bei Jauch</option>
			<option>verlässt die Klausur immer als erstes</option>
			<option>landet unter die Brücke</option>
			<option>größter Zuspätkommer</option>
			<option>größter Bauer</option>
			<option>bestes Auto</option>
			<option>größter Unterstufenschwarm</option>
			<option>(Lästerschwester)</option>
			<option>Lehrerliebling</option>
			<option>potentieller Superstar</option>
			<option>krasseste Veränderung</option>
			<option>würde natürlich NIEMALS illegale Substanzen konsumieren</option>
			<option>größter DUmmschwätzer</option>
			<option>hat sich 12 Jahre durchgemogelt</option>
			<option>provoziert gerne</option>
			<option>größter Spicker</option>
			<option>macht Schlagzeilen in der Bildzeitung</option>
			<option>sponsored by Daddy</option>
			<option>größter Herzensbrecher</option>
			<option>hat die meisten Körbe kassiert</option>
			<option>wird Influencer</option>
			<option>Alleinunterhalter</option>
            <option>Erkennt man am Niesen</option>
		</select>
        <input name="value" list="namelist" autocomplete="off">
        <datalist id="namelist">
            <?php

            $ps = $mysqli->prepare("SELECT * FROM users ORDER BY 2 ASC");
            $ps->execute();
            $result = $ps->get_result();

            while($row=$result->fetch_assoc()){
                echo '<option>' . $row['username'] . '</option>';
            }

            ?>
        </datalist>
		<input type="submit">
	</form>

	<br>

	<h3>Lehrerumfragen:</h3>

	<form action="save_umfragen.php" method="post">
		<input type="hidden" value="teacher" name="type">
		<select name="survey">
			<option>würfelt Noten</option>
			<option>mit...würde ich gerne auf Studienfahrt gehen</option>
			<option>mit...würde ich niemals auf Studienfahrt gehen</option>
			<option>gibt zu viele Hausaufgaben</option>
			<option>Klausuren haben nichts mit dem Unterricht zu tun</option>
			<option>bester KLeidungsstil - Lehrer</option>
			<option>holzt den Regenwald ab</option>
			<option>kann nicht diskutieren</option>
			<option>hat am wenigsten Ahnung vom Fach</option>
			<option>korrigiert am längsten</option>
			<option>kontrolliert eine Stunde lang Hausaufgaben</option>
			<option>kommt immer zu spät</option>
			<option>schwierigste Klausuren</option>
			<option>leichteste Klausuren</option>
			<option>schweift am meisten vom Thema ab</option>
			<option>schlechtester Farlehrer</option>
			<option>bester Fahrlehrer</option>
			<option>schlimmste Sauklaue</option>
			<option>bester Vater</option>
			<option>beste Mutter</option>
			<option>Telefonjoker bei Günther Jauch</option>
			<option>mehr Schüler als Lehrer</option>
			<option>am verpeiltesten</option>
			<option>beste Kursfeste</option>
			<option>bekommt den Beamer nicht an</option>
			<option>hat das beste Immunsystem</option>
			<option>ist nie da</option>
			<option>lustigster Unterricht</option>
			<option>strengster Unterricht</option>
			<option>beliebtester Lehrer</option>
			<option>größter Schülerschreck</option>
			<option>größter Schülerschwarm</option>
			<option>verschenkt Punkte</option>
			<option>ist übermotiviert</option>
			<option>größter Raucher</option>
			<option>mangelndes Durchsetzungsvermögen</option>
			<option>der Tafel bester Freund</option>
			<option>der Beamer bester Freund</option>
			<option>aufregendste Vergangenheit</option>
			<option>größter Angeber</option>
			<option>Schülerliebling</option>
			<option>größte Fachkompetenz</option>
			<option>hat Kultfaktor</option>
			<option>kennt die Schüler nach zwei Jahren moch nicht</option>
			<option>strengster Lehrer</option>
			<option>beste Durchschnitte</option>
			<option>dreisteste Sprüche</option>
			<option>schlechteste Witze</option>
			<option>bester Unterricht</option>
			<option>weicht am meisten vom Thema ab</option>
			<option>immer gut gelaunt</option>
			<option>größte Handyabnehmgefahr</option>
			<option>würde man sogar außerhalb der Schule grüßen</option>
			<option>größter Bizeps</option>
			<option>versucht Unterricht zu vermeiden</option>
			<option>verknechtet seine Schüler</option>
			<option>flog früher aus der Disco</option>
			<option>bringt einem was für's Leben bei</option>
			<option>ist in sein Fach verliebt</option>
			<option>"Wer bin ich und was tue ich hier?"</option>
			<option>größte Spaßbremse</option>
			<option>größter Öko</option>
			<option>feiert ein Partyleben wie die Abiturienten</option>
			<option>Hass-Liebe-Lehrer</option>
			<option>kreativster Unterricht</option>
			<option>24/7 gestresst</option>
			<option>war/ist ein Frauenschwarm</option>
			<option>war/ist ein Männerschwarm</option>
		</select>
        <input name="value" list="teacherslist" autocomplete="off">
        <datalist id="teacherslist">
            <?php

            $ps = $mysqli->prepare("SELECT * FROM teachers ORDER BY 2 ASC");
            $ps->execute();
            $result = $ps->get_result();

            while($row=$result->fetch_assoc()){
                echo '<option>' . $row['username'] . '</option>';
            }

            ?>
        </datalist>
		<input type="submit">
	</form>

    <br>

    <h4>Ergebnisse anzeigen - Schülerumfragen:</h4>

    <form action="survey_results.php" method="get">
        <select name="survey_key">
            <option>ärgschter Dialekt</option>
            <option>Bundeskanzler</option>
            <option>beste Seele</option>
            <option>beste Erziehung</option>
            <option>breiter als der Türsteher</option>
            <option>bester Kleidungsstil</option>
            <option>Dramaqueen</option>
            <option>denkt er sei am geilsten</option>
            <option>ist am geilsten</option>
            <option>dauernd angepisst</option>
            <option>größtes Dorfkind</option>
            <option>am engagiertesten</option>
            <option>am ehrgeizigsten</option>
            <option>wird als erstes Mama</option>
            <option>wird als erstes Papa</option>
            <option>Frauenversteher</option>
            <option>hat immer gute Laune</option>
            <option>größtes Genie</option>
            <option>geht ins Dschungelcamp</option>
            <option>schönste Haare</option>
            <option>handysüchtig</option>
            <option>hört man, bevor man sieht</option>
            <option>will man im Dunkeln nicht begegnen</option>
            <option>immer am Essen</option>
            <option>Instamodel</option>
            <option>größter Klugscheißer</option>
            <option>landet mal im Knast</option>
            <option>größter Klassenclown</option>
            <option>kommt mit dem Kater vom Freitag</option>
            <option>größtes Kind im Kopf</option>
            <option>Klein aber oho</option>
            <option>könnte einem alles verkaufen</option>
            <option>beste Lache</option>
            <option>wandelndes Lexikon</option>
            <option>legt sich mit Lehrern an</option>
            <option>größter Lehrerschreck</option>
            <option>ist mit den Lehrern per 'Du'</option>
            <option>wird mal Millionär</option>
            <option>Mathe-Ass</option>
            <option>größter Morgenmuffel</option>
            <option>wohnt mit 40 noch bei seinen Eltern</option>
            <option>der neue Mozart</option>
            <option>niemals anwesend</option>
            <option>größter Nerd</option>
            <option>Oragnisationstalent</option>
            <option>perfekter Schwiegersohn</option>
            <option>perfekte Schwiegertochter</option>
            <option>der neue Picasso</option>
            <option>wird Professor</option>
            <option>wildester Partygänger</option>
            <option>landet auf dem roten Teppich</option>
            <option>größte Rampensau</option>
            <option>rettet die Welt</option>
            <option>redet am Meisten</option>
            <option>schwärzeste Lunge</option>
            <option>schlechtester Autofahrer</option>
            <option>größte Sportskanone</option>
            <option>größter Schleimer</option>
            <option>größter Sprücheklopfer</option>
            <option>größter Stimmungsmacher</option>
            <option>sah vor 10 Jahren aus wie jetzt</option>
            <option>schwärztester Humor</option>
            <option>Technikfreak</option>
            <option>Tollpatsch</option>
            <option>Toilettenstammkunde</option>
            <option>scheitert an der 50€-Frage bei Jauch</option>
            <option>verlässt die Klausur immer als erstes</option>
            <option>landet unter die Brücke</option>
            <option>größter Zuspätkommer</option>
            <option>größter Bauer</option>
            <option>bestes Auto</option>
            <option>größter Unterstufenschwarm</option>
            <option>(Lästerschwester)</option>
            <option>Lehrerliebling</option>
            <option>potentieller Superstar</option>
            <option>krasseste Veränderung</option>
            <option>würde natürlich NIEMALS illegale Substanzen konsumieren</option>
            <option>größter DUmmschwätzer</option>
            <option>hat sich 12 Jahre durchgemogelt</option>
            <option>provoziert gerne</option>
            <option>größter Spicker</option>
            <option>macht Schlagzeilen in der Bildzeitung</option>
            <option>sponsored by Daddy</option>
            <option>größter Herzensbrecher</option>
            <option>hat die meisten Körbe kassiert</option>
            <option>wird Influencer</option>
            <option>Alleinunterhalter</option>
            <option>Erkennt man am Niesen</option>
        </select>
        <input type="submit" value="Ergebnisse anzeigen">
    </form>

    <h4>Ergebnisse anzeigen - Lehrerumfragen:</h4>

    <form action="survey_results.php" method="get">
        <select name="survey_key">
            <option>würfelt Noten</option>
            <option>mit...würde ich gerne auf Studienfahrt gehen</option>
            <option>mit...würde ich niemals auf Studienfahrt gehen</option>
            <option>gibt zu viele Hausaufgaben</option>
            <option>Klausuren haben nichts mit dem Unterricht zu tun</option>
            <option>bester KLeidungsstil - Lehrer</option>
            <option>holzt den Regenwald ab</option>
            <option>kann nicht diskutieren</option>
            <option>hat am wenigsten Ahnung vom Fach</option>
            <option>korrigiert am längsten</option>
            <option>kontrolliert eine Stunde lang Hausaufgaben</option>
            <option>kommt immer zu spät</option>
            <option>schwierigste Klausuren</option>
            <option>leichteste Klausuren</option>
            <option>schweift am meisten vom Thema ab</option>
            <option>schlechtester Farlehrer</option>
            <option>bester Fahrlehrer</option>
            <option>schlimmste Sauklaue</option>
            <option>bester Vater</option>
            <option>beste Mutter</option>
            <option>Telefonjoker bei Günther Jauch</option>
            <option>mehr Schüler als Lehrer</option>
            <option>am verpeiltesten</option>
            <option>beste Kursfeste</option>
            <option>bekommt den Beamer nicht an</option>
            <option>hat das beste Immunsystem</option>
            <option>ist nie da</option>
            <option>lustigster Unterricht</option>
            <option>strengster Unterricht</option>
            <option>beliebtester Lehrer</option>
            <option>größter Schülerschreck</option>
            <option>größter Schülerschwarm</option>
            <option>verschenkt Punkte</option>
            <option>ist übermotiviert</option>
            <option>größter Raucher</option>
            <option>mangelndes Durchsetzungsvermögen</option>
            <option>der Tafel bester Freund</option>
            <option>der Beamer bester Freund</option>
            <option>aufregendste Vergangenheit</option>
            <option>größter Angeber</option>
            <option>Schülerliebling</option>
            <option>größte Fachkompetenz</option>
            <option>hat Kultfaktor</option>
            <option>kennt die Schüler nach zwei Jahren moch nicht</option>
            <option>strengster Lehrer</option>
            <option>beste Durchschnitte</option>
            <option>dreisteste Sprüche</option>
            <option>schlechteste Witze</option>
            <option>bester Unterricht</option>
            <option>weicht am meisten vom Thema ab</option>
            <option>immer gut gelaunt</option>
            <option>größte Handyabnehmgefahr</option>
            <option>würde man sogar außerhalb der Schule grüßen</option>
            <option>größter Bizeps</option>
            <option>versucht Unterricht zu vermeiden</option>
            <option>verknechtet seine Schüler</option>
            <option>flog früher aus der Disco</option>
            <option>bringt einem was für's Leben bei</option>
            <option>ist in sein Fach verliebt</option>
            <option>"Wer bin ich und was tue ich hier?"</option>
            <option>größte Spaßbremse</option>
            <option>größter Öko</option>
            <option>feiert ein Partyleben wie die Abiturienten</option>
            <option>Hass-Liebe-Lehrer</option>
            <option>kreativster Unterricht</option>
            <option>24/7 gestresst</option>
            <option>war/ist ein Frauenschwarm</option>
            <option>war/ist ein Männerschwarm</option>
        </select>
        <input type="submit" value="Ergebnisse anzeigen">
    </form>
</div>
	
<?php 
	include('Templates/navigation.inc.php');  
	include('Templates/footer.inc.php'); 
?>

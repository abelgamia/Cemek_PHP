<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=windows-1250">
	<TITLE></TITLE>
	<META NAME="GENERATOR" CONTENT="OpenOffice 4.1.5  (Win32)">
	<META NAME="AUTHOR" CONTENT="Edikowy ">
	<META NAME="CREATED" CONTENT="20191222;19131084">
	<META NAME="CHANGED" CONTENT="20200111;19460700">
	<STYLE TYPE="text/css">
	<!--
		@page { size: 21cm 29.7cm; margin: 2cm }
		P { margin-bottom: 0.21cm }
		H1 { margin-bottom: 0.21cm; page-break-after: avoid }
		H1.western { font-family: "Arial", sans-serif; font-size: 16pt; font-weight: bold }
		H1.cjk { font-family: "Microsoft YaHei"; font-size: 16pt; font-weight: bold }
		H1.ctl { font-family: "Mangal"; font-size: 16pt; font-weight: bold }
		P.wcięcie-pierwszego-wiersza { text-indent: 0.5cm }
		A:link { color: #000080; so-language: zxx; text-decoration: underline }
	-->
	</STYLE>
</HEAD>
<BODY LANG="pl-PL" LINK="#000080" VLINK="#800000" DIR="LTR">
<P ALIGN=CENTER STYLE="margin-bottom: 0cm; text-decoration: none"><FONT FACE="Palatino Linotype, serif"><FONT SIZE=6>Cemek_PHP</FONT></FONT></P>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
<P STYLE="margin-bottom: 0cm"><FONT FACE="CMU Typewriter Text, monospace"><FONT FACE="Palatino Linotype, serif">Autorski
edukacyjno/eksperymentalny projekt (CMS)
</FONT><A HREF="https://pl.wikipedia.org/wiki/System_zarządzania_treścią"><FONT FACE="Palatino Linotype, serif">https://pl.wikipedia.org/wiki/System_zarz%C4%85dzania_tre%C5%9Bci%C4%85</FONT></A><FONT FACE="Palatino Linotype, serif">
 systemu zarządzania treścią w PHP.</FONT></FONT></P>
<H1 CLASS="western"><FONT FACE="Palatino Linotype, serif">Zastosowanie</FONT></H1>
<P CLASS="wcięcie-pierwszego-wiersza"><FONT FACE="Palatino Linotype, serif">Jako
podstawa do wszystkich zastosowań web w tym min. e-commerce.</FONT></P>
<H1 CLASS="western"><FONT FACE="Palatino Linotype, serif">Wymagania</FONT></H1>
<P CLASS="wcięcie-pierwszego-wiersza">PHP 5.5 (starsze wersje mogą
działać niestabilnie).</P>
<P CLASS="wcięcie-pierwszego-wiersza"><FONT FACE="Palatino Linotype, serif">Dostęp
do bazy danych zgodny z PDO.</FONT></P>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
<H1 CLASS="western"><FONT FACE="Palatino Linotype, serif">Założenia
główne </FONT>
</H1>
<P CLASS="wcięcie-pierwszego-wiersza"><FONT FACE="Palatino Linotype, serif">W
pełni obiektowy (OOP).
</FONT><A HREF="https://pl.wikipedia.org/wiki/Programowanie_obiektowe"><FONT FACE="Palatino Linotype, serif"><FONT SIZE=1 STYLE="font-size: 8pt">https://pl.wikipedia.org/wiki/Programowanie_obiektowe</FONT></FONT></A><FONT FACE="Palatino Linotype, serif"><FONT SIZE=1 STYLE="font-size: 8pt">
</FONT></FONT>
</P>
<P CLASS="wcięcie-pierwszego-wiersza"><FONT FACE="Palatino Linotype, serif">Zgodny
z MVC (Model View Controler).
</FONT><A HREF="https://pl.wikipedia.org/wiki/Model-View-Controller"><FONT FACE="Palatino Linotype, serif"><FONT SIZE=1 STYLE="font-size: 8pt">https://pl.wikipedia.org/wiki/Model-View-Controller</FONT></FONT></A><FONT FACE="Palatino Linotype, serif"><FONT SIZE=1 STYLE="font-size: 8pt">
 </FONT></FONT>
</P>
<P CLASS="wcięcie-pierwszego-wiersza"><FONT FACE="Palatino Linotype, serif">Baza
danych z interfejsu PDO.</FONT></P>
<P CLASS="wcięcie-pierwszego-wiersza"><FONT FACE="Palatino Linotype, serif">Dwuetapowa
rejestracja z potwierdzaniem poprzez email.</FONT></P>
<P CLASS="wcięcie-pierwszego-wiersza"><FONT FACE="Palatino Linotype, serif">Szyfrowanie
haseł typu password_hash.</FONT></P>
<P CLASS="wcięcie-pierwszego-wiersza"><FONT FACE="Palatino Linotype, serif">Wykorzystanie
cookies. ? rodo</FONT></P>
<P CLASS="wcięcie-pierwszego-wiersza"><FONT FACE="Palatino Linotype, serif">Responsywność.</FONT></P>
<P CLASS="wcięcie-pierwszego-wiersza"><FONT FACE="Palatino Linotype, serif">Tematy
(CSS) do wyboru.</FONT></P>
<P CLASS="wcięcie-pierwszego-wiersza"><FONT FACE="Palatino Linotype, serif">Zmiana
języka (multilanguage).</FONT></P>
<H1 CLASS="western"><FONT FACE="Palatino Linotype, serif">Instalacja</FONT></H1>
<H1 CLASS="western"><FONT FACE="Palatino Linotype, serif">Licencje</FONT></H1>
<P STYLE="margin-bottom: 0cm"><FONT FACE="Palatino Linotype, serif">	</FONT></P>
<P STYLE="margin-bottom: 0cm"><FONT FACE="Palatino Linotype, serif">	</FONT></P>
<P STYLE="margin-bottom: 0cm"><FONT FACE="Palatino Linotype, serif">	</FONT></P>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
<P STYLE="margin-bottom: 0cm"> 
</P>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
<P STYLE="margin-bottom: 0cm; text-decoration: none"><STRIKE><FONT FACE="Palatino Linotype, serif">Zegar
wyświetla czas zgodny z lokalizacją i stosownie sciemnia/rozjaśnia
stronę</FONT></STRIKE></P>
<P STYLE="margin-bottom: 0cm; text-decoration: none"><BR>
</P>
<P STYLE="margin-bottom: 0cm; text-decoration: none"><STRIKE><FONT FACE="Palatino Linotype, serif">Testy
Unit , automatyczne + integracyjne i wydajnościowe</FONT></STRIKE></P>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
<P STYLE="margin-bottom: 0cm"><BR>
</P>
</BODY>
</HTML>

<?php

$korisnikPostoji="SELECT email FROM korisnici WHERE email=:email";
$upisKorisnikaUpit="INSERT INTO korisnici (ime, prezime, email, password, idgrad, iduloga)
VALUES(:ime,:prezime,:email,:password,:idGrad,:idUloge)";


$upitLog="SELECT * FROM korisnici k JOIN gradovi g ON k.idgrad= g.idgrad 
        WHERE email=:email AND password=:pas";


$upitPodacikorisnik="SELECT * FROM korisnici k 
                    JOIN gradovi g ON k.idgrad= g.idgrad 
                    WHERE k.idkorisnika=:id";


$upitUpdateKorisnik="UPDATE korisnici SET ime=:ime,prezime=:prezime,email=:email,idgrad=:grad,iduloga=:uloga WHERE idkorisnika=:id";

$upitUpdateLozinke="UPDATE korisnici SET password=:pas WHERE idkorisnika=:id";

$dohvatanjeProizvoda="SELECT * FROM proizvodi p 
INNER JOIN kategorije k ON p.idkategorija=k.idkategorija 
JOIN slike s ON p.idproizvod=s.idproizvod 
JOIN cena c ON p.idcena=c.idcena 
JOIN proizvodiboje b ON p.idproizvod=b.idproizvod 
JOIN boje j ON b.idboja=j.idboja GROUP BY p.idproizvod LIMIT :kreni,:koliko";


$upitproizvodiboja="SELECT * FROM proizvodi p 
                JOIN kategorije k ON p.idkategorija=k.idkategorija 
                JOIN slike s ON p.idproizvod=s.idproizvod 
                JOIN cena c ON p.idcena=c.idcena 
                JOIN proizvodiboje b ON p.idproizvod=b.idproizvod 
                JOIN boje j ON b.idboja=j.idboja 
                WHERE j.nazivboje=:boja
                GROUP BY p.idproizvod 
                LIMIT :kreni,:koliko";

$poImenuRastuce="SELECT * FROM proizvodi p 
                JOIN kategorije k ON p.idkategorija=k.idkategorija 
                JOIN slike s ON p.idproizvod=s.idproizvod 
                JOIN cena c ON p.idcena=c.idcena 
                JOIN proizvodiboje b ON p.idproizvod=b.idproizvod 
                JOIN boje j ON b.idboja=j.idboja 
                GROUP BY p.idproizvod 
                ORDER BY p.nazivproizvoda
                LIMIT :kreni,:koliko";

$poImenuOpadajuce="SELECT * FROM proizvodi p 
                JOIN kategorije k ON p.idkategorija=k.idkategorija 
                JOIN slike s ON p.idproizvod=s.idproizvod 
                JOIN cena c ON p.idcena=c.idcena 
                JOIN proizvodiboje b ON p.idproizvod=b.idproizvod 
                JOIN boje j ON b.idboja=j.idboja 
                GROUP BY p.idproizvod 
                ORDER BY p.nazivproizvoda DESC
                LIMIT :kreni,:koliko";

$poCeniNaVise="SELECT * FROM proizvodi p 
            JOIN kategorije k ON p.idkategorija=k.idkategorija 
            JOIN slike s ON p.idproizvod=s.idproizvod 
            JOIN cena c ON p.idcena=c.idcena 
            JOIN proizvodiboje b ON p.idproizvod=b.idproizvod 
            JOIN boje j ON b.idboja=j.idboja 
            GROUP BY p.idproizvod 
            ORDER BY c.cena
            LIMIT :kreni,:koliko";

$poCeniNaNize="SELECT * FROM proizvodi p 
            JOIN kategorije k ON p.idkategorija=k.idkategorija 
            JOIN slike s ON p.idproizvod=s.idproizvod 
            JOIN cena c ON p.idcena=c.idcena 
            JOIN proizvodiboje b ON p.idproizvod=b.idproizvod 
            JOIN boje j ON b.idboja=j.idboja 
            GROUP BY p.idproizvod 
            ORDER BY c.cena DESC
            LIMIT :kreni,:koliko";




$upi="SELECT * FROM proizvodi p 
            JOIN kategorije k ON p.idkategorija=k.idkategorija 
            JOIN slike s ON p.idproizvod=s.idproizvod 
            JOIN cena c ON p.idcena=c.idcena 
            JOIN proizvodiboje b ON p.idproizvod=b.idproizvod 
            JOIN boje j ON b.idboja=j.idboja 
            WHERE j.nazivboje=:boja 
            GROUP BY p.idproizvod 
            LIMIT :kreni,:koliko";


$slikeProizvod="SELECT * FROM proizvodi p 
                JOIN kategorije k ON p.idkategorija=k.idkategorija 
                JOIN slike s ON s.idproizvod=p.idproizvod 
                JOIN cena c on p.idcena=c.idcena 
                WHERE p.idproizvod=:id 
                GROUP BY s.putanja";


$upitVelicine="SELECT * FROM proizvodi p
            JOIN proizvodivelicine pv ON p.idproizvod=pv.idproizvod
            JOIN velicine v ON pv.idvelicina=v.idvelicine
            WHERE p.idproizvod=:id";

$proizvodDetalji="SELECT * FROM proizvodi p 
                JOIN cena c on p.idcena=c.idcena 
                WHERE p.idproizvod=:id";


$upitnazivKategorije="SELECT k.nazivkategorije,k.idkategorija,p.nazivproizvoda FROM kategorije k 
                JOIN proizvodi p ON k.idkategorija=p.idkategorija 
                WHERE p.idproizvod=:id";

$upitsnizenje="SELECT * FROM proizvodi p 
                INNER JOIN kategorije k ON p.idkategorija=k.idkategorija 
                JOIN slike s ON p.idproizvod=s.idproizvod 
                JOIN cena c ON p.idcena=c.idcena 
                JOIN proizvodiboje b ON p.idproizvod=b.idproizvod 
                JOIN boje j ON b.idboja=j.idboja 
                WHERE p.popust 
                GROUP BY p.idproizvod";

$upitKategorija="SELECT * FROM proizvodi p 
                INNER JOIN kategorije k ON p.idkategorija=k.idkategorija 
                JOIN slike s ON p.idproizvod=s.idproizvod 
                JOIN cena c ON p.idcena=c.idcena 
                JOIN proizvodiboje b ON p.idproizvod=b.idproizvod 
                JOIN boje j ON b.idboja=j.idboja
                WHERE k.idkategorija=:idk 
                GROUP BY p.idproizvod";

$upitnovaKolekcija="SELECT * FROM proizvodi p 
                INNER JOIN kategorije k ON p.idkategorija=k.idkategorija 
                JOIN slike s ON p.idproizvod=s.idproizvod 
                JOIN cena c ON p.idcena=c.idcena 
                JOIN proizvodiboje b ON p.idproizvod=b.idproizvod 
                JOIN boje j ON b.idboja=j.idboja 
                WHERE p.novakolekcija 
                GROUP BY p.idproizvod";

$upitbocnimeni="SELECT * FROM meni WHERE bocnimeni ORDER BY bocnimeniindeks";

$upitglavnimeni="SELECT * FROM meni WHERE glavnimeni ORDER BY indeks";
$upitglavnimeni_korisnik="SELECT * FROM meni WHERE glavnimeni_korisnik ORDER BY indeks";
//sve sta se ispisuje u glavnom meniju

$upitpodmeni="SELECT * FROM podmeni ORDER BY indekspodmeni";









$brojproizvoda="SELECT COUNT(idproizvod) as broj FROM proizvodi";

$upitboja="SELECT * FROM proizvodi p 
JOIN proizvodiboje pb ON p.idproizvod=pb.idproizvod 
JOIN boje b ON pb.idboja=b.idboja WHERE b.idboja=:boja";

$podaciIndex="SELECT * FROM ostaleslike o
                INNER JOIN kategorijeostalihslika k
                ON o.idkategorija=k.idkategorije
                WHERE idkategorije=:id";


$upitNovaKorpa="INSERT INTO korpa (datum) VALUES(UTC_TIMESTAMP())";
$upitKorpaPodaci="INSERT INTO korpaproizvodi (idkorpa, idkorisnika, idproizvod, kolicina) 
VALUES(:idkorpa, :idkorisnika, :idproizvod, :kolicina)";
// $upitDohvatiKorpu="SELECT * FROM korpa k RIGHT JOIN korpaproizvodi kp ON k.idkorpa=kp.idkorpa RIGHT JOIN proizvodi p ON kp.idproizvod=p.idproizvod LEFT JOIN slike s ON kp.idproizvod=s.idproizvod
// WHERE kp.idkorpa=:idkorpa";

$upitDohvatiKorpu="SELECT kp.idkorpa, kp.idkorisnika, kp.idproizvod as id, p.nazivproizvoda as naziv, s.idslike, s.alt, s.putanja, c.cena, p.popustprocenat as popust 
FROM korpaproizvodi kp RIGHT JOIN proizvodi p ON kp.idproizvod=p.idproizvod LEFT JOIN
slike s ON kp.idproizvod=s.idproizvod
LEFT JOIN cena c ON p.idcena=c.idcena
WHERE kp.idkorpa=:idkorpa
GROUP BY (p.idproizvod) ";
// RIGHT JOIN korpaproizvodi kp ON k.idkorpa=kp.idkorpa 
// WHERE kp.idkorpa=:idkorpa";
// JOIN korpaproizvodi kp ON k.idkorpa=kp.idkorpa WHERE k.idkorpa=:idkorpa


$upitizmenakorpe="DELETE FROM korpaproizvodi WHERE idkorpa=:kid AND idproizvod=:pid";
$upitDaliPostojiProizvdUKorpi="SELECT * FROM korpaproizvodi WHERE idkorpa=:kid AND idproizvod=:pid";










?>
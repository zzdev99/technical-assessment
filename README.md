# Elitek Technical Assessment

## Navodila

V mapi `database` najdeš **SQL dump** podatkovne baze. Napisati je potrebno enostavno PHP aplikacijo, ki iz baze pobere vse kategorije, jih organizira v drevesno strukturo in servira preko REST endpointa v JSON obliki. Na frontendu nato uporabiš ta endpoint in prikažeš kategorije v obliki večnivojskega glavnega menija. Zraven naziva vsake kategorije v oklepaju izpiši še število izdelkov v posamezni kategoriji. Upoštevaj, da je kategorijskih nivojev lahko neomejeno in da je poudarek na hitrosti delovanja.

### Omejitve

* Strukture podatkovne baze ne smeš spreminjati.
* Uporabiš lahko plain PHP ali framework po želji. Zaželjeno je da uporabljaš PHP 8.3 sintakso in PSR-12 coding standard.
* Pri prikazu menija na frontendu lahko za pridobivanje podatkov iz endpointa in za odpiranje posameznih nivojev kategorij uporabiš vanilla JS ali JS framework po želji.
* Za CSS lahko uporabiš plain CSS ali library po izbiri (tailwind...).

## Rešitev

Končano rešitev commitaj in pushaj v ta repozitorij skupaj z morebitnimi navodili za zagon aplikacije.

## API endpoint
http://localhost:8000/api/get-category-tree

## Frontend
http://localhost:8000/

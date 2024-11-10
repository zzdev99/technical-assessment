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

<br><br> 

# Za ta projekt potrebujete
- PHP >= 8.2
- Composer
- Node.js >= 16.x
- npm or yarn
- MySQL

## Navodila za namestitev projekta
- Najprej je potrebno klonirati ta projekt
- V kloniranem projektu odpremo terminal, v katerem bomo pognali naslednje ukaze:
- Potem poženemo ukaz `composer update` (namestitev php dependencies)
- Potem poženemo ukaz `npm install` (namestitev node dependencies)
- Potrebno je kopirati `/.env.example` v `/.env`
- Potrebno je konfigurirati povezavo na podatkovno bazo
- Uvozimo dump podatkovne baze, če ta še ni uvožen
- Za zagon projekta v testnem okolju poženemo ukaz `php artisan serve` in v novem oknu terminala poženemo še `npm run dev`

## API endpoint
http://localhost:8000/api/get-category-tree

## Frontend
http://localhost:8000/

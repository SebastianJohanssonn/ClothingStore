# ClothingStore
Projektarbete PHP

Uppnåda Krav :
Alla sidor skall vara responsiva. (G) Done 

Arbetet ska implementeras med objektorienterade principer. (G) Done 

Beskriv er företagsidé i en kort textuell presentation, detta ska lämnas in vid idégodkännandet (G) Done 

All data som programmet utnyttjar ska vara sparat i en MYSQL databas (produkter, beställningar, konton mm) (G) Done 

Det ska finnas ett normaliserat diagram över databasen i gitrepot (G) Done 

Man ska kunna logga in som administratör i systemet (G)Done 

Man ska kunna registrera sig som administratör på sidan, nya användare ska sparas i databasen (VG) När man loggar in som admin kan man skapa en user där man kan välja vilken roll som den nya användaren ska ha. 

Inga Lösenord får sparas i klartext i databasen (G) Done Alla lösenord hasha.

En besökare ska kunna beställa produkter från sidan, detta ska uppdatera lagersaldot i databasen (G) Om man är inloggar som user och gör en beställning så dras det av i unit in stock i databasen.

Administratörer ska kunna uppdatera antalet produkter i lager från admin delen av sidan (G) Kan göras om man är inloggad som Admin, där du kan uppdater unit in stock. 

Administratörer ska kunna se en lista på alla gjorda beställningar (G) Kan göras från admin sidan. 

Sidans produkter ska delas upp i kategorier, en produkt ska tillhöra minst en kategori, men kan tillhöra flera (G) Varje produkt har en kategori som man kan se på hemsidan. 

Från hemsidan ska man kunna se en lista över alla produkter, och man ska kunna lista bara dom produkter som tillhör en kategori (G) Om man är inloggad som admin så kan man se en lista över alla produkter. För att välja kategorier så trycker man på dropdown menyn så får man upp de olika alternativen.

Besökare ska kunna lägga produkterna i en kundkorg, som är sparad i session på servern (G) Trycker man på buy knappen vid produkterna så uppdateras kudvagnen. 

Man ska från hemsidan kunna skriva upp sig för att få butikens nyhetsbrev genom att ange sitt namn och epostadress (G) I footer så kan man signa upp för nyhetsbrev på hemsidan. 

Administratörer ska kunna se en lista över personer som vill ha nyhetsbrevet och deras epost adresser (G) Som Admin kan man se alla som har signa upp för nyhetsbrevet. 

Besökare ska kunna välja ett av flera fraktalternativ (G) När du gör beställningen kan du välja mellan två olika leveransätt. 

Tillgängliga fraktalternativ ska vara hämtade från databasen (G) Allt hämtas från databasen



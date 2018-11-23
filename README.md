# Sintproject-2
Verbeterde versie van sinterklaas verlanglijst project

Ajax crud wishlist aangemaakt. Begonnen met overbrengen van models en migraties van vorige versie om dmv auth en user id's persoonlijke
wishlists aan te kunnen maken. Plan is om met SHA1 of MD5 een unieke hash bij elke user id aan te maken om te gebruiken voor url, om op 
deze manier voor elke user een prive, uniek, wishlist te kunnen tonen.
Basis modellen en migraties overgebracht om relatie tussen wishlists en user te maken en daarnaast een groepen tabel toegevoegd om op basis van
een groep id lijsten te kunnen tonen aan mensen binnen een door gebruiker aangewezen groep.

Momenteel (22/11 12:15) werkt de AJAX Crud wishlist, deze schrijft data weg naar een tabel binnen de database.
Deze is echter nog niet gekoppeld aan specifieke user id's en is dus nu nog universeel voor elke gebruiker.
Tevens is de link momenteel nog benaderbaar voor niet ingelogde gebruikers. Dit is snel op te lossen met dank aan de auth scaffolding.

In de volgende versie moet een wishlist uniek zijn voor een gebruiker.
De gebruiker moet enkel zijn eigen wishlist kunnen zien (en bewerken).
De wishlist moet pas benaderbaar zijn na inlog (Om koppeling met user id te realiseren voor het tonen van eigen wishlist)

------------
16:15
Model, migration, en controllers bijgewerkt om koppeling aan user id te realiseren per item. Elk item wordt nu in DB gekoppeld aan de ingelogde user.
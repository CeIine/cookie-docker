-- Adminer 4.8.1 PostgreSQL 15.1 (Debian 15.1-1.pgdg110+1) dump

DROP TABLE IF EXISTS "commandeproduit";
DROP TABLE IF EXISTS "produit";
DROP TABLE IF EXISTS "commande";
DROP TABLE IF EXISTS "client";


CREATE TABLE "public"."client" (
    "idClient" SERIAL,
    "nom" character varying(255) NOT NULL,
    "prenom" character varying(255) NOT NULL,
    "login" character varying(255) NOT NULL,
    "password" character varying(255) NOT NULL,
    "mail" character varying(255) NOT NULL,
    CONSTRAINT "client_pkey" PRIMARY KEY ("idClient")
) WITH (oids = false);


CREATE TABLE "public"."commande" (
    "idCommande" SERIAL,
    "date" date NOT NULL,
    "statut" character varying(255) NOT NULL,
    "montant" double precision NOT NULL,
    "idClient" integer NOT NULL,
    CONSTRAINT "commande_pkey" PRIMARY KEY ("idCommande")
) WITH (oids = false);


CREATE TABLE "public"."commandeproduit" (
    "idCommande" integer NOT NULL,
    "idProduit" integer NOT NULL,
    "quantite" integer NOT NULL
) WITH (oids = false);


CREATE TABLE "public"."produit" (
    "idProduit" SERIAL,
    "nom" character varying(255) NOT NULL,
    "description" character varying(255) NOT NULL,
    "prix" integer NOT NULL,
    "image" character varying(255) NOT NULL,
    CONSTRAINT "produit_pkey" PRIMARY KEY ("idProduit")
) WITH (oids = false);

INSERT INTO "produit" ("idProduit", "nom", "description", "prix", "image") VALUES
(1,	'Chocolat Blanc',	'Délicieux chocolat blanc',	8,	'blanc.jpeg'),
(2,	'Chocolat au Lait',	'Un chocolat au lait à vous faire tomber',	8,	'lait.jpg'),
(3,	'Chocolat Noir',	'Puissant chocolat noir',	7,	'noir.jpg'),
(4,	'Le Morelliie',	'Un arômes délicats de café, un excellent chocolat noir, quoi de mieux pour vous maintenir éveillé toute la journée',	15,	'morelliie.jpg'),
(5,	'M&M''Sir',	'Chocolat au lait pour rendre vos M&M''s plus craquant',	12,	'm&ms.jpeg'),
(6,	'VanillaChoc',	'La classique qui fait plaisir, chocolat blanc et vanille',	11,	'vanille.jpeg'),
(8,	'Le Crunchy',	'Chocolat au lait et noisettes, de quoi vous faire craquer',	11,	'noisette.jpg'),
(10,	'Daim''kerque',	'Chocolat noir et Daim, un combo foudroyant',	14,	'daim.jpg'),
(7,	'Caramilky',	'Chocolat au lait et caramel beurre salé, la petite touche de gourmandise',	13,	'caramel.jpeg'),
(9,	'ChocoPeanuts',	'Chocolat noir, chocolat au lait, cacahuète, explosion de saveurs garantie',	12,	'cacahètes.jpg');

ALTER TABLE ONLY "public"."commande" ADD CONSTRAINT "commande_idClient_fkey" FOREIGN KEY ("idClient") REFERENCES "client"("idClient") ON DELETE CASCADE NOT DEFERRABLE;

ALTER TABLE ONLY "public"."commandeproduit" ADD CONSTRAINT "commandeproduit_idCommande_fkey" FOREIGN KEY ("idCommande") REFERENCES "commande"("idCommande") ON DELETE CASCADE NOT DEFERRABLE;
ALTER TABLE ONLY "public"."commandeproduit" ADD CONSTRAINT "commandeproduit_idProduit_fkey" FOREIGN KEY ("idProduit") REFERENCES "produit"("idProduit") ON DELETE CASCADE NOT DEFERRABLE;

-- 2022-11-20 16:57:16.864566+00
